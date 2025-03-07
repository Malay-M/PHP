<?php

    include('../Connect/connect.php');

    if(isset($_POST['submit'])) {

        echo var_dump($_POST);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $state = $_POST['states'];
        $pincode = $_POST['pincode'];
        
        echo $state;


        $query = "UPDATE profile_details SET firstName = '$fname', lastName = '$lname', email = '$email', phone = '$phone', address = '$address', country = '$country', state = '$state', pincode = '$pincode' WHERE username = '$username'";

        $sql = mysqli_query($conn, $query);
    }

    header('Location:profile.php');


?>