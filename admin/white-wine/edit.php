<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Administration - Edit White Wine';
include(SHARED_PATH . '/staff_header.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('admin/index.php'));
}

$id = $_GET['id'];

if (is_post_request()) {
    $wine = [];
    $wine['id'] = $id;
    $wine['varietal'] = isset($_POST['varietal']) ? $_POST['varietal'] : '';
    $wine['new_world'] = isset($_POST['new_world']) ? $_POST['new_world'] : '0';
    $wine['straw'] = isset($_POST['straw']) ? $_POST['straw'] : '0';
    $wine['yellow'] = isset($_POST['yellow']) ? $_POST['yellow'] : '0';
    $wine['gold'] = isset($_POST['purple']) ? $_POST['gold'] : '0';
    $wine['apple'] = isset($_POST['apple']) ? $_POST['apple'] : '0';
    $wine['citrus'] = isset($_POST['citrus']) ? $_POST['citrus'] : '0';
    $wine['stone'] = isset($_POST['stone']) ? $_POST['stone'] : '0';
    $wine['tropical'] = isset($_POST['tropical']) ? $_POST['tropical'] : '0';
    $wine['nose_tart'] = isset($_POST['nose_tart']) ? $_POST['nose_tart'] : '0';
    $wine['nose_ripe'] = isset($_POST['nose_ripe']) ? $_POST['nose_ripe'] : '0';
    $wine['nose_overripe'] = isset($_POST['nose_overripe']) ? $_POST['nose_overripe'] : '0';
    $wine['nose_baked'] = isset($_POST['nose_baked']) ? $_POST['nose_baked'] : '0';
    $wine['palate_tart'] = isset($_POST['palate_tart']) ? $_POST['palate_tart'] : '0';
    $wine['palate_ripe'] = isset($_POST['palate_ripe']) ? $_POST['palate_ripe'] : '0';
    $wine['palate_overripe'] = isset($_POST['palate_overripe']) ? $_POST['palate_overripe'] : '0';
    $wine['palate_baked'] = isset($_POST['palate_baked']) ? $_POST['palate_baked'] : '0';
    $wine['floral'] = isset($_POST['floral']) ? $_POST['floral'] : '0';
    $wine['vegetal'] = isset($_POST['vegetal']) ? $_POST['vegetal'] : '0';
    $wine['herbal'] = isset($_POST['herbal']) ? $_POST['herbal'] : '0';
    $wine['botrytis'] = isset($_POST['botrytis']) ? $_POST['botrytis'] : '0';
    $wine['oxidative'] = isset($_POST['oxidative']) ? $_POST['oxidative'] : '0';
    $wine['lees'] = isset($_POST['lees']) ? $_POST['lees'] : '0';
    $wine['buttery'] = isset($_POST['buttery']) ? $_POST['buttery'] : '0';
    $wine['organic'] = isset($_POST['organic']) ? $_POST['organic'] : '0';
    $wine['inorganic'] = isset($_POST['inorganic']) ? $_POST['inorganic'] : '0';
    $wine['oak'] = isset($_POST['oak']) ? $_POST['oak'] : '0';
    $wine['bitter'] = isset($_POST['bitter']) ? $_POST['bitter'] : '0';
    $wine['dry'] = isset($_POST['dry']) ? $_POST['dry'] : '0';
    $wine['off_dry'] = isset($_POST['off_dry']) ? $_POST['off_dry'] : '0';
    $wine['sweet'] = isset($_POST['sweet']) ? $_POST['sweet'] : '0';
    $wine['acid_low'] = isset($_POST['acid_low']) ? $_POST['acid_low'] : '0';
    $wine['acid_mod'] = isset($_POST['acid_mod']) ? $_POST['acid_mod'] : '0';
    $wine['acid_mod_plus'] = isset($_POST['acid_mod_plus']) ? $_POST['acid_mod_plus'] : '0';
    $wine['acid_high'] = isset($_POST['acid_high']) ? $_POST['acid_high'] : '0';
    $wine['alcohol_low'] = isset($_POST['alcohol_low']) ? $_POST['alcohol_low'] : '0';
    $wine['alcohol_mod'] = isset($_POST['alcohol_mod']) ? $_POST['alcohol_mod'] : '0';
    $wine['alcohol_mod_plus'] = isset($_POST['alcohol_mod_plus']) ? $_POST['alcohol_mod_plus'] : '0';
    $wine['alcohol_high'] = isset($_POST['alcohol_high']) ? $_POST['alcohol_high'] : '0';
    $wine['climate_cool'] = isset($_POST['climate_cool']) ? $_POST['climate_cool'] : '0';
    $wine['climate_moderate'] = isset($_POST['climate_moderate']) ? $_POST['climate_moderate'] : '0';
    $wine['climate_warm'] = isset($_POST['climate_warm']) ? $_POST['climate_warm'] : '0';
    $wine['description'] = isset($_POST['description']) ? $_POST['description'] : '';
    $wine['notes'] = isset($_POST['notes']) ? $_POST['notes'] : '';
    $wine['confusion'] = isset($_POST['confusion']) ? $_POST['confusion'] : '';

    $result = update_white_wine($wine);
    if($result === true) {
        $_SESSION['message'] = 'Wine updated.';
        redirect_to(url_for('admin/white-wine/view.php?id=' . $id));
    } else {
        $errors = $result;
    }

} else {
    $wine = find_white_wine_by_id($id);
}

