<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$errors = [];

//check if user post data
if (isset($_POST['email'], $_POST['password'])) {
    // check if email is ringt value, no weird characters
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password =  $_POST['password'];
    if ($email === '' || $password === '') {
        $errors[]= 'You must enter the fields';
    };
    // prepare the code to the database
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    // bind the parameter to the if(isset) so it's exists
    $statement->bindParam(':email', $email);
    // execute the code
    $statement->execute();
    // fecth the data from the database, fetch_assic get a clean output
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    // print_r($user);
    // if the email don`t exits in the database
    if (!$user) {
        $_SESSION['errors']= ['The account does not exist. Please, enter another account'];
        redirect('/');
    }

    if (!password_verify($_POST['password'], $user['password'])) {
        $_SESSION['errors'] = ['Your password is incorrect. Try again'];
        redirect('/');
    }

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        redirect('/');
    }

    if (password_verify($_POST['password'], $user['password'])) {
        unset($user['password']);
        $_SESSION['user'] = $user;
        redirect('/');
    }
}
