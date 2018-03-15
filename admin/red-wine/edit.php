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

    // This function uses the PHP 7 coalescing operator
    // The old version looked like this: $wine[$field] = isset($_POST[$field]) ? $_POST[$field] : '';
    // Replaced around 50 lines of code with this foreach loop!

    foreach (RED_WINE_FIELDS as $field) {
        if ($field != WINE_TEXT_FIELDS) {
            $wine[$field] = $_POST[$field] ?? '0';
        } else {
            $wine[$field] = $_POST[$field] ?? '';
        }
    }

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

        <?php include('red-fields.php'); ?>

        <input class="submit-btn" type="submit" value="Submit">
    </form>
    <div class="btm-return-link"><a href="<?php echo url_for('admin/red-wine/index.php'); ?>">Return to red wines administration.</a></div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>