<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$errors = [];

    if (isset($_POST['first_name'], $_POST['last_name'],$_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        // check if password match if not display error
        if ($_POST['password'] !== $_POST['confirm_password']) {
            $_SESSION['errors']= ['Password does not match, please try again'];
            redirect('/signup.php');
        }
        // checks if passwords match to continue
        if ($_POST['password'] === $_POST['confirm_password']) {
            $firstName = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
            $lastName = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


            $statement = $pdo->prepare('INSERT INTO users(first_name, last_name, email, password)
            VALUES (:first_name, :last_name, :email, :password)');

            if (!$statement)
            {
                die(var_dump($pdo->errorInfo()));
            }

            // binds variables to parameteres for insert statement
            $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
            $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);

            if(!$statement->execute()){
                $_SESSION['errors']= ['Email already exists, please try again'];
                redirect('/signup.php');
                // alert('email already taken.');
            }

            redirect('/');
        }
    }
?>
