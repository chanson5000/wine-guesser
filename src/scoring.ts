import { SECTIONS } from './traits';
import type { MatchResult, TraitMatch, TraitValue, Traits, Wine, WineType } from './types';

/** Raw form or URL input: trait id → value. Anything unrecognised is ignored. */
export type RawObservation = Record<string, unknown>;

function toTraitValue(raw: unknown): TraitValue {
  const n = Number(raw);
  return n === 1 || n === 2 ? n : 0;
}

/**
 * Normalise raw input into a complete trait vector for the wine type.
 *
 * Unknown keys are dropped, every trait defaults to 0, `single` groups keep at most
 * one selected option and `pick` sections keep at most `max` options.
 */
export function observationToTraits(type: WineType, raw: RawObservation): Traits {
  const traits: Traits = {};
  for (const section of SECTIONS[type]) {
    for (const group of section.groups) {
      let picked = 0;
      for (const { id } of group.options) {
        const value = toTraitValue(raw[id]);
        switch (section.kind) {
          case 'scale':
            traits[id] = value;
            break;
          case 'single':
            traits[id] = value > 0 && picked === 0 ? 1 : 0;
            break;
          case 'pick':
            traits[id] = value > 0 && picked < (section.max ?? Infinity) ? 1 : 0;
            break;
        }
        if (traits[id]) picked++;
      }
    }
  }
  return traits;
}

export function hasObservations(observed: Traits): boolean {
  return Object.values(observed).some((v) => v > 0);
}

/**
 * Score a profile against an observation.
 *
 * For every trait the taster marked Yes (1) or Key (2):
 * - the profile has the same value: +2
 * - the profile has the trait at the other strength: +1
 * - the profile lacks the trait: −1
 * Traits the taster left at No are ignored.
 */
export function scoreWine(observed: Traits, wine: Wine): MatchResult {
  let score = 0;
  let maxScore = 0;
  const matched: TraitMatch[] = [];
  const missing: TraitMatch[] = [];

  for (const [trait, value] of Object.entries(observed)) {
    if (value === 0) continue;
    const profile = wine.traits[trait] ?? 0;
    const match = { trait, observed: value, profile };
    maxScore += 2;
    if (profile === value) {
      score += 2;
      matched.push(match);
    } else if (profile > 0) {
      score += 1;
      matched.push(match);
    } else {
      score -= 1;
      missing.push(match);
    }
  }

  const percent = maxScore === 0 ? 0 : Math.round((Math.max(0, score) / maxScore) * 100);
  return { wine, score, maxScore, percent, matched, missing };
}

/** All profiles ranked best match first; ties are broken by varietal, then region. */
export function rankWines(observed: Traits, wines: readonly Wine[]): MatchResult[] {
  return wines
    .map((wine) => scoreWine(observed, wine))
    .sort(
      (a, b) =>
        b.score - a.score ||
        a.wine.varietal.localeCompare(b.wine.varietal) ||
        a.wine.region.localeCompare(b.wine.region),
    );
}

/** Serialise only the non-zero traits, for a compact shareable URL. */
export function encodeObservation(observed: Traits): string {
  const params = new URLSearchParams();
  for (const [trait, value] of Object.entries(observed)) {
    if (value > 0) params.set(trait, String(value));
  }
  return params.toString();
}

export function decodeObservation(type: WineType, query: string): Traits {
  return observationToTraits(type, Object.fromEntries(new URLSearchParams(query)));
}
