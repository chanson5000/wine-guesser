<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Guesser Administration - Edit Varietal';
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
    $wine['garnet'] = isset($_POST['garnet']) ? $_POST['garnet'] : '0';
    $wine['ruby'] = isset($_POST['ruby']) ? $_POST['ruby'] : '0';
    $wine['purple'] = isset($_POST['purple']) ? $_POST['purple'] : '0';
    $wine['red_fruit'] = isset($_POST['red_fruit']) ? $_POST['red_fruit'] : '0';
    $wine['black_fruit'] = isset($_POST['black_fruit']) ? $_POST['black_fruit'] : '0';
    $wine['blue_fruit'] = isset($_POST['blue_fruit']) ? $_POST['blue_fruit'] : '0';
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
    $wine['herbs'] = isset($_POST['herbs']) ? $_POST['herbs'] : '0';
    $wine['mint'] = isset($_POST['mint']) ? $_POST['mint'] : '0';
    $wine['peppercorn'] = isset($_POST['peppercorn']) ? $_POST['peppercorn'] : '0';
    $wine['coffee'] = isset($_POST['coffee']) ? $_POST['coffee'] : '0';
    $wine['game'] = isset($_POST['game']) ? $_POST['game'] : '0';
    $wine['balsamic'] = isset($_POST['balsamic']) ? $_POST['balsamic'] : '0';
    $wine['organic'] = isset($_POST['organic']) ? $_POST['organic'] : '0';
    $wine['inorganic'] = isset($_POST['inorganic']) ? $_POST['inorganic'] : '0';
    $wine['oak'] = isset($_POST['oak']) ? $_POST['oak'] : '0';
    $wine['tannin_low'] = isset($_POST['tannin_low']) ? $_POST['tannin_low'] : '0';
    $wine['tannin_mod'] = isset($_POST['tannin_mod']) ? $_POST['tannin_mod'] : '0';
    $wine['tannin_mod_plus'] = isset($_POST['tannin_mod_plus']) ? $_POST['tannin_mod_plus'] : '0';
    $wine['tannin_high'] = isset($_POST['tannin_high']) ? $_POST['tannin_high'] : '0';
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

    $result = update_red_wine($wine);
    if($result === true) {
        $_SESSION['message'] = 'Wine updated.';
        redirect_to(url_for('admin/red-wine/view.php?id=' . $id));
    } else {
        $errors = $result;
    }

} else {
    $wine = find_red_wine_by_id($id);
}

?>

