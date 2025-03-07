<?php
    include('../Connect/connect.php');

    $query = "SELECT * FROM products";
    $sql = mysqli_query($conn, $query);
    $num = 1;
?>

<h1 style="text-align: center;padding: 20px;font-size: 24px;color: #333;">View Products</h1>
<div class="view-product">'
    
    <table border=1>
        <tr>
            <th>Product No.</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Weight</th>
            <th>Product Offer</th>
            <th>Product Category</th>
            <th>Product Brand</th>
            <th>Product Status</th>
            <th>Product Image</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($sql)) {
                echo "<tr><td>".$num++."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['weight']."</td>";
                echo "<td>".$row['offer']."</td>";
                echo "<td>".$row['category']."</td>";
                echo "<td>".$row['brand']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "<td><img src='../Products/Images/".$row['url']."' alt='".$row['title']."'></td></tr>";
                
            }
        ?>
    </table>
</div>