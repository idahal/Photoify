<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//check if the user is login
if(!isset($_SESSION['user'])){ $errors[] = "You can only delete your own posts!";
    $_SESSION['errors'] = $errors;redirect("/"); }
    else { $user = $_SESSION['user'];}

//  delete posts in the database.
if (!isset($_POST['post_id'])) { $errors[] = "You can only delete your own posts!";
    $_SESSION['errors'] = $errors;redirect("/"); }
    else {
    $id = $_SESSION['user']['user_id'];
    $postId = $_POST['post_id'];

    $statement = $pdo->prepare(
        'DELETE FROM posts
        WHERE post_id = :post_id
        AND user_id = :user_id');


     // binds variables to parameteres for insert statement
     $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
     $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
     $statement->execute();

     //delete likes one the deleted post in database
     $statement = $pdo->prepare(
         'DELETE FROM likes
         WHERE post_id = :post_id
         AND user_id = :user_id');

     $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
     $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
     $statement->execute();

     if (!$statement){
         die(var_dump($pdo->errorInfo()));
     }
     redirect('/mypage.php');
    }

redirect('/');
