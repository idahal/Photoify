<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['like'], $_POST['post_id'])) {
    $id = $_SESSION['user']['user_id'];
    $like = $_POST['like'];
    $userId = $_POST['post_id'];

    $statement = $pdo->prepare('UPDATE likes SET like = :like WHERE post_id = :post_id AND user_id = :user_id');
    if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        // binds variables to parameteres for insert statement
            $statement->bindParam(':like', $like, PDO::PARAM_INT);
            $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);

            $statement->execute();
            redirect('/');

}

// if (isset($_SESSION['user'], $_GET['type'], $_GET['post_id'])) {
//     $userId = $_SESSION['user']['user_id'];
//     $like = $_GET['type'];
//     $postId = $_GET['post_id'];
//
//     $statement = $pdo->prepare('UPDATE likes SET like = :like WHERE user_id = :user_id AND post_id = :post_id');
//     if (!$statement)
//     {
//         die(var_dump($pdo->errorInfo()));
//     }
//
//     // binds variables to parameteres for insert statement
//     $statement->bindParam(':like', $like, PDO::PARAM_INT);
//     $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
//     $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
//
//     $statement->execute();
//     redirect('/home.php');
//
// }
