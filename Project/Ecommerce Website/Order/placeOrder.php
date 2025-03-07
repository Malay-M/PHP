<?php
session_start();

// print_r($_SESSION);


include("../Connect/connect.php");

$username = $_COOKIE['username'];

$sum = 0;

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$query = "SELECT * FROM cart_details, products WHERE products.id=cart_details.product_id AND ip_address='".$ip."'";
$sql = mysqli_query($conn, $query);

$item = "Items Purchased: ";

$num = mysqli_num_rows($sql);

if($num > 0) {
    while($row = mysqli_fetch_assoc($sql)) {
         $item = $item . $row['title'] . "(".$row['quantity']."), ";
         $sum = $sum + ($row['price'] * $row['quantity']);
    }
}


$item =  substr($item, 0, -2);
    


$query = "SELECT * FROM profile_details WHERE username = '$username'";
$sql = mysqli_query($conn, $query);

$value = mysqli_fetch_assoc($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Place</title>
    <link rel="stylesheet" href="placeOrder.css">
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>


        </nav>

    </header>

    <div class="container">

        <div class="correct">
            <img src="correct.png">
        </div>

        <div class="thanks">
            <h1>Thank You!</h1>
        </div>

        <div class="order">
            <h2>Your Order Placed Successfully!</h2>
        </div>


        <div class="items">
            <p><?php echo $item; ?></p>
        </div>

        <div class="details">
            <p>Name: <?php echo $value['firstName']. " " . $value['lastName']   ?></p>
            <p>E-mail: <?php echo $value['email'];  ?> </p>
            <p>Phone: <?php echo $value['phone'] ?></p>
            <p>Total Amount: <?php echo "&#8377;".$sum; ?></p>
            <p>Payment Mode: <?php echo $_SESSION['payment_method'];?></p>
        </div>


        <div class="back">
            <div class="home"><button><a href="../index.php">Home Page</a></button></div>
            <div  class="order"><button><a href="../Order/order.php">Orders</a></button></div>
        </div>
    </div>
</body>

</html>

<?php

$query = "TRUNCATE TABLE cart_details";
$sql = mysqli_query($conn, $query);



?>