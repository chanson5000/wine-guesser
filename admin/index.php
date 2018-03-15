<?php
require_once('../private/initialize.php');

$page_title = 'Wine Guesser Administration';
include(SHARED_PATH . '/staff_header.php');
?>

<h2 class="center">Administration</h2>
<div class="index-title">
    <table>
        <tr>
            <th colspan="2"><h3>What would you like to administer?</h3></th>
        </tr>
        <tr>
            <td><a href="<?php echo url_for('admin/red-wine/index.php'); ?>">Red</a></td>
            <td><a href="<?php echo url_for('admin/white-wine/index.php'); ?>">White</a></td>
        </tr>
        <tr>
            <td colspan="2"><a href="<?php echo url_for('admin/user/index.php'); ?>">Users</a></td>
        </tr>
    </table>
</div>

<?php
include(SHARED_PATH . '/staff_footer.php');
?>