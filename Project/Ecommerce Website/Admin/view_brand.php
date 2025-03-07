<?php
include('../Connect/connect.php');



$query = "SELECT * FROM brands";
$sql = mysqli_query($conn, $query);

$num = mysqli_num_rows($sql);
$count = 0;
?>

<h1 style="text-align: center; padding: 20px; font-size: 24px; color: #333;">View Brands</h1>
<div class="view-brand">
<table border=1>

    <tr>
        <th>No.</th>
        <th>Brand Name</th>
        <th>Delete</th>
    </tr>

    <?php
        if($num > 0) {
            while($row=mysqli_fetch_assoc($sql)) {
                echo "<tr><td>".++$count."</td><td>".$row['brand_name']."</td>";
                echo "<td><button id='delete'><a href='delete_brand.php?id=".$row['brand_id']."'>Delete</a></button></td>";
                echo "</tr>";
            }
        }

    ?>

</table>

</div>