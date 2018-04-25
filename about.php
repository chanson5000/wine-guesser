<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - What is Wine Guesser?';
include(SHARED_PATH . '/header.php');
?>

    <div class="about-page">
        <h2>What is Wine Guesser?</h2>
        <h3>Wine guesser is web site that is meant to help assist anyone who is trying to get better at blind tasting
            wines.</h3>
        <p>Wine guesser uses wine characteristic information and testing criteria used by those attempting to receive
            accreditation by the <a href="https://www.mastersommeliers.org/" target="_blank">Court of Master
                Sommeliers</a>.
            While evaluating a wine you are blind tasting, input these characteristics into the form and see how close
            your
            were to picking out key indicators of the wine.</p>
        <p>Not all wines are created equal and many wines can stray away from classical and regional definitions that
            the
            Court of Master Sommeliers uses in their evaluations. Try blind tasting wines in the $20-$30 range for the
            most
            chance of your wine fitting these definitions.</p>
        <h3>Varieties and Regions Used</h3>
        <p>These PDF files will help you select wines that will work best.</p>
        <a id="pdf-wine-link" href="<?php echo url_for('files/Examinable_Red_Wines.pdf'); ?>" target="_blank">Red</a>
        <a id="pdf-wine-link" href="<?php echo url_for('files/Examinable_White_Wines.pdf'); ?>" target="_blank">White</a>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
