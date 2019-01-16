<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//check if the user is login
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

if (isset($_POST['post_id'])) {
    $id = $_SESSION['user']['user_id'];
    $postId = $_POST['post_id'];

// dislike a post
 $statement = $pdo->prepare(
     'DELETE FROM likes
     WHERE post_id = :post_id
     AND user_id = :user_id');

 if (!$statement){
    die(var_dump($pdo->errorInfo()));
  }

 $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
 $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
 $statement->execute();
}

redirect('/');
