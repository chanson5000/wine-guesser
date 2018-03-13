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
                <th class="left">Fruit</th>
                <th>&nbsp;</th>
                <th>No</th>
                <th>Yes</th>
                <th>Key Indicator</th>
            </tr>
            <tr>
                <td colspan="2" class="left"><label for="apple">Apple/Pear </label></td>
                <?php for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"apple\" id=\"apple\" value=" . $i;
                    if($wine['apple'] == $i) { echo " checked"; } echo "></td>"; } ?>
            </tr>
            <tr>
                <td colspan="2" class="left"><label for="citrus">Citrus </label></td>
                <?php for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"citrus\" id=\"citrus\" value=" . $i;
                    if($wine['citrus'] == $i) { echo " checked"; } echo "></td>"; } ?>
            </tr>
            <tr>
                <td colspan="2" class="left"><label for="stone">Stone </label></td>
                <?php for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"stone\" id=\"stone\" value=" . $i;
                    if($wine['stone'] == $i) { echo " checked"; } echo "></td>"; } ?>
            </tr>
            <tr>
                <td colspan="2" class="left"><label for="tropical">Tropical </label></td>
                <?php for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"tropical\" id=\"tropical\" value=" . $i;
                    if($wine['tropical'] == $i) { echo " checked"; } echo "></td>"; } ?>
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
            // The following code may have replaced around 110 lines of code!

            foreach (WHITE_WINE_NOTE_LABELS as $note => $label) {
                echo "<tr><td colspan=\"5\" class=\"left\"><label for=\"" . $note . "\">" . $label . "</label></td>";
                for ($i = 0; $i <= 2; $i++) { echo "<td><input type=\"radio\" name=\"" . $note . "\" id=\"" . $note . "\" value=" . $i;
                    if($wine[$note] == $i) { echo " checked"; } echo "></td>"; } echo "</tr>";
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
                <!-- TODO: Add label switching. -->
                <td class="left"><label for="sweetness">Sweetness:</label></td>
                <td><input type="checkbox" name="dry" id="sweetness" value="1"<?php if($wine['dry'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="off_dry" id="sweetness" value="1"<?php if($wine['off_dry'] == "1") { echo " checked"; } ?>></td>
                <td><input type="checkbox" name="sweet" id="sweetness" value="1"<?php if($wine['sweet'] == "1") { echo " checked"; } ?>></td>
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
                <td><label for="climate_moderate">Moderate </label><input type="checkbox" name="climate_moderate" id="climate_moderate" value="1"<?php if($wine['climate_moderate'] == "1") { echo " checked"; } ?>></td>
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
                <th colspan="3"><label for="confusion">Common Confusions</label></th>
            </tr>
            <tr>
                <td colspan="3"><textarea class="max-width" name="confusion" id="confusion" cols="3" rows="3"><?php echo $wine['confusion']; ?></textarea></td>
            </tr>
        </table>