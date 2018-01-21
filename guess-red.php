<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Your Wine Varietal';
include(SHARED_PATH . '/header.php');

if (is_post_request()) {
    $guess_wine = [];
    $guess_wine['varietal'] = isset($_POST['varietal']) ? $_POST['varietal'] : '0';
    $guess_wine['new_world'] = isset($_POST['new_world']) ? $_POST['new_world'] : '0';
    $guess_wine['garnet'] = isset($_POST['garnet']) ? $_POST['garnet'] : '0';
    $guess_wine['ruby'] = isset($_POST['ruby']) ? $_POST['ruby'] : '0';
    $guess_wine['purple'] = isset($_POST['purple']) ? $_POST['purple'] : '0';
    $guess_wine['red_fruit'] = isset($_POST['red_fruit']) ? $_POST['red_fruit'] : '0';
    $guess_wine['black_fruit'] = isset($_POST['black_fruit']) ? $_POST['black_fruit'] : '0';
    $guess_wine['blue_fruit'] = isset($_POST['blue_fruit']) ? $_POST['blue_fruit'] : '0';
    $guess_wine['nose_tart'] = isset($_POST['nose_tart']) ? $_POST['nose_tart'] : '0';
    $guess_wine['nose_ripe'] = isset($_POST['nose_ripe']) ? $_POST['nose_ripe'] : '0';
    $guess_wine['nose_overripe'] = isset($_POST['nose_overripe']) ? $_POST['nose_overripe'] : '0';
    $guess_wine['nose_baked'] = isset($_POST['nose_baked']) ? $_POST['nose_baked'] : '0';
    $guess_wine['palate_tart'] = isset($_POST['palate_tart']) ? $_POST['palate_tart'] : '0';
    $guess_wine['palate_ripe'] = isset($_POST['palate_ripe']) ? $_POST['palate_ripe'] : '0';
    $guess_wine['palate_overripe'] = isset($_POST['palate_overripe']) ? $_POST['palate_overripe'] : '0';
    $guess_wine['palate_baked'] = isset($_POST['palate_baked']) ? $_POST['palate_baked'] : '0';
    $guess_wine['floral'] = isset($_POST['floral']) ? $_POST['floral'] : '0';
    $guess_wine['vegetal'] = isset($_POST['vegetal']) ? $_POST['vegetal'] : '0';
    $guess_wine['herbs'] = isset($_POST['herbs']) ? $_POST['herbs'] : '0';
    $guess_wine['mint'] = isset($_POST['mint']) ? $_POST['mint'] : '0';
    $guess_wine['peppercorn'] = isset($_POST['peppercorn']) ? $_POST['peppercorn'] : '0';
    $guess_wine['coffee'] = isset($_POST['coffee']) ? $_POST['coffee'] : '0';
    $guess_wine['game'] = isset($_POST['game']) ? $_POST['game'] : '0';
    $guess_wine['balsamic'] = isset($_POST['balsamic']) ? $_POST['balsamic'] : '0';
    $guess_wine['organic'] = isset($_POST['organic']) ? $_POST['organic'] : '0';
    $guess_wine['inorganic'] = isset($_POST['inorganic']) ? $_POST['inorganic'] : '0';
    $guess_wine['oak'] = isset($_POST['oak']) ? $_POST['oak'] : '0';
    $guess_wine['tannin_low'] = isset($_POST['tannin_low']) ? $_POST['tannin_low'] : '0';
    $guess_wine['tannin_mod'] = isset($_POST['tannin_mod']) ? $_POST['tannin_mod'] : '0';
    $guess_wine['tannin_mod_plus'] = isset($_POST['tannin_mod_plus']) ? $_POST['tannin_mod_plus'] : '0';
    $guess_wine['tannin_high'] = isset($_POST['tannin_high']) ? $_POST['tannin_high'] : '0';
    $guess_wine['acid_low'] = isset($_POST['acid_low']) ? $_POST['acid_low'] : '0';
    $guess_wine['acid_mod'] = isset($_POST['acid_mod']) ? $_POST['acid_mod'] : '0';
    $guess_wine['acid_mod_plus'] = isset($_POST['acid_mod_plus']) ? $_POST['acid_mod_plus'] : '0';
    $guess_wine['acid_high'] = isset($_POST['acid_high']) ? $_POST['acid_high'] : '0';
    $guess_wine['alcohol_low'] = isset($_POST['alcohol_low']) ? $_POST['alcohol_low'] : '0';
    $guess_wine['alcohol_mod'] = isset($_POST['alcohol_mod']) ? $_POST['alcohol_mod'] : '0';
    $guess_wine['alcohol_mod_plus'] = isset($_POST['alcohol_mod_plus']) ? $_POST['alcohol_mod_plus'] : '0';
    $guess_wine['alcohol_high'] = isset($_POST['alcohol_high']) ? $_POST['alcohol_high'] : '0';
    $guess_wine['climate_cool'] = isset($_POST['climate_cool']) ? $_POST['climate_cool'] : '0';
    $guess_wine['climate_moderate'] = isset($_POST['climate_moderate']) ? $_POST['climate_moderate'] : '0';
    $guess_wine['climate_warm'] = isset($_POST['climate_warm']) ? $_POST['climate_warm'] : '0';
    $guess_wine['description'] = isset($_POST['description']) ? $_POST['description'] : '';
    $guess_wine['notes'] = isset($_POST['notes']) ? $_POST['notes'] : '';
    $guess_wine['confusion'] = isset($_POST['confusion']) ? $_POST['confusion'] : '';

    $wine = find_red_wine_match($guess_wine);

} else {
    redirect_to(url_for('index.php'));
}

