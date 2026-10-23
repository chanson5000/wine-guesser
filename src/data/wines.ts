import type { Wine, WineType } from '../types';
import red from './red.json';
import white from './white.json';

// JSON imports are typed loosely (number, not TraitValue); tests/data.test.ts validates the shape.
export const WINES: Record<WineType, readonly Wine[]> = {
  red: red as unknown as Wine[],
  white: white as unknown as Wine[],
};

export function findWine(type: WineType, id: string): Wine | undefined {
  return WINES[type].find((w) => w.id === id);
}
