<?php
    include('../Connect/connect.php');

    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id=".$id;
    $sql = mysqli_query($conn, $query);

    $values = mysqli_fetch_assoc($sql);
?>

<html>
<head>
    <title>Update Product</title>
    <style>

        form {
            display: flex;
            justify-content: center;
        }

        h1 {
            text-align: center;
        }
        
        fieldset {
            width: 850px;
        }

        legend {
            font-size: 30px;
            text-align: center;
        }

        form label {
            font-size: 25px;
        }
        form input {
            width: 500px;
            height: 50px;
            font-size: 20px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        form select {
            width: 200px;
            height: 30px;
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 18px;
        }

        form button {
            width: 70px;
            height: 30px;
            font-size: 15px;
            background-color: green;
            color: white;
            border: 2px solid black;
            border-radius: 5px;
        }

        fieldset {
            display: flex;
            justify-content: space-between;
        }

        img {
            width: 200px;
            border: 3px solid black;
        }

        .product_image {
            text-align: center;
        }

        .admin{
            width: 120px;
            background-color: yellowgreen;
            margin-left: 10px;
        }

        .admin a {
            color: white;   
            text-decoration: none;
        }

        

    </style>

</head>

<body>
    <h1>Update Product</h1>

    <form method="POST" enctype="multipart/form-data">
        <fieldset>
        <legend>Update Product</legend>
        <div class="update_form">

    

        <label>Product Name:</label><br>
        <input type="text" name="name" value="<?php echo $values['title']?>" required><br>
        <label>Product Price:</label><br>
        <input type="number" name="price" value="<?php echo $values['price']?>" required><br>
        <label>Product Weight:</label><br>
        <input type="text" name="weight" value="<?php echo $values['weight']?>" required><br>
        <label>Product Offer(%):</label><br>
        <input type="text" name="offer" value="<?php echo $values['offer']?>" required><br>
        <label>Product Category:</label><br>
        <select name="category" required>
            <option value="null">--Select Category--</option>
            <?php
            $query = "SELECT * FROM categories";
            $sql = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($sql)) {
                if($row['category_name'] == $values['category']) {
                    echo "<option value='" . $row['category_name'] . "' selected>" . $row['category_name'] . "</option>";
                } else {
                    echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                }
                
            }

            ?>
        </select><br>
        <label>Product Brand:</label><br>
        <select name="brand" required>
            <option value="null">--Select Brand--</option>
            <?php
            $query = "SELECT * FROM brands";
            $sql = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($sql)) {
                if($row['brand_name'] == $values['brand']) {
                    echo "<option value='" . $row['brand_name'] . "' selected>" . $row['brand_name'] . "</option>";
                } else {
                    echo "<option value='" . $row['brand_name'] . "'>" . $row['brand_name'] . "</option>";
                }
                
            }

            ?>
        </select><br>
        <label>Product Image:</label><br>
        <input type="file" accept="image/jpeg, image/png" name="myfile"><br>
        <label>Product Status:</label><br>
        <select name="status" required>
            <option value="null">--Select Status--</option>
            <?php
                if($values['status'] == 'available') {
                    echo "<option value='available' selected>Available</option>";
                    echo "<option value='not available'>Not available</option>";
                } else {
                    echo "<option value='available'>Available</option>";
                    echo "<option value='not available' selected>Not available</option>";
                }
            ?>
            
        </select><br>

        <button name="submit_update">Update</button>
            <button class="admin"><a href="dashboard.php">Admin panel</a></button>

        
        </div>

        <div class="product_image">
            <h3>Product Image</h3>
            <img src="../Products/Images/<?php echo $values['url']?>" alt=<?php echo $values['title']?>" pic">
        </div>

        
        </fieldset>
    </form>
</body>
</html>

<?php


    

    if(isset($_POST['submit_update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $offer = $_POST['offer'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $status = $_POST['status'];

        
        $filename = $_FILES['myfile']['name'];      
        $temp = $_FILES['myfile']['tmp_name'];
        move_uploaded_file($temp, "../Products/Images/" . $filename);
        
        
        if($filename == "") {
            $filename = $values['url'];
        }
        
        $query = "UPDATE products SET title='".$name."', price=".$price.", weight='".$weight."', offer=".$offer.", category='".$category."', brand='".$brand."', url='".$filename."', status='".$status."' WHERE id=".$id;
        

        $sql = mysqli_query($conn, $query);

        header('Location:update_product.php?id='.$id);
        if($sql) {
            echo "<script>alert('Product updated')</script>";
        } else {
            echo "<script>alert('Product not updated')</script>";
        }

        
    }

?>