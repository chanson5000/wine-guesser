<?php

const RED_WINE = "red wine";
const WHITE_WINE = "white wine";

const WINE_TYPES = array(
    RED_WINE,
    WHITE_WINE,
);

const RED_WINE_FIELDS = array(
    "varietal",
    "new_world",
    "garnet",
    "ruby",
    "purple",
    "red_fruit",
    "black_fruit",
    "blue_fruit",
    "nose_tart",
    "nose_ripe",
    "nose_overripe",
    "nose_baked",
    "palate_ripe",
    "palate_overripe",
    "palate_baked",
    "floral",
    "vegetal_pyrazine",
    "vegetal_tomato_leaf",
    "herbal_tobacco",
    "herbal_mint",
    "herbal_thyme_rosemary",
    "herbal_tea",
    "herbal_oregano_basil",
    "herbal_dried",
    "spice_pepper",
    "spice_anise",
    "spice_other",
    "coffee",
    "cocoa",
    "game",
    "smoke",
    "balsamic",
    "carbonic_maceration",
    "volatile_oxidation",
    "organic",
    "inorganic",
    "oak",
    "tannin_low",
    "tannin_mod",
    "tannin_mod_plus",
    "tannin_high",
    "acid_low",
    "acid_mod",
    "acid_mod_plus",
    "acid_high",
    "alcohol_low",
    "alcohol_mod",
    "alcohol_mod_plus",
    "alcohol_high",
    "climate_cool",
    "climate_moderate",
    "climate_warm",
    "description",
    "notes",
    "confusion",
);

const WHITE_WINE_FIELDS = array(
    "varietal",
    "new_world",
    "straw",
    "yellow",
    "gold",
    "apple",
    "citrus",
    "stone",
    "tropical",
    "nose_tart",
    "nose_ripe",
    "nose_overripe",
    "nose_baked",
    "palate_tart",
    "palate_ripe",
    "palate_overripe",
    "palate_baked",
    "floral_fruit_blossoms",
    "floral_red_flowers",
    "floral_light_flowers",
    "herbal_lemongrass",
    "herbal_dry",
    "herbal_sage_mint",
    "herbal_tea",
    "vegetal_pyrazine",
    "spice",
    "terpene",
    "wax",
    "soap",
    "oyster_shell",
    "botrytis",
    "oxidative",
    "lees",
    "buttery",
    "organic",
    "inorganic",
    "oak",
    "bitter",
    "dry",
    "off_dry",
    "sweet",
    "acid_low",
    "acid_mod_plus",
    "acid_high",
    "alcohol_low",
    "alcohol_mod",
    "alcohol_mod_plus",
    "alcohol_high",
    "climate_cool",
    "climate_moderate",
    "climate_warm",
    "description",
    "notes",
    "confusion",
);

const WINE_TEXT_FIELDS = array(
    "varietal",
    "description",
    "notes",
    "confusion",
);

const RED_WINE_NOTE_LABELS = array(
    "floral" => "Floral",
    "vegetal_pyrazine" => "Vegetal: Pyrazine (Bell Pepper, Jalepeno",
    "vegetal_tomato_leaf" => "Vegetal: Tomato Leaf",
    "herbal_tobacco" => "Herbal: Tobacco",
    "herbal_mint" => "Herbal: Mint, Eucalyptus",
    "herbal_thyme_rosemary" => "Herbal: Thyme, Rosemary",
    "herbal_tea" => "Herbal: Tea",
    "herbal_oregano_basil" => "Herbal: Oregano, Basil",
    "herbal_dried" => "Herbal: Dried",
    "spice_pepper" => "Spice: Black Pepper, Peppercorn",
    "spice_anise" => "Spice: Anise, Licorice",
    "spice_other" => "Spice: Other",
    "coffee" => "Coffee",
    "cocoa" => "Cocoa, Chocolate, Mocha",
    "game" => "Game, Blood, Cured Meat, Leather",
    "smoke" => "Smoke",
    "balsamic" => "Balsamic, Tar",
    "carbonic_maceration" => "Carbonic Maceration",
    "volatile_oxidation" => "Volatile Acidity, Oxidation",
    "organic" => "Organic Earth: Forest Floor, Wet Leaves, Mushrooms",
    "inorganic" => "Inorganic Earth: Stone, Rock, Mineral, Sulfur",
    "oak" => "New Oak: Vanilla, Smoke, Toast, Coconut",
);