?>

<div class="center">
    <h2>Edit White Wine</h2>
    <form class="wine-form" action="<?php echo url_for('/admin/white-wine/edit.php?id=' . h(u($id))); ?>" id="wine-form" method="post">
        <table>
            <tr>
                <th colspan="3">Varietal</th>
            </tr>
            <tr>
                <td>ID: <?php echo h(u($id)); ?></td>
                <td><label for="varietal">Name: </label><input type="text" id="varietal" name="varietal" value="<?php echo h($wine['varietal']); ?>"></td>
                <td><label for="new_world">New World: </label><input type="checkbox" name="new_world" id="new_world" value="1"<?php if($wine['new_world'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Color</th>
            </tr>
            <tr>
                <td><label for="straw">Straw </label><input type="checkbox" name="straw" id="straw" value="1"<?php if($wine['straw'] == "1") { echo " checked"; } ?>></td>
                <td><label for="yellow">Yellow </label><input type="checkbox" name="yellow" id="yellow" value="1"<?php if($wine['yellow'] == "1") { echo " checked"; } ?>></td>
                <td><label for="gold">Gold </label><input type="checkbox" name="gold" id="gold" value="1"<?php if($wine['gold'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit</th>
            </tr>
            <tr>
                <td><label for="apple">Apple/Pear </label><input type="checkbox" name="apple" id="apple" value="1"<?php if($wine['apple'] == "1") { echo " checked"; } ?>></td>
                <td><label for="citrus">Citrus </label><input type="checkbox" name="citrus" id="citrus" value="1"<?php if($wine['citrus'] == "1") { echo " checked"; } ?>></td>
                <td><label for="stone">Stone </label><input type="checkbox" name="stone" id="stone" value="1"<?php if($wine['stone'] == "1") { echo " checked"; } ?>></td>
                <td><label for="tropical">Tropical </label><input type="checkbox" name="tropical" id="tropical" value="1"<?php if($wine['tropical'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
            </tr>
            <tr>
                <td><label for="nose_tart">Tart</label><br><input type="checkbox" name="nose_tart" id="nose_tart" value="1"<?php if($wine['nose_tart'] == "1") { echo " checked"; } ?>></td>
                <td><label for="nose_ripe">Ripe</label><br><input type="checkbox" name="nose_ripe" id="nose_ripe" value="1"<?php if($wine['nose_ripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="nose_overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="nose_overripe" id="nose_overripe" value="1"<?php if($wine['nose_overripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="nose_baked">Baked, Dried, Bruised</label><br><input type="checkbox" name="nose_baked" id="nose_baked" value="1"<?php if($wine['nose_baked'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
            </tr>
            <tr>
                <td><label for="palate_tart">Tart</label><br><input type="checkbox" name="palate_tart" id="palate_tart" value="1"<?php if($wine['palate_tart'] == "1") { echo " checked"; } ?>></td>
                <td><label for="palate_ripe">Ripe</label><br><input type="checkbox" name="palate_ripe" id="palate_ripe" value="1"<?php if($wine['palate_ripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="palate_overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="palate_overripe" id="palate_overripe" value="1"<?php if($wine['palate_overripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="palate_baked">Baked, Dried, Bruised</label><br><input type="checkbox" name="palate_baked" id="palate_baked" value="1"<?php if($wine['palate_baked'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="2">Non-Fruit Characteristic</th>
            </tr>
            <tr>
                <td class="left"><label for="floral">Floral</label></td>
                <td class="right-padded"><input type="checkbox" name="floral" id="nf-floral" value="1"<?php if($wine['floral'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="herbal">Herbal</label></td>
                <td class="right-padded"><input type="checkbox" name="herbal" id="herbal" value="1"<?php if($wine['herbal'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="vegetal">Vegetal</label></td>
                <td class="right-padded"><input type="checkbox" name="vegetal" id="vegetal" value="1"<?php if($wine['vegetal'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="botrytis">Botrytis: Gingered, Honeyed, Waxy</label></td>
                <td class="right-padded"><input type="checkbox" name="botrytis" id="botrytis" value="1"<?php if($wine['botrytis'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="oxidative">Oxidative</label></td>
                <td class="right-padded"><input type="checkbox" name="oxidative" id="oxidative" value="1"<?php if($wine['oxidative'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="lees">Lees: doughy, Baked Bread</label></td>
                <td class="right-padded"><input type="checkbox" name="lees" id="lees" value="1"<?php if($wine['lees'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="buttery">Buttery, Creamy</label></td>
                <td class="right-padded"><input type="checkbox" name="buttery" id="buttery" value="1"<?php if($wine['buttery'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="organic">Organic Earth: Wet Leaves, Mushrooms</label></td>
                <td class="right-padded"><input type="checkbox" name="organic" id="organic" value="1"<?php if($wine['organic'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="inorganic">Inorganic Earth: Stone, Rock, Mineral, Sulfur</label></td>
                <td class="right-padded"><input type="checkbox" name="inorganic" id="inorganic" value="1"<?php if($wine['inorganic'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="oak">New Oak: Vanilla, Brown Baking Spices, Smoke</label></td>
                <td class="right-padded"><input type="checkbox" name="oak" id="oak" value="1"<?php if($wine['oak'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="bitter">Bitter, Phenolic</label></td>
                <td class="right-padded"><input type="checkbox" name="bitter" id="bitter" value="1"<?php if($wine['bitter'] == "1") { echo " checked"; } ?>></td>
            </tr>
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
                <td class="left"><label for="st-tannin">Sweetness:</label></td>
                <td><input type="checkbox" name="dry" id="dry" value="1"<?php if($wine['dry'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="off_dry" id="off_dry" value="1"<?php if($wine['off_dry'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="sweet" id="sweet" value="1"<?php if($wine['sweet'] == "1") { echo " checked"; } ?>></td>
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
                <td><input type="checkbox" name="acid_low" id="acid" value="1"<?php if($wine['acid_low'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="acid_mod" id="acid" value="1"<?php if($wine['acid_mod'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="acid_mod_plus" id="acid" value="1"<?php if($wine['acid_mod_plus'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="acid_high" id="acid" value="1"<?php if($wine['acid_high'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="alcohol">Alcohol:</label></td>
                <td><input type="checkbox" name="alcohol_low" id="alcohol" value="1"<?php if($wine['alcohol_low'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="alcohol_mod" id="alcohol" value="1"<?php if($wine['alcohol_mod'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="alcohol_mod_plus" id="alcohol" value="1"<?php if($wine['alcohol_mod_plus'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="alcohol_high" id="alcohol" value="1"<?php if($wine['alcohol_high'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Climate</th>
            </tr>
            <tr>
                <td><label for="climate_cool">Cool </label><input type="checkbox" name="climate_cool" id="climate_cool" value="1"<?php if($wine['climate_cool'] == "1") { echo " checked"; } ?>></td>
                <td><label for="climate_moderate">Moderate </label><input type="checkbox" name="climate_moderate" id="climate-moderate" value="1"<?php if($wine['climate_moderate'] == "1") { echo " checked"; } ?>></td>
                <td><label for="climate_warm">Warm </label><input type="checkbox" name="climate_warm" id="climate_warm" value="1"<?php if($wine['climate_warm'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3"><label for="description">Description</label></th>
            </tr>
            <tr>
                <td colspan="3"><textarea class="max-width" name="description" id="description" cols="3" rows="3"><?php echo $wine['description']; ?></textarea></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3"><label for="notes">Notes</label></th>
            </tr>
            <tr>
                <td colspan="3"><textarea class="max-width" name="notes" id="notes" cols="3" rows="3"><?php echo $wine['notes']; ?></textarea></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3"><label for="confusion">Confusion</label></th>
            </tr>
            <tr>
                <td colspan="3"><textarea class="max-width" name="confusion" id="confusion" cols="3" rows="3"><?php echo $wine['confusion']; ?></textarea></td>
            </tr>
        </table>
        <input class="submit-btn" type="submit" value="Submit">
    </form>
    <div class="btm-return-link"><a href="<?php echo url_for('admin/white-wine/index.php'); ?>">Return to white wines administration.</a></div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>