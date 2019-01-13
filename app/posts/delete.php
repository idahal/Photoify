<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//  delete posts in the database.
if (isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];

    $statement = $pdo->prepare(
        'DELETE FROM posts
        WHERE post_id = :post_id');

    if (!$statement){
       die(var_dump($pdo->errorInfo()));
     }

     // binds variables to parameteres for insert statement
     $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

     $statement->execute();
     redirect('/mypage.php');
     }

redirect('/');
