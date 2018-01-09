<?php
require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('admin/index.php'));
}

$id = $_GET['id'];

$wine = find_red_wine_by_id($id);

?>

<?php $page_title = 'Wine Administration - View Red Wine'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div class="center">
    <h2>Red Wine Properties</h2>

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
                <td><?php if ($wine['garnet'] == "1") { echo "Garnet"; } ?></td>
                <td><?php if ($wine['ruby'] == "1") { echo "Ruby"; } ?></td>
                <td><?php if ($wine['purple'] == "1") { echo "Purple"; } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Fruit</th>
            </tr>
            <tr>
                <td><?php if ($wine['red_fruit'] == "1") { echo "Red"; } ?></td>
                <td><?php if ($wine['black_fruit'] == "1") { echo "Black"; } ?></td>
                <td><?php if ($wine['blue_fruit'] == "1") { echo "Blue checked"; } ?></td>
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
                <td><?php if ($wine['nose_baked'] == "1") { echo "Baked, Dried, Oxidative"; } ?></td>
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
                <td><?php if ($wine['palate_baked'] == "1") { echo "Baked, Dried, Oxidative"; } ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Non-Fruit Characteristic</th>
            </tr>
            <?php if ($wine['floral'] == "1") { echo "<tr><td>Floral</td></tr>"; } ?>
            <?php if ($wine['vegetal'] == "1") { echo "<tr><td>Vegetal, Green Pepper</td></tr>"; } ?>
            <?php if ($wine['herbs'] == "1") { echo "<tr><td>Savory Dried Herbs, Tomato Leaf</td></tr>"; } ?>
            <?php if ($wine['mint'] == "1") { echo "<tr><td>Mint, Eucalyptus</td></tr>"; } ?>
            <?php if ($wine['peppercorn'] == "1") { echo "<tr><td>Peppercorn</td></tr>"; } ?>
            <?php if ($wine['coffee'] == "1") { echo "<tr><td>Coffee, Cocoa, Mocha</td></tr>"; } ?>
            <?php if ($wine['game'] == "1") { echo "<tr><td>Game, Blood, Cured Meat, Leather</td></tr>"; } ?>
            <?php if ($wine['balsamic'] == "1") { echo "<tr><td>Balsamic, Tar</td></tr>"; } ?>
            <?php if ($wine['organic'] == "1") { echo "<tr><td>Organic Earth: Forest floor, Wet Leaves, Mushrooms</td></tr>"; } ?>
            <?php if ($wine['inorganic'] == "1") { echo "<tr><td>Inorganic Earth: Stone, Rock, Mineral, Sulfur</td></tr>"; } ?>
            <?php if ($wine['oak'] == "1") { echo "<tr><td>New Oak: Vanilla, Smoke, Toast, Coconut</td></tr>"; } ?>
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
                <td><?php if ($wine['tannin_low'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['tannin_mod'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['tannin_mod_plus'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['tannin_high'] == "1") { echo "X"; } ?></td>
            </tr>
            <tr>
                <td class="left"><label for="st-acid">Acid:</label></td>
                <td><?php if ($wine['acid_low'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['acid_mod'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['acid_mod_plus'] == "1") { echo "X"; } ?></td>
                <td><?php if ($wine['acid_high'] == "1") { echo "X"; } ?></td>
            </tr>
            <tr>
                <td class="left"><label for="st-alcohol">Alcohol:</label></td>
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
        <a href="<?php echo url_for('admin/red-wine/index.php'); ?>">Return to red wines administration.</a>
    </div>
    </div>
</div>
