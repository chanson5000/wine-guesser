<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - Possible Wine Varietal';
include(SHARED_PATH . '/header.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('index.php'));
}

$id = $_GET['id'];

$wine = find_red_wine_by_id($id);

?>

    <div class="center">
    <h2>Possible Closest Varietal Match</h2>

    <div class="wine-form">
        <table>
            <tr>
                <th>Varietal</th>
                <th>Origin</th>
                <th>Match Score</th>
            </tr>
            <tr>
                <td>Name: <?php echo h($wine['varietal']); ?></td>
                <td><?php echo $wine['new_world'] == 1 ? 'New World' : 'Old World'; ?></td>
                <td><?php echo $_SESSION['wine_score']; ?></td>
            </tr>
        </table>

        <?php include(SHARED_PATH . '/red-view.php'); ?>

        <div class="btm-return-link">
            <a href="<?php echo url_for('/red-wine.php'); ?>">Return to red wine guesser.</a>
        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>