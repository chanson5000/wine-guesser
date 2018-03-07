<?php
require_once('./private/initialize.php');

// Check if we are using the HTTPS protocol before proceeding with login attempts.

if ($_SERVER['HTTPS']) {

    $errors = [];
    $username = '';
    $password = '';

    if (is_post_request()) {

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Validations
        if (is_blank($username)) {
            $errors[] = "Username cannot be blank.";
        }
        if (is_blank($password)) {
            $errors[] = "Password cannot be blank.";
        }

        // if there were no errors, try to login
        if (empty($errors)) {
            // Using one variable ensures that msg is the same
            $login_failure_msg = "Log in was unsuccessful.";

            $user = find_user_by_username($username);
            if ($user) {

                if (password_verify($password, $user['password'])) {
                    // password matches
                    log_in_user($user);
                    $_SESSION['message'] = 'Login successful.';
                    redirect_to(url_for('/admin/index.php'));
                } else {
                    // username found, but password does not match
                    $errors[] = $login_failure_msg;
                }

            } else {
                // no username found
                $errors[] = $login_failure_msg;
            }
        }
    }
} else {
    secure_login_redirect();
}
?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div class="center">
    <h2>Log in</h2>
    <br>
    <form action="login.php" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" value="<?php echo h($username); ?>"/><br/>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value=""/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    <div class="btm-return-link">
        <a href="<?php echo url_for('index.php'); ?>">Return to Wine Guesser.</a>
    </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
