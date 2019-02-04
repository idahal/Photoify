<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$errors = [];

//check if the new password match
if (isset($_POST['password'], $_POST['new_password'], $_POST['confirm_password'])) {
    $user = $_SESSION['user'];
    $statement = $pdo->prepare(
        'SELECT password
        FROM users
        WHERE user_id = :user_id'
    );
    $statement->bindParam(':user_id', $user['user_id'], PDO::PARAM_INT);
    $statement->execute();
    // fecth the data from the database, fetch_assic get a clean output
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $user =($user['password']);
    // die(var_dump($user));
    //
    //
    if (!password_verify($_POST['password'], $user)) {
        $_SESSION['errors'] = ['Your current password is incorrect. Try again'];
        redirect('/myaccount.php');
    }

    if ($_POST['new_password'] !== $_POST['confirm_password']) {
        $_SESSION['errors']= ['Password\'s does not match. Try again'];
        redirect('/myaccount.php');
    }

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        redirect('/myaccount.php');
    }


    if (password_verify($_POST['password'], $user)) {
        if ($_POST['new_password'] === $_POST['confirm_password']) {
            $id = $_SESSION['user']['user_id'];
            $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $updateStatement = $pdo->prepare(
            'UPDATE users
            SET password = :new_password
            WHERE user_id = :user_id'
        );

            if (!$updateStatement) {
                die(var_dump($pdo->errorInfo()));
            }

            // binds variables to parameteres for insert statement
            $updateStatement->bindParam(':new_password', $newPassword, PDO::PARAM_STR);
            $updateStatement->bindParam(':user_id', $id, PDO::PARAM_INT);
            // execute the code
            $updateStatement->execute();
            $_SESSION['user']['password'] = $newPassword;
            redirect('/mypage.php');
        }
    }
}



// <?php
// declare(strict_types=1);
// require __DIR__.'/../autoload.php';
// //check if the new password match
// if (isset($_POST['new_password'], $_POST['confirm_password'])) {
//         $id = $_SESSION['user']['user_id'];
//         $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        // $statement = $pdo->prepare('UPDATE users SET password = :password WHERE user_id = :user_id');
        // if (!$statement)
        // {
        //     die(var_dump($pdo->errorInfo()));
        // }
        // binds variables to parameteres for insert statement
    //     $statement->bindParam(':password', $newPassword, PDO::PARAM_STR);
    //     $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    //     $statement->execute();
    //     redirect('/mypage.php');
    // }
