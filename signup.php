<?php require __DIR__.'/views/header.php'; ?>

<article>
    <!-- <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p> -->
    <form class="create-account" action="/app/users/signup.php" method="post">
        <!-- <p>
          <label>User name</label><br>
          <input type="text" name="username">
        </p> -->
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
        <label>Confirm password</label><br>
        <input type="password" name="confirm_password">
      </p>
      <p>
        <button class="sign-up">Sign up</button>
     </p>
     <p>
        <a href="/">I already got a acount</a>
     </p>
    </form>
