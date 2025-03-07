<?php
session_start();
include("../Connect/connect.php");


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM register WHERE username='" . $username . "' AND password='" . $password . "'";
    $sql = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($sql);

    $num = mysqli_num_rows($sql);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="login.css">
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

        <div class="login-form">

            <h3>Login</h3>
            <form method="POST">
                <label>Username:</label> <br>
                <input type="text" name="username" placeholder="Username"> <br>
                <label>Password:</label> <br>
                <input id="password" type="password" name="password" placeholder="Password"> <br>


                <div class="show">
                    <input id="show" type="checkbox">
                    <p>Show Password</p>
                </div>
                <?php

                if (isset($_POST['submit'])) {
                    if ($num != 0) {

                        $uname = $row['username'];
                        $pass = $row['password'];

                        if ($username == $uname) {
                            if ($password == $pass) {
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['name'] = $row['name'];

                                setcookie("username", $_SESSION['username'], time() + 60 * 60 * 24 * 7, "/");
                                setcookie("name", $_SESSION['name'], time() + 60 * 60 * 24 * 7, "/");

                                header('Location: ../index.php');

                                echo "login succesfull<br>";
                            } else {
                                echo "<div class='match'>Invalid Password.</div>";
                            }
                        }
                    } else {
                        echo "<div class='match'>Username Not Found.</div>";
                    }
                }


                ?>

                <button name="submit">Login</button>
            </form>
            <p>Don't have an account?<a href="../SignUp/signup.php"> Sign Up</a></p>
        </div>
    </main>




    <script>
        let checkbox = document.querySelector("#show");
        let show = document.getElementById("password")

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                show.type = "text";
            } else {
                show.type = "password";
            }
        });
    </script>

</body>

</html>