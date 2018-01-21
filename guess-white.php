<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Your Wine Varietal';
include(SHARED_PATH . '/header.php');

if (is_post_request()) {
    $guess_wine = [];
    $guess_wine['varietal'] = isset($_POST['varietal']) ? $_POST['varietal'] : '0';
    $guess_wine['new_world'] = isset($_POST['new_world']) ? $_POST['new_world'] : '0';
    $guess_wine['straw'] = isset($_POST['straw']) ? $_POST['straw'] : '0';
    $guess_wine['yellow'] = isset($_POST['yellow']) ? $_POST['yellow'] : '0';
    $guess_wine['gold'] = isset($_POST['gold']) ? $_POST['gold'] : '0';
    $guess_wine['apple'] = isset($_POST['apple']) ? $_POST['apple'] : '0';
    $guess_wine['citrus'] = isset($_POST['citrus']) ? $_POST['citrus'] : '0';
    $guess_wine['stone'] = isset($_POST['stone']) ? $_POST['stone'] : '0';
    $guess_wine['tropical'] = isset($_POST['tropical']) ? $_POST['tropical'] : '0';
    $guess_wine['nose_tart'] = isset($_POST['nose_tart']) ? $_POST['nose_tart'] : '0';
    $guess_wine['nose_ripe'] = isset($_POST['nose_ripe']) ? $_POST['nose_ripe'] : '0';
    $guess_wine['nose_overripe'] = isset($_POST['nose_overripe']) ? $_POST['nose_overripe'] : '0';
    $guess_wine['nose_baked'] = isset($_POST['nose_baked']) ? $_POST['nose_baked'] : '0';
    $guess_wine['palate_tart'] = isset($_POST['palate_tart']) ? $_POST['palate_tart'] : '0';
    $guess_wine['palate_ripe'] = isset($_POST['palate_ripe']) ? $_POST['palate_ripe'] : '0';
    $guess_wine['palate_overripe'] = isset($_POST['palate_overripe']) ? $_POST['palate_overripe'] : '0';
    $guess_wine['palate_baked'] = isset($_POST['palate_baked']) ? $_POST['palate_baked'] : '0';
    $guess_wine['floral'] = isset($_POST['floral']) ? $_POST['floral'] : '0';
    $guess_wine['herbal'] = isset($_POST['herbal']) ? $_POST['herbal'] : '0';
    $guess_wine['vegetal'] = isset($_POST['vegetal']) ? $_POST['vegetal'] : '0';
    $guess_wine['botrytis'] = isset($_POST['botrytis']) ? $_POST['botrytis'] : '0';
    $guess_wine['oxidative'] = isset($_POST['oxidative']) ? $_POST['oxidative'] : '0';
    $guess_wine['lees'] = isset($_POST['lees']) ? $_POST['lees'] : '0';
    $guess_wine['buttery'] = isset($_POST['buttery']) ? $_POST['buttery'] : '0';
    $guess_wine['organic'] = isset($_POST['organic']) ? $_POST['organic'] : '0';
    $guess_wine['inorganic'] = isset($_POST['inorganic']) ? $_POST['inorganic'] : '0';
    $guess_wine['oak'] = isset($_POST['oak']) ? $_POST['oak'] : '0';
    $guess_wine['bitter'] = isset($_POST['buttery']) ? $_POST['buttery'] : '0';
    $guess_wine['dry'] = isset($_POST['dry']) ? $_POST['dry'] : '0';
    $guess_wine['off_dry'] = isset($_POST['off_dry']) ? $_POST['off_dry'] : '0';
    $guess_wine['sweet'] = isset($_POST['sweet']) ? $_POST['sweet'] : '0';
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

    $wine = find_white_wine_match($guess_wine);

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
                <td><?php if ($wine['straw'] == "1") {
                        echo "Straw";
                    } ?></td>
                <td><?php if ($wine['yellow'] == "1") {
                        echo "Yellow";
                    } ?></td>
                <td><?php if ($wine['gold'] == "1") {
                        echo "Gold";
                    } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit</th>
            </tr>
            <tr>
                <td><?php if ($wine['apple'] == "1") {
                        echo "Apple/Pear";
                    } ?></td>
                <td><?php if ($wine['citrus'] == "1") {
                        echo "Citrus";
                    } ?></td>
                <td><?php if ($wine['stone'] == "1") {
                        echo "Stone";
                    } ?></td>
                <td><?php if ($wine['tropical'] == "1") {
                        echo "Tropical";
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
                        echo "Baked, Dried, Bruised";
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
                        echo "Baked, Dried, Bruised";
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
            <?php if ($wine['herbal'] == "1") {
                echo "<tr><td>Herbal</td></tr>";
            } ?>
            <?php if ($wine['vegetal'] == "1") {
                echo "<tr><td>Vegetal</td></tr>";
            } ?>
            <?php if ($wine['botrytis'] == "1") {
                echo "<tr><td>Botrytis: Gingered, Honeyed, Waxy</td></tr>";
            } ?>
            <?php if ($wine['oxidative'] == "1") {
                echo "<tr><td>Oxidative, Nutty</td></tr>";
            } ?>
            <?php if ($wine['lees'] == "1") {
                echo "<tr><td>Lees: Doughy, Baked Bread, Yeasty</td></tr>";
            } ?>
            <?php if ($wine['buttery'] == "1") {
                echo "<tr><td>Buttery, Creamy</td></tr>";
            } ?>
            <?php if ($wine['organic'] == "1") {
                echo "<tr><td>Organic Earth: Wet Leaves, Mushrooms</td></tr>";
            } ?>
            <?php if ($wine['inorganic'] == "1") {
                echo "<tr><td>Inorganic Earth: Stone, Rock, Mineral, Sulfur</td></tr>";
            } ?>
            <?php if ($wine['oak'] == "1") {
                echo "<tr><td>New Oak: Vanilla, Brown Baking Spices, Smoke</td></tr>";
            } ?>
            <?php if ($wine['bitter'] == "1") {
                echo "<tr><td>Bitter, Phenolic</td></tr>";
            } ?>
        </table>
        <table>
            <tr>
                <th class="left">Structure</th>
                <th>Dry</th>
                <th>Off-Dry</th>
                <th>Sweet</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <td class="left"><label for="sweetness">Sweetness:</label></td>
                <td><?php if ($wine['dry'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['off_dry'] == "1") {
                        echo "X";
                    } ?></td>
                <td><?php if ($wine['sweet'] == "1") {
                        echo "X";
                    } ?></td>
                <td>&nbsp;</td>
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
                <td class="left"><label for="alcohol">Alcohol:</label></td>
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
            <a href="<?php echo url_for('white-wine.php'); ?>">Return to white wine guesser.</a>
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>