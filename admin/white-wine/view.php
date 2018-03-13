<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Guesser Administration - View White Wine Varietal';
include(SHARED_PATH . '/staff_header.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('admin/index.php'));
}

$id = $_GET['id'];

$wine = find_white_wine_by_id($id);

?>

<div class="center">
    <h2>Possible Varietal Characteristics</h2>

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
                <th class="left">Fruit</th>
                <th>&nbsp;</th>
                <th>No</th>
                <th>Yes</th>
                <th>Key Indicator</th>
            </tr>
            <?php
            echo "<tr><td colspan=\"2\" class=\"left\">Apple/Pear</td>";
            for ($i = 0; $i <= 2; $i++) { echo "<td>";
                if($wine['apple'] == $i) { echo "X"; } echo "</td>"; } echo "</tr>";

            echo "<tr><td colspan=\"2\" class=\"left\">Citrus</td>";
            for ($i = 0; $i <= 2; $i++) { echo "<td>";
                if($wine['citrus'] == $i) { echo "X"; } echo "</td>"; } echo "</tr>";

            echo "<tr><td colspan=\"2\" class=\"left\">Stone</td>";
            for ($i = 0; $i <= 2; $i++) { echo "<td>";
                if($wine['stone'] == $i) { echo "X"; } echo "</td>"; } echo "</tr>";

            echo "<tr><td colspan=\"2\" class=\"left\">Tropical</td>";
                for ($i = 0; $i <= 2; $i++) { echo "<td>";
                    if($wine['tropical'] == $i) { echo "X"; } echo "</td>"; } echo "</tr>";

            ?>
        </table>
        <table>
            <tr>
                <th class="left">Non-Fruit</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>No</th>
                <th>Yes</th>
                <th>Key Indicator</th>
            </tr>

            <?php
            foreach (WHITE_WINE_NOTE_LABELS as $note => $label) {
                echo "<tr><td colspan=\"5\" class=\"left\">" . $label . "</td>";
                for ($i = 0; $i <= 2; $i++) { echo "<td>";
                    if($wine[$note] == $i) { echo "X"; } echo "</td>"; } echo "</tr>";
            }
            ?>

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
                <th colspan="3">Common Confusions</th>
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