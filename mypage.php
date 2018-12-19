<?php require __DIR__.'/views/header.php'; ?>

<!-- my page where the user can update settings -->
<article class="my-page">
<h1>My page</h1>


<!-- if the user is logged in create a welcome message -->
    <!-- <?php if (isset($_SESSION['user'])): ?>
       <p><?php echo $_SESSION['user']['first_name']; ?></p>
   <?php endif; ?> -->
<div class="top-mypage">

<!-- upload avatar -->
<div class="avatar">

<img class="profile-pic" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
   <form action="app/users/upload.php" method="post" enctype="multipart/form-data">
            <div>
                <p><label for="images">Change photo:</label></p>
                <input type="file"  value="upload file" name="profile_pic" id="images" accept=".png, .jpeg, .jpg" multiple required>
            </div><br>
            <button type="submit">Upload</button>
        </form>
    </div><!-- upload avatar end -->

    <div class="bio">
        <p>Firstame: <?php echo $_SESSION['user']['first_name']; ?></p>
        <p>Laststame: <?php echo $_SESSION['user']['last_name']; ?></p>
        <p>Biography: <?php echo $_SESSION['user']['bio']; ?></</p>
        <!-- <form class="add-bio" action="app/users/bio.php" method="post">
                <div class="form-group">
                    <p>
                      <label>Write something about you</label><br>
                      <input type="text" name="bio">
                    </p>
                </div>
                <!-- form-group -->
                <!-- <button type="submit" class="bio-button">Add</button>
            </form> -->
        </div>
</div>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
