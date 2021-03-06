<footer>

    &copy; <?php echo date('Y'); ?> <a href="http://www.coryhanson.us" target="_blank">Cory Hanson</a>

    <?php if (is_logged_in()) { ?>
        <div class="btm-return-link">
            Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Unknown'; ?>. <a
                    href="<?php echo url_for('logout.php'); ?>">Logout?</a><br>
            <a href="<?php echo url_for('admin/index.php'); ?>">Go to the administration page.</a>
        </div>

    <?php } else { ?>
        <div class="btm-return-link">
            <a href="<?php echo url_for('login.php'); ?>">Login?</a>
        </div>
    <?php } ?>

</footer>
</body>
</html>

<?php db_disconnect($db); ?>