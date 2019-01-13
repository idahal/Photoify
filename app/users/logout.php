<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// remove the user session variable and redirect the user back to the homepage.
unset($_SESSION['user']);
redirect('/');
