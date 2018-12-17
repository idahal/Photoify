<article class="homepage">
    <!-- <h1><?php echo $config['title']; ?></h1> -->
    <h1>This is the gallery page.</h1>


<!-- if the user is logged in create a welcome message -->
    <?php if (isset($_SESSION['user'])): ?>
       <p>Welcome, <?php echo $_SESSION['user']['first_name']; ?>!</p>
   <?php endif; ?>
</article>
