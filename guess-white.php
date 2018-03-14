<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Possible Wine Varietal';
include(SHARED_PATH . '/header.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('index.php'));
}

$id = $_GET['id'];

$wine = find_white_wine_by_id($id);

?>

    <div class="center">
    <h2>Possible Closest Varietal Match</h2>

    <div class="wine-form">
        <table>
            <tr>
                <th>Varietal</th>
                <th>Origin</th>
            </tr>
            <tr>
                <td>Name: <?php echo h($wine['varietal']); ?></td>
                <td><?php echo $wine['new_world'] == 1 ? 'New World' : 'Old World'; ?></td>
            </tr>
        </table>

        <?php include(SHARED_PATH . '/white-view.php'); ?>

        <div class="btm-return-link">
            <a href="<?php echo url_for('/white-wine.php'); ?>">Return to white wine guesser.</a>
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>