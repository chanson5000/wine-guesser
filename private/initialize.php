<?php
    ob_start(); // Make sure output buffering is turned on

    // Assign some default paths
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));

    define("SHARED_PATH", PROJECT_PATH . '/shared');

    // * Can dynamically find everything in URL up to "/public"
//    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $_SERVER['SERVER_NAME']);

    require_once('functions.php');

    // TODO add database code
    // TODO add error handling