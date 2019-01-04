<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<article class="avatar-page">

<!-- upload avatar -->
    <div class="avatar">

        <img class="profile-pic-mypage" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
        <form action="app/users/upload.php" method="post" enctype="multipart/form-data">
            <div>
                <p><label for="images">Change profile photo:</label></p>
                <input type="file"  value="upload file" name="profile_pic" id="images" accept=".png, .jpeg, .jpg" multiple required>
            </div><br>
            <button class="upload-profile-pic" type="submit">Upload</button>
        </form>
        <p>
         <a href="/myaccount.php">Back</a>
        </p>
    </div><!-- upload avatar end -->
</article>
<?php require __DIR__.'/views/footer.php'; ?>
