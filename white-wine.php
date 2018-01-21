<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - White Wine';
include(SHARED_PATH . '/header.php');
?>
    <div class="center">
        <h2>Select White Wine Characteristics</h2>
        <form class="wine-form" action="guess-white.php" method="post">
            <table>
                <tr>
                    <th colspan="3">Color</th>
                </tr>
                <tr>
                    <td><label for="straw">Straw </label><input type="radio" name="straw" id="straw" value="1"></td>
                    <td><label for="yellow">Yellow </label><input type="radio" name="yellow" id="yellow" value="1"></td>
                    <td><label for="gold">Gold </label><input type="radio" name="gold" id="gold" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit</th>
                </tr>
                <tr>
                    <td><label for="apple">Apple/Pear </label><input type="checkbox" name="apple" id="apple" value="1">
                    </td>
                    <td><label for="citrus">Citrus </label><input type="checkbox" name="citrus" id="citrus" value="1">
                    </td>
                    <td><label for="stone">Stone </label><input type="checkbox" name="stone" id="stone" value="1">
                    </td>
                    <td><label for="tropical">Tropical </label><input type="checkbox" name="tropical" id="tropical"
                                                                      value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
                </tr>
                <tr>
                    <td><label for="nose_tart">Tart</label><br><input type="checkbox"
                                                                      name="nose_tart" id="nose_tart"
                                                                      value="1"></td>
                    <td><label for="nose_ripe">Ripe</label><br><input type="checkbox"
                                                                      name="nose_ripe" id="nose_ripe"
                                                                      value="1"></td>
                    <td><label for="nose_overripe">Overripe, Jammy, Stewed</label><br><input
                                type="checkbox" id="nose_overripe" name="nose_overripe" value="1"></td>
                    <td><label for="nose_baked">Baked, Dried, Bruised</label><br><input
                                type="checkbox" name="nose_baked" id="nose_baked" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
                </tr>
                <tr>
                    <td><label for="palate_tart">Tart</label><br><input type="checkbox" name="palate_tart"
                                                                        id="palate_tart" value="1"></td>
                    <td><label for="palate_ripe">Ripe</label><br><input type="checkbox" name="palate_ripe"
                                                                        id="palate_ripe" value="1"></td>
                    <td><label for="palate_overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox"
                                                                                               name="palate_overripe"
                                                                                               id="palate_overripe"
                                                                                               value="1"></td>
                    <td><label for="palate_baked">Baked, Dried, Bruised</label><br><input type="checkbox"
                                                                                          name="palate_baked"
                                                                                          id="palate_baked" value="1">
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="2">Non-Fruit Characteristic</th>
                </tr>
                <tr>
                    <td class="left"><label for="floral">Floral</label></td>
                    <td class="right-padded"><input type="checkbox" name="floral" id="floral" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="herbal">Herbal</label></td>
                    <td class="right-padded"><input type="checkbox" name="herbal" id="herbal" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="vegetal">Vegetal</label></td>
                    <td class="right-padded"><input type="checkbox" name="vegetal" id="vegetal" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="botrytis">Botrytis: Gingered, Honeyed, Waxy</label></td>
                    <td class="right-padded"><input type="checkbox" name="botrytis" id="botrytis" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="oxidative">Oxidative, Nutty</label></td>
                    <td class="right-padded"><input type="checkbox" name="oxidative" id="oxidative" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="lees">Lees: Doughy, Baked Bread, Yeasty</label></td>
                    <td class="right-padded"><input type="checkbox" name="lees" id="lees" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="buttery">Buttery, Creamy</label></td>
                    <td class="right-padded"><input type="checkbox" name="buttery" id="buttery" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="">Organic Earth: Wet Leaves, Mushrooms</label></td>
                    <td class="right-padded"><input type="checkbox" name="organic" id="" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="inorganic">Inorganic Earth: Stone, Rock, Mineral, Sulfur</label>
                    </td>
                    <td class="right-padded"><input type="checkbox" name="inorganic" id="inorganic" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="oak">New Oak: Vanilla, Brown Baking Spices, Smoke</label></td>
                    <td class="right-padded"><input type="checkbox" name="oak" id="oak" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="bitter">Bitter, Phenolic</label></td>
                    <td class="right-padded"><input type="checkbox" name="bitter" id="bitter" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="left">Structure</th>
                    <th>Dry</th>
                    <th>Off-Dry</th>
                    <th>Medium-Sweet</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td class="left"><label for="sweetness">Sweetness:</label></td>
                    <td><input type="radio" name="dry" id="sweetness" value="1"></td>
                    <td><input type="radio" name="off_dry" id="sweetness" value="1"></td>
                    <td><input type="radio" name="sweet" id="sweetness" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="left">Structure</th>
                    <th>Low/Mod. Minus</th>
                    <th>Moderate</th>
                    <th>Moderate Plus</th>
                    <th>High</th>
                </tr>
                <tr>
                    <td class="left"><label for="acid">Acid:</label></td>
                    <td><input type="radio" name="acid_low" id="acid" value="1"></td>
                    <td><input type="radio" name="acid_mod" id="acid" value="1"></td>
                    <td><input type="radio" name="acid_mod_plus" id="acid" value="1"></td>
                    <td><input type="radio" name="acid_high" id="acid" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="alcohol">Alcohol:</label></td>
                    <td><input type="radio" name="alcohol_low" id="alcohol" value="1"></td>
                    <td><input type="radio" name="alcohol_mod" id="alcohol" value="1"></td>
                    <td><input type="radio" name="alcohol_mod_plus" id="alcohol" value="1"></td>
                    <td><input type="radio" name="alcohol_high" id="alcohol" value="1"></td>
                </tr>
            </table>
            <input class="center submit-btn" type="submit" value="Submit">
        </form>

        <p>Did you mean to guess a <a href="red-wine.php">red wine?</a></p>
    </div>

<?php

include(SHARED_PATH . '/footer.php');

?>