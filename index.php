<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser';
include(SHARED_PATH . '/header.php');
?>
    <h2>Which type of wine are you trying to guess?</h2>
        <div class="center">
            <table class="inline-block">
                <tr>
                    <td><a class="wine-select" href="red-wine.php">Red</a></td>
                    <td><a class="wine-select" href="white-wine.php">White</a></td>
                </tr>
            </table>
        </div>

</body>
</html>