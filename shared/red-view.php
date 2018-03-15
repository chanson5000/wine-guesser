<table>
    <tr>
        <th colspan="3">Color</th>
    </tr>
    <tr>
        <?php foreach (RED_WINE_COLOR_LABELS as $color => $label) { ?>
            <td><?php if ($wine[$color] == 1) { echo $label; } ?></td> <?php } ?>
    </tr>
</table>
<table>
    <tr>
        <th colspan="4">Fruit Condition - Nose</th>
    </tr>
    <tr>
        <?php foreach (RED_NOSE_COND_LABELS as $condition => $label) { ?>
            <td><?php if ($wine[$condition] == "1") { echo $label; } ?></td> <?php } ?>
    </tr>
</table>
<table>
    <tr>
        <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
    </tr>
    <tr>
        <?php foreach (RED_PALATE_COND_LABELS as $condition => $label) { ?>
            <td><?php if ($wine[$condition] == "1") { echo $label; } ?></td> <?php } ?>
    </tr>
</table>
<table>
    <tr>
        <th class="left">Fruit</th>
        <th>&nbsp;</th>
        <th>No</th>
        <th>Yes</th>
        <th>Key</th>
    </tr>
    <?php foreach (RED_WINE_FRUIT_LABELS as $fruit => $label) {
        echo "<tr><td colspan=\"2\" class=\"left\">". $label ."</td>";
        for ($i = 0; $i <= 2; $i++) { echo "<td>";
            if($wine[$fruit] == $i) { echo "X"; } echo "</td>"; } echo "</tr>"; } ?>
</table>
<table>
    <tr>
        <th class="left">Non-Fruit</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>No</th>
        <th>Yes</th>
        <th>Key</th>
    </tr>
    <?php foreach (RED_WINE_NOTE_LABELS as $note => $label) {
        echo "<tr><td colspan=\"4\" class=\"left\">" . $label . "</td>";
        for ($i = 0; $i <= 2; $i++) { echo "<td>";
            if($wine[$note] == $i) { echo "X"; } echo "</td>"; } echo "</tr>"; } ?>
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

        <?php
        foreach (WINE_STRUCTURES as $structure) { ?>
            <td><?php if ($wine['tannin_' . $structure] == "1") { echo "X"; } ?></td> <?php
        } ?>
    </tr>
    <tr>
        <td class="left"><label for="st-acid">Acid:</label></td>
        <?php
        foreach (WINE_STRUCTURES as $structure) { ?>
            <td><?php if ($wine['acid_' . $structure] == "1") { echo "X"; } ?></td> <?php
        } ?>
    </tr>
    <tr>
        <td class="left"><label for="st-alcohol">Alcohol:</label></td>
        <?php
        foreach (WINE_STRUCTURES as $structure) { ?>
            <td><?php if ($wine['alcohol_' . $structure] == "1") { echo "X"; } ?></td> <?php
        } ?>
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