<?php
    include('../Connect/connect.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM categories WHERE category_id=".$id;
        $sql = mysqli_query($conn, $query);
        
        header('Location:dashboard.php');
    }

?>

