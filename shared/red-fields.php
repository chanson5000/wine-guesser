<table>
    <tr>
        <th colspan="3">Color</th>
    </tr>
    <tr>
        <td><label for="garnet">Garnet</label><input type="checkbox" name="garnet" id="garnet" value="1"<?php if($wine['garnet'] == "1") { echo " checked"; } ?>></td>
        <td><label for="ruby">Ruby </label><input type="checkbox" name="ruby" id="ruby" value="1"<?php if($wine['ruby'] == "1") { echo " checked"; } ?>></td>
        <td><label for="purple">Purple </label><input type="checkbox" name="purple" id="purple" value="1"<?php if($wine['purple'] == "1") { echo " checked"; } ?>></td>
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
        <th class="left">Fruit</th>
        <th>&nbsp;</th>
        <th>No</th>
        <th>Yes</th>
        <th>Key Indicator</th>
    </tr>
    <tr>
        <td colspan="2" class="left"><label for="red_fruit">Red </label></td>
        <?php for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"red_fruit\" id=\"red_fruit\" value=" . $i;
            if($wine['red_fruit'] == $i) { echo " checked"; } echo "></td>"; } ?>
    </tr>
    <tr>
        <td colspan="2" class="left"><label for="black_fruit">Black </label></td>
        <?php for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"black_fruit\" id=\"black_fruit\" value=" . $i;
            if($wine['black_fruit'] == $i) { echo " checked"; } echo "></td>"; } ?>
    </tr>
    <tr>
        <td colspan="2" class="left"><label for="blue_fruit">Blue </label></td>
        <?php for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"blue_fruit\" id=\"blue_fruit\" value=" . $i;
            if($wine['blue_fruit'] == $i) { echo " checked"; } echo "></td>"; } ?>
    </tr>
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
    foreach (RED_WINE_NOTE_LABELS as $note => $label) {
        echo "<tr><td colspan=\"5\" class=\"left\"><label for=\"" . $note . "\">" . $label . "</label></td>";
        for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"" . $note . "\" id=\"" . $note . "\" value=" . $i;
            if($wine[$note] == $i) { echo " checked"; } echo "></td>"; } echo "</tr>";
    }
    ?>

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