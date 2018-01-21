<?php
require_once('./private/initialize.php');

log_out_user();
$_SESSION['message'] = 'Log out successful.';
redirect_to(url_for('/login.php'));

?>