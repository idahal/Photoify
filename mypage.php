<?php require __DIR__.'/views/header.php'; ?>

<!-- if user login show mypage -->
<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<!-- my page where the user can update settings -->
<article class="my-page">
<!-- if the user is logged in create a welcome message -->
  <?php $userId = $_SESSION['user']['user_id']; ?>
<div class="top-mypage">
 <!-- upload avatar -->
<div class="avatar">
    <img class="profile-pic-mypage" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
     <a href="/avatar.php"><button class="add-button">+</button></a>
</div><!-- upload avatar end -->
    <div class="bio">
        <h3><?php echo $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name']; ?></h3>
        <p><b>Biography:</b> <?php echo $_SESSION['user']['bio']; ?></</p>
        <br><a href="myaccount.php">Edit profile</a>
    </div>
</div>
<br>
<br>
<h1>My page</h1>
<div class="gallery-mypage">
    <?php
            $statement = $pdo->prepare("SELECT * FROM posts WHERE user_id =  '$userId';");
            $statement->execute();
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            // die(var_dump($posts));
     ?>
        <?php foreach ($posts as $post): ?>
            <div class="posts">

            <img class="my-gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
            <br>
                <form class="edit-post" action="app/posts/update.php" method="post">
                    <p>
                        <input type="text" value="<?php echo $post['content'];?>" name="content" id=content>
                    </p>
            <div class="button-div">
                        <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=user_id>
                    <button type="submit" class="save-button">Update post</button>
                    </form>
                <form class="delete-post" action="app/posts/delete.php" method="post">
                    <button class="delete-post-button" type="submit" class="delete">Delete post</button>
                    <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=post_id>
            </div>
        </form>
            <br>
            <br>
        </div>
            <?php endforeach; ?>
</div>
</article>
<?php require __DIR__.'/views/footer.php'; ?>
