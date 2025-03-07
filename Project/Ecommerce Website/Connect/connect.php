<?php 

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "QuickOrder";

    $conn = mysqli_connect($server, $username, $password);

    $dbcreate = "CREATE DATABASE IF NOT EXISTS ".$dbname;

    $sql = mysqli_query($conn, $dbcreate);

    $conn = mysqli_connect($server, $username, $password, $dbname);


?>