?>

    <div class="center">
    <h2>Closest Varietal Match</h2>

    <div class="wine-form">
        <table>
            <tr>
                <th>Varietal</th>
                <th>Origin</th>
            </tr>
            <tr>
                <td>Name: <?php echo h($wine['varietal']); ?></td>
                <td><?php echo $wine['new_world'] == 1 ? 'New World' : 'Old World'; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Color</th>
            </tr>
            <tr>
                <td><?php if ($wine['garnet'] == "1") {
                        echo "Garnet";
                    } ?></td>
                <td><?php if ($wine['ruby'] == "1") {
                        echo "Ruby";
                    } ?></td>
                <td><?php if ($wine['purple'] == "1") {
                        echo "Purple";
                    } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Fruit</th>
            </tr>
            <tr>
                <td><?php if ($wine['red_fruit'] == "1") {
                        echo "Red";
                    } ?></td>
                <td><?php if ($wine['black_fruit'] == "1") {
                        echo "Black";
                    } ?></td>
                <td><?php if ($wine['blue_fruit'] == "1") {
                        echo "Blue";
                    } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Nose</th>
            </tr>
            <tr>
                <td><?php if ($wine['nose_tart'] == "1") {
                        echo "Tart";
                    } ?></td>
                <td><?php if ($wine['nose_ripe'] == "1") {
                        echo "Ripe";
                    } ?></td>
                <td><?php if ($wine['nose_overripe'] == "1") {
                        echo "Overripe, Jammy, Stewed";
                    } ?></td>
                <td><?php if ($wine['nose_baked'] == "1") {
                        echo "Baked, Dried, Oxidative";
                    } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
            </tr>
            <tr>
                <td><?php if ($wine['palate_tart'] == "1") {
                        echo "Tart";
                    } ?></td>
                <td><?php if ($wine['palate_ripe'] == "1") {
                        echo "Ripe";
                    } ?></td>
                <td><?php if ($wine['palate_overripe'] == "1") {
                        echo "Overripe, Jammy, Stewed";
                    } ?></td>
                <td><?php if ($wine['palate_baked'] == "1") {
                        echo "Baked, Dried, Oxidative";
                    } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Non-Fruit Characteristic</th>
            </tr>
            <?php if ($wine['floral'] == "1") {
                echo "<tr><td>Floral</td></tr>";
            } ?>
            <?php if ($wine['vegetal'] == "1") {
                echo "<tr><td>Vegetal, Green Pepper</td></tr>";
            } ?>
            <?php if ($wine['herbs'] == "1") {
                echo "<tr><td>Savory Dried Herbs, Tomato Leaf</td></tr>";
            } ?>
            <?php if ($wine['mint'] == "1") {
                echo "<tr><td>Mint, Eucalyptus</td></tr>";
            } ?>
            <?php if ($wine['peppercorn'] == "1") {
                echo "<tr><td>Peppercorn</td></tr>";
            } ?>
            <?php if ($wine['coffee'] == "1") {
                echo "<tr><td>Coffee, Cocoa, Mocha</td></tr>";
            } ?>
            <?php if ($wine['game'] == "1") {
                echo "<tr><td>Game, Blood, Cured Meat, Leather</td></tr>";
            } ?>
            <?php if ($wine['balsamic'] == "1") {
                echo "<tr><td>Balsamic, Tar</td></tr>";
            } ?>
            <?php if ($wine['organic'] == "1") {
                echo "<tr><td>Organic Earth: Forest floor, Wet Leaves, Mushrooms</td></tr>";
            } ?>
            <?php if ($wine['inorganic'] == "1") {
                echo "<tr><td>Inorganic Earth: Stone, Rock, Mineral, Sulfur</td></tr>";
            } ?>
            <?php if ($wine['oak'] == "1") {
                echo "<tr><td>New Oak: Vanilla, Smoke, Toast, Coconut</td></tr>";
            } ?>
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
                <td class="left"><label for="st-tannin">Tannin:</label></td>
                <td><?php if ($wine['tannin_low'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['tannin_mod'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['tannin_mod_plus'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['tannin_high'] == "1") {
                        echo "X";
                    } ?></td>
            </tr>
            <tr>
                <td class="left"><label for="st-acid">Acid:</label></td>
                <td><?php if ($wine['acid_low'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['acid_mod'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['acid_mod_plus'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['acid_high'] == "1") {
                        echo "X";
                    } ?></td>
            </tr>
            <tr>
                <td class="left"><label for="st-alcohol">Alcohol:</label></td>
                <td><?php if ($wine['alcohol_low'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['alcohol_mod'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['alcohol_mod_plus'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['alcohol_high'] == "1") {
                        echo "X";
                    } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Climate</th>
            </tr>
            <tr>
                <td><?php if ($wine['climate_cool'] == "1") {
                        echo "Cool";
                    } ?></td>
                <td><?php if ($wine['climate_moderate'] == "1") {
                        echo "Moderate";
                    } ?></td>
                <td><?php if ($wine['climate_warm'] == "1") {
                        echo "Warm";
                    } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Description</th>
            </tr>
            <tr>
                <td colspan="3"><?php echo $wine['description']; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Notes</th>
            </tr>
            <tr>
                <td colspan="3"><?php echo $wine['notes']; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Confusion</th>
            </tr>
            <tr>
                <td colspan="3"><?php echo $wine['confusion']; ?></td>
            </tr>
        </table>
        <div class="btm-return-link">
            <a href="<?php echo url_for('red-wine.php'); ?>">Return to red wine guesser.</a>
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>