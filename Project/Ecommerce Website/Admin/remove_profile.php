<?php

include('../Connect/connect.php');

$username = $_COOKIE['username'];

$query = "UPDATE profile_details SET url='profile.png' WHERE username='$username'";
$sql = mysqli_query($conn, $query);

header('Location:user_profile.php');

?>