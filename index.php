<?php require __DIR__.'/views/header.php'; ?>

<article class="homepage">
    <!-- <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p> -->
    <form class="create-acount" action="/app/users/signup.php" method="post">
        <p>
          <label>User name</label><br>
          <input type="text" name="username">
        </p>
      <p>
        <label>First name</label><br>
        <input type="text" name="first_name">
      </p>
      <p>
        <label>Last name</label><br>
        <input type="text" name="last_name">
      </p>
      <p>
        <label>Email</label><br>
        <input type="email" name="email" required>
      </p>
      <p>
        <label>Password</label><br>
        <input type="password" name="password">
      </p>
      <p>
        <button class="sign-up">Sign up</button>
     </p>
    </form>



<!-- if the user is logged in create a welcome message -->
    <?php if (isset($_SESSION['user'])): ?>
       <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
   <?php endif; ?>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
