
<article class="homepage">
    <!-- <h1><?php echo $config['title']; ?></h1> -->
    <h1>This is the gallery page.</h1>


<!-- if the user is logged in create a welcome message -->
    <?php if (isset($_SESSION['user'])): ?>
       <p>Welcome, <?php echo $_SESSION['user']['first_name']; ?>!</p>
   <?php endif; ?>
<br><br><br>

<?php $statement = $pdo->prepare('SELECT * FROM posts;');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// try join//
// $statement = $pdo->prepare('SELECT * FROM `posts` AS p INNER JOIN `users` AS u ON u.user_id = p.user_id;');
// $statement->execute();
// $postnames = $statement->fetchAll(PDO::FETCH_ASSOC);
// foreach ($postnames as $name) {
// }
?>
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
    <?php foreach ($posts as $post): ?>
        <br>
    <img style="width: 150px; height: 150px;" class="gallery-pics" src="image/post/<?php echo $post['post'];?>" alt="photoify">
    <br>
    <p><?php echo $post['content']?></p>
    <?php endforeach; ?>
    <br>
</div>
</article>


<!-- // for loop/foreach
//fetchAll -->
