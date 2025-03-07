<?php

include("../Connect/connect.php");


if(!isset($_COOKIE['username'])) {
    header("Location:../Login/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>


            <div class="options">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../Products/product.php">Product</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="../about.php">About</a></li>
                    <li><a href="../help.php">Help</a></li>
                </ul>
            </div>

            <div class="none"></div>
        </nav>

        

    </header>

    <div class="container">
        <div class="heading">
            <h1>All Orders</h1>
        </div>

        <div class="orders">
            
            <table>
                <tr>
                    <th>No.</th>
                    <th>Invoice Number</th>
                    <th>Total Amount</th>
                    <th>Total Items</th>
                    <th>Payment Method</th>
                    <th>Order Status</th>
                    <th>Date & Time</th>
                    <th>Invoice Download</th>
                </tr>

                <?php 
                    $username = $_COOKIE['username'];

                    $query = "SELECT * FROM user_invoice WHERE username = '$username' ORDER BY date DESC";
                    $sql = mysqli_query($conn, $query);

                    $sno = 1;

                    $num = mysqli_num_rows($sql);

                    if($num > 0) {
                        while($row = mysqli_fetch_assoc($sql)) {
                            echo "<tr>";
                            
                            echo "<td>$sno</td>";
                            echo "<td>".$row['invoice_number']."</td>";
                            echo "<td>".$row['amount']."</td>";
                            echo "<td>".$row['total_items']."</td>";
                            
                            if($row['payment_method'] == "offline") {
                                $method = "Cash On Delivary";
                            } else {
                                $method = "Pay Online";
                            }

                            echo "<td>".$method."</td>";
                            echo "<td>".$row['order_status']."</td>";
                            echo "<td style='padding: 0px 20px 0 20px;'>".$row['date']."</td>";
                            echo "<td><i class='fa-solid fa-download'></i><a href='invoice.php?invoice_no=".$row['invoice_number']."'>Download</a></td>";


                            echo "</tr>";
                            $sno++;
                        }
                    }
                    
                ?>


            </table>

        </div>
    </div>

    

</body>

</html>
