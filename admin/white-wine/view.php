<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Administration - View White Wine';
include(SHARED_PATH . '/staff_header.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('admin/index.php'));
}

$id = $_GET['id'];

$wine = find_white_wine_by_id($id);

?>



<div class="center">
    <h2>White Wine Properties</h2>

    <div class="wine-form">
        <table>
            <tr>
                <th colspan="3">Varietal</th>
            </tr>
            <tr>
                <td>ID: <?php echo h(u($id)); ?></td>
                <td>Name: <?php echo h($wine['varietal']); ?></td>
                <td><?php echo $wine['new_world'] == 1 ? 'New World' : 'Old World'; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Color</th>
            </tr>
            <tr>
                <td><?php if ($wine['straw'] == "1") { echo "Straw"; } ?></td>
                <td><?php if ($wine['yellow'] == "1") { echo "Yellow"; } ?></td>
                <td><?php if ($wine['gold'] == "1") { echo "Gold"; } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit</th>
            </tr>
            <tr>
                <td><?php if ($wine['apple'] == "1") { echo "Apple"; } ?></td>
                <td><?php if ($wine['citrus'] == "1") { echo "Citrus"; } ?></td>
                <td><?php if ($wine['stone'] == "1") { echo "Stone"; } ?></td>
                <td><?php if ($wine['tropical'] == "1") { echo "Tropical"; } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Nose</th>
            </tr>
            <tr>
                <td><?php if ($wine['nose_tart'] == "1") { echo "Tart"; } ?></td>
                <td><?php if ($wine['nose_ripe'] == "1") { echo "Ripe"; } ?></td>
                <td><?php if ($wine['nose_overripe'] == "1") { echo "Overripe, Jammy, Stewed"; } ?></td>
                <td><?php if ($wine['nose_baked'] == "1") { echo "Baked, Dried, Bruised"; } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
            </tr>
            <tr>
                <td><?php if ($wine['palate_tart'] == "1") { echo "Tart"; } ?></td>
                <td><?php if ($wine['palate_ripe'] == "1") { echo "Ripe"; } ?></td>
                <td><?php if ($wine['palate_overripe'] == "1") { echo "Overripe, Jammy, Stewed"; } ?></td>
                <td><?php if ($wine['palate_baked'] == "1") { echo "Baked, Dried, Bruised"; } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Non-Fruit Characteristic</th>
            </tr>
            <?php if ($wine['floral'] == "1") { echo "<tr><td>Floral</td></tr>"; } ?>
            <?php if ($wine['herbal'] == "1") { echo "<tr><td>Herbal</td></tr>"; } ?>
            <?php if ($wine['vegetal'] == "1") { echo "<tr><td>Vegetal</td></tr>"; } ?>
            <?php if ($wine['botrytis'] == "1") { echo "<tr><td>Botrytis: Gingered, Honeyed, Waxy</td></tr>"; } ?>
            <?php if ($wine['oxidative'] == "1") { echo "<tr><td>Oxidative, Nutty</td></tr>"; } ?>
            <?php if ($wine['lees'] == "1") { echo "<tr><td>Lees: Doughy, Baked Bread, Yeasty</td></tr>"; } ?>
            <?php if ($wine['buttery'] == "1") { echo "<tr><td>Buttery, Creamy</td></tr>"; } ?>
            <?php if ($wine['organic'] == "1") { echo "<tr><td>Organic Earth: Forest floor, Wet Leaves, Mushrooms</td></tr>"; } ?>
            <?php if ($wine['inorganic'] == "1") { echo "<tr><td>Inorganic Earth: Stone, Rock, Mineral, Sulfur</td></tr>"; } ?>
            <?php if ($wine['oak'] == "1") { echo "<tr><td>New Oak: Vanilla, Smoke, Toast, Coconut</td></tr>"; } ?>
            <?php if ($wine['bitter'] == "1") { echo "<tr><td>Bitter, Phenolic</td></tr>"; } ?>
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
                <!-- TODO: Add more label switching. -->
                <td class="left"><label for="sweetness">Sweetness</label></td>
                <td><?php if ($wine['dry'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['off_dry'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['sweet'] == "1") { echo "X"; } ?></td>
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
                <td><?php if ($wine['acid_low'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['acid_mod'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['acid_mod_plus'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['acid_high'] == "1") { echo "X"; } ?></td>
            </tr>
            <tr>
                <td class="left"><label for="alcohol">Alcohol:</label></td>
                <td><?php if ($wine['alcohol_low'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['alcohol_mod'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['alcohol_mod_plus'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['alcohol_high'] == "1") { echo "X"; } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Climate</th>
            </tr>
            <tr>
                <td><?php if ($wine['climate_cool'] == "1") { echo "Cool"; } ?></td>
                <td><?php if ($wine['climate_moderate'] == "1") { echo "Moderate"; } ?></td>
                <td><?php if ($wine['climate_warm'] == "1") { echo "Warm"; } ?></td>
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
        <a href="<?php echo url_for('admin/white-wine/index.php'); ?>">Return to white wines administration.</a>
    </div>
    </div>
</div>

<?php
include(SHARED_PATH . '/footer.php');
?>