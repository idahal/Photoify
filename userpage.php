<?php require __DIR__.'/views/header.php'; ?>

<article class="homepage">
    <!-- <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p> -->


<!-- if the user is logged in create a welcome message -->
    <?php if (isset($_SESSION['user'])): ?>
       <p>Welcome, <?php echo $_SESSION['user']['first_name']; ?>!</p>
   <?php endif; ?>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
