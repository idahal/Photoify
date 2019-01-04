
<article class="homepage">

    <div class="top-gallery-page">
<!-- if the user is logged in show profile pic -->
        <?php if (isset($_SESSION['user'])): ?>
            <img class="profile-pic-home" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
        <?php endif; ?>

        <!-- upload photo -->
        <div class="upload-btn-wrapper">
            <form action="app/posts/store.php" method="post" enctype="multipart/form-data">
                 <p><label for="images">Upload image</label></p>
                 <input class="btn" type="file"  value="upload file" name="post" id="images" accept=".png, .jpeg, .jpg" multiple required>
                    <div class="form-group">
                        <p>
                            <input type="text" name="content" placeholder="Add text to your photo">
                        </p>
                    </div>
                    <button class="upload-photo" type="submit">Upload</button>
             </form>
         </div><br>
     </div>
<?php
    // join users column with posts column. Print post, name and comment.
    $statement = $pdo->prepare(
        'SELECT a.post, a.content, a.post_id, c.first_name, c.last_name, c.profile_pic, count(l.post_like)
        AS "like" FROM posts a
        LEFT JOIN users c ON a.user_id=c.user_id
		LEFT JOIN likes l ON a.post_id=l.post_id
		GROUP BY a.post_id
		ORDER BY a.date DESC;');
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
 <!-- print post, name and comment. -->
 <h1>The gallery</h1>
 <div class="gallery-page">
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <div class="image-names">
                <img class="profile-pic-small" src="image/profile/<?php echo $post['profile_pic'];?>" alt="avatar">
                <p><?php echo $post['first_name'].' '. $post['last_name'];?></p>
            </div>
        <img style="width: 300px; height: 300px;" class="gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
        <p><b><?php echo $post['first_name'].' '. $post['last_name']?></b><?php echo ': '. $post['content'];?></p>
<?php
// select likes from database
        $statement = $pdo->prepare(
            'SELECT * FROM likes
            WHERE post_id = :post_id
            AND user_id = :user_id');
            $statement->bindParam(':post_id', $post['post_id'], PDO::PARAM_INT);
            $statement->bindParam(':user_id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
            $statement->execute();
            $alreadyLiked = $statement->fetch(PDO::FETCH_ASSOC); ?>
        <form class="like-post" action="app/likes/like.php" method="post">
            <!-- change button if the post is liked by the user or not -->
            <p><?php if($alreadyLiked):?>
                <button type="submit" name="like" class="like">LIKED</button>
           <?php else: ?>
               <button type="submit" name="like" class="like">LIKE</button>
           <?php endif; ?>
           <br>
            <p>Liked by: <?php echo $post['like']; ?></p>
           </p>
            <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=post_id>
        </form>
        <!-- <a href="app/likes/like.php?type=like&post_id=<?php echo $post['post_id'];?>">0</a> -->
        <br>
        <br>
    </div>
    <!-- end post -->
        <?php endforeach; ?>
    </div>
    <!-- end gallery-page -->
</article>
