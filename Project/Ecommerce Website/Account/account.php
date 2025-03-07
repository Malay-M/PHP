<?php

include('../Connect/connect.php');

$username = $_COOKIE['username'];

$query = "SELECT * FROM profile_details, register WHERE profile_details.username = register.username AND register.username='$username'";
$sql = mysqli_query($conn, $query);

$value = mysqli_fetch_assoc($sql);

$url = $value['url'];


$query = "SELECT * FROM user_invoice WHERE username='$username'";
$sql = mysqli_query($conn, $query);

$totalOrder = mysqli_num_rows($sql);
$totalAmount = 0;
$totalItems = 0;
while($row = mysqli_fetch_assoc($sql)) {
    $totalAmount = $totalAmount + $row['amount'];
    $totalItems = $totalItems + $row['total_items'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>


        </nav>

    </header>


    <div class="heading">
        <h1>Account</h1>
    </div>

    <div class="container">

        <div class="profile-info">
            <?php
            echo "<div class='profile-pic'>";
            echo "<h1>Profile</h1>";
            echo "<img src='../Profile/Image/$url' alt='Profile Pic'>";
            echo "</div>";

            echo "<div class='profile-text'>";
            echo "<p><b>Name:</b> ".$value['name']."</p>";
            echo "<p><b>Username:</b> ".$value['username']."</p>";
            echo "<p><b>Email:</b> ".$value['email']."</p>";
            echo "<p><b>Phone:</b> ".$value['phone']."</p>";
            echo "<p><b>Address:</b> ".$value['address']."</p>";
            echo "<p><b>State:</b> ".$value['state']."</p>";
            echo "<p><b>Country:</b> ".$value['country']."</p>";
            echo "<p><b>Pincode:</b> ".$value['pincode']."</p>";
            echo "</div>";
            ?>

        </div>

        <div class="account-info">
            
            <div class="box-list">
                <div class="red-box">
                    <p style="font-size: 50px; padding:20px 5px 10px 5px"><?php echo $totalOrder; ?></p>
                    <p>Total Orders</p>
                </div>
                <div class="blue-box">
                <p style="font-size: 50px; padding:20px 5px 10px 5px"><?php echo $totalAmount; ?></p>
                    <p>Total Amount</p>
                </div>
                <div class="yellow-box">
                <p style="font-size: 50px; padding:20px 5px 10px 5px"><?php echo $totalItems; ?></p>
                    <p>Total Items</p>
                </div>

            </div>


            <div class="options">
                <div><button><a href="../Profile/profile.php">Edit Profile</a></button></div>
                <div><button><a href="changePassword.php">Change Password</a></button></div>
                <div><button><a href="accountDelete.php">Account Delete</a></button></div>
            </div>


            <div class="back">
                <div><button><a href="../index.php"><i class="fa-solid fa-arrow-left"></i> Back</a></button></div>
            </div>
        </div>


    </div>

</body>

</html>