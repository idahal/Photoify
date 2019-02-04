<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


// update posts in the database.
if (isset($_SESSION['user'], $_POST['post_id'], $_POST['content'])) {
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $userId = $_SESSION['user']['user_id'];
    $postId = $_POST['post_id'];

    $statement = $pdo->prepare(
        'UPDATE posts
        SET content = :content
        WHERE user_id = :user_id
        AND post_id = :post_id'
    );

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    // binds variables to parameteres for insert statement
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

    $statement->execute();
    redirect('/mypage.php');
}

redirect('/');
