<?php
    ob_start(); // Make sure output buffering is turned on

    // Assign some default paths
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("ADMIN_PATH", PROJECT_PATH . '/admin');
    define("SHARED_PATH", PROJECT_PATH . '/shared');
    $doc_root = $_SERVER['SCRIPT_NAME'];
    define("WWW_ROOT", $_SERVER['SERVER_NAME']);

    require_once('functions.php');
    require_once('database.php');
    require_once('query_functions.php');
    require_once('validation_functions.php');

    $db = db_connect();
    $errors = [];

?>