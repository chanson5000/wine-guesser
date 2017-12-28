<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - White Wine';
include(SHARED_PATH . '/header.php');
?>
    <div class="wine-area">
        <h2>Select White Wine Characteristics</h2>
        <form class="wine-form" action="guess.php" method="get">
            <table>
                <tr>
                    <th colspan="3">Color</th>
                </tr>
                <tr>
                    <td><label for="straw">Straw </label><input type="radio" name="wine-color" id="straw" value="straw"></td>
                    <td><label for="yellow">Yellow </label><input type="radio" name="wine-color" id="yellow" value="yellow"></td>
                    <td><label for="gold">Gold </label><input type="radio" name="wine-color" id="gold" value="gold"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="left">Fruit</th>
                    <th>Yes</th>
                    <th>No</th>
                </tr>
                <tr>
                    <td class="left"><label for="apple-pear">Apple/Pear:</label></td>
                    <td><input type="radio" name="apple-pear" id="apple-pear" value="yes"></td>
                    <td><input type="radio" name="apple-pear" id="apple-pear" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="citrus">Citrus:</label></td>
                    <td><input type="radio" name="citrus" id="citrus" value="yes"></td>
                    <td><input type="radio" name="citrus" id="citrus" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="stone-fruit">Stone Fruit:</label></td>
                    <td><input type="radio" name="stone-fruit" id="stone-fruit" value="yes"></td>
                    <td><input type="radio" name="stone-fruit" id="stone-fruit" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="tropical">Tropical:</label></td>
                    <td><input type="radio" name="tropical" id="tropical" value="yes"></td>
                    <td><input type="radio" name="tropical" id="tropical" value="no"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
                </tr>
                <tr>
                    <td class="con-choice"><label for="nose-tart">Tart</label><br><input type="checkbox" name="fruit-nose" id="nose-tart" value="tart"></td>
                    <td class="con-choice"><label for="nose-ripe">Ripe</label><br><input type="checkbox" name="fruit-nose" id="nose-ripe" value="ripe"></td>
                    <td class="con-choice"><label for="nose-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" id="nose-overripe" name="fruit-nose" value="overripe"></td>
                    <td class="con-choice"><label for="nose-baked">Baked, Dried, Bruised</label><br><input type="checkbox" name="fruit-nose" id="nose-baked" value="baked"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
                </tr>
                <tr>
                    <td class="con-choice"><label for="palate-tart">Tart</label><br><input type="checkbox" name="fruit-palate" id="palate-tart" value="tart"></td>
                    <td class="con-choice"><label for="palate-ripe">Ripe</label><br><input type="checkbox" name="fruit-palate" id="palate-tart" value="ripe"></td>
                    <td class="con-choice"><label for="palate-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="fruit-palate" id="palate-overripe" value="overripe"></td>
                    <td class="con-choice"><label for="palate-baked">Baked, Dried, Bruised</label><br><input type="checkbox" name="fruit-palate" id="palate-baked" value="baked"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="left">Non-Fruit Characteristic</th>
                    <th>Yes</th>
                    <th>No</th>
                </tr>
                <tr>
                    <td class="left"><label for="nf-floral">Floral</label></td>
                    <td><input type="radio" name="nf-floral" id="nf-floral" value="yes"></td>
                    <td><input type="radio" name="nf-floral" id="nf-floral" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-herbal">Herbal</label></td>
                    <td><input type="radio" name="nf-herbal" id="nf-herbal" value="yes"></td>
                    <td><input type="radio" name="nf-herbal" id="nf-herbal" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-vegetal">Vegetal</label></td>
                    <td><input type="radio" name="nf-vegetal" id="nf-vegetal" value="yes"></td>
                    <td><input type="radio" name="nf-vegetal" id="nf-vegetal" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-botrytis">Botrytis: Gingered, Honeyed, Waxy</label></td>
                    <td><input type="radio" name="nf-botrytis" id="nf-botrytis" value="yes"></td>
                    <td><input type="radio" name="nf-botrytis" id="nf-botrytis" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-oxidative">Oxidative, Nutty</label></td>
                    <td><input type="radio" name="nf-oxidative" id="nf-oxidative" value="yes"></td>
                    <td><input type="radio" name="nf-oxidative" id="nf-oxidative" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-lees">Lees: Doughy, Baked Bread, Yeasty</label></td>
                    <td><input type="radio" name="nf-lees" id="nf-lees" value="yes"></td>
                    <td><input type="radio" name="nf-lees" id="nf-lees" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-buttery">Buttery, Creamy</label></td>
                    <td><input type="radio" name="nf-buttery" id="nf-buttery" value="yes"></td>
                    <td><input type="radio" name="nf-buttery" id="nf-buttery" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="">Organic Earth: Wet Leaves, Mushrooms</label></td>
                    <td><input type="radio" name="nf-organic" id="" value="yes"></td>
                    <td><input type="radio" name="nf-organic" id="" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-inorganic">Inorganic Earth: Stone, Rock, Mineral, Sulfur</label></td>
                    <td><input type="radio" name="nf-inorganic" id="nf-inorganic" value="yes"></td>
                    <td><input type="radio" name="nf-inorganic" id="nf-inorganic" value="no"></td>
                </tr>
                <tr>
                    <td class="left"><label for="nf-oak">New Oak: Vanilla, Brown Baking Spices, Smoke</label></td>
                    <td><input type="radio" name="nf-oak" id="nf-oak" value="yes"></td>
                    <td><input type="radio" name="nf-oak" id="nf-oak" value="no"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="left">Structure</th>
                    <th>Yes</th>
                    <th>No</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td class="left white-bb"><label for="st-bitter">Bitter, Phenolic:</label></td>
                    <td class="white-bb"><input type="radio" name="st-bitter" id="st-bitter" value="yes"></td>
                    <td class="white-bb"><input type="radio" name="st-bitter" id="st-bitter" value="no"</td>
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
                    <td class="left white-bb"><label for="st-sweetness">Sweetness:</label></td>
                    <td class="white-bb"><input type="radio" name="st-sweetness" id="st-sweetness" value="dry"></td>
                    <td class="white-bb"><input type="radio" name="st-sweetness" id="st-sweetness" value="off-dry"</td>
                    <td class="white-bb"><input type="radio" name="st-sweetness" id="st-sweetness" value="med-sweet"</td>
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
            <input class="center submit-btn" type="submit" value="Submit">
        </form>

        <p>Did you mean to guess a <a href="red-wine.php">red wine?</a></p>
    </div>

<?php

include(SHARED_PATH . '/footer.php');

?>