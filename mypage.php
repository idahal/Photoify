<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<!-- my page where the user can update settings -->
<article class="my-page">
  <?php $userId = $_SESSION['user']['user_id']; ?>
<div class="top-mypage">
 <!-- upload avatar -->
    <div class="avatar">
        <img class="profile-pic-mypage" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
        <a href="/avatar.php"><button class="add-button">+</button></a>
    </div><!-- upload avatar end -->
    <div class="bio"><!-- update bio -->
        <h3><?php echo $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name']; ?></h3>
        <p><b>Biography:</b> <?php echo $_SESSION['user']['bio']; ?></</p>
        <br><a href="myaccount.php">Edit profile</a>
    </div><!-- update bio end -->
</div><!-- upload my page end -->
<br><br>
<h1>My page</h1>
<div class="gallery-mypage">
<!-- select all post from the user  -->
    <?php
    $posts = myPosts();
            // $statement = $pdo->prepare("SELECT * FROM posts WHERE user_id =  '$userId';");
            // $statement->execute();
            // $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
     ?>
        <?php foreach ($posts as $post): ?>
            <div class="posts"><!-- show users post -->
                <a href="edit-post.php?post_id=<?php echo $post['post_id'];?>">
                    <img class="my-gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
                </a>
            </div><!-- show users post end-->
            <?php endforeach; ?>
</div><!--gallery-mypage end-->
</article>
<?php require __DIR__.'/views/footer.php'; ?>
