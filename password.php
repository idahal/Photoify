<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<article>
    <form class="create-account" action="app/users/password.php" method="post">
        <h1>Update my account</h1>

<p>
  <label>New password</label><br>
  <input type="password" name="password" id=password>
</p>
<p>
  <label>Confirm new password</label><br>
  <input type="password" name="confirm_password">
</p>
<p>
  <button type="submit" class="sign-up">Update</button>
</p>
</form>
</article>

<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;}; ?>
<?php require __DIR__.'/views/footer.php'; ?>
