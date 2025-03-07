<?php

session_start();

include('../Connect/connect.php');

print_r($_POST);
print_r($_GET);

if (isset($_POST['amt']) && isset($_POST['name'])) {
    $amt = $_POST['amt'];
    $name = $_POST['name'];
    $email = $_SESSION['email'];
    $invoice = $_SESSION['invoice'];
    $payment_status = "pending";
    $username = $_COOKIE['username'];

    $added_on = date('Y-m-d h:i:s');
    mysqli_query($conn, "INSERT INTO `payments` (`id`, `username`, `name`, `email`, `invoice_number`, `amount`, `payment_status`, `add_on`) VALUES (NULL, '$username', '$name', '$email', '$invoice', '$amt', '$payment_status', '$added_on');");
    $_SESSION['OID'] = mysqli_insert_id($conn);
}


if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    mysqli_query($conn, "update payments set payment_status='complete',payment_id='$payment_id' where id='" . $_SESSION['OID'] . "'");
}


?>