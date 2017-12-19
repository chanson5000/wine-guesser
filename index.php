<?php
require_once('./private/initialize.php');

$page_title = 'Wine Guesser';
$page_index = '1';

include(SHARED_PATH . '/header.php');
?>
<div class="index-title">
    <h2>Guess a wine.</h2>
    <div class="center">
        <div class="wine-select"><a href="red-wine.php">Red</a></div>
        <div class="wine-select"><a href="white-wine.php">White</a></div>
    </div>
</div>

<?php
//include(SHARED_PATH . '/footer.php');
//?>

