<?php require __DIR__.'/views/header.php'; ?>

<!-- if user login show visit_user page -->
<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<?php if (isset($_GET['user_id'])): ?> <?php
    $visitUser = filter_var($_GET['user_id'],FILTER_SANITIZE_STRING);
    // prepare the code to the database get the users name and profile pic
    $statement = $pdo->prepare("SELECT * FROM users WHERE user_id = $visitUser");
    // execute the code
    $statement->execute();
    // fecth the data from the database, fetch_assic get a clean output
    $oneUser = $statement->fetch(PDO::FETCH_ASSOC); ?>

    <!-- prepare the code to the database get the users posts and content -->
    <?php $newstatement = $pdo->prepare("SELECT * FROM posts WHERE user_id = $visitUser");
    // execute the code
    $newstatement->execute();
    // fecth the data from the database, fetch_assic get a clean output
    $postsUser = $newstatement->fetchAll(PDO::FETCH_ASSOC); ?>
<?php endif; ?>

<!-- show users photos -->
<article class="user-page">
    <div class="top-user-page">
    <div class="user-avatar">
        <img class="profile-pic-user" src="image/profile/<?php echo $oneUser['profile_pic'];?>" alt="avatar">
        <h3><?php echo $oneUser['first_name'].' '.$oneUser['last_name']; ?></h3>
    </div><!-- show users photos end -->
    <!-- show users bio -->
    <div class="user-bio">
        <p><b>Biography:</b>
            <?php echo $oneUser['bio']; ?></</p>
    </div><!-- show users bio end-->
</div><!--end top-user-page -->
<h1><?php echo $oneUser['first_name']?>s photos</h1>
<!-- show users post -->
    <div class="gallery-user-page">
            <?php foreach ($postsUser as $post): ?>
            <div class="posts">
                <img class="user-gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
                <br>
            </div>
            <?php endforeach; ?>
    </div><!-- show users post end-->
</article>
<?php require __DIR__.'/views/footer.php'; ?>
