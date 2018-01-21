<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Red Wine';
include(SHARED_PATH . '/header.php');
?>
    <div class="center">
        <h2>Select Red Wine Characteristics</h2>
        <form class="wine-form" action="guess-red.php" method="post">
            <table>
                <tr>
                    <th colspan="3">Color</th>
                </tr>
                <tr>
                    <td><label for="garnet">Garnet </label><input type="radio" name="garnet" id="garnet" value="1"></td>
                    <td><label for="ruby">Ruby </label><input type="radio" name="ruby" id="ruby" value="1"></td>
                    <td><label for="purple">Purple </label><input type="radio" name="purple" id="purple" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">Fruit</th>
                </tr>
                <tr>
                    <td><label for="red_fruit">Red </label><input type="checkbox" name="red_fruit" id="red_fruit"
                                                                  value="1"></td>
                    <td><label for="black_fruit">Black </label><input type="checkbox" name="black_fruit"
                                                                      id="black_fruit" value="1"></td>
                    <td><label for="blue_fruit">Blue </label><input type="checkbox" name="blue_fruit" id="blue_fruit"
                                                                    value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
                </tr>
                <tr>
                    <td><label for="nose_tart">Tart</label><br><input type="checkbox" name="nose_tart" id="nose_tart"
                                                                      value="1"></td>
                    <td><label for="nose_ripe">Ripe</label><br><input type="checkbox" name="nose_ripe" id="nose_ripe"
                                                                      value="1"></td>
                    <td><label for="nose_overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox"
                                                                                             name="nose_overripe"
                                                                                             id="nose_overripe"
                                                                                             value="1"></td>
                    <td><label for="nose_baked">Baked, Dried, Oxidative</label><br><input type="checkbox"
                                                                                          name="nose_baked"
                                                                                          id="nose_baked" value="1">
                    </td>
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
                                                                                               id="palate_overripe" value="1"></td>
                    <td><label for="palate_baked">Baked, Dried, Oxidative</label><br><input type="checkbox"
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
                    <td class="left"><label for="vegetal">Vegetal, Green Pepper</label></td>
                    <td class="right-padded"><input type="checkbox" name="vegetal" id="vegetal" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="herbs">Savory Dried Herbs, Tomato Leaf</label></td>
                    <td class="right-padded"><input type="checkbox" name="herbs" id="herbs" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="mint">Mint, Eucalyptus</label></td>
                    <td class="right-padded"><input type="checkbox" name="mint" id="mint" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="peppercorn">Peppercorn</label></td>
                    <td class="right-padded"><input type="checkbox" name="peppercorn" id="peppercorn" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="noffee">Coffee, Cocoa, Mocha</label></td>
                    <td class="right-padded"><input type="checkbox" name="coffee" id="coffee" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="game">Game, Blood, Cured Meat, Leather</label></td>
                    <td class="right-padded"><input type="checkbox" name="game" id="game" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="balsamic">Balsamic, Tar</label></td>
                    <td class="right-padded"><input type="checkbox" name="balsamic" id="balsamic" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="organic">Organic Earth: Forest floor, Wet Leaves, Mushrooms</label>
                    </td>
                    <td class="right-padded"><input type="checkbox" name="organic" id="organic" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="inorganic">Inorganic Earth: Stone, Rock, Mineral, Sulfur</label>
                    </td>
                    <td class="right-padded"><input type="checkbox" name="inorganic" id="inorganic" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="oak">New Oak: Vanilla, Smoke, Toast, Coconut</label></td>
                    <td class="right-padded"><input type="checkbox" name="oak" id="oak" value="1"></td>
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
                    <!-- TODO: Add more label switching. -->
                    <td class="left"><label for="tannin">Tannin:</label></td>
                    <td><input type="radio" name="tannin_low" id="tannin" value="1"></td>
                    <td><input type="radio" name="tannin_mod" id="tannin" value="1"></td>
                    <td><input type="radio" name="tannin_mod_plus" id="tannin" value="1"></td>
                    <td><input type="radio" name="tannin_high" id="tannin" value="1"></td>
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
            <input class="submit-btn" type="submit" value="Submit">
        </form>

        <p>Did you mean to guess a <a href="white-wine.php">white wine?</a></p>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>