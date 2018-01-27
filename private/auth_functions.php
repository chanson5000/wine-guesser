<?php

// Performs all actions necessary to log in an admin
function log_in_user($user) {
    // Regenerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $user['username'];
    $_SESSION['is_admin'] = $user['is_admin'];
    return true;
}

// Performs all actions necessary to log out an admin
function log_out_user() {
    unset($_SESSION['user_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username']);
    // session_destroy(); // optional: destroys the whole session
    return true;
}

// is_logged_in() contains all the logic for determining if a
// request should be considered a "logged in" request or not.
// It is the core of require_login() but it can also be called
// on its own in other contexts (e.g. display one link if an admin
// is logged in and display another link if they are not)
function is_logged_in() {
    // Having a user_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which user for looking up their record.
    return isset($_SESSION['user_id']);
}

// Call require_login() at the top of any page which needs to
// require a valid login as administrator before granting access to the page.
function require_login() {
    if(!is_logged_in() or ($_SESSION['is_admin'] != '1')) {
        redirect_to(url_for('login.php'));
    } else {
        // Do nothing, let the rest of the page proceed
    }
}

?>