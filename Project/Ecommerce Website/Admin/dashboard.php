<?php
include('../Connect/connect.php');
session_start();


if(!isset($_SESSION['admin_username'])) {
    header("Location:login.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo"><a href="../index.php">QuickOrder</a></div>
        <div class="logout"><a href="logout.php">Logout</a></div>
    </nav>

    <div class="panel">
        <div>Admin Panel</div>

        <div class="menu">
            <div class="product">
                <button>Products &#9660;</button>
                <div class="options product-option">

                    <form method="POST">
                        <button name="insert_product">Insert Products</button>
                    </form>

                    <form method="POST">
                        <button name="view_product">View Products</button>
                    </form>

                    <form method="POST">
                        <button name="edit_product">Edit Product</button>
                    </form>

                </div>
            </div>


            <div class="category">
                <button>Category &#9660;</button>
                <div class="options category-option">

                    <form method="POST">
                        <button name="insert_category">Insert Categorys</button>
                    </form>

                    <form method="POST">
                        <button name="view_category">View Categorys</button>
                    </form>

                </div>
            </div>


            <div class="brand">
                <button>Brand &#9660;</button>
                <div class="options brand-option">

                    <form method="POST">
                        <button name="insert_brand">Insert Brands</button>
                    </form>

                    <form method="POST">
                        <button name="view_brand">View Brands</button>
                    </form>

                </div>
            </div>


            <div class="orders">

                <form method="POST">
                    <button name="view_order">All Orders</button>
                </form>

            </div>


            <div class="payments">
                <form method="POST">
                    <button name='view_payment'>All Payments</button>
                </form>

            </div>


            <div class="users">
                <form method="POST">
                    <button name='view_user'>List Users</button>
                </form>

            </div>
        </div>
    </div>

    <main>
        <div class="container">

        </div>

    </main>
</body>

</html>


<?php
//Insert Category
if (isset($_POST['insert_category'])) {
    include('insert_category.php');
}

if (isset($_POST['submit_category'])) {
    $category = $_POST['category'];
    $category = ucwords($category);


    $query = "SELECT * FROM categories WHERE category_name='" . $category . "'";
    $sql = mysqli_query($conn, $query);

    $num = mysqli_num_rows($sql);
    if ($num > 0) {
        echo "<script>alert('Category Already Exists')</script>";
    } else {
        $query = "INSERT INTO categories (category_name) VALUES ('" . $category . "')";
        $sql = mysqli_query($conn, $query);
        echo "<script>alert('Category Inserted Successfully')</script>";
    }
}


//View Category
if (isset($_POST['view_category'])) {
    include('view_category.php');
}



//Insert Brand
if (isset($_POST['insert_brand'])) {
    include('insert_brand.php');
}

if (isset($_POST['submit_brand'])) {
    $brand = $_POST['brand'];

    $brand = ucwords($brand);

    $query = "SELECT * FROM brands WHERE brand_name='" . $brand . "'";
    $sql = mysqli_query($conn, $query);

    $num = mysqli_num_rows($sql);
    if ($num > 0) {
        echo "<script>alert('Brand Already Exists')</script>";
    } else {
        $query = "INSERT INTO brands (brand_name) VALUES ('" . $brand . "')";
        $sql = mysqli_query($conn, $query);
        echo "<script>alert('Brand Inserted Successfully')</script>";
    }
}

//View Brand
if (isset($_POST['view_brand'])) {
    include('view_brand.php');
}


//Insert Product

if (isset($_POST['insert_product'])) {
    include('insert_product.php');
}

if (isset($_POST['submit_product'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $status = $_POST['status'];

    $num = mysqli_query($conn, "SELECT id FROM products");
    $id = mysqli_num_rows($num);
    $id++;

    $filename = $_FILES['myfile']['name'];
    $temp = $_FILES['myfile']['tmp_name'];
    move_uploaded_file($temp, "../Products/Images/" . $filename);



    $query = "INSERT INTO products (id, title, price, weight, category, brand, url, status) VALUES ('" . $id . "','" . $name . "', '" . $price . "', '" . $weight . "', '" . $category . "', '" . $brand . "', '" . $filename . "', '" . $status . "')";

    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo "<script>alert('Product Inserted Successfully')</script>";
    } else {
        echo "<script>alert('Product can't insered')</script>";
    }
}

//View Products

if (isset($_POST['view_product'])) {
    include('view_product.php');
}

//Edit Product

if (isset($_POST['edit_product'])) {
    include('edit_product.php');
}


//View Orders

if (isset($_POST['view_order'])) {
    include('view_orders.php');
}


//View Payment

if (isset($_POST['view_payment'])) {
    include('view_payments.php');
}


if (isset($_POST['view_user'])) {
    include('view_users.php');
}



?>