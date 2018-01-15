<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Red Wine';
include(SHARED_PATH . '/header.php');
?>
    <div class="center">
        <h2>Select Red Wine Characteristics</h2>
        <form class="wine-form" action="guess.php" method="post">
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
                    <td><label for="red-fruit-select">Red </label><input type="checkbox" name="red_fruit" id="red-fruit-select" value="1"></td>
                    <td><label for="black-fruit-select">Black </label><input type="checkbox" name="black_fruit" id="black-fruit-select" value="1"></td>
                    <td><label for="blue-fruit-select">Blue </label><input type="checkbox" name="blue_fruit" id="blue-fruit-select" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
                </tr>
                <tr>
                    <td><label for="nose-tart">Tart</label><br><input type="checkbox" name="nose_tart" id="nose-tart" value="1"></td>
                    <td><label for="nose-ripe">Ripe</label><br><input type="checkbox" name="nose_ripe" id="nose-ripe" value="1"></td>
                    <td><label for="nose-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="nose_overripe" id="nose-overripe" value="1"></td>
                    <td><label for="nose-baked">Baked, Dried, Oxidative</label><br><input type="checkbox" name="nose_baked" id="nose-baked" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
                </tr>
                <tr>
                    <td><label for="palate-tart">Tart</label><br><input type="checkbox" name="palate_tart" id="palate-tart" value="1"></td>
                    <td><label for="palate-ripe">Ripe</label><br><input type="checkbox" name="palate_ripe" id="palate-ripe" value="1"></td>
                    <td><label for="palate-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="palate_overripe" id="palate-overripe" value="1"></td>
                    <td><label for="palate-baked">Baked, Dried, Oxidative</label><br><input type="checkbox" name="palate_baked" id="palate-baked" value="1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="2">Non-Fruit Characteristic</th>

                </tr>
                <tr>
                    <td class="left"><label for="nf-floral">Floral</label></td>
                    <td class="right-padded"><input type="checkbox" name="floral" id="nf-floral" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-vegetal">Vegetal, Green Pepper</label></td>
                    <td class="right-padded"><input type="checkbox" name="vegetal" id="nf-vegetal" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-herbs">Savory Dried Herbs, Tomato Leaf</label></td>
                    <td class="right-padded"><input type="checkbox" name="herbs" id="nf-herbs" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-mint">Mint, Eucalyptus</label></td>
                    <td class="right-padded"><input type="checkbox" name="mint" id="nf-mint" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-peppercorn">Peppercorn</label></td>
                    <td class="right-padded"><input type="checkbox" name="peppercorn" id="nf-peppercorn" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-coffee">Coffee, Cocoa, Mocha</label></td>
                    <td class="right-padded"><input type="checkbox" name="coffee" id="nf-coffee" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-game">Game, Blood, Cured Meat, Leather</label></td>
                    <td class="right-padded"><input type="checkbox" name="game" id="nf-game" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-balsamic">Balsamic, Tar</label></td>
                    <td class="right-padded"><input type="checkbox" name="balsamic" id="nf-balsamic" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-organic">Organic Earth: Forest floor, Wet Leaves, Mushrooms</label></td>
                    <td class="right-padded"><input type="checkbox" name="organic" id="nf-organic" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-inorganic">Inorganic Earth: Stone, Rock, Mineral, Sulfur</label></td>
                    <td class="right-padded"><input type="checkbox" name="inorganic" id="nf-inorganic" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-oak">New Oak: Vanilla, Smoke, Toast, Coconut</label></td>
                    <td class="right-padded"><input type="checkbox" name="oak" id="nf-oak" value="1"></td>
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
                    <td class="left"><label for="st-tannin">Tannin:</label></td>
                    <td><input type="radio" name="tannin_low" id="st-tannin" value="1"></td>
                    <td><input type="radio" name="tannin_mod" id="st-tannin" value="1"></td>
                    <td><input type="radio" name="tannin_mod_plus" id="st-tannin" value="1"></td>
                    <td><input type="radio" name="tannin_high" id="st-tannin" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="st-acid">Acid:</label></td>
                    <td><input type="radio" name="acid_low" id="st-acid" value="1"></td>
                    <td><input type="radio" name="acid_mod" id="st-acid" value="1"></td>
                    <td><input type="radio" name="acid_mod_plus" id="st-acid" value="1"></td>
                    <td><input type="radio" name="acid_high" id="st-acid" value="1"></td>
                </tr>
                <tr>
                    <td class="left"><label for="st-alcohol">Alcohol:</label></td>
                    <td><input type="radio" name="alcohol_low" id="st-alcohol" value="1"></td>
                    <td><input type="radio" name="alcohol_mod" id="st-alcohol" value="1"></td>
                    <td><input type="radio" name="alcohol_mod_plus" id="st-alcohol" value="1"></td>
                    <td><input type="radio" name="alcohol_high" id="st-alcohol" value="1"></td>
                </tr>
            </table>
            <input class="submit-btn" type="submit" value="Submit">
        </form>

        <p>Did you mean to guess a <a href="white-wine.php">white wine?</a></p>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>