<?php
    include('../Connect/connect.php');

    $query = "SELECT * FROM payments ORDER BY add_on DESC";
    $sql = mysqli_query($conn, $query);
    $num = 1;
?>

<h1 style="text-align: center; padding: 20px; font-size: 24px; color: #333;">All Payments</h1>
<div class="view-payment">
    
    <table border=1>
        <tr>
            <th>Payment No.</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Id</th>
            <th>Payment Status</th>
            <th>Payment On</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($sql)) {
                echo "<tr><td>".$num++."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['invoice_number']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['payment_id']."</td>";
                echo "<td>".ucfirst($row['payment_status'])."</td>";
                echo "<td>".$row['add_on']."</td></tr>";
                
                
            }
        ?>
    </table>
</div>