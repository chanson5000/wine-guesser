<?php
require_once('./private/initialize.php');

$page_title = 'Wine Guesser';
$page_index = '1';

include(SHARED_PATH . '/header.php');
?>
<div class="center">
    <div class="index-title">
        <table>
            <tr>
                <th colspan="2"><h2>Guess a wine.</h2></th>
            </tr>
            <tr>
                <td><a id="wine-buttons" href="red-wine.php">Red</a></td>
                <td><a id="wine-buttons" href="white-wine.php">White</a></td>
            </tr>
        </table>
    </div>
</div>
<?php
include(SHARED_PATH . '/footer.php');
?>

