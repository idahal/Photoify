<?php require __DIR__.'/views/header.php'; ?>

<article>
    <?php
    // If  the user is logged in
    if(isset($_SESSION['user'])):  ?>
    <?php require __DIR__.'/home.php'; ?>

    <?php
    //If the user is not logged in
    else: ?>
        <?php require __DIR__.'/start.php'; ?>
    <?php endif; ?>
</article>

<!-- <?php unset($_SESSION['messages']); ?> -->

<?php require __DIR__.'/views/footer.php'; ?>
