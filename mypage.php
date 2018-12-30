<?php require __DIR__.'/views/header.php'; ?>

<!-- my page where the user can update settings -->
<article class="my-page">
<!-- if the user is logged in create a welcome message -->
    <!-- <?php if (isset($_SESSION['user'])): ?>
       <p><?php echo $_SESSION['user']['first_name']. ' '. $_SESSION['user']['last_name']; ?></p>
   <?php endif; ?> -->
  <?php $userId = $_SESSION['user']['user_id']; ?>
<div class="top-mypage">


<!-- upload avatar -->
<div class="avatar">

<img class="profile-pic" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
   <form action="app/users/upload.php" method="post" enctype="multipart/form-data">
            <div>
                <p><label for="images">Add profile photo:</label></p>
                <input type="file"  value="upload file" name="profile_pic" id="images" accept=".png, .jpeg, .jpg" multiple required>
            </div><br>
            <button type="submit">Upload</button>
        </form>
    </div><!-- upload avatar end -->

    <div class="bio">
        <p>Firstame: <?php echo $_SESSION['user']['first_name']; ?></p>
        <p>Laststame: <?php echo $_SESSION['user']['last_name']; ?></p>
        <p>Biography: <?php echo $_SESSION['user']['bio']; ?></</p>
    </div>
</div>
<br>
<br>
<div class="gallery-mypage">
    <?php
            $statement = $pdo->prepare("SELECT * FROM posts WHERE user_id =  '$userId';");
            $statement->execute();
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            // die(var_dump($posts));
     ?>
        <?php foreach ($posts as $post): ?>
            <div class="posts">

            <img style="width: 100px; height: 100px;" class="gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
            <br>
            <form class="edit-post" action="app/posts/update.php" method="post">
              <p>
                <input type="text" value="<?php echo $post['content'];?>" name="content" id=content>
                <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=user_id>
              </p>
              <p>
                <button type="submit" class="save-button">Edit post</button>
             </p>
        </form>
        <form class="delete-post" action="app/posts/delete.php" method="post">
            <p>
              <button class="delete-post-button" type="submit" class="delete">Delete Image</button>
           </p>
           <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=post_id>
        </form>
            <br>
            <br>
        </div>
            <?php endforeach; ?>
</div>
</article>
<?php require __DIR__.'/views/footer.php'; ?>
