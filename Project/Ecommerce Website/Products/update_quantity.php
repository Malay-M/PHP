<?php
    include('../Connect/connect.php');


    $id = $_GET['id'];
    $q = $_GET['q'];


    $query = "UPDATE cart_details SET quantity=$q WHERE product_id=$id";
    $sql = mysqli_query($conn, $query);

    header('Location:cart.php');
?>