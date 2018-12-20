<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

    if (isset($_POST['first_name'], $_POST['last_name'],$_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        // Checks if passwords match
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

            $statement->execute();
            $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            // bind the parameter to the if(isset) so it's exists
            $statement->bindParam(':email', $email);
            // execute the code
            $statement->execute();
            // fecth the data from the database, fetch_assic get a clean output
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $user;
            redirect('/');
        }
    }


?>
