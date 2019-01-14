<?php
require __DIR__.'/../app/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/main.css">
    <link rel="stylesheet" href="assets/styles/start.css">
    <link rel="stylesheet" href="assets/styles/signup.css">
    <link rel="stylesheet" href="assets/styles/home.css">
    <link rel="stylesheet" href="assets/styles/upload_photo.css">
    <link rel="stylesheet" href="assets/styles/intro.css">
    <link rel="stylesheet" href="assets/styles/mypage.css">
    <link rel="stylesheet" href="assets/styles/visit_user.css">
    <link rel="stylesheet" href="assets/styles/settings.css">
</head>
<body>
    <div class="container">
    <?php require __DIR__.'/navigation.php'; ?>

    <!-- display errors -->
    <?php if (isset($_SESSION['errors'])):
        $errors = $_SESSION['errors'];
        foreach ($errors as $error):
            echo $error;
        endforeach;
    endif; ?>
    <?php unset($_SESSION['errors'])?>
