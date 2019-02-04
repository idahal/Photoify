<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['first_name'], $_POST['last_name'],$_POST['email'],$_POST['bio'])) {
    $id = $_SESSION['user']['user_id'];
    $firstName = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
    $lastName = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);

    $statement = $pdo->prepare(
        'UPDATE users
        SET first_name = :first_name, last_name = :last_name, email = :email, bio = :bio
        WHERE user_id = :user_id'
        );

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    // binds variables to parameteres for insert statement
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':bio', $bio, PDO::PARAM_STR);

    $statement->execute();

    // select data again to update the changes
    $statement = $pdo->prepare(
        'SELECT *
        FROM users
        WHERE email = :email'
    );
    // bind the parameter to the if(isset) so it's exists
    $statement->bindParam(':email', $email);
    // execute the code
    $statement->execute();
    // fetch the data from the database, fetch_assic get a clean output
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $user;
    redirect('/mypage.php');
}
