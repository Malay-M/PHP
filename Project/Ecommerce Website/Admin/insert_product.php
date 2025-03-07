<?php

    include("../Connect/connect.php");
?>

<div class="insert_product">

    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Insert Product</legend>

            <label>Product Name:</label><br>
            <input type="text" name="name" required><br>
            <label>Product Price:</label><br>
            <input type="number" name="price" required><br>
            <label>Product Weight:</label><br>
            <input type="text" name="weight" required><br>
            <label>Product Category:</label><br>
            <select name="category" required>
                <option value="null">--Select Category--</option>
                <?php
                $query = "SELECT * FROM categories";
                $sql = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($sql)) {
                    echo var_dump($row);
                    echo "<option value='".$row['category_name']."'>".$row['category_name']."</option>";
                }

            ?>
            </select><br>
            <label>Product Brand:</label><br>
            <select name="brand" required>
                <option value="null">--Select Brand--</option>
            <?php
                $query = "SELECT * FROM brands";
                $sql = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($sql)) {
                    echo var_dump($row);
                    echo "<option value='".$row['brand_name']."'>".$row['brand_name']."</option>";
                }

            ?>
            </select><br>
            <label>Product Image:</label><br>
            <input type="file" accept="image/jpeg, image/png" name="myfile" required><br>
            <label>Product Status:</label><br>
            <select name="status" required>
                <option value="null">--Select Status--</option>
                <option value="available">Available</option>
                <option value="not available">Not available</option>
            </select><br>

            <button name="submit_product">Insert</button>
            
        </fieldset>
    </form>
</div>

<?php

    

?>