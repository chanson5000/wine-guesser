<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/reset.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">
</head>
<body>

    <header>
        <a href="<?php echo url_for('index.php'); ?>">
        <h1>Wine Guesser</h1>
        </a>
    </header>

<?php echo display_session_message(); ?>