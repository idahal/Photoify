<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<article class="share-photos-page">
    <?php require __DIR__.'/views/intro.php'; ?>
    <h1>Upload profile pic</h1>
        <form class="share-photos" action="app/users/upload.php" method="post" enctype="multipart/form-data">
            <div class="upload-file-style">
                <label for="file-upload" class="custom-file-upload">
               <i class="far fa-user fa-lg"></i>
               Photo
             </label>
             <input type="file"  value="upload file" name="profile_pic" id="file-upload" style="display:none;" accept=".png, .jpeg, .jpg" multiple required >
             <input id="uploadFile" placeholder=" No File Choosen" disabled="disabled" />
         </div>
            <button class="upload-profile-pic" type="submit">Upload</button>
        </form>
        <p>
            <a href="/myaccount.php">Back</a>
        </p>
        <!-- upload avatar end -->
</article>

<?php require __DIR__.'/views/footer.php'; ?>


<!-- <div class="upload-avatar-wrapper">
        <form action="app/users/upload.php" method="post" enctype="multipart/form-data">
            <button class="upload-avatar-button" type="button" name="button"><i class="far fa-user fa-lg"></i> Change profile photo:
                <input type="file"  value="upload file" name="profile_pic" id="images" accept=".png, .jpeg, .jpg" multiple required>
            </button>
            <button class="upload-profile-pic" type="submit">Upload</button>
        </form>
        <p>
            <a href="/myaccount.php">Back</a>
        </p>
    </div> -->
