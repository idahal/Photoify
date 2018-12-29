<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>
<article>

<form class="create-account" action="app/users/delete.php" method="post">
    <h1>Delete my account</h1>
  <p>
    <button type="submit" class="sign-up">Delete</button>
 </p>

</form>

</article>

<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;}; ?>
<?php require __DIR__.'/views/footer.php'; ?>
