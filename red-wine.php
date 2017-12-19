<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Red Wine';
include(SHARED_PATH . '/header.php');
?>
    <div class="wine-area">
        <h2>Select Red Wine Characteristics</h2>
        <form class="wine-form" action="guess.php" method="get">
            <table class="wine-char max-width">
                <tr>
                    <th colspan="3">Color</th>
                </tr>
                <tr>
                    <td>Garnet <input type="radio" name="wine-color" value="garnet"></td>
                    <td>Ruby <input type="radio" name="wine-color" value="ruby"></td>
                    <td>Purple <input type="radio" name="wine-color" value="purple"></td>
                </tr>
            </table>
            <table class="wine-char max-width">
                <tr>
                    <th class="left">Fruit</th>
                    <th>Yes</th>
                    <th>No</th>
                </tr>
                <tr>
                    <td class="left">Red:</td>
                    <td><input type="radio" name="red-fruit" value="yes"></td>
                    <td><input type="radio" name="red-fruit" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Black:</td>
                    <td><input type="radio" name="black-fruit" value="yes"></td>
                    <td><input type="radio" name="black-fruit" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Blue:</td>
                    <td><input type="radio" name="blue-fruit" value="yes"></td>
                    <td><input type="radio" name="blue-fruit" value="no"></td>
                </tr>
            </table>
            <table class="wine-char max-width">
                <tr>
                    <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
                </tr>
                <tr>
                    <td class="con-choice">Tart<br><input type="checkbox" name="fruit-nose" value="tart"></td>
                    <td class="con-choice">Ripe<br><input type="checkbox" name="fruit-nose" value="ripe"></td>
                    <td class="con-choice">Overripe, Jammy, Stewed<br><input type="checkbox" name="fruit-nose"
                                                                             value="overripe"></td>
                    <td class="con-choice">Baked, Dried, Oxidative<br><input type="checkbox" name="fruit-nose"
                                                                             value="baked"></td>
                </tr>
            </table>
            <table class="wine-char max-width">
                <tr>
                    <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
                </tr>
                <tr>
                    <td class="con-choice">Tart<br><input type="checkbox" name="fruit-palate" value="tart"></td>
                    <td class="con-choice">Ripe<br><input type="checkbox" name="fruit-palate" value="ripe"></td>
                    <td class="con-choice">Overripe, Jammy, Stewed<br><input type="checkbox" name="fruit-palate"
                                                                             value="overripe"></td>
                    <td class="con-choice">Baked, Dried, Oxidative<br><input type="checkbox" name="fruit-palate"
                                                                             value="baked"></td>
                </tr>
            </table>
            <table class="wine-char max-width">
                <tr>
                    <th class="left">Non-Fruit Characteristic</th>
                    <th>Yes</th>
                    <th>No</th>
                </tr>
                <tr>
                    <td class="left">Floral</td>
                    <td><input type="radio" name="nf-floral" value="yes"></td>
                    <td><input type="radio" name="nf-floral" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Vegetal, Green Pepper</td>
                    <td><input type="radio" name="nf-vegetal" value="yes"></td>
                    <td><input type="radio" name="nf-vegetal" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Savory Dried Herbs, Tomato Leaf</td>
                    <td><input type="radio" name="nf-herbs" value="yes"></td>
                    <td><input type="radio" name="nf-herbs" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Mint, Eucalyptus</td>
                    <td><input type="radio" name="nf-mint" value="yes"></td>
                    <td><input type="radio" name="nf-mint" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Peppercorn</td>
                    <td><input type="radio" name="nf-peppercorn" value="yes"></td>
                    <td><input type="radio" name="nf-peppercorn" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Coffee, Cocoa, Mocha</td>
                    <td><input type="radio" name="nf-coffee" value="yes"></td>
                    <td><input type="radio" name="nf-coffee" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Game, Blood, Cured Meat, Leather</td>
                    <td><input type="radio" name="nf-game" value="yes"></td>
                    <td><input type="radio" name="nf-game" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Balsamic, Tar</td>
                    <td><input type="radio" name="nf-balsamic" value="yes"></td>
                    <td><input type="radio" name="nf-balsamic" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Organic Earth: Forest floor, Wet Leaves, Mushrooms</td>
                    <td><input type="radio" name="nf-organic" value="yes"></td>
                    <td><input type="radio" name="nf-organic" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Inorganic Earth: Stone, Rock, Mineral, Sulfur</td>
                    <td><input type="radio" name="nf-inorganic" value="yes"></td>
                    <td><input type="radio" name="nf-inorganic" value="no"></td>
                </tr>
                <tr>
                    <td class="left">New Oak: Vanilla, Smoke, Toast, Coconut</td>
                    <td><input type="radio" name="nf-oak" value="yes"></td>
                    <td><input type="radio" name="nf-oak" value="no"></td>
                </tr>
            </table>
            <table class="wine-char max-width">
                <tr>
                    <th class="left">Structure</th>
                    <th>Low to Mod. Minus</th>
                    <th>Moderate</th>
                    <th>Moderate Plus</th>
                    <th>High</th>
                </tr>
                <tr>
                    <td class="left">Tannin:</td>
                    <td><input type="radio" name="st-tannin" value="low"></td>
                    <td><input type="radio" name="st-tannin" value="mod"></td>
                    <td><input type="radio" name="st-tannin" value="mod-plus"></td>
                    <td><input type="radio" name="st-tannin" value="high"></td>
                </tr>
                <tr>
                    <td class="left">Acid:</td>
                    <td><input type="radio" name="st-acid" value="low"></td>
                    <td><input type="radio" name="st-acid" value="mod"></td>
                    <td><input type="radio" name="st-acid" value="mod-plus"></td>
                    <td><input type="radio" name="st-acid" value="high"></td>
                </tr>
                <tr>
                    <td class="left">Alcohol:</td>
                    <td><input type="radio" name="st-alcohol" value="low"></td>
                    <td><input type="radio" name="st-alcohol" value="mod"></td>
                    <td><input type="radio" name="st-alcohol" value="mod-plus"></td>
                    <td><input type="radio" name="st-alcohol" value="high"></td>
                </tr>
            </table>
            <input class="center submit-btn" type="submit" value="Submit">
        </form>

        <p>Did you mean to guess a <a href="white-wine.php">white wine?</a></p>
    </div>

<?php

include(SHARED_PATH . '/footer.php');

?>