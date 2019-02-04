<?php require __DIR__.'/views/header.php'; ?>

<?php if (!isset($_SESSION['user'])) {
    redirect("/");
} else {
    $user = $_SESSION['user'];
}?>
<!-- here the user can change names, bio and email -->
<article>
    <form class="create-account" action="app/users/changes.php" method="post">
        <h1>Update my account</h1>
      <p>
        <label>Change first name</label><br>
        <input type="text" value="<?php echo $user['first_name'] ?>" name="first_name" id=first_name>
      </p>
      <p>
        <label>Change last name</label><br>
        <input type="text" value="<?php echo $user['last_name'] ?>" name="last_name" id=last_name>
      </p>
      <p>
        <label>Change biography</label><br>
        <input type="text" value="<?php echo $user['bio'] ?>" name="bio" id=bio maxlength="50">
      </p>
      <p>
        <label>Change email</label><br>
        <input type="email" value="<?php echo $user['email'] ?>" name="email" required id=email>
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
