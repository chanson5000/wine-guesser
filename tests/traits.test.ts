import { describe, expect, it } from 'vitest';
import { SECTIONS, traitIds, traitLabel } from '../src/traits';
import { WINE_TYPES } from '../src/types';

// Scoreable columns from the original PHP constants (minus varietal, new_world and text fields).
const LEGACY_RED = `garnet ruby purple red_fruit black_fruit blue_fruit nose_tart nose_ripe nose_overripe
  nose_baked palate_ripe palate_overripe palate_baked floral vegetal_pyrazine vegetal_tomato_leaf herbal_tobacco
  herbal_mint herbal_thyme_rosemary herbal_tea herbal_oregano_basil herbal_dried spice_pepper spice_anise spice_other
  coffee cocoa game smoke balsamic carbonic_maceration volatile_oxidation organic inorganic oak tannin_low tannin_mod
  tannin_mod_plus tannin_high acid_low acid_mod acid_mod_plus acid_high alcohol_low alcohol_mod alcohol_mod_plus
  alcohol_high climate_cool climate_moderate climate_warm`.split(/\s+/);

const LEGACY_WHITE = `straw yellow gold apple citrus stone tropical nose_tart nose_ripe nose_overripe nose_baked
  palate_tart palate_ripe palate_overripe palate_baked floral_fruit_blossoms floral_red_flowers floral_light_flowers
  herbal_lemongrass herbal_dry herbal_sage_mint herbal_tea vegetal_pyrazine spice terpene wax soap oyster_shell botrytis
  oxidative lees buttery organic inorganic oak bitter dry off_dry sweet acid_low acid_mod_plus acid_high alcohol_low
  alcohol_mod alcohol_mod_plus alcohol_high climate_cool climate_moderate climate_warm`.split(/\s+/);

describe('trait catalog', () => {
  it('covers the legacy red fields plus palate_tart', () => {
    expect(traitIds('red').sort()).toEqual([...LEGACY_RED, 'palate_tart'].sort());
  });

  it('covers the legacy white fields plus acid_mod', () => {
    expect(traitIds('white').sort()).toEqual([...LEGACY_WHITE, 'acid_mod'].sort());
  });

  it.each(WINE_TYPES)('has unique trait ids for %s', (type) => {
    const ids = traitIds(type);
    expect(new Set(ids).size).toBe(ids.length);
  });

  it.each(WINE_TYPES)('keeps nose and palate options in their own sections for %s', (type) => {
    // Regression: the PHP red nose labels pointed at palate_* fields.
    for (const prefix of ['nose', 'palate']) {
      const section = SECTIONS[type].find((s) => s.id === prefix);
      const ids = section?.groups.flatMap((g) => g.options.map((o) => o.id)) ?? [];
      expect(ids).toHaveLength(4);
      expect(ids.every((id) => id.startsWith(`${prefix}_`))).toBe(true);
    }
  });

  it('qualifies grouped labels', () => {
    expect(traitLabel('red', 'tannin_high')).toBe('Tannin: High');
    expect(traitLabel('red', 'black_fruit')).toBe('Black');
  });
});
