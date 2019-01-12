<?php require __DIR__.'/views/header.php'; ?>

<!-- if user login show visit_user page -->
<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<?php if (isset($_GET['post_id'])): ?> <?php
    $editPost = filter_var($_GET['post_id'],FILTER_SANITIZE_STRING);
    // prepare the code to the database get the users name and profile pic
    $statement = $pdo->prepare("SELECT * FROM posts WHERE post_id = $editPost");
    // execute the code
    $statement->execute();
    // fecth the data from the database, fetch_assic get a clean output
    $onePost = $statement->fetch(PDO::FETCH_ASSOC); ?>
    <?php endif; ?>
<div class="edit-post-page">
    <h1>Edit your photo</h1>
        <img class="one-post" src="image/post/<?php echo $onePost['post'];?>" alt="photoify">
        <br>
        <form class="edit-post" action="app/posts/update.php" method="post">
            <p>
                <input type="text" value="<?php echo $onePost['content'];?>" name="content" id=content>
            </p>
    <div class="button-div">
            <input type="hidden" value="<?php echo $onePost['post_id'];?>" name="post_id" id=user_id>
            <button type="submit" class="save-button">Update post</button>
        </form>
        <form class="delete-post" action="app/posts/delete.php" method="post">
                <button class="delete-post-button" type="submit" class="delete">Delete post</button>
                <input type="hidden" value="<?php echo $onePost['post_id'];?>" name="post_id" id=post_id>
            </div>
        </form>
    </div>
</article>
<?php require __DIR__.'/views/footer.php'; ?>
