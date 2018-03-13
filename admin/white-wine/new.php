<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Guesser Administration - Add New Varietal';
include(SHARED_PATH . '/staff_header.php');

if (is_post_request()) {
    $wine = [];

    // This function uses the PHP 7 coalescing operator
    // The old version looked like this: $wine[$field] = isset($_POST[$field]) ? $_POST[$field] : '';
    // Replaced around 50 lines of code with this foreach loop!

    foreach (WHITE_WINE_FIELDS as $field) {
        if ($field != WINE_TEXT_FIELDS) {
            $wine[$field] = $_POST[$field] ?? '0';
        } else {
            $wine[$field] = $_POST[$field] ?? '';
        }
    }

    $result = create_white_wine($wine);
    if($result === true) {
        $new_id = mysqli_insert_id($db);
        $_SESSION['message'] = 'Wine added.';
        redirect_to(url_for('/admin/white-wine/view.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
}
?>

<div class="center">
    <h2>Add New Wine Varietal</h2>
    <form class="wine-form" action="<?php echo url_for('/admin/white-wine/new.php') ?>" id="wine-form" method="post">
        <table>
            <tr>
                <th colspan="2">Varietal</th>
            </tr>
            <tr>
                <td><label for="varietal">Name:&nbsp;&nbsp;</label><input type="text" id="varietal" name="varietal" value=""></td>
                <td><label for="new_world">New World: </label><input type="checkbox" name="new_world" id="new_world" value="1"></td>
            </tr>
        </table>

        <?php include(SHARED_PATH . '/white-fields.php'); ?>

        <input class="submit-btn" type="submit" value="Submit">
    </form>
    <div class="btm-return-link">
        <a href="<?php echo url_for('/admin/white-wine/index.php'); ?>">Return to white wines administration.</a>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>