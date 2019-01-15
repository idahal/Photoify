<?php require __DIR__.'/views/header.php'; ?>

<article>
    <!-- If  the user is logged in -->
    <?php
        if(isset($_SESSION['user'])):  ?>
    <?php require __DIR__.'/home.php'; ?>
<!-- If the user is not logged in -->
    <?php else: ?>
        <?php require __DIR__.'/start.php'; ?>
    <?php endif; ?>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
