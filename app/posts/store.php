<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';



$errors = [];

// In this file we store/insert new posts in the database.
if (isset($_POST['content'],$_FILES['post'])) {
    $post = $_FILES['post'];
    $userId = $_SESSION['user']['user_id'];
    $content = trim(filter_var($_POST['content'],FILTER_SANITIZE_STRING));
    $date = date('Y-m-d H:i:s');


    if(!in_array($post['type'], ['image/png', 'image/jpeg'])) {
        $errors[] = 'error';
    }


    if($post['size'] > 4194304) {
        $errors[] = 'to big file';
    }

    $fileExt = explode('.', $post['name']);
    $fileActualExt = strtolower(end($fileExt));

    if(count($errors) === 0) {
        $fileName = time().'-'.$post['name'];
        $destination = __DIR__.'/../../image/post/'.$fileName;

        move_uploaded_file($post['tmp_name'], $destination);

        $statement = $pdo->prepare(
       'INSERT INTO posts (post, date, content, user_id)
        VALUES (:post, :date, :content, :user_id);');

     $statement->bindParam(':post', $fileName, PDO::PARAM_STR);
     $statement->bindParam(':date', $date, PDO::PARAM_STR);
     $statement->bindParam(':content', $content, PDO::PARAM_STR);
     $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);

     $statement->execute();
     redirect('/');
}
}
