<?php

require_once('../../private/initialize.php');

//require_login();

if (!isset($_GET['id'])) {
    redirect_to(url_for('/admin/user/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {
    $result = delete_user($id);
    $_SESSION['message'] = 'User deleted.';
    redirect_to(url_for('/admin/user/index.php'));
} else {
    $user = find_user_by_id($id);
}

?>

<?php $page_title = 'Delete User'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div class="center delete-page">
    <h1>Delete User</h1>

    <p>Are you sure you want to delete this user?</p>

    <p class="item"><?php echo h($user['username']); ?></p>

    <form action="<?php echo url_for('admin/user/delete.php?id=' . h(u($user['id']))); ?>" method="post">
        <input type="submit" name="commit" value="Delete User">
    </form>

    <div class="btm-return-link"><a href="<?php echo url_for('admin/user/index.php'); ?>">Return to user
            administration.</a></div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
