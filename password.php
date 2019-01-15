<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else {$user = $_SESSION['user'];}?>

<article>
    <form class="create-account" action="app/users/password.php" method="post">
        <h1>Change password</h1>
        <p>
    <label>Your current password</label><br>
    <input type="password" name="password" required>
    </p>
        <p>
  <label>New password</label><br>
  <input type="password" name="new_password" required>
</p>
<p>
  <label>Confirm new password</label><br>
  <input type="password" name="confirm_password" required>
</p>
<p>
  <button type="submit" class="sign-up">Update</button>
</p>
<p>
 <a href="/myaccount.php">Back</a>
</p>
</form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
