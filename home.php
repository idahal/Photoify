
<article class="homepage">
    <!-- <h1><?php echo $config['title']; ?></h1> -->
    <h1>This is the gallery page.</h1>


<!-- if the user is logged in create a welcome message -->
    <?php if (isset($_SESSION['user'])): ?>
       <img class="profile-pic" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
       <p> <?php echo $_SESSION['user']['first_name']. ' '.$_SESSION['user']['last_name']; ?></p>
   <?php endif; ?>
<br><br><br>


<div class="gallery-page">
    <form action="app/posts/store.php" method="post" enctype="multipart/form-data">
             <div>
                 <p><label for="images">Upload image</label></p>
                 <input type="file"  value="upload file" name="post" id="images" accept=".png, .jpeg, .jpg" multiple required>
             </div><br>
             <div class="form-group">
                 <p>
                     <label>Add text</label><br>
                     <input type="text" name="content">
                 </p>
             </div>
             <button type="submit">Upload</button>
         </form>
         <br>

<?php
// join users column with posts column. Print post, name and comment.
    $statement = $pdo->prepare('SELECT a.post, a.content, a.post_id, c.first_name, c.last_name FROM posts a
        LEFT JOIN users c ON a.user_id=c.user_id;');
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        // die(var_dump($posts));
 ?>
 <!-- Print post, name and comment. -->
    <?php foreach ($posts as $post): ?>
        <p><?php echo $post['first_name'].' '. $post['last_name'];?></p>
        <img style="width: 150px; height: 150px;" class="gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
        <br>

        <form class="like-post" action="app/likes/like.php" method="post">
            <p>
              <button type="submit" name="like" class="like">LIKE</button>
              <p>Liked by: 0</p>
           </p>
           <input type="hidden" value="<?php echo $post['post_id'];?>" name="post_id" id=post_id>
        </form>
        <!-- <a href="app/likes/like.php?type=like&post_id=<?php echo $post['post_id'];?>">0</a> -->
        <p><?php echo $post['content'];?></p>
        <br>
        <br>
        <?php endforeach; ?>
    </div>
</article>
