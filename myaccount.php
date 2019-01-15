<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<article class="account-settings">
    <?php require __DIR__.'/views/intro.php'; ?>
<div class="box">
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
        </ul>
</div>
    <p><a href="/">Back</a></p>
</article>
<!-- view in desktop -->
<article class="account-settings-desktop">
    <?php require __DIR__.'/views/intro.php'; ?>
    <div class="first-box">
        <form class="my-account" action="app/users/changes.php" method="post">
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
     </form>
    </div>
    <div class="second-box">
        <form class="my-account" action="app/users/password.php" method="post">
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
        </form>
    </div>
    <div class="third-box">
        <form class="my-account" action="app/users/delete.php" method="post">
            <h1>Delete my account</h1>
            <div class="alert-box">
                <h3>Are you sure?</h3>
                <p>This will delete your account, settings and photos.</p>
                </div>
            <p>
                <button type="submit" class="sign-up">Delete</button>
            </p>
        </form>
    </div>
</article>
<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;}; ?>
<?php require __DIR__.'/views/footer.php'; ?>
