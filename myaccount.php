<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>


<article class="account-settings">
<ul>
    <li>
        <a class="nav-link" href="/settings.php">My settings</a>
    </li>
    <li>
        <a class="nav-link" href="/password.php">Change password</a>
    </li>
    <li>
        <a class="nav-link" href="/delete.php">Delete my account</a>
    </li>
</ul>


</article>










<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;}; ?>
<?php require __DIR__.'/views/footer.php'; ?>
