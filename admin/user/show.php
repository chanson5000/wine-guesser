<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Guesser - User Added';
include (SHARED_PATH . '/staff_header.php');

$id = isset($_GET['id']) ? $_GET['id'] : '1';

$user = find_user_by_id($id);


?>

<div class="center">
    <h2>User Information</h2>

    <div class="user-show">
        <dl>
            <dt><label for="first_name">First Name</label></dt>
            <dd><?php echo h($user['first_name']); ?></dd>
        </dl>
        <dl>
            <dt><label for="last_name">Last Name</label></dt>
            <dd><?php echo h($user['last_name']); ?></dd>
        </dl>
        <dl>
            <dt><label for="username">Username</label></dt>
            <dd><?php echo h($user['username']); ?></dd>
        </dl>
        <dl>
            <dt><label for="email">E-Mail</label></dt>
            <dd><?php echo h($user['email']); ?></dd>
        </dl>
        <dl>
            <dt><label for="is_admin">Is Administrator</label></dt>
            <dd><?php if(h($user['is_admin']) == '1') { echo 'Yes'; } else { echo 'No'; } ?></dd>
        </dl>

    </div>
        <div class="btm-return-link">
            <a href="<?php echo url_for('admin/user/index.php'); ?>">Return to user administration.</a>
        </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>