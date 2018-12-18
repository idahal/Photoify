<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['first_name'], $_POST['last_name'],$_POST['email'])) {
    $id = $_SESSION['user']['user_id'];
        $firstName = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
        $lastName = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);



    $statement = $pdo->prepare('UPDATE users
        SET first_name = :first_name, last_name = :last_name, email = :email
        WHERE user_id = :user_id');

    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

    // binds variables to parameteres for insert statement
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    // $statement->bindParam(':password', $password, PDO::PARAM_STR);

    $statement->execute();
    redirect('/mypage.php');

}


// In this file user data is updated
// if (isset($_POST['user_id'],$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
//     $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
//     $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
//     $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
//     $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//
    // $query = 'UPDATE users
    // SET first_name = :first_name, last_name = :last_name, email = :email
    // WHERE user_id = :user_id';
    // $statement = $pdo->prepare($query);
    // $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    // $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
//     $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
//     $statement->bindParam(':email', $email, PDO::PARAM_STR);
//     $statement->bindParam(':password', $password, PDO::PARAM_STR);
//     $statement->execute();
//
//     if (!$statement) {
//         die(var_dump($pdo->errorInfo()));
//     }
// }

// if(!isset($_SESSION['user'])){
//     redirect('/settings.php');
// } else { }
