<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - White Wine';
include(SHARED_PATH . '/header.php');
?>
    <div class="wine-area">
        <h2>Select White Wine Characteristics</h2>
        <form class="wine-form" action="guess.php" method="get">
            <table class="wine-char max-width">
                <tr>
                    <th colspan="3">Color</th>
                </tr>
                <tr>
                    <td>Straw <input type="radio" name="wine-color" value="straw"></td>
                    <td>Yellow <input type="radio" name="wine-color" value="yellow"></td>
                    <td>Gold <input type="radio" name="wine-color" value="gold"></td>
                </tr>
            </table>
            <table class="wine-char max-width">
                <tr>
                    <th class="left">Fruit</th>
                    <th>Yes</th>
                    <th>No</th>
                </tr>
                <tr>
                    <td class="left">Apple/Pear:</td>
                    <td><input type="radio" name="apple-pear" value="yes"></td>
                    <td><input type="radio" name="apple-pear" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Citrus:</td>
                    <td><input type="radio" name="citrus" value="yes"></td>
                    <td><input type="radio" name="citrus" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Stone Fruit:</td>
                    <td><input type="radio" name="stone-fruit" value="yes"></td>
                    <td><input type="radio" name="stone-fruit" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Tropical:</td>
                    <td><input type="radio" name="tropical" value="yes"></td>
                    <td><input type="radio" name="tropical" value="no"></td>
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
                    <td class="con-choice">Baked, Dried, Bruised<br><input type="checkbox" name="fruit-nose"
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
                    <td class="con-choice">Baked, Dried, Bruised<br><input type="checkbox" name="fruit-palate"
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
                    <td class="left">Herbal</td>
                    <td><input type="radio" name="nf-herbal" value="yes"></td>
                    <td><input type="radio" name="nf-herbal" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Vegetal</td>
                    <td><input type="radio" name="nf-vegetal" value="yes"></td>
                    <td><input type="radio" name="nf-vegetal" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Botrytis: Gingered, Honeyed, Waxy</td>
                    <td><input type="radio" name="nf-botrytis" value="yes"></td>
                    <td><input type="radio" name="nf-botrytis" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Oxidative, Nutty</td>
                    <td><input type="radio" name="nf-oxidative" value="yes"></td>
                    <td><input type="radio" name="nf-oxidative" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Lees: Doughy, Baked Bread, Yeasty</td>
                    <td><input type="radio" name="nf-lees" value="yes"></td>
                    <td><input type="radio" name="nf-lees" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Buttery, Creamy</td>
                    <td><input type="radio" name="nf-buttery" value="yes"></td>
                    <td><input type="radio" name="nf-buttery" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Organic Earth: Wet Leaves, Mushrooms</td>
                    <td><input type="radio" name="nf-organic" value="yes"></td>
                    <td><input type="radio" name="nf-organic" value="no"></td>
                </tr>
                <tr>
                    <td class="left">Inorganic Earth: Stone, Rock, Mineral, Sulfur</td>
                    <td><input type="radio" name="nf-inorganic" value="yes"></td>
                    <td><input type="radio" name="nf-inorganic" value="no"></td>
                </tr>
                <tr>
                    <td class="left">New Oak: Vanilla, Brown Baking Spices, Smoke</td>
                    <td><input type="radio" name="nf-oak" value="yes"></td>
                    <td><input type="radio" name="nf-oak" value="no"></td>
                </tr>
            </table>
            <table class="wine-char max-width">
                <tr>
                    <th class="left">Structure</th>
                    <th>Yes</th>
                    <th>No</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td class="left white-bb">Bitter, Phenolic:</td>
                    <td class="white-bb"><input type="radio" name="st-bitter" value="yes"></td>
                    <td class="white-bb"><input type="radio" name="st-bitter" value="no"</td>
                    <td class="white-bb">&nbsp;</td>
                    <td class="white-bb">&nbsp;</td>
                </tr>
                <tr>
                    <th class="left">Structure</th>
                    <th>Dry</th>
                    <th>Off-Dry</th>
                    <th>Medium-Sweet</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td class="left white-bb">Sweetness:</td>
                    <td class="white-bb"><input type="radio" name="st-sweetness" value="dry"></td>
                    <td class="white-bb"><input type="radio" name="st-sweetness" value="off-dry"</td>
                    <td class="white-bb"><input type="radio" name="st-sweetness" value="med-sweet"</td>
                    <td class="white-bb">&nbsp;</td>
                </tr>
                <tr>
                    <th class="left">Structure</th>
                    <th>Low to Mod. Minus</th>
                    <th>Moderate</th>
                    <th>Moderate Plus</th>
                    <th>High</th>
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

        <p>Did you mean to guess a <a href="red-wine.php">red wine?</a></p>
    </div>

<?php

include(SHARED_PATH . '/footer.php');

?>