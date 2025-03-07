<?php
    session_start();

    echo "logout page";
    unset($_SESSION['name']);
    unset($_SESSION['username']);

    setcookie("username", $_COOKIE['username'], time()- 60 * 60 * 24 * 7, "/");
    setcookie("name", $_COOKIE['name'], time()- 60 * 60 * 24 * 7, "/");
    header('Location:../index.php');
    die();

?>