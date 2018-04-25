<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Red Wine';
include(SHARED_PATH . '/header.php');

if (is_post_request()) {

    $guessed_wine_id_score = wine_guess_id(transform_wine_fields(sanitize_wine_fields($_POST, RED_WINE), RED_WINE), RED_WINE);

    $_SESSION['wine_score'] = $guessed_wine_id_score[1];

    redirect_to(url_for('/guess-red.php?id=' . u($guessed_wine_id_score[0])));

} else {

}
?>
    <div class="center">
        <h2>Select Red Wine Characteristics</h2>
        <form class="wine-form" action="<?php url_for('/red-wine.php') ?>" method="post">
            <table>
                <tr>
                    <th colspan="3">Color</th>
                </tr>
                <tr>
                    <?php foreach (RED_WINE_COLOR_LABELS as $color => $label) {
                        echo "<td><label for=\"" . $color . "\">" . $label . "</label><input type=\"radio\" name=\"color\" id=\"" . $color . "\" value=\"" . $color . "\"></td>";
                    } ?>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Nose (Select up to two)</th>
                </tr>
                <tr>
                    <?php foreach (RED_NOSE_COND_LABELS as $condition => $label) {
                        echo "<td><label for=\"" . $condition . "\">" . $label . "</label><br><input type=\"checkbox\"
                                                                      name=\"" . $condition . "\" id=\"" . $condition . "\"
                                                                      value=\"1\"></td>";
                    } ?>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="4">Fruit Condition - Palate (Select up to two)</th>
                </tr>
                <tr>
                    <?php foreach (RED_PALATE_COND_LABELS as $condition => $label) {
                        echo "<td><label for=\"" . $condition . "\">" . $label . "</label><br><input type=\"checkbox\"
                                                                      name=\"" . $condition . "\" id=\"" . $condition . "\"
                                                                      value=\"1\"></td>";
                    } ?>
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
                    echo "<tr><td colspan=\"2\" class=\"left\"><label for=\"" . $fruit . "\">" . $label . "</label></td>";
                    for ($i = 0; $i <= 2; $i++) {
                        echo "<td><input type=\"radio\" name=\"" . $fruit . "\" id=\"" . $fruit . "\" value=" . $i;
                        if ($i == 0) {
                            echo " checked";
                        }
                        echo "></td>";
                    }
                    echo "</tr>";
                } ?>
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
                <?php
                foreach (RED_WINE_NOTE_LABELS as $note => $label) {
                    echo "<tr><td colspan=\"4\" class=\"left\"><label for=\"" . $note . "\">" . $label . "</label></td>";
                    for ($i = 0; $i <= 2; $i++) {
                        echo "<td><input type=\"radio\" name=\"" . $note . "\" id=\"" . $note . "\" value=" . $i;
                        if ($i == 0) {
                            echo " checked";
                        }
                        echo "></td>";
                    }
                    echo "</tr>";
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
                    <td class="left"><label for="tannin">Tannin:</label></td>
                    <?php foreach (WINE_STRUCTURES as $structure) {
                        echo "<td><input type=\"radio\" name=\"tannin\" id=\"tannin\" value=\"" . $structure . "\"></td>";
                    } ?>
                </tr>
                <tr>
                    <td class="left"><label for="acid">Acid:</label></td>
                    <?php foreach (WINE_STRUCTURES as $structure) {
                        echo "<td><input type=\"radio\" name=\"acid\" id=\"acid\" value=\"" . $structure . "\"></td>";
                    } ?>
                </tr>
                <tr>
                    <td class="left"><label for="alcohol">Alcohol:</label></td>
                    <?php foreach (WINE_STRUCTURES as $structure) {
                        echo "<td><input type=\"radio\" name=\"alcohol\" id=\"alcohol\" value=\"" . $structure . "\"></td>";
                    } ?>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">Climate</th>
                </tr>
                <tr>
                    <?php foreach (WINE_CLIMATES as $climate) {
                        echo "<td><label for=\"climate_" . $climate . "\">" . ucfirst($climate) . " </label><input type=\"radio\" name=\"climate\" id=\"climate_" . $climate . "\" value=\"" . $climate . "\"></td>";
                    } ?>
                </tr>
            </table>
            <input class="submit-btn" type="submit" value="Submit">
        </form>

        <p id="did-you-mean-it">Did you mean to guess a <a href="white-wine.php">white wine?</a></p>
    </div>
<?php include(SHARED_PATH . '/footer.php'); ?>