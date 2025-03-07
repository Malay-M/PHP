<?php

    session_start();

    include('../Connect/connect.php');



    $query = "SELECT * FROM cart_details";
    $sql = mysqli_query($conn, $query);
    $num = mysqli_num_rows($sql);

    if($num > 0) {

        if(isset($_POST['submit'])) {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_COOKIE['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $country = $_POST['country'];
            $state = $_POST['states'];
            $pincode = $_POST['pincode'];
            $pay = $_POST['pay'];
            $invoice = rand(1000000000, 9999999999);

            $amount = $_SESSION['total_price'];
            $items = 0;

            $_SESSION['invoice'] = $invoice;

            $order_status = "Pending";
        }

        $query = "INSERT INTO order_address (invoice_number, firstName, lastName, username, email, phone, address, country, state, pincode, payment_method) VALUES ('$invoice', '$fname', '$lname', '$username', '$email', '$phone', '$address', '$country', '$state', '$pincode', '$pay')";
        $sql = mysqli_query($conn, $query);


        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
        $sql = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($sql)) {

            $items = $items + $row['quantity'];

            $insert = "INSERT INTO orders (invoice_number, product_id, quantity) VALUES ('$invoice', '".$row['product_id']."', ".$row['quantity'].")";
            mysqli_query($conn, $insert);
        }


        $query = "INSERT INTO user_invoice (username, invoice_number, amount, total_items, order_status, payment_method) VALUES ('$username', '$invoice', $amount, $items, '$order_status','$pay')";
        $sql = mysqli_query($conn, $query);



        if($pay == "online") {
            $_SESSION['payment_method'] = "Pay Online";
            header('Location:placeOrderOnline.php');
        } else if ($pay == "offline") {
            $_SESSION['payment_method'] = "Cash On Delivery";
            header('Location:placeOrder.php');
        } else {
            header('Location:checkout.php');
        }

        
    }





?>