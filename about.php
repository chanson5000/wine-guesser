<?php
require_once('private/initialize.php');

$page_title = 'Wine Guesser - What is Wine Guesser?';
include(SHARED_PATH . '/header.php');
?>
<div class="center">
    <div class="about-page">
        <h2>What is Wine Guesser?</h2>
        <h3>Wine Guesser is web site meant to assist anyone trying to improve blind tasting.</h3>
        <p>Wine guesser uses wine characteristic information and testing criteria used by those attempting to receive
            accreditation by the <a href="https://www.mastersommeliers.org/" target="_blank">Court of Master
                Sommeliers</a>.
            When blind tasting a wine, input evaluated characteristics into the form and see how close
            you
            are to picking out key indicators of the wine.</p>
        <p>Not all wines are created equal and many wines can stray from the classical and regional definitions that
            the
            Court of Master Sommeliers uses in their evaluations. Wines in the $20-$30 dollar range will be more likely to fit the definitions used.</p>
        <p>These PDF files will help you select wines that will work best.</p>
        <a id="pdf-wine-link" href="<?php echo url_for('files/Examinable_Red_Wines.pdf'); ?>" target="_blank">Red</a>
        <a id="pdf-wine-link" href="<?php echo url_for('files/Examinable_White_Wines.pdf'); ?>"
           target="_blank">White</a>
    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
