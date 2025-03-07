<?php

session_start();
include("../Connect/connect.php");

$username = $_COOKIE['username'];

$query = "SELECT * FROM profile_details WHERE username='$username'";
$sql = mysqli_query($conn, $query);

$value = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>


        </nav>

    </header>

    <div class="container">

        <div class="address">
            <div>
                <h1>Billing Address</h1>
                <form id='checkout-form' method="post" action="purchase.php">
                    <div class="name">
                        <table>

                            <tr>
                                <div class="name-label">
                                    <td><label>First Name</label></td>
                                    <td><label style="margin-left: 100px;">Last Name</label></td>
                                </div>
                            </tr>

                            <tr>
                                <div class="name-input">
                                    <td><input type="text" name="fname" placeholder="First Name" value="<?php echo $value['firstName']; ?>"></td>
                                    <td><input type="text" name="lname" style="margin-left: 100px;" placeholder="Last Name" value="<?php echo $value['lastName']; ?>"></td>
                                </div>

                            </tr>
                        </table>

                    </div>

                    <div class="email">
                        <label>Email</label><br>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $value['email']; ?>">
                    </div>

                    <div class="phone">
                        <label>Phone</label>
                        <input type="number" name="phone" placeholder="Phone" value="<?php echo $value['phone']; ?>">
                    </div>

                    <div class="add">
                        <label>Address</label><br>
                        <textarea name="address" cols="5" placeholder="Address"><?php echo $value['address']; ?></textarea>
                    </div>

                    <div class="pincode">

                        <table>
                            <tr>
                                <td><label>Country</label></td>
                                <td><label>States</label></td>
                                <td><label>Pincode</label></td>
                            </tr>

                            <tr>
                                <td><select name="country">
                                        <option value="INDIA" selected>INDIA</option>
                                    </select></td>

                                <td><select name="states" style="width: 235px;">
                                        <?php
                                        $query = "SELECT * FROM states ORDER BY name";
                                        $sql = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($sql)) {

                                            if ($row['name'] == $value['state']) {
                                                echo "<option value='" . $row['name'] . "' selected>" . $row['name'] . "</option>";
                                            } else {
                                                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                            }
                                        }

                                        ?>
                                    </select></td>

                                <td><input type="number" name="pincode" id="pin" style="width: 295px; padding:5px;" placeholder="Pincode" value="<?php echo $value['pincode']; ?>"></td>
                            </tr>

                        </table>
                    </div>


                    <div class="pay">
                        <label>Payment</label><br>

                        <input id="pay1" type="radio" name="pay" value="online" required>
                        <label for="pay1">Pay Online</label> <br>

                        <input id="pay2" type="radio" name="pay" value="offline" required>
                        <label for="pay2">Cash On Delivary</label> <br>
                    </div>

                    <div class="submit">
                        <input id="submit-payment" type="submit" name="submit" value="Continue to checkout">
                    </div>

                </form>
            </div>
        </div>

        <div class="cart">
            <h1>Your Cart</h1>

            <div class="item-list">
                <?php
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }

                $sum = 0;

                $query = "SELECT * FROM cart_details, products WHERE products.id=cart_details.product_id AND ip_address='" . $ip . "'";
                $sql = mysqli_query($conn, $query);
                $num = mysqli_num_rows($sql);

                while ($row = mysqli_fetch_assoc($sql)) {

                    if ($row['offer'] != 0) {
                        $p = $row['price'] * ((100 - $row['offer']) / 100);
                    } else {
                        $p = $row['price'];
                    }
                    $price = $row['quantity'] * $p;
                    $sum = $sum + $price;
                    echo "<div class='item'>";
                    echo "<div class='name-price'>";
                    echo "<div><h2>" . $row['title'] . "</h2></div>";
                    echo "<div><p>&#8377;" . $price . "</p></div>";
                    echo "</div>";
                    echo "<p>Quantity: " . $row['quantity'] . " X Price: &#8377;" . $p . " </p>";
                    echo "</div>";
                }

                ?>
            </div>

            <div class="total-price">
                <div class="no-item">
                    <h2>Total Items:</h2>
                    <p><?php echo $num; ?></p>
                </div>
                <div class="price">
                    <h2>Total Price:</h2>
                    <p><?php echo " &#8377;" . $sum; ?></p>
                </div>
            </div>
        </div>

    </div>



</body>

</html>


<?php


$_SESSION['total_price'] = $sum;
$_SESSION['total_items'] = $num;




?>