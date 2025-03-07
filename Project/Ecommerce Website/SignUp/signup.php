<?php

include("../Connect/connect.php");
include("../Connect/table.php");


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = "SELECT * FROM register WHERE username='" . $username . "'";

    $sql = mysqli_query($conn, $select);
    $row = mysqli_num_rows($sql);

    $dquery = "SELECT * FROM deleted_accounts WHERE username='" . $username . "'";
    $sql = mysqli_query($conn, $dquery);
    $del = mysqli_num_rows($sql);


    if ($row == 0 && $del == 0) {
        $insert = "INSERT INTO register (name, address, phone, email, username, password) VALUES 
                    ('" . $name . "', '" . $address . "', '" . $phone . "', '" . $email . "', '" . $username . "', '" . $password . "')";

        $sql = mysqli_query($conn, $insert);


        $query = "INSERT INTO profile_details (username, email, address, phone)  VALUES ('" . $username . "', '" . $email . "', '" . $address . "', '" . $phone . "')";
        $sql = mysqli_query($conn, $query);
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="signup.css">
</head>

<body>

    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>

            <div class="options">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../Products/product.php">Product</a></li>
                    <li><a href="../Order/order.php">Order</a></li>
                    <li><a href="../about.php">About</a></li>
                    <li><a href="../help.php">Help</a></li>
                </ul>
            </div>


            <div class="login">
                <p>Hi, Guest</p>
            </div>
        </nav>


    </header>

    <main>

        <div class="signup-form">

            <h3>Sign Up</h3>
            <form method="POST">
                <label>Name:</label> <br>
                <input type="text" name="name" placeholder="Name" required> <br>
                <label>Address:</label> <br>
                <textarea name="address" rows="4" cols="30" placeholder="Address" required></textarea> <br>
                <label>Phone No.:</label> <br>
                <input type="number" name="phone" placeholder="Phone No" required> <br>
                <label>Email:</label> <br>
                <input type="email" name="email" placeholder="Email" required>
                <label>Username:</label> <br>
                <input type="text" name="username" placeholder="Username" required> <br>
                <label>Password:</label> <br>
                <input id="pass" type="password" name="password" placeholder="Password" required onkeyup="check();"> <br>
                <label>Confirm Password:</label> <br>
                <input id="cpass" type="password" name="cpass" placeholder="Confirm Password" required onkeyup="check();"> <br>

                <div class="match">Password must be same</div>

                <?php
                if (isset($_POST['submit'])) {
                    if ($row != 0 || $del != 0) {
                        echo "<div class='match'>A user with that username already exists.</div>";
                    } else {
                        echo "<div class='success'>Thanks for signing up, " . $name . "</div>";
                    }
                }


                ?>


                <div class="show">
                    <input id="checkbox" type="checkbox">
                    <p>Show Password</p>
                </div>

                <button id="submit" name="submit">Sign Up</button>
            </form>

            <p>Already have an account?<a href="../Login/login.php"> Login</a></p>
        </div>
    </main>




    <script>
        let checkbox = document.querySelector("#checkbox");
        let pass1 = document.getElementById("pass");
        let pass2 = document.getElementById("cpass");

        let submit = document.getElementById("submit");

        checkbox.addEventListener("change", function() {

            if (this.checked) {
                pass1.type = "text";
                pass2.type = "text";

            } else {
                pass1.type = "password";
                pass2.type = "password";

            }
        });


        let match = document.querySelector(".match");
        match.hidden = true;
        let check = () => {

            if (pass1.value == pass2.value) {
                match.hidden = true;
                submit.disabled = false;
            } else {
                match.hidden = false;
                submit.disabled = true;
            }

        };
    </script>
</body>

</html>