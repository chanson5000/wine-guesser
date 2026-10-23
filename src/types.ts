export type WineType = 'red' | 'white';

export const WINE_TYPES: readonly WineType[] = ['red', 'white'];

/** 0 = not present, 1 = present ("yes"), 2 = a defining marker ("key"). */
export type TraitValue = 0 | 1 | 2;

export type Traits = Record<string, TraitValue>;

export interface Wine {
  /** Stable, URL-safe identifier, unique within its wine type. */
  id: string;
  varietal: string;
  /** Region shown alongside the varietal, e.g. "Burgundy, France". */
  region: string;
  newWorld: boolean;
  traits: Traits;
  description: string;
  notes: string;
  confusion: string;
}

export interface TraitMatch {
  trait: string;
  observed: TraitValue;
  profile: TraitValue;
}

export interface MatchResult {
  wine: Wine;
  score: number;
  /** Highest score this observation could earn, used to express a percentage. */
  maxScore: number;
  percent: number;
  /** Observed traits the profile also has. */
  matched: TraitMatch[];
  /** Observed traits the profile does not have. */
  missing: TraitMatch[];
}
