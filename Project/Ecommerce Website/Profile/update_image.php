<?php

    include('../Connect/connect.php');

    if(isset($_POST['updatePic'])) {


        $username = $_COOKIE['username'];

        $filename = $_FILES['myfile']['name'];      
        $temp = $_FILES['myfile']['tmp_name'];
        move_uploaded_file($temp, "Image/" . $filename);

        $query = "UPDATE profile_details SET url='$filename' WHERE username='$username'";
        $sql = mysqli_query($conn, $query); 
    }


    header('Location:profile.php');

?>