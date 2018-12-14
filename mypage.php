<?php require __DIR__.'/views/header.php'; ?>

<!-- my page where the user can update settings -->
<article class="my-page">
    <h1><?php echo $config['title']; ?></h1>
    <p>This is my page.</p>


<!-- if the user is logged in create a welcome message -->
    <?php if (isset($_SESSION['user'])): ?>
       <p>Welcome, <?php echo $_SESSION['user']['first_name']; ?>!</p>
   <?php endif; ?>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
