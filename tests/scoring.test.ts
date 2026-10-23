import { describe, expect, it } from 'vitest';
import { WINES } from '../src/data/wines';
import {
  decodeObservation,
  encodeObservation,
  hasObservations,
  observationToTraits,
  rankWines,
  scoreWine,
} from '../src/scoring';
import { traitIds } from '../src/traits';
import type { Wine } from '../src/types';

const wine = (id: string, traits: Wine['traits'], varietal = id): Wine => ({
  id,
  varietal,
  region: '',
  newWorld: false,
  traits,
  description: '',
  notes: '',
  confusion: '',
});

const selected = (traits: Wine['traits'], ids: string[]) => ids.filter((id) => traits[id]).length;

describe('observationToTraits', () => {
  it('fills every trait for the wine type with 0 by default', () => {
    const traits = observationToTraits('red', {});
    expect(Object.keys(traits).sort()).toEqual(traitIds('red').sort());
    expect(hasObservations(traits)).toBe(false);
  });

  it('keeps single-choice selections as one-hot columns (color, structure, climate)', () => {
    // Regression: the PHP transform_wine_fields() discarded these groups before scoring.
    const traits = observationToTraits('red', { ruby: 1, tannin_high: 1, acid_mod: 1, climate_warm: 1 });
    expect(traits).toMatchObject({ ruby: 1, garnet: 0, tannin_high: 1, tannin_mod: 0, acid_mod: 1, climate_warm: 1 });
  });

  it('maps white sweetness as a single-choice group', () => {
    const traits = observationToTraits('white', { off_dry: '1' });
    expect(traits).toMatchObject({ dry: 0, off_dry: 1, sweet: 0 });
  });

  it('allows only one option per single-choice group', () => {
    const traits = observationToTraits('red', { garnet: 1, ruby: 1 });
    expect(selected(traits, ['garnet', 'ruby'])).toBe(1);
  });

  it('caps fruit condition at two selections', () => {
    const traits = observationToTraits('red', { nose_tart: 1, nose_ripe: 1, nose_overripe: 1 });
    expect(selected(traits, ['nose_tart', 'nose_ripe', 'nose_overripe'])).toBe(2);
  });

  it('keeps Yes/Key on scale traits and rejects invalid values', () => {
    const traits = observationToTraits('red', { black_fruit: '2', red_fruit: 1, floral: 7, smoke: 'x', bogus: 2 });
    expect(traits).toMatchObject({ black_fruit: 2, red_fruit: 1, floral: 0, smoke: 0 });
    expect(traits).not.toHaveProperty('bogus');
  });
});

describe('scoreWine', () => {
  it('scores +2 for an exact match, +1 for a Yes/Key mismatch, -1 when absent', () => {
    const observed = { a: 1, b: 2, c: 1, d: 2, e: 0 } as const;
    const result = scoreWine(observed, wine('w', { a: 1, b: 1, c: 2, e: 2 }));
    // a: +2, b: +1, c: +1, d: -1, e ignored
    expect(result.score).toBe(3);
    expect(result.maxScore).toBe(8);
    expect(result.percent).toBe(38);
    expect(result.matched.map((m) => m.trait)).toEqual(['a', 'b', 'c']);
    expect(result.missing.map((m) => m.trait)).toEqual(['d']);
  });

  it('returns zero for an empty observation', () => {
    const result = scoreWine({ a: 0 }, wine('w', { a: 2 }));
    expect(result).toMatchObject({ score: 0, maxScore: 0, percent: 0 });
  });

  it('never reports a negative percentage', () => {
    expect(scoreWine({ a: 1 }, wine('w', {})).percent).toBe(0);
  });
});

describe('rankWines', () => {
  it('orders by score, then varietal name for ties', () => {
    const wines = [wine('z', { a: 1 }, 'Zeta'), wine('b', { a: 2 }, 'Beta'), wine('a', { a: 2 }, 'Alpha')];
    const ranked = rankWines({ a: 2 }, wines);
    expect(ranked.map((r) => r.wine.id)).toEqual(['a', 'b', 'z']);
  });
});

describe('URL encoding', () => {
  it('round-trips an observation', () => {
    const observed = observationToTraits('white', { citrus: 2, terpene: 2, acid_high: 1, off_dry: 1 });
    const query = encodeObservation(observed);
    expect(query).toBe('citrus=2&terpene=2&off_dry=1&acid_high=1');
    expect(decodeObservation('white', query)).toEqual(observed);
  });
});

describe('seed profiles', () => {
  it('identify a New World Cabernet from classic markers', () => {
    const observed = observationToTraits('red', {
      purple: 1,
      black_fruit: 2,
      herbal_mint: 1,
      oak: 2,
      tannin_high: 1,
      alcohol_high: 1,
      climate_warm: 1,
    });
    expect(rankWines(observed, WINES.red)[0]?.wine.id).toBe('cabernet-sauvignon-new-world');
  });

  it('identify Riesling from classic markers', () => {
    const observed = observationToTraits('white', { citrus: 1, terpene: 2, off_dry: 1, acid_high: 1 });
    expect(rankWines(observed, WINES.white)[0]?.wine.varietal).toBe('Riesling');
  });

  it('identify Gamay from carbonic maceration', () => {
    const observed = observationToTraits('red', { red_fruit: 2, carbonic_maceration: 2, tannin_low: 1 });
    expect(rankWines(observed, WINES.red)[0]?.wine.id).toBe('gamay-beaujolais');
  });
});
