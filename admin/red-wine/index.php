<?php
require_once('../../private/initialize.php');

$wine_set = find_all_red_wines();

$page_title = 'Wine Guesser - Red Wines Administration';

include(SHARED_PATH . '/header.php');
?>
    <div class="center">
        <h2>Red Wines Administration</h2>
        <div class="wine-form">
            <table>
                <tr>
                    <th>Varietal</th>
                    <th>World</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php while ($wine = mysqli_fetch_assoc($wine_set)) { ?>
                    <tr>
                        <td><?php echo h($wine['varietal']); ?></td>
                        <td><?php echo $wine['new_world'] == 1 ? 'New' : 'Old'; ?></td>
                        <td><a class="action"
                               href="<?php echo url_for('admin/red-wine/view.php?id=' . h(u($wine['id']))); ?>">View</a>
                        </td>
                        <td><a class="action"
                               href="<?php echo url_for('admin/red-wine/edit.php?id=' . h(u($wine['id']))); ?>">Edit</a>
                        </td>
                        <td><a class="action"
                               href="<?php echo url_for('admin/red=wine/delete.php?id=' . h(u($wine['id']))); ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<?php include(SHARED_PATH . '/footer.php'); ?>