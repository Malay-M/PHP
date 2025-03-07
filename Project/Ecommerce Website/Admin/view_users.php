<?php
    include('../Connect/connect.php');

    $query = "SELECT * FROM register";
    $sql = mysqli_query($conn, $query);
    $num = 1;
?>

<h1 style="text-align: center; padding: 20px; font-size: 24px; color: #333;">List Users</h1>
<div class="view-user">
    
    <table border=1>
        <tr>
            <th>Payment No.</th>
            <th>Username</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone No.</th>
            <th>Email</th>
            <th>Profile</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($sql)) {
                $username = $row['username'];
                echo "<tr><td>".$num++."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<form method='POST' action='user_profile.php'><input type='text' name='username' value='$username' hidden>";
                echo "<td><input id='profile' type='submit' name='profile' value='Profile'></td></form></tr>";
            }
        ?>
    </table>
</div>