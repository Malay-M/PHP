<?php
include('../Connect/connect.php');

if(isset($_POST['update'])) {
    $inovice = $_POST['invoice']; 
    $status = $_POST['status'];
    

    $query = "UPDATE `user_invoice` SET `order_status` = '$status' WHERE `user_invoice`.`invoice_number` = '$inovice'";
    $sql = mysqli_query($conn, $query);
}

header('Location:dashboard.php');

?>