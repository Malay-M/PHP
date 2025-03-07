<?php
include('../Connect/connect.php');

$sum = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>

            <div class="options">

            </div>


        </nav>

    </header>

    <div class="heading">
        <h1>My Cart</h1>

    </div>



    <div class="container">
        <div class="cart-table">
            <?php
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            $query = "SELECT * FROM cart_details, products WHERE products.id=cart_details.product_id";
            $sql = mysqli_query($conn, $query);
            $num = mysqli_num_rows($sql);

            if (isset($_COOKIE['username'])) {

                if ($num != 0) {


                    echo "<table>";

                    echo "<tr><th>Product Title</th><th>Product Image</th><th>Quantity</th><th>Price</th><th>Total Price</th><th>Operations</th></tr>";

                    while ($row = mysqli_fetch_assoc($sql)) {

                        $price = $row['price'];
                        if ($row['offer'] != 0) {
                            $price = ($price * (100 - $row['offer'])) / 100;
                        }

                        $sum = $sum + ($price * $row['quantity']);


                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td style='background-color:white'><img src='Images/" . $row['url'] . "'></td>";
                        echo "<form>";
                        echo "<td><input type='number' value='" . $row['quantity'] . "' name='q'></td>";
                        echo "<td>" . $price . "</td>";
                        echo "<td>" . $price * $row['quantity'] . "</td>";

                        echo "<input type='number' name='id' value='" . $row['id'] . "' hidden> ";

                        echo "<td><div class='operation'>";

                        echo "<input type='submit' value='Update' name='update' class='update'>";
                        echo "</form>";
                        echo "<button><a href='remove_item.php?id=" . $row['id'] . "'>Remove</a></button></div></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<div class='empty'>";
                    echo "<h1>Cart is empty</h1>";
                    echo "</div>";
                }

                
            } else {
                header('Location:../Login/login.php');
            }


            if (isset($_GET['update'])) {
                $id = $_GET['id'];
                $q = $_GET['q'];
                header("Location:update_quantity.php?id=$id&q=$q");
            }


            ?>
        </div>

    </div>

    <div class="container">
        <div class="total">
            <h3>Subtotal: </h3>
            <p><?php echo $sum; ?>/-</p>
            <button class="order-button"><a href="product.php">Order More</a></button>
            <button class="checkout-button"><a href="../Order/checkout.php">Checkout</a></button>
        </div>
    </div>

</body>

</html>