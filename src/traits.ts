import type { WineType } from './types';

/**
 * How a section is filled in on the guess form.
 *
 * - `single`: pick at most one option (color, structure, climate, sweetness).
 *   A profile may mark several options in the same group, e.g. tannin moderate+ and high.
 * - `pick`: checkboxes with an upper limit (fruit condition).
 * - `scale`: each trait is rated No / Yes / Key (fruit and non-fruit notes).
 */
export type SectionKind = 'single' | 'pick' | 'scale';

export interface TraitOption {
  id: string;
  label: string;
}

export interface TraitGroup {
  id: string;
  label: string;
  options: TraitOption[];
}

export interface Section {
  id: string;
  title: string;
  kind: SectionKind;
  /** Only for `pick` sections. */
  max?: number;
  groups: TraitGroup[];
}

const opt = (id: string, label: string): TraitOption => ({ id, label });

const STRUCTURE_LEVELS: [string, string][] = [
  ['low', 'Low / Mod−'],
  ['mod', 'Moderate'],
  ['mod_plus', 'Moderate+'],
  ['high', 'High'],
];

const structure = (id: string, label: string): TraitGroup => ({
  id,
  label,
  options: STRUCTURE_LEVELS.map(([level, levelLabel]) => opt(`${id}_${level}`, levelLabel)),
});

const conditions = (prefix: 'nose' | 'palate'): TraitOption[] => [
  opt(`${prefix}_tart`, 'Tart'),
  opt(`${prefix}_ripe`, 'Ripe'),
  opt(`${prefix}_overripe`, 'Overripe, Jammy, Stewed'),
  opt(`${prefix}_baked`, 'Baked, Dried'),
];

const climate: Section = {
  id: 'climate',
  title: 'Climate',
  kind: 'single',
  groups: [
    {
      id: 'climate',
      label: 'Climate',
      options: [opt('climate_cool', 'Cool'), opt('climate_moderate', 'Moderate'), opt('climate_warm', 'Warm')],
    },
  ],
};

const fruitCondition: Section[] = [
  {
    id: 'nose',
    title: 'Fruit condition: nose',
    kind: 'pick',
    max: 2,
    groups: [{ id: 'nose', label: 'Nose', options: conditions('nose') }],
  },
  {
    id: 'palate',
    title: 'Fruit condition: palate',
    kind: 'pick',
    max: 2,
    groups: [{ id: 'palate', label: 'Palate', options: conditions('palate') }],
  },
];

const RED_SECTIONS: Section[] = [
  {
    id: 'color',
    title: 'Color',
    kind: 'single',
    groups: [
      {
        id: 'color',
        label: 'Color',
        options: [opt('garnet', 'Garnet'), opt('ruby', 'Ruby'), opt('purple', 'Purple')],
      },
    ],
  },
  ...fruitCondition,
  {
    id: 'fruit',
    title: 'Fruit',
    kind: 'scale',
    groups: [
      {
        id: 'fruit',
        label: 'Fruit',
        options: [opt('red_fruit', 'Red'), opt('black_fruit', 'Black'), opt('blue_fruit', 'Blue')],
      },
    ],
  },
  {
    id: 'non_fruit',
    title: 'Non-fruit',
    kind: 'scale',
    groups: [
      {
        id: 'non_fruit',
        label: 'Non-fruit',
        options: [
          opt('floral', 'Floral'),
          opt('vegetal_pyrazine', 'Vegetal: Pyrazine (Bell Pepper, Jalapeño)'),
          opt('vegetal_tomato_leaf', 'Vegetal: Tomato Leaf'),
          opt('herbal_tobacco', 'Herbal: Tobacco'),
          opt('herbal_mint', 'Herbal: Mint, Eucalyptus'),
          opt('herbal_thyme_rosemary', 'Herbal: Thyme, Rosemary'),
          opt('herbal_tea', 'Herbal: Tea'),
          opt('herbal_oregano_basil', 'Herbal: Oregano, Basil'),
          opt('herbal_dried', 'Herbal: Dried'),
          opt('spice_pepper', 'Spice: Black Pepper, Peppercorn'),
          opt('spice_anise', 'Spice: Anise, Licorice'),
          opt('spice_other', 'Spice: Other'),
          opt('coffee', 'Coffee'),
          opt('cocoa', 'Cocoa, Chocolate, Mocha'),
          opt('game', 'Game, Blood, Cured Meat, Leather'),
          opt('smoke', 'Smoke'),
          opt('balsamic', 'Balsamic, Tar'),
          opt('carbonic_maceration', 'Carbonic Maceration'),
          opt('volatile_oxidation', 'Volatile Acidity, Oxidation'),
          opt('organic', 'Organic Earth: Forest Floor, Wet Leaves, Mushrooms'),
          opt('inorganic', 'Inorganic Earth: Stone, Rock, Mineral, Sulfur'),
          opt('oak', 'New Oak: Vanilla, Smoke, Toast, Coconut'),
        ],
      },
    ],
  },
  {
    id: 'structure',
    title: 'Structure',
    kind: 'single',
    groups: [structure('tannin', 'Tannin'), structure('acid', 'Acid'), structure('alcohol', 'Alcohol')],
  },
  climate,
];

