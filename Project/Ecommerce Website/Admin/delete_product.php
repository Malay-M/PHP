<?php
    include('../Connect/connect.php');

    $id = $_GET['id'];
    
    $query = "DELETE FROM products WHERE id=".$id;
    $sql = mysqli_query($conn, $query);

    header('Location:dashboard.php');
?>