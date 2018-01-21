<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Guesser - New User';
include (SHARED_PATH . '/staff_header.php');

if(is_post_request()) {

    $user = [];
    $user['first_name'] = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $user['last_name'] = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $user['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $user['username'] = isset($_POST['username']) ? $_POST['username'] : '';
    $user['password'] = isset($_POST['password']) ? $_POST['password'] : '';
    $user['confirm_password'] = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $user['is_admin'] = isset($_POST['is_admin']) ? $_POST['is_admin'] : '0';

    $result = insert_user($user);
    if($result === true) {
        $new_id = mysqli_insert_id($db);
        $_SESSION['message'] = 'User created.';
        redirect_to(url_for('/admin/user/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
} else {
    // display the blank form
    $user = [];
    $user['first_name'] = '';
    $user['last_name'] = '';
    $user['email'] = '';
    $user['username'] = '';
    $user['password'] = '';
    $user['confirm_password'] = '';
    $user['is_admin'] = '0';
}

?>

<div class="center">
    <h2>Add New User</h2>

    <form class="user-form" action="<?php echo url_for('/admin/user/new.php'); ?>" method="post">
        <dl>
            <dt><label for="first_name">First Name</label></dt>
            <dd><input type="text" name="first_name" id="first_name" value="<?php echo h($user['first_name']); ?>"></dd>
        </dl>
        <dl>
            <dt><label for="last_name">Last Name</label></dt>
            <dd><input type="text" name="last_name" id="last_name" value="<?php echo h($user['last_name']); ?>"></dd>
        </dl>
        <dl>
            <dt><label for="username">Username</label></dt>
            <dd><input type="text" name="username" id="username" value="<?php echo h($user['username']); ?>"></dd>
        </dl>
        <dl>
            <dt><label for="email">E-Mail</label></dt>
            <dd><input type="text" name="email" id="email" value="<?php echo h($user['email']); ?>"></dd>
        </dl>
        <dl>
            <dt><label for="is_admin">Is Administrator</label></dt>
            <dd><input type="checkbox" name="is_admin" id="is_admin" value="1"></dd>
        </dl>
        <dl>
            <dt><label for="password">Password</label></dt>
            <dd><input type="password" name="password" id="password" value=""></dd>
        </dl>
        <dl>
            <dt><label for="confirm_password">Confirm Password</label></dt>
            <dd><input type="password" name="confirm_password" id="confirm_password" value=""></dd>
        </dl>
        <p>
            Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
        </p>

        <input class="submit-btn" type="submit" value="Create User">

    </form>
        <div class="btm-return-link">
            <a href="<?php echo url_for('admin/user/index.php'); ?>">Return to user administration.</a>
        </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>