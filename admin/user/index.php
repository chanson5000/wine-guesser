<?php

require_once('../../private/initialize.php');

//require_login();

$user_set = find_all_users();

$page_title = 'Wine Guesser - User List';

include (SHARED_PATH . '/header.php');
?>

<div class="center">
    <h2>Red Wines Administration</h2>
    <div class="wine-form">
        <table>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Admin</th>
                <th colspan="3"><a href="<?php echo url_for('admin/user/new.php') ?>">Add A New User</a></th>

            </tr>

            <?php while ($user = mysqli_fetch_assoc($user_set)) { ?>
                <tr>
                    <td><?php echo h($user['username']); ?></td>
                    <td><?php echo h($user['first_name']) . ' ' . h($user['last_name']); ?></td>
                    <td><?php echo $user['is_admin'] == 1 ? 'Yes' : 'No'; ?></td>
                    <td><a href="<?php echo url_for('admin/user/show.php?id=' . h(u($user['id']))); ?>">View</a>
                    </td>
                    <td><a href="<?php echo url_for('admin/user/edit.php?id=' . h(u($user['id']))); ?>">Edit</a>
                    </td>
                    <td><a href="<?php echo url_for('admin/user/delete.php?id=' . h(u($user['id']))); ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="btm-return-link center">
        <a href="<?php echo url_for('admin/index.php'); ?>">Return to administration index.</a>
    </div>

</div>

<?php
include(SHARED_PATH . '/footer.php');
?>