const WHITE_WINE_NOTE_LABELS = array(
    "floral_fruit_blossoms" => "Fruit Blossoms: Orange, Orchard, Apple, and Citrus",
    "floral_red_flowers" => "Red Flowers: Gardenia, Rose, Jasmine, Lilac, Honeysuckle, Potpourri, Lavender",
    "floral_light_flowers" => "Yellow and White Flowers, Stems, Hay.",
    "herbal_lemongrass" => "Fresh/Sweet Herbs: Lemongrass, Tarragon, Chive, Cilantro, Hay, Straw",
    "herbal_dry" => "Dried/Savory Herbs",
    "herbal_sage_mint" => "Herbal: Sage, Mint, Eucalyptus, Pine",
    "herbal_tea" => "Herbal: Tea",
    "vegetal_pyrazine" => "Vegetal: Pyrazine (Bell Pepper, Jalepeno)",
    "spice" => "Spice: Allspice, Cardamom, Clove, Ginger, Vanilla",
    "terpene" => "Terpene: Petrol, Rubber",
    "wax" => "Wax, Lanolin, Cheese Rind",
    "soap" => "Soap, Musk",
    "oyster_shell" => "Oyster Shell, Saline, Schist",
    "botrytis" => "Botrytis: Honey, Beeswax, Marmalade",
    "oxidative" => "Oxidative, Nutty",
    "lees" => "Lees: Buttery, Creamy",
    "organic" => "Organic Earth: Wet Leaves, Mushrooms",
    "inorganic" => "Inorganic Earth: Stone, Rock, Mineral, Sulfur",
    "oak" => "New Oak: Vanilla, Brown Baking Spices, Smoke",
    "bitter" => "Bitter, Phenolic",
);

const RED_TRANSFORM_FIELDS = array(
    "color",
    "tannin",
    "acid",
    "alcohol",
    "climate",
);

const WHITE_TRANSFORM_FIELDS = array(
    "color",
    "acid",
    "alcohol",
    "sweetness",
    "climate",
);

const RED_WINE_COLORS = array(
    "garnet",
    "ruby",
    "purple",
);

const WHITE_WINE_COLORS = array(
    "straw",
    "yellow",
    "gold",
);

const WHITE_WINE_COLOR_LABELS = array(
    "straw" => "Straw",
    "yellow" => "Yellow",
    "gold" => "Gold",
);

const WINE_STRUCTURES = array(
    "low",
    "mod",
    "mod_plus",
    "high",
);

const WINE_SWEETNESS = array(
    "dry",
    "off_dry",
    "sweet",
);

const WINE_CLIMATES = array(
    "cool",
    "moderate",
    "warm",
);

const WINE_NOSE_CONDITIONS = array(
    "nose_tart",
    "nose_ripe",
    "nose_overripe",
    "nose_baked",
);

const WHITE_NOSE_COND_LABELS = array(
    "nose_tart" => "Tart",
    "nose_ripe" => "Ripe",
    "nose_overripe" => "Overripe, Jammy, Stewed",
    "nose_baked" => "Baked, Dried, Bruised",
);

const WHITE_PALATE_COND_LABELS = array(
    "palate_tart" => "Tart",
    "palate_ripe" => "Ripe",
    "palate_overripe" => "Overripe, Jammy, Stewed",
    "palate_baked" => "Baked, Dried, Bruised",
);

const WINE_PALATE_CONDITIONS = array(
    "palate_tart",
    "palate_ripe",
    "palate_overripe",
    "palate_baked",
);

const RED_NOSE_COND_LABELS = array(
    "nose_tart" => "Tart",
    "palate_ripe" => "Ripe",
    "palate_overripe" => "Overripe",
    "palate_baked" => "Baked, Dried, Oxidative",
);

const RED_PALATE_COND_LABELS = array(
    "palate_tart" => "Tart",
    "palate_ripe" => "Ripe",
    "palate_overripe" => "Overripe",
    "palate_baked" => "Baked, Dried, Oxidative",
);

const WHITE_WINE_FRUIT_LABELS = array(
    "apple" => "Apple/Pear",
    "citrus" => "Citrus",
    "stone" => "Stone",
    "tropical" => "Tropical",
);

const RED_WINE_COLOR_LABELS = array(
    "garnet" => "Garnet",
    "ruby" => "Ruby",
    "purple" => "Purple",
);

const RED_WINE_FRUIT_LABELS = array(
    "red_fruit" => "Red",
    "black_fruit" => "Black",
    "blue_fruit" => "Blue",
);