<div class="center">
    <h2>Edit Red Varietal Characteristics</h2>
    <form class="wine-form" action="<?php echo url_for('/admin/red-wine/edit.php?id=' . h(u($id))); ?>" id="wine-form" method="post">
        <table>
            <tr>
                <th colspan="3">Varietal</th>
            </tr>
            <tr>
                <td>ID: <?php echo h(u($id)); ?></td>
                <td><label for="varietal">Name: </label><input type="text" id="varietal" name="varietal" value="<?php echo h($wine['varietal']); ?>"></td>
                <td><label for="new-world">New World: </label><input type="checkbox" name="new_world" id="new-world" value="1"<?php if($wine['new_world'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Color</th>
            </tr>
            <tr>
                <td><label for="garnet">Garnet </label><input type="checkbox" name="garnet" id="garnet" value="1"<?php if($wine['garnet'] == "1") { echo " checked"; } ?>></td>
                <td><label for="ruby">Ruby </label><input type="checkbox" name="ruby" id="ruby" value="1"<?php if($wine['ruby'] == "1") { echo " checked"; } ?>></td>
                <td><label for="purple">Purple </label><input type="checkbox" name="purple" id="purple" value="1"<?php if($wine['purple'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Fruit</th>
            </tr>
            <tr>
                <td><label for="red-fruit-select">Red </label><input type="checkbox" name="red_fruit" id="red-fruit-select" value="1"<?php if($wine['red_fruit'] == "1") { echo " checked"; } ?>></td>
                <td><label for="black-fruit-select">Black </label><input type="checkbox" name="black_fruit" id="black-fruit-select" value="1"<?php if($wine['black_fruit'] == "1") { echo " checked"; } ?>></td>
                <td><label for="blue-fruit-select">Blue </label><input type="checkbox" name="blue_fruit" id="blue-fruit-select" value="1"<?php if($wine['blue_fruit'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
            </tr>
            <tr>
                <td><label for="nose-tart">Tart</label><br><input type="checkbox" name="nose_tart" id="nose-tart" value="1"<?php if($wine['nose_tart'] == "1") { echo " checked"; } ?>></td>
                <td><label for="nose-ripe">Ripe</label><br><input type="checkbox" name="nose_ripe" id="nose-ripe" value="1"<?php if($wine['nose_ripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="nose-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="nose_overripe" id="nose-overripe" value="1"<?php if($wine['nose_overripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="nose-baked">Baked, Dried, Oxidative</label><br><input type="checkbox" name="nose_baked" id="nose-baked" value="1"<?php if($wine['nose_baked'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
            </tr>
            <tr>
                <td><label for="palate-tart">Tart</label><br><input type="checkbox" name="palate_tart" id="palate-tart" value="1"<?php if($wine['palate_tart'] == "1") { echo " checked"; } ?>></td>
                <td><label for="palate-ripe">Ripe</label><br><input type="checkbox" name="palate_ripe" id="palate-ripe" value="1"<?php if($wine['palate_ripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="palate-overripe">Overripe, Jammy, Stewed</label><br><input type="checkbox" name="palate_overripe" id="palate-overripe" value="1"<?php if($wine['palate_overripe'] == "1") { echo " checked"; } ?>></td>
                <td><label for="palate-baked">Baked, Dried, Oxidative</label><br><input type="checkbox" name="palate_baked" id="palate-baked" value="1"<?php if($wine['palate_baked'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="2">Non-Fruit Characteristic</th>
            </tr>
            <tr>
                <td class="left"><label for="nf-floral">Floral</label></td>
                <td class="right-padded"><input type="checkbox" name="floral" id="nf-floral" value="1"<?php if($wine['floral'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-vegetal">Vegetal, Green Pepper</label></td>
                <td class="right-padded"><input type="checkbox" name="vegetal" id="nf-vegetal" value="1"<?php if($wine['vegetal'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-herbs">Savory Dried Herbs, Tomato Leaf</label></td>
                <td class="right-padded"><input type="checkbox" name="herbs" id="nf-herbs" value="1"<?php if($wine['herbs'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-mint">Mint, Eucalyptus</label></td>
                <td class="right-padded"><input type="checkbox" name="mint" id="nf-mint" value="1"<?php if($wine['mint'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-peppercorn">Peppercorn</label></td>
                <td class="right-padded"><input type="checkbox" name="peppercorn" id="nf-peppercorn" value="1"<?php if($wine['peppercorn'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-coffee">Coffee, Cocoa, Mocha</label></td>
                <td class="right-padded"><input type="checkbox" name="coffee" id="nf-coffee" value="1"<?php if($wine['coffee'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-game">Game, Blood, Cured Meat, Leather</label></td>
                <td class="right-padded"><input type="checkbox" name="game" id="nf-game" value="1"<?php if($wine['game'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-balsamic">Balsamic, Tar</label></td>
                <td class="right-padded"><input type="checkbox" name="balsamic" id="nf-balsamic" value="1"<?php if($wine['balsamic'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-organic">Organic Earth: Forest floor, Wet Leaves, Mushrooms</label></td>
                <td class="right-padded"><input type="checkbox" name="organic" id="nf-organic" value="1"<?php if($wine['organic'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-inorganic">Inorganic Earth: Stone, Rock, Mineral, Sulfur</label></td>
                <td class="right-padded"><input type="checkbox" name="inorganic" id="nf-inorganic" value="1"<?php if($wine['inorganic'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="nf-oak">New Oak: Vanilla, Smoke, Toast, Coconut</label></td>
                <td class="right-padded"><input type="checkbox" name="oak" id="nf-oak" value="1"<?php if($wine['oak'] == "1") { echo " checked"; } ?>></td>
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
                <td><input type="checkbox" name="tannin_low" id="st-tannin" value="1"<?php if($wine['tannin_low'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="tannin_mod" id="st-tannin" value="1"<?php if($wine['tannin_mod'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="tannin_mod_plus" id="st-tannin" value="1"<?php if($wine['tannin_mod_plus'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="tannin_high" id="st-tannin" value="1"<?php if($wine['tannin_high'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="st-acid">Acid:</label></td>
                <td><input type="checkbox" name="acid_low" id="st-acid" value="1"<?php if($wine['acid_low'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="acid_mod" id="st-acid" value="1"<?php if($wine['acid_mod'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="acid_mod_plus" id="st-acid" value="1"<?php if($wine['acid_mod_plus'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="acid_high" id="st-acid" value="1"<?php if($wine['acid_high'] == "1") { echo " checked"; } ?>></td>
            </tr>
            <tr>
                <td class="left"><label for="st-alcohol">Alcohol:</label></td>
                <td><input type="checkbox" name="alcohol_low" id="st-alcohol" value="1"<?php if($wine['alcohol_low'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="alcohol_mod" id="st-alcohol" value="1"<?php if($wine['alcohol_mod'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="alcohol_mod_plus" id="st-alcohol" value="1"<?php if($wine['alcohol_mod_plus'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="alcohol_high" id="st-alcohol" value="1"<?php if($wine['alcohol_high'] == "1") { echo " checked"; } ?>></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">Climate</th>
            </tr>
            <tr>
                <td><label for="climate-cool">Cool </label><input type="checkbox" name="climate_cool" id="climate-cool" value="1"<?php if($wine['climate_cool'] == "1") { echo " checked"; } ?>></td>
                <td><label for="climate-moderate">Moderate </label><input type="checkbox" name="climate_moderate" id="climate-moderate" value="1"<?php if($wine['climate_moderate'] == "1") { echo " checked"; } ?>></td>
                <td><label for="climate-warm">Warm </label><input type="checkbox" name="climate_warm" id="climate-warm" value="1"<?php if($wine['climate_warm'] == "1") { echo " checked"; } ?>></td>
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
                <th colspan="3"><label for="confusion">Common Confusions</label></th>
            </tr>
            <tr>
                <td colspan="3"><textarea class="max-width" name="confusion" id="confusion" cols="3" rows="3"><?php echo $wine['confusion']; ?></textarea></td>
            </tr>
        </table>
        <input class="submit-btn" type="submit" value="Submit">
    </form>
    <div class="btm-return-link"><a href="<?php echo url_for('admin/red-wine/index.php'); ?>">Return to red wines administration.</a></div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>