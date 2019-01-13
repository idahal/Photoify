
<article class="homepage">
    <div class="top-gallery-page">
        <?php require __DIR__.'/views/intro.php'; ?>
        <a href="upload_photo.php">Share your photos</a>
    </div>

<?php
    // join users column with posts column. Print post, name and comment.
    $statement = $pdo->prepare(
        'SELECT a.post, a.content, a.post_id, c.first_name, c.last_name, c.profile_pic, c.user_id, count(l.post_like)
        AS "like"
        FROM posts a
        LEFT JOIN users c ON a.user_id=c.user_id
		LEFT JOIN likes l ON a.post_id=l.post_id
		GROUP BY a.post_id
		ORDER BY a.date DESC;');
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

 <!-- print post, name and comment. -->
    <div class="gallery-page">
        <h1>The gallery</h1>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <div class="image-names">
                    <img class="profile-pic-small" src="image/profile/<?php echo $post['profile_pic'];?>" alt="avatar">
                    <!-- link to visit different user depanding of the user_id -->
                    <a href="visit_user.php?user_id=<?php echo $post['user_id'];?>">
                        <p><?php echo $post['first_name'].' '. $post['last_name'];?></p>
                    </a>
            </div><!-- end images-name -->
            <img class="gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
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
            $alreadyLiked = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
            <!-- change button if the post is liked or not by the user -->
        <?php if($alreadyLiked):?>
            <form class="like-post" action="app/likes/delete.php" method="post">
                <button type="submit" name="like" class="like">
                    <span style="color:red;">
                        <i class="fas fa-heart fa-lg"></i>
                    </span>
                </button>
                    <p>Liked by: <?php echo $post['like']; ?></p>
                    <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=post_id>
            </form>
    <?php else: ?>
            <form class="like-post" action="app/likes/like.php" method="post">
                <button type="submit" name="like" class="like">
                    <i class="far fa-heart fa-lg"></i>
                </button>
                    <p>Liked by: <?php echo $post['like']; ?></p>
                    <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=post_id>
            </form>
    <?php endif; ?>
            <br><br>
        </div><!-- end post -->
    <?php endforeach; ?>
    </div><!-- end gallery-page -->
</article>
