<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}


/**
 * function to get the post, user and likes from database
 *
 *
 */
function postFeed()
{
    $config = require __DIR__.'/config.php';
    $pdo = new PDO($config['database_path']);
    $statement = $pdo->prepare(
        'SELECT a.post, a.content, a.post_id, c.first_name, c.last_name, c.profile_pic, c.user_id, count(l.post_like)
        AS "like"
        FROM posts a
        LEFT JOIN users c ON a.user_id=c.user_id
		LEFT JOIN likes l ON a.post_id=l.post_id
		GROUP BY a.post_id
		ORDER BY a.date DESC;'
    );
    $statement->execute();
    $postsFeed = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $postsFeed;
}

/**
 * function to get the post user want to edit/imap_delete
 *
 *
 *
 */
function editPosts()
{
    $config = require __DIR__.'/config.php';
    $pdo = new PDO($config['database_path']);
    $editPost = filter_var($_GET['post_id'], FILTER_SANITIZE_STRING);
    $statement = $pdo->prepare(
        "SELECT *
        FROM posts
        WHERE post_id = $editPost"
    );
    // execute the code
    $statement->execute();
    // fecth the data from the database, fetch_assic get a clean output
    $onePost = $statement->fetch(PDO::FETCH_ASSOC);
    return $onePost;
}

/**
 * function to print user own photos on my page
 *
 *
 */
function myPosts()
{
    $config = require __DIR__.'/config.php';
    $pdo = new PDO($config['database_path']);
    $userId = $_SESSION['user']['user_id'];
    $statement = $pdo->prepare(
        "SELECT *
        FROM posts
        WHERE user_id =  '$userId'
        ORDER BY date DESC;"
    );
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

/**
 * function to show different users photos
 *
 *
 */
function oneUser()
{
    $config = require __DIR__.'/config.php';
    $pdo = new PDO($config['database_path']);
    $visitUser = filter_var($_GET['user_id'], FILTER_SANITIZE_STRING);
    // prepare the code to the database get the users name and profile pic
    $statement = $pdo->prepare(
        "SELECT *
        FROM users
        WHERE user_id = $visitUser"
    );
    // execute the code
    $statement->execute();
    // fecth the data from the database, fetch_assic get a clean output
    $oneUser = $statement->fetch(PDO::FETCH_ASSOC);
    return $oneUser;
}

/**
 * get the users posts and content
 *
 *
 */
    function visitUser()
    {
        $config = require __DIR__.'/config.php';
        $pdo = new PDO($config['database_path']);
        $visitUser = filter_var($_GET['user_id'], FILTER_SANITIZE_STRING);
        $newstatement = $pdo->prepare(
            "SELECT *
            FROM posts
            WHERE user_id = $visitUser
            ORDER BY date DESC"
        );
        // execute the code
        $newstatement->execute();
        // fecth the data from the database, fetch_assic get a clean output
        $postsUser = $newstatement->fetchAll(PDO::FETCH_ASSOC);
        return $postsUser;
    }


// trying to get a function to show if the post is liked or not
// function selectLikes() {
//     // select likes from database
//     $config = require __DIR__.'/config.php';
//     $pdo = new PDO($config['database_path']);
//     $statement = $pdo->prepare(
//         'SELECT * FROM likes
//         WHERE post_id = :post_id
//         AND user_id = :user_id');
//         $statement->bindParam(':post_id', $post['post_id'], PDO::PARAM_INT);
//         $statement->bindParam(':user_id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
//         $statement->execute();
//         $alreadyLiked = $statement->fetch(PDO::FETCH_ASSOC);
//         return $alreadyLiked;
//     }
