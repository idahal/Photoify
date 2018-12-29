<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';

//check if the new password match
if (isset($_POST['new_password'], $_POST['confirm_password'])) {
        $id = $_SESSION['user']['user_id'];
        $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

            // code...
        $statement = $pdo->prepare('UPDATE users SET password = :password WHERE user_id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        // binds variables to parameteres for insert statement
        $statement->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

        $statement->execute();
        redirect('/mypage.php');

    }
// }
// }
