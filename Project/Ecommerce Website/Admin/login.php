<?php
include('../Connect/connect.php');

session_start();

if(isset($_SESSION['admin_username'])) {
    header("Location:dashboard.php");
}


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM adminlogin WHERE username='" . $username . "'";
    $sql = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($sql);


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo"><a href="../index.php">QuickOrder</a></div>
    </nav>

    <div class="panel">
        <div>Admin Login</div>
    </div>

    <div class="admin-login">
        <form method="POST">
            <fieldset>
                <legend>Admin Login</legend>
                <label>Admin Username:</label><br>
                <input type="text" name="username" placeholder="Username"><br>
                <label>Password:</label><br>
                <input type="password" name="password" placeholder="Password"><br>
                <?php
                if (isset($_POST['submit'])) {
                    $num = mysqli_num_rows($sql);

                    if ($num > 0) {
                        if ($row['password'] == $password) {
                            $_SESSION['admin_name'] = $row['name'];
                            $_SESSION['admin_username'] = $row['username'];
                            $_SESSION['admin_email'] = $row['email'];

                            header('Location:dashboard.php');
                        } else {
                            echo "<div class='error'>Invalid Password</div>";
                        }
                    } else {
                        echo "<div class='error'>Username not valid</div>";
                    }
                }
                ?> <br>

                <button name="submit">Login</button>
            </fieldset>
        </form>
    </div>
</body>

</html>
