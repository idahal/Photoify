<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

    if (isset($_POST['first_name'], $_POST['last_name'],$_POST['email'], $_POST['username'], $_POST['password'])) {
        // Checks if passwords match
        // if ($_POST['password'] === $_POST['confirmPassword']) {
            $firstName = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
            $lastName = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $userName = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


            $statement = $pdo->prepare('INSERT INTO users(first_name, last_name, username, email, password)
            VALUES (:first_name, :last_name, :username, :email, :password)');

            if (!$statement)
            {
                die(var_dump($pdo->errorInfo()));
            }

            // binds variables to parameteres for insert statement
            $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
            $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
            $statement->bindParam(':username', $userName, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);

            $statement->execute();
        }

?>
