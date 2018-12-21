<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';


if (isset($_SESSION['user']['user_id'])) {
    $userId = (int) $_SESSION['user']['user_id'];

$statement = $pdo->prepare('DELETE FROM users WHERE user_id = :user_id');

if (!$statement){
   die(var_dump($pdo->errorInfo()));
 }

$statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
$statement->execute();

$statement = $pdo->prepare('DELETE FROM posts WHERE user_id = :user_id');
$statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
$statement->execute();
}
redirect('/app/users/logout.php');
