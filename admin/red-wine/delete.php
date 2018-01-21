<?php
require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('admin/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {
    $result = delete_red_wine($id);
    $_SESSION['message'] = 'Wine deleted.';
    redirect_to(url_for('admin/red-wine/index.php'));
} else {
    $wine = find_red_wine_by_id($id);
}

?>

<?php $page_title = 'Delete Varietal'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div class="center delete-page">
        <h2>Delete Varietal</h2>

        <p>Are you sure you want to delete this wine varietal from the database?</p>
        <p><?php echo $wine['varietal']; ?></p>

        <form action="<?php echo url_for('admin/red-wine/delete?id=' . h(u($wine['id']))); ?>" method="post">
            <input type="submit" name="commit" value="Delete Varietal">
        </form>

        <div class="btm-return-link"><a href="<?php echo url_for('admin/red-wine/index.php'); ?>">Return to red wines
                administration.</a></div>
    </div>
<?php

include(SHARED_PATH . '/footer.php');

?>