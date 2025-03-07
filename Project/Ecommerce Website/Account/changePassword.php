<?php

include("../Connect/connect.php");

$username = $_COOKIE['username'];

$query = "SELECT password FROM register WHERE username='$username'";
$sql = mysqli_query($conn, $query);
$value = mysqli_fetch_assoc($sql);

$password = $value['password'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="changePassword.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>
            <div class="none"></div>
        </nav>

    </header>

    <div class="container">
        <div class="heading">
            <h1>Change Password</h1>
        </div>

        <div class="change-form">
            <h1>Change Password</h1>
            <form method="POST">
                <div>
                    <label>Current Password</label> <br>
                    <input id="cp" type="password" name="currentPass" oninput="hideMessages()">
                </div>

                <div>
                    <label>New Password</label> <br>
                    <input id="np" type="password" name="newPass" oninput="check()">
                </div>

                <div>
                    <label>Confirm New Password</label> <br>
                    <input id="cnp" type="password" name="confirmPass" oninput="check()">
                </div>

                <div class='match'>Passwords do not match.</div>

                <?php

                if (isset($_POST['submit'])) {
                    $oldPass = $_POST['currentPass'];
                    $newPass = $_POST['newPass'];

                    if ($oldPass != $password) {
                        echo "<div class='invalid'>Invalid current password</div>";
                    } else {
                        echo "<div class='success'>Your password has changed successfully</div>";

                        $query = "UPDATE register SET password = '$newPass' WHERE username = '$username'";
                        $sql = mysqli_query($conn, $query);
                    }
                }

                ?>


                <div class="show">
                    <div><input id="checkbox" type="checkbox" onclick="myFunction()"> </div>
                    <div><label id="show-label">Show Password</label> </div>
                </div>

                <div>
                    <button id="submit" name="submit" disabled>Update Password</button>
                </div>

            </form>

            <button style="background-color: #32dd79;margin-top: 10px;"><a href="account.php" style="color:inherit;"><i class="fa-solid fa-arrow-left"></i> Back</a></button>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("cp");
            var y = document.getElementById("np");
            var z = document.getElementById("cnp");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
                z.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
                z.type = "password";
            }
        }

        let checkbox = document.querySelector("#checkbox");
        let pass1 = document.getElementById("np");
        let pass2 = document.getElementById("cnp");
        let submit = document.getElementById("submit");
        let match = document.querySelector(".match");

        checkbox.addEventListener("change", function() {
            if (this.checked) {
                pass1.type = "text";
                pass2.type = "text";
            } else {
                pass1.type = "password";
                pass2.type = "password";
            }
        });

        match.hidden = true;

        function check() {
            if (pass1.value === pass2.value) {
                match.hidden = true;
                submit.disabled = false;
            } else {
                match.hidden = false;
                submit.disabled = true;
            }
        }

        function hideMessages() {
            let successMessage = document.querySelector(".success");
            if (successMessage) {
                successMessage.hidden = true;
            }

            let invalidMessage = document.querySelector(".invalid");
            if (invalidMessage) {
                invalidMessage.hidden = true;
            }
        }
    </script>

</body>

</html>


