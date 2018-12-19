<?php
declare(strict_types=1);


require __DIR__.'/../autoload.php';
//check if user post data
if(isset($_POST['email'], $_POST['password'])) {

// check if email is ringt value, no weird characters
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

// prepare the code to the database
$statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
// bind the parameter to the if(isset) so it's exists
$statement->bindParam(':email', $email);
// execute the code
$statement->execute();
// fecth the data from the database, fetch_assic get a clean output
$user = $statement->fetch(PDO::FETCH_ASSOC);
 print_r($user);
// if the email don`t exits in the database
if (!$user) {
    $errors[]= 'User do not exists';
    redirect('/');
}
if($email === '' || $password === ''){
    $errors[]= 'You must enter the fields';
};
if (password_verify($_POST['password'], $user['password'])){
    $_SESSION['user'] = [
    'user_id' =>  $user['user_id'],
    'first_name' => $user['first_name'],
    'last_name' => $user['last_name'],
    'profile_pic' => $user['profile_pic'],
    'email'=> $user['email'],
    'bio' => $user['bio'],
    'post_id' => $user['post_id'],
    'post' => $user['post'],
    'date' => $user['date'],
    'content' => $user['content'],
    ];
    redirect('/');
} else {
    redirect('/');
}
}

require __DIR__.'/../autoload.php';
