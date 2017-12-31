<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Red Wine';
include(SHARED_PATH . '/header.php');
?>
    <div class="wine-area center">
        <h2>Select Red Wine Characteristics</h2>
        <form class="wine-form" action="guess.php" method="get">
            <table>
                <tr>
                    <th colspan="3">Color</th>
                </tr>
                <tr>
                    <td><label for="garnet">Garnet </label><input type="radio" name="wine-color" id="garnet" value="garnet"></td>
                    <td><label for="ruby">Ruby </label><input type="radio" name="wine-color" id="ruby" value="ruby"></td>
                    <td><label for="purple">Purple </label><input type="radio" name="wine-color" id="purple" value="purple"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">Fruit</th>
                </tr>
                <tr>
                    <td><label for="red-fruit-select">Red </label><input type="checkbox" name="red-fruit" id="red-fruit-select" value="yes"></td>
                    <td><label for="black-fruit-select">Black </label><input type="checkbox" name="black-fruit" id="black-fruit-select" value="yes"></td>
                    <td><label for="blue-fruit-select">Blue </label><input type="checkbox" name="blue-fruit" id="blue-fruit-select" value="yes"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
                </tr>
                <tr>
                    <td><label for="nose-tart">Tart</label><br><input type="checkbox" name="fruit-nose" id="nose-tart" value="tart"></td>
                    <td><label for="nose-ripe">Ripe</label><br><input type="checkbox" name="fruit-nose" id="nose-ripe" value="ripe"></td>
                    <td><label for="nose-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="fruit-nose" id="nose-overripe" value="overripe"></td>
                    <td><label for="nose-baked">Baked, Dried, Oxidative</label><br><input type="checkbox" name="fruit-nose" id="nose-baked" value="baked"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
                </tr>
                <tr>
                    <td><label for="palate-tart">Tart</label><br><input type="checkbox" name="fruit-palate" id="palate-tart" value="tart"></td>
                    <td><label for="palate-ripe">Ripe</label><br><input type="checkbox" name="fruit-palate" id="palate-ripe" value="ripe"></td>
                    <td><label for="palate-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="fruit-palate" id="palate-overripe" value="overripe"></td>
                    <td><label for="palate-baked">Baked, Dried, Oxidative</label><br><input type="checkbox" name="fruit-palate" id="palate-baked" value="baked"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="2">Non-Fruit Characteristic</th>

                </tr>
                <tr>
                    <td class="left"><label for="nf-floral">Floral</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-floral" id="nf-floral" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-vegetal">Vegetal, Green Pepper</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-vegetal" id="nf-vegetal" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-herbs">Savory Dried Herbs, Tomato Leaf</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-herbs" id="nf-herbs" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-mint">Mint, Eucalyptus</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-mint" id="nf-mint" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-peppercorn">Peppercorn</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-peppercorn" id="nf-peppercorn" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-coffee">Coffee, Cocoa, Mocha</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-coffee" id="nf-coffee" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-game">Game, Blood, Cured Meat, Leather</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-game" id="nf-game" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-balsamic">Balsamic, Tar</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-balsamic" id="nf-balsamic" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-organic">Organic Earth: Forest floor, Wet Leaves, Mushrooms</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-organic" id="nf-organic" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-inorganic">Inorganic Earth: Stone, Rock, Mineral, Sulfur</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-inorganic" id="nf-inorganic" value="yes"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-oak">New Oak: Vanilla, Smoke, Toast, Coconut</label></td>
                    <td class="right-padded"><input type="checkbox" name="nf-oak" id="nf-oak" value="yes"></td>
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
                    <td><input type="radio" name="st-tannin" id="st-tannin" value="low"></td>
                    <td><input type="radio" name="st-tannin" id="st-tannin" value="mod"></td>
                    <td><input type="radio" name="st-tannin" id="st-tannin" value="mod-plus"></td>
                    <td><input type="radio" name="st-tannin" id="st-tannin" value="high"></td>
                </tr>
                <tr>
                    <td class="left"><label for="st-acid">Acid:</label></td>
                    <td><input type="radio" name="st-acid" id="st-acid" value="low"></td>
                    <td><input type="radio" name="st-acid" id="st-acid" value="mod"></td>
                    <td><input type="radio" name="st-acid" id="st-acid" value="mod-plus"></td>
                    <td><input type="radio" name="st-acid" id="st-acid" value="high"></td>
                </tr>
                <tr>
                    <td class="left"><label for="st-alcohol">Alcohol:</label></td>
                    <td><input type="radio" name="st-alcohol" id="st-alcohol" value="low"></td>
                    <td><input type="radio" name="st-alcohol" id="st-alcohol" value="mod"></td>
                    <td><input type="radio" name="st-alcohol" id="st-alcohol" value="mod-plus"></td>
                    <td><input type="radio" name="st-alcohol" id="st-alcohol" value="high"></td>
                </tr>
            </table>
            <input class="submit-btn" type="submit" value="Submit">
        </form>

        <p>Did you mean to guess a <a href="white-wine.php">white wine?</a></p>
    </div>

<?php

include(SHARED_PATH . '/footer.php');

?>