const WHITE_SECTIONS: Section[] = [
  {
    id: 'color',
    title: 'Color',
    kind: 'single',
    groups: [
      {
        id: 'color',
        label: 'Color',
        options: [opt('straw', 'Straw'), opt('yellow', 'Yellow'), opt('gold', 'Gold')],
      },
    ],
  },
  ...fruitCondition,
  {
    id: 'fruit',
    title: 'Fruit',
    kind: 'scale',
    groups: [
      {
        id: 'fruit',
        label: 'Fruit',
        options: [
          opt('apple', 'Apple / Pear'),
          opt('citrus', 'Citrus'),
          opt('stone', 'Stone'),
          opt('tropical', 'Tropical'),
        ],
      },
    ],
  },
  {
    id: 'non_fruit',
    title: 'Non-fruit',
    kind: 'scale',
    groups: [
      {
        id: 'non_fruit',
        label: 'Non-fruit',
        options: [
          opt('floral_fruit_blossoms', 'Fruit Blossoms: Orange, Orchard, Apple, Citrus'),
          opt('floral_red_flowers', 'Red Flowers: Rose, Lilac, Potpourri, Lavender'),
          opt('floral_light_flowers', 'Yellow and White Flowers, Stems, Hay'),
          opt('herbal_lemongrass', 'Fresh Herbs: Lemongrass, Tarragon, Chive, Cilantro'),
          opt('herbal_dry', 'Dried / Savory Herbs'),
          opt('herbal_sage_mint', 'Herbal: Sage, Mint, Eucalyptus, Pine'),
          opt('herbal_tea', 'Herbal: Tea'),
          opt('vegetal_pyrazine', 'Vegetal: Pyrazine (Bell Pepper, Jalapeño)'),
          opt('spice', 'Spice: Allspice, Cardamom, Clove, Ginger, Vanilla'),
          opt('terpene', 'Terpene: Petrol, Rubber'),
          opt('wax', 'Wax, Lanolin, Cheese Rind'),
          opt('soap', 'Soap, Musk'),
          opt('oyster_shell', 'Oyster Shell, Saline, Schist'),
          opt('botrytis', 'Botrytis: Honey, Beeswax, Marmalade'),
          opt('oxidative', 'Oxidative, Nutty'),
          opt('lees', 'Lees: Bread Dough, Yeast, Creamy'),
          opt('buttery', 'Malolactic: Butter, Cream'),
          opt('organic', 'Organic Earth: Wet Leaves, Mushrooms'),
          opt('inorganic', 'Inorganic Earth: Stone, Rock, Mineral, Sulfur'),
          opt('oak', 'New Oak: Vanilla, Brown Baking Spices, Smoke'),
          opt('bitter', 'Bitter, Phenolic'),
        ],
      },
    ],
  },
  {
    id: 'structure',
    title: 'Structure',
    kind: 'single',
    groups: [
      {
        id: 'sweetness',
        label: 'Sweetness',
        options: [opt('dry', 'Dry'), opt('off_dry', 'Off-Dry'), opt('sweet', 'Sweet')],
      },
      structure('acid', 'Acid'),
      structure('alcohol', 'Alcohol'),
    ],
  },
  climate,
];

export const SECTIONS: Record<WineType, Section[]> = {
  red: RED_SECTIONS,
  white: WHITE_SECTIONS,
};

/** Every scoreable trait id for a wine type, in form order. */
export function traitIds(type: WineType): string[] {
  return SECTIONS[type].flatMap((s) => s.groups.flatMap((g) => g.options.map((o) => o.id)));
}

const labelCache = new Map<WineType, Map<string, string>>();

/** Human-readable label for a trait, qualified by its group where the bare label is ambiguous. */
export function traitLabel(type: WineType, trait: string): string {
  let labels = labelCache.get(type);
  if (!labels) {
    labels = new Map();
    for (const section of SECTIONS[type]) {
      for (const group of section.groups) {
        const qualify = section.kind !== 'scale';
        for (const option of group.options) {
          labels.set(option.id, qualify ? `${group.label}: ${option.label}` : option.label);
        }
      }
    }
    labelCache.set(type, labels);
  }
  return labels.get(trait) ?? trait;
}

export const WINE_TYPE_LABELS: Record<WineType, string> = {
  red: 'Red',
  white: 'White',
};
