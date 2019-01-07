<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>


<article class="account-settings">
    <h1>Edit profile</h1>
<ul>
    <li>
        <p><a class="nav-link" href="/settings.php">My settings</a></p>
    </li>
    <li>
        <p><a class="nav-link" href="/password.php">Change password</a></p>
    </li>
    <li>
        <p><a class="nav-link" href="/avatar.php">Change profile photo</a></p>
    </li>
    <li>
        <p><a class="nav-link" href="/delete.php">Delete my account</a></p>
    </li>
    <p>
     <a href="/">Back</a>
    </p>
</ul>


</article>










<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;}; ?>
<?php require __DIR__.'/views/footer.php'; ?>
