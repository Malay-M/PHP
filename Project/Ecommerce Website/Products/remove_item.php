<?php
    include('../Connect/connect.php');


    $id = $_GET['id'];


    $query = "DELETE FROM cart_details WHERE product_id=$id";
    $sql = mysqli_query($conn, $query);

    header('Location:cart.php');
?>