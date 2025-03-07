<?php
include('../Connect/connect.php');

$username = $_COOKIE['username'];
$query = "SELECT * FROM register WHERE username='" . $username . "'";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($sql);

$addrss = $row['address'];
$phone = $row['phone'];
$email = $row['email'];





$query = "SELECT * FROM profile_details WHERE username='" . $username . "'";
$sql = mysqli_query($conn, $query);
$num =  mysqli_num_rows($sql);

if ($num == 0) {
    $query = "INSERT INTO profile_details (username, email, address, phone)  VALUES ('" . $username . "', '" . $email . "', '" . $addrss . "', '" . $phone . "')";
    $sql = mysqli_query($conn, $query);
}

$query = "SELECT * FROM profile_details WHERE username='" . $username . "'";
$sql = mysqli_query($conn, $query);
$values = mysqli_fetch_assoc($sql);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>

            <div class="options">

            </div>


        </nav>

    </header>


    <div class="container">

        <div class="container">

            <div class="address">
                <div>
                    <h1>Profile Details</h1>
                    <form method="POST" action="update_profile.php">
                        <div class="name">
                            <table>

                                <tr>
                                    <div class="name-label">
                                        <td><label>First Name</label></td>
                                        <td><label style="margin-left: 50px;">Last Name</label></td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="name-input">
                                        <td><input type="text" name="fname" placeholder="First Name" value="<?php echo $values['firstName'] ?>"></td>
                                        <td><input type="text" name="lname" style="margin-left: 100px;" placeholder="Last Name" value="<?php echo $values['lastName'] ?>"></td>
                                    </div>

                                </tr>
                            </table>

                        </div>


                        <div class="username">
                            <label>Username</label><br>
                            <input type="text" name="username" placeholder="Username" value="<?php echo $values['username']; ?>" readonly>
                        </div>


                        <div class="email">
                            <label>Email</label><br>
                            <input type="email" name="email" placeholder="Email" value="<?php echo $values['email']; ?>">
                        </div>

                        <div class="phone">
                            <label>Phone</label>
                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $values['phone']; ?>">
                        </div>

                        <div class="add">
                            <label>Address</label><br>
                            <textarea name="address" cols="5" placeholder="Address"><?php echo $addrss; ?></textarea>
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
                                            $state = $values['state'];


                                            while ($row = mysqli_fetch_assoc($sql)) {

                                                if ($row['name'] == $state) {
                                                    echo "<option value='" . $row['name'] . "' selected>" . $row['name'] . "</option>";
                                                } else {
                                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                                }
                                            }



                                            ?>
                                        </select></td>

                                    <td><input type="number" name="pincode" id="pin" style="width: 295px; padding:5px;" placeholder="Pincode" value="<?php echo $values['pincode']; ?>"></td>
                                </tr>

                            </table>
                        </div>


                        <div class="submit-home">

                            <div class="submit">
                                <input type="submit" name="submit" value="Update">
                            </div>

                            <button><a href="../index.php">Back to Home</a></button>

                        </div>


                    </form>
                </div>
            </div>

            <div class="profile-pic">
                <h1>Profile Picture</h1>

                <div class="profile-form">

                    <div class="profile">
                        <img src="Image/<?php echo $values['url']; ?>">
                    </div>

                    <div class="image-form">
                        <form method="POST" action="update_image.php" enctype="multipart/form-data">
                            <input type="file" accept="image/jpeg, image/png" name="myfile" style="font-size: 15px; width:250px; margin-bottom:20px" required>
                            <br>
                            <input id="update" type="submit" name="updatePic" value="Update">

                        </form>
                        <button id="remove"><a href="remove_profile.php">Remove</a></button>
                    </div>

                </div>


            </div>

        </div>
    </div>


</body>

</html>