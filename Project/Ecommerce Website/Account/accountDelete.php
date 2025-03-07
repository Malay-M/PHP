<?php

include("../Connect/connect.php");

$username = $_COOKIE['username'];

$query = "SELECT email FROM register WHERE username='$username'";

$sql = mysqli_query($conn, $query);

$value = mysqli_fetch_assoc($sql);

$email = $value['email'];

$deleted_at = date('Y-m-d h:i:s');

if (isset($_POST['submit'])) {
    $reason = $_POST['reason'];


    $query = "INSERT INTO deleted_accounts (username, email, reason, deleted_at) VALUES ('$username', '$email', '$reason', '$deleted_at')";
    $sql = mysqli_query($conn, $query);


    $query = "DELETE FROM register WHERE username = '$username'";
    $sql = mysqli_query($conn, $query);

    header('Location:../Login/logout.php');
}







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="accountDelete.css">
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
            <h1>Delete Account</h1>
        </div>

        <div class="delete-form">
            <h1>Are you sure you want to delete your account?</h1>
            <form method="POST">
                <div class="show">
                    <div><input id="confirmCheckbox" type="checkbox" onclick="toggleDeleteButton()"> </div>
                    <div><label for="confirmCheckbox" id="confirm-label">I understand that this action cannot be undone</label> </div>
                </div>
                <div>
                    <label>Reason for deleting your account (optional):</label><br>
                    <textarea name="reason" rows="4" cols="50"></textarea>
                </div>
                <div>
                    <button id="submit" name="submit" disabled>Delete Account</button>
                </div>
            </form>

            <button style="background-color: #32dd79;margin-top: 10px;"><a href="account.php" style="color:inherit;"><i class="fa-solid fa-arrow-left"></i> Back</a></button>
        </div>
    </div>

    <script>
        function toggleDeleteButton() {
            let checkbox = document.getElementById('confirmCheckbox');
            let submitButton = document.getElementById('submit');
            submitButton.disabled = !checkbox.checked;
        }
    </script>

</body>

</html>