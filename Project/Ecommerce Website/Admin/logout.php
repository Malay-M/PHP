<?php

    session_start();
    unset($_SESSION['admin_username']);
    print_r($_SESSION);
    header('Location:../index.php');

?>