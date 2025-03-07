<?php
include('Connect/connect.php');

$invoice = "1339274718";

$sum = 0;

$items = 0;

$query = "SELECT * FROM order_address WHERE invoice_number='$invoice'";
$sql = mysqli_query($conn, $query);

$address = mysqli_fetch_assoc($sql);



$query = "SELECT * FROM user_invoice WHERE invoice_number='$invoice'";
$sql = mysqli_query($conn, $query);

$invoice_details = mysqli_fetch_assoc($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            background-color: white;
            font-family: sans-serif;
        }

        .navbar {
            background-color: #5F4BB6;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .options ul {
            display: inline-flex;
            list-style: none;

        }

        .logo {
            padding: 20px;
        }

        .logo a {
            font-size: 20px;
            color: white;
            font-weight: 600;
            padding: 10px;
            border: 5px white solid;

        }

        .invoice h1 {
            font-size: 50px;
            text-align: right;
            padding: 10px;
            padding-right: 40px;
            border-bottom: 3px dashed black;
        }

        .bill-invoice {
            display: flex;
            justify-content: space-between;
        }

        .bill-invoice h2 {
            padding: 50px 20px 0px 20px;
            border-bottom: 1px dashed black;
        }


        .bill-table {
            font-size: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            padding-top: 50px;
            
        }

        .bill-table table {
            border-bottom: 2px solid black;
            padding-bottom: 20px;
        }

        .table-heading {
            background-color: #354fde;
        }

        .total {
            font-size: 25px;
            text-align: right;
            margin-top: 40px;
        }

        .total p {
            background-color: #354fde;
            display: inline;
            margin-right: 20px;
            padding: 10px 30px 10px 30px;
            color: white;
        }

        

    </style>
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>



            <div class="invoice">
                <h1>INVOICE</h1>
            </div>

        </nav>

    </header>


    <div class="bill-invoice">
        <div class="bill">
            <h2>BILL TO</h2>

            <p><?php echo "<b>Name:</b> " . $address['firstName'] . " " . $address['lastName']; ?></p>
            <p><?php echo "<b>Email:</b> " . $address['email']; ?></p>
            <p><?php echo "<b>Phone:</b> " . $address['phone']; ?></p>
            <p><?php echo "<b>Address:</b> " . $address['address']; ?></p>
            <p><?php echo "<b>Pincode:</b> " . $address['pincode']; ?></p>
            <p><?php echo "<b>State:</b> " . $address['state']; ?></p>
            <p><?php echo "<b>Address:</b> " . $address['country']; ?></p>


        </div>

        <div class="pay-invoice">
            <div class="pay">
                <h2>INVOICE DETAILS</h2>

                <p><?php echo "<b>Invoice Number:</b> " . $invoice_details['invoice_number']; ?></p>
                <p><?php echo "<b>Invoice Date:</b> " . $invoice_details['date']; ?></p>
            </div>

            <div class="invoice">
                <h2>PAYMENT DETAILS</h2>
                <P>Payment Id:</P>
                <P>Payment Mode:</P>
                <P>Payment Type:</P>
            </div>
        </div>
    </div>


    <div class="bill-table">

        <table>
            <tr class="table-heading">
                <th style="padding: 10px 10px 10px 10px;">No.</th>
                <th style="padding: 0px 100px 0px 100px;">Product Name</th>
                <th style="padding: 0px 30px 0px 30px;">Quantity</th>
                <th style="padding: 0px 30px 0px 30px;">Price</th>
                <th style="padding: 0px 30px 0px 30px;">Total Price</th>
            </tr>

            <?php
            $query = "SELECT * FROM orders WHERE invoice_number='$invoice'";
            $sql = mysqli_query($conn, $query);

            $sno = 1;

            while ($row = mysqli_fetch_assoc($sql)) {

                $product_id = $row['product_id'];

                $query = "SELECT * FROM products WHERE id=" . $product_id;
                $sql_order = mysqli_query($conn, $query);

                $product = mysqli_fetch_assoc($sql_order);


                echo "<tr>";

                echo "<td style='padding: 10px 30px 10px 30px;'>$sno</td>";
                echo "<td style='padding: 0px 150px 0px 150px;'>" . $product['title'] . "</td>";
                echo "<td style='padding: 0px 50px 0px 50px;'>" . $row['quantity'] . "</td>";

                if ($product['offer'] != "") {

                    $p = $product['price'] * ((100 - $product['offer']) / 100);
                } else {
                    $p = $product['price'];
                }

                $items = $items + $row['quantity'];
                $sum = $sum + ($p * $row['quantity']);

                echo "<td style='padding: 0px 50px 0px 50px;'>" . $p . "</td>";
                echo "<td style='padding: 0px 50px 0px 50px;'>" . ($p * $row['quantity']) . "</td>";

                echo "</tr>";
                $sno++;
            }
            ?>

        </table>
    </div>

    <div class="total">
        <div><p><b>Sub Total: </b><?php echo $sum; ?></p> </div>
        <br>
        <div><p><b>Total Items: </b><?php echo $items; ?></p></div>
    </div>



</body>

</html>