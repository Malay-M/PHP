<?php
include('../Connect/connect.php');

$invoice = $_GET['invoice_no'];



$sum = 0;

$items = 0;

$query = "SELECT * FROM order_address WHERE invoice_number='$invoice'";
$sql = mysqli_query($conn, $query);

$address = mysqli_fetch_assoc($sql);



$query = "SELECT * FROM user_invoice WHERE invoice_number='$invoice'";
$sql = mysqli_query($conn, $query);

$invoice_details = mysqli_fetch_assoc($sql);


$str1 = "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
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
                color: white;
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
                padding-left: 40px;
                
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
                margin-left: 200px;
            }
    
            .bill-invoice p {
                margin-left: 30px;
            }
            
    
        </style>
    </head>
    
    <body>
        <header>
    
            <nav class='navbar'>
                <div class='logo'><a href='../index.php'>QuickOrder</a></div>
    
    
    
                <div class='invoice'>
                    <h1>INVOICE</h1>
                </div>
    
            </nav>
    
        </header>
    
    
        <div class='bill-invoice'>
            <div class='bill'>
                <h2>BILL TO</h2>
    
                <p><b>Name:</b> " . $address['firstName'] . " " . $address['lastName'] . " </p>
                <p><b>Email:</b> " . $address['email'] . "</p>
                <p><b>Phone:</b> " . $address['phone'] . "</p>
                <p><b>Address:</b> " . $address['address'] . " </p>
                <p><b>Pincode:</b> " . $address['pincode'] . "</p>
                <p><b>State:</b> " . $address['state'] . " </p>
                <p><b>Country:</b> " . $address['country'] . "</p>
    
    
            </div>
    
            <div class='pay-invoice'>
                <div class='pay'>
                    <h2>INVOICE DETAILS</h2>
    
                    <p><b>Invoice Number:</b> " . $invoice_details['invoice_number'] . "</p>
                    <p><b>Invoice Date:</b> " . $invoice_details['date'] . " </p>
                </div>";




if ($invoice_details['payment_method'] == 'online') {

    $query = "SELECT * FROM payments WHERE invoice_number = '$invoice'";
    $sql = mysqli_query($conn, $query);
    $payment = mysqli_fetch_assoc($sql);

    $paymentId = $payment['payment_id'];
    $paymentMode = "Pay Online";
    $paymentStatus = ucfirst($payment['payment_status']);
    $paymentDate = $payment['add_on'];

    $str_pay = "<div class='invoice'>
                    <h2>PAYMENT DETAILS</h2>
                    <P><b>Payment Id:</b> $paymentId</P>
                    <P><b>Payment Mode:</b> $paymentMode</P>
                    <P><b>Payment Status:</b> $paymentStatus</P>
                    <P><b>Payment Date:</b> $paymentDate</P>
                </div>";
} else if($invoice_details['payment_method'] == 'offline') {
    $str_pay = "<div class='invoice'>
                    <h2>PAYMENT DETAILS</h2>
                    <P><b>Payment Mode:</b>Cash On Delivery</P>
                    <P><b>Payment Type:</b> Cash</P>
                </div>";
}



$str_end = "</div>
        </div>
    
    
        <div class='bill-table' style='padding-bottom:40px'>
    
            <table>
                <tr class='table-heading'>
                    <th style='padding: 10px 10px 10px 10px;'>No.</th>
                    <th style='padding: 0px 80px 0px 80px;'>Product Name</th>
                    <th style='padding: 0px 20px 0px 20px;'>Quantity</th>
                    <th style='padding: 0px 20px 0px 20px;'>Price</th>
                    <th style='padding: 0px 20px 0px 20px;'>Total Price</th>
                </tr>";

$strNew = $str1 . $str_pay . $str_end;
$str2 = "";

$query = "SELECT * FROM orders WHERE invoice_number='$invoice'";
$sql = mysqli_query($conn, $query);

$sno = 1;

while ($row = mysqli_fetch_assoc($sql)) {

    $product_id = $row['product_id'];

    $query = "SELECT * FROM products WHERE id=" . $product_id;
    $sql_order = mysqli_query($conn, $query);

    $product = mysqli_fetch_assoc($sql_order);


    $str2 = $str2 . "<tr>";

    $str2 =  $str2 . "<td style='padding: 10px 10px 10px 10px;'>$sno</td>";
    $str2 = $str2 . "<td style='padding: 0px 80px 0px 80px;'>" . $product['title'] . "</td>";
    $str2 = $str2 . "<td style='padding: 0px 20px 0px 20px;'>" . $row['quantity'] . "</td>";

    if ($product['offer'] != "") {

        $p = $product['price'] * ((100 - $product['offer']) / 100);
    } else {
        $p = $product['price'];
    }

    $items = $items + $row['quantity'];
    $sum = $sum + ($p * $row['quantity']);

    $str2 = $str2 . "<td style='padding: 0px 20px 0px 20px;'>" . $p . "</td>";
    $str2 = $str2 . "<td style='padding: 0px 20px 0px 20px;'>" . ($p * $row['quantity']) . "</td>";

    $str2 = $str2 . "</tr>";
    $sno++;
}

$str3 = "        </table>
                </div>
            
            
                <p style='background-color: #354fde; color: white; font-size:25px; text-align: right; padding: 10px 40px 10px 40px'><b>Sub Total: </b>$sum </p>
                <p style='background-color: #354fde; color: white; font-size: 25px; text-align: right; padding: 10px 40px 10px 40px'><b>Total Items: </b> $items </p>
                
            
            
            </body>
            
            </html>";

$html = $strNew . $str2 . $str3;



require_once '../Library/dompdf/autoload.inc.php';

use Dompdf\Dompdf; 

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4');

$dompdf->render();

$dompdf->stream('invoice');




// echo $html;
