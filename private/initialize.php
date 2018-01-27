<?php
    ob_start(); // Make sure output buffering is turned on

    session_start(); // turn on sessions

    // Assign some default paths
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("ADMIN_PATH", PROJECT_PATH . '/admin');
    define("SHARED_PATH", PROJECT_PATH . '/shared');

    //Define this path if location of wine guesser is not in the root html directory.
    define("WWW_ROOT", '/wine_guesser');

    require_once('functions.php');
    require_once('database.php');
    require_once('query_functions.php');
    require_once('validation_functions.php');
    require_once('auth_functions.php');

    $db = db_connect();
    $errors = [];

?>