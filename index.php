<?php
require_once('./private/initialize.php');

$page_title = 'Wine Guesser';
$page_index = '1';

include(SHARED_PATH . '/header.php');
?>

<div class="index-title">
    <table>
        <tr>
            <th colspan="2"><h2>Guess a wine.</h2></th>
        </tr>
        <tr>
            <td><a href="red-wine.php">Red</a></td>
            <td><a href="white-wine.php">White</a></td>
        </tr>
    </table>
</div>

<?php
include(SHARED_PATH . '/footer.php');
?>

