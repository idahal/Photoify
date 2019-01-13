<!-- <?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';



    if (isset($_POST['bio'])) {
        $id = $_SESSION['user']['user_id'];
        $bio = filter_var($_POST['bio'],FILTER_SANITIZE_STRING);

        $statement = $pdo->prepare('UPDATE users SET bio = :bio WHERE user_id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }


        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

        $statement->execute();
        redirect('/mypage.php');

} -->
