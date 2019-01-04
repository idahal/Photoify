<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['post_id'])) {
    $id = $_SESSION['user']['user_id'];
    $postId = $_POST['post_id'];

// Check if like exist in database
 $statement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
 $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
 $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
 $statement->execute();
 $alreadyLiked = $statement->fetch(PDO::FETCH_ASSOC);

 // if alreadyLiked is false put the like in database
if (!$alreadyLiked) {
    $statement = $pdo->prepare(
   'INSERT INTO likes (post_id, user_id)
    VALUES (:post_id, :user_id);');

    if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        // binds variables to parameteres for insert statement
            $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
            $statement->execute();

        }
}
redirect('/');
