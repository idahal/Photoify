<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$userId = $_SESSION['user']['user_id'];

$errors = [];

//if the file not allowed type show error
if (isset($_FILES['profile_pic'])) {
    $profilePic = $_FILES['profile_pic'];
    if (!in_array($profilePic['type'], ['image/png', 'image/jpeg', 'image/jpg'])) {
        $errors[] = 'The file type is wrong, try again.';
    }

    // check file size
    if ($profilePic['size'] > 4194304) {
        $errors[] = 'The file is to big, try again.';
    }

    // split file in filnmae and filetype
    $fileExt = explode('.', $profilePic['name']);
    $fileActualExt = strtolower(end($fileExt));

    // if erros is 0 move file
    if (count($errors) === 0) {
        $fileName = "profile_$userId.$fileActualExt";
        $destination = __DIR__.'/../../image/profile/'.$fileName;

        // create variabel for new file name
        move_uploaded_file($profilePic['tmp_name'], $destination);
        $_SESSION['user']['profile_pic'] = $fileName;

        $sql = "UPDATE users
            SET profile_pic = '$fileName'
            WHERE user_id = '$userId';";

        $statement = $pdo->query($sql);


        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        redirect('/avatar.php');
    } else {
        $_SESSION['errors'] = $errors;
        redirect('/avatar.php');
    }
}
