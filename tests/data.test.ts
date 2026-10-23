import { describe, expect, it } from 'vitest';
import { WINES } from '../src/data/wines';
import { SECTIONS, traitIds } from '../src/traits';
import { WINE_TYPES } from '../src/types';

describe.each(WINE_TYPES)('%s wine profiles', (type) => {
  const wines = WINES[type];
  const valid = new Set(traitIds(type));

  it('exist', () => {
    expect(wines.length).toBeGreaterThan(0);
  });

  it('have unique, URL-safe ids', () => {
    const ids = wines.map((w) => w.id);
    expect(new Set(ids).size).toBe(ids.length);
    for (const id of ids) expect(id).toMatch(/^[a-z0-9]+(-[a-z0-9]+)*$/);
  });

  it.each(wines.map((w) => [w.id, w] as const))('%s is well formed', (_id, wine) => {
    expect(wine.varietal.length).toBeGreaterThanOrEqual(2);
    expect(wine.varietal.length).toBeLessThanOrEqual(25);
    expect(typeof wine.newWorld).toBe('boolean');
    for (const field of ['region', 'description', 'notes', 'confusion'] as const) {
      expect(wine[field].trim()).not.toBe('');
    }

    for (const [trait, value] of Object.entries(wine.traits)) {
      expect(valid, `unknown trait "${trait}"`).toContain(trait);
      expect([1, 2], `${trait} must be 1 (yes) or 2 (key)`).toContain(value);
    }

    for (const section of SECTIONS[type]) {
      if (section.kind === 'scale') continue;
      for (const group of section.groups) {
        const set = group.options.filter((o) => wine.traits[o.id]);
        expect(set.length, `${group.label} needs at least one value`).toBeGreaterThan(0);
        for (const o of set) expect(wine.traits[o.id], `${o.id} is a checkbox`).toBe(1);
      }
    }
  });
});
