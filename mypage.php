<?php require __DIR__.'/views/header.php'; ?>

<!-- my page where the user can update settings -->
<article class="my-page">
<h1>My page</h1>


<!-- if the user is logged in create a welcome message -->
    <!-- <?php if (isset($_SESSION['user'])): ?>
       <p><?php echo $_SESSION['user']['first_name']; ?></p>
   <?php endif; ?> -->
  <?php $userId = $_SESSION['user']['user_id']; ?>
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
            <img style="width: 150px; height: 150px;" class="gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
            <br>
            <p><?php echo $post['content'];?></p>
            <br>
            <br>
            <?php endforeach; ?>

</div>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
