<?php
require_once('../../private/initialize.php');

$page_title = 'Wine Guesser - Red Wines Administration';
include(SHARED_PATH . '/staff_header.php');

$wine_set = find_all_red_wines();
?>
    <div class="center">
        <h2>Red Wines Administration</h2>
        <div class="wine-form">
            <table>
                <tr>
                    <th>Varietal</th>
                    <th>World</th>
                    <th colspan="3"><a href="<?php echo url_for('admin/red-wine/new.php') ?>">Add A New Varietal</a>
                    </th>
                </tr>

                <?php if (!mysqli_num_rows($wine_set) == '0') {
                while ($wine = mysqli_fetch_assoc($wine_set)) { ?>
                <tr>
                    <td><?php echo h($wine['varietal']); ?></td>
                    <td><?php echo $wine['new_world'] == 1 ? 'New' : 'Old'; ?></td>
                    <td><a href="<?php echo url_for('admin/red-wine/view.php?id=' . h(u($wine['id']))); ?>">View</a>
                    </td>
                    <td><a href="<?php echo url_for('admin/red-wine/edit.php?id=' . h(u($wine['id']))); ?>">Edit</a>
                    </td>
                    <td><a href="<?php echo url_for('admin/red-wine/delete.php?id=' . h(u($wine['id']))); ?>">Delete</a>
                    </td>
                </tr>
                <?php }
                } else {
    echo '<tr><th colspan="5">There are no red wines in the database!</th></tr>';
    } ?>
            </table>
        </div>
    </div>

    <div class="btm-return-link center">
        <a href="<?php echo url_for('admin/index.php'); ?>">Return to administration index.</a>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>