<?php
require_once('../private/initialize.php');

$page_title = 'Wine Guesser - Administration';
include(SHARED_PATH . '/header.php');
?>

<h2>Administration</h2>
<h3>Which wine type would you like to administer?</h3>
<div class="center">
<table>
    <tr>
        <th><a href="<?php echo url_for('admin/red-wine/index.php'); ?>">Red</a></th>
        <th><a href="<?php echo url_for('admin/white-wine/index.php'); ?>">White</a></th>
    </tr>
</table>
</div>

<?php
include(SHARED_PATH . '/footer.php');
?>