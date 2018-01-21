<?php
require_once('../private/initialize.php');

$page_title = 'Wine Guesser - Administration';
include(SHARED_PATH . '/header.php');
?>

<h2 class="center">Administration</h2>
<div class="admin-index">
    <table>
        <tr>
            <th colspan="2"><h3>What would you like to administer?</h3></th>
        </tr>
        <tr>
            <td><a href="<?php echo url_for('admin/red-wine/index.php'); ?>">Red Wine</a></td>
            <td><a href="<?php echo url_for('admin/white-wine/index.php'); ?>">White Wine</a></td>
        </tr>
        <tr>
            <td colspan="2"><a href="<?php echo url_for('admin/user/index.php'); ?>">Users</a></td>
        </tr>
    </table>
</div>

<?php
include(SHARED_PATH . '/footer.php');
?>