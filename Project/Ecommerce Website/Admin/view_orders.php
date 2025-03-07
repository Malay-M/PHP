<?php
    include('../Connect/connect.php');


    
    
    $query = "SELECT * FROM user_invoice ORDER BY date DESC";
    $sql = mysqli_query($conn, $query);
    $num = 1;

?>

<h1 style="text-align: center;padding: 20px;font-size: 24px;color: #333;">All Orders</h1>
<div class="view-order">
    
    <table border=1>
        <tr>
            <th>Odrer No.</th>
            <th>Username</th>
            <th>Invoice Number</th>
            <th>Total Items</th>
            <th>Amount</th>
            <th>Order Status</th>
            <th>Payment Method</th>
            <th>Date & Time</th>
            <th>Update</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($sql)) {
                
                $pay = $row['payment_method'];
                
                if($pay == 'online') {
                    $pay = "Pay Online";
                } else {
                    $pay = "Cash On Delivery";
                }

                echo "<tr><td>".$num++."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['invoice_number']."</td>";
                echo "<td>".$row['total_items']."</td>";
                echo "<td>".$row['amount']."</td>";
                
                echo "<td> <form method='POST' action='order_update.php'> <select name='status'>";
                
                if($row['order_status'] == 'Pending') {
                    echo "<option value='Pending' selected>Pending</option>
                        <option value='Delivered'>Delivered</option>";
                } else {
                    echo "<option value='Pending'>Pending</option>
                        <option value='Delivered' selected>Delivered</option>";
                }
                

                echo "</select></td>";
                echo "<td>".$pay."</td>";
                echo "<td>".$row['date']."</td>";

                echo "<input name='invoice' value='".$row['invoice_number']."' hidden>";

                echo "<td><input id='update' name='update' type='submit' value='Update'> </form></td></tr>";
                
            }
        ?>
    </table>
</div>