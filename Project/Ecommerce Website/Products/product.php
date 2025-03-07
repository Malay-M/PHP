<?php
include('../Connect/connect.php');


$query = "SELECT * FROM cart_details";
$sql = mysqli_query($conn, $query);

$num_item = mysqli_num_rows($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="logo"><a href="../index.php">QuickOrder</a></div>

            <div class="options">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="../Order/order.php">Order</a></li>
                    <li><a href="../about.php">About</a></li>
                    <li><a href="../help.php">Help</a></li>
                </ul>
            </div>

            <div class="search-form">
                <form method="GET">
                    <input type="text" name="search" placeholder="Search">
                    <input type="submit" value="Search" name="submit" style="height:30px; width:60px">
                </form>

                <a href="cart.php"><i class="fa-solid fa-cart-plus fa-2xl"><sup><?php echo $num_item;?></sup></i></a>
                
            </div>

        </nav>

    </header>


    <div class="container">

        <div class="filter">
            <div class="category">
                <h3>Category</h3>
                <?php
                $query = "SELECT * FROM categories";
                $sql = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<a href='product.php?category=" . $row['category_id'] . "'>" . $row['category_name'] . "</a>";
                }
                ?>
            </div>

            <div class="brand">
                <h3>Brand</h3>
                <?php
                $query = "SELECT * FROM brands";
                $sql = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<a href='product.php?brand=" . $row['brand_id'] . "'>" . $row['brand_name'] . "</a>";
                }
                ?>
            </div>

        </div>

        <div class="products">

            <?php
            if (!isset($_GET['submit'])) {
                if (!isset($_GET['category'])) {
                    if (!isset($_GET['brand'])) {

                        $query = "SELECT * FROM products";
                        $sql = mysqli_query($conn, $query);

                        $num = mysqli_num_rows($sql);

                        if ($num > 0) {
                            while ($row = mysqli_fetch_assoc($sql)) {

                                echo "<div class='item'>";

                                echo "<div class='item-pic'>";
                                echo "<img src='Images/" . $row['url'] . "' alt='" . $row['category'] . " Image''>";
                                echo "</div>";
                                echo "<div class='item-title'>";
                                echo "<p class='title'>" . $row['title'] . "</p>";
                                echo "</div>";

                                echo "<div class='cart-price'>";
                                echo "<div class='item-price'>";
                                echo "<p class='weight'>" . $row['weight'] . "</p>";
                                if ($row['offer'] == 0) {
                                    echo "<p class='price'>&#8377;" . $row['price'] . "</p>";
                                } else {
                                    echo "<p class='price' style='text-decoration: line-through; font-weight:normal'>&#8377;" . $row['price'] . "</p>";
                                    echo "<p class='price'>&#8377;" . (($row['price'] * (100 - $row['offer'])) / 100) . "</p>";
                                }

                                echo "</div>";
                                echo "<div class='item-add'><button><a href='product.php?add_to_cart=".$row['id']."'>Add to cart</a></button></div>";
                                echo "</div>";

                                echo "</div>";
                            }
                        }
                    }
                }
            }

            if (isset($_GET['category'])) {
                $id = $_GET['category'];

                $query = "SELECT * FROM categories WHERE category_id=" . $id;
                $sql = mysqli_query($conn, $query);
                $value = mysqli_fetch_assoc($sql);

                $query = "SELECT * FROM products WHERE category='" . $value['category_name'] . "'";
                $sql = mysqli_query($conn, $query);

                $num = mysqli_num_rows($sql);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) {

                        echo "<div class='item'>";

                        echo "<div class='item-pic'>";
                        echo "<img src='Images/" . $row['url'] . "' alt='" . $row['category'] . " Image''>";
                        echo "</div>";
                        echo "<div class='item-title'>";
                        echo "<p class='title'>" . $row['title'] . "</p>";
                        echo "</div>";

                        echo "<div class='cart-price'>";
                        echo "<div class='item-price'>";
                        echo "<p class='weight'>" . $row['weight'] . "</p>";
                        if ($row['offer'] == 0) {
                            echo "<p class='price'>&#8377;" . $row['price'] . "</p>";
                        } else {
                            echo "<p class='price' style='text-decoration: line-through; font-weight:normal'>&#8377;" . $row['price'] . "</p>";
                            echo "<p class='price'>&#8377;" . (($row['price'] * (100 - $row['offer'])) / 100) . "</p>";
                        }

                        echo "</div>";
                        echo "<div class='item-add'><button><a href='product.php?add_to_cart=".$row['id']."'>Add to cart</a></button></div>";
                        echo "</div>";

                        echo "</div>";
                    }
                }
            }


            if (isset($_GET['brand'])) {
                $id = $_GET['brand'];

                $query = "SELECT * FROM brands WHERE brand_id=" . $id;
                $sql = mysqli_query($conn, $query);
                $value = mysqli_fetch_assoc($sql);

                $query = "SELECT * FROM products WHERE brand='" . $value['brand_name'] . "'";
                $sql = mysqli_query($conn, $query);

                $num = mysqli_num_rows($sql);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) {

                        echo "<div class='item'>";

                        echo "<div class='item-pic'>";
                        echo "<img src='Images/" . $row['url'] . "' alt='" . $row['category'] . " Image''>";
                        echo "</div>";
                        echo "<div class='item-title'>";
                        echo "<p class='title'>" . $row['title'] . "</p>";
                        echo "</div>";

                        echo "<div class='cart-price'>";
                        echo "<div class='item-price'>";
                        echo "<p class='weight'>" . $row['weight'] . "</p>";
                        if ($row['offer'] == 0) {
                            echo "<p class='price'>&#8377;" . $row['price'] . "</p>";
                        } else {
                            echo "<p class='price' style='text-decoration: line-through; font-weight:normal'>&#8377;" . $row['price'] . "</p>";
                            echo "<p class='price'>&#8377;" . (($row['price'] * (100 - $row['offer'])) / 100) . "</p>";
                        }

                        echo "</div>";
                        echo "<div class='item-add'><button><a href='product.php?add_to_cart=".$row['id']."'>Add to cart</a></button></div>";
                        echo "</div>";

                        echo "</div>";
                    }
                }
            }


            if (isset($_GET['submit'])) {
                $search = $_GET['search'];

                $search = rtrim($search);
                $query = "SELECT * FROM products WHERE title LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%' OR brand LIKE '%" . $search . "%'";

                $sql = mysqli_query($conn, $query);

                $num = mysqli_num_rows($sql);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) {

                        echo "<div class='item'>";

                        echo "<div class='item-pic'>";
                        echo "<img src='Images/" . $row['url'] . "' alt='" . $row['category'] . " Image''>";
                        echo "</div>";
                        echo "<div class='item-title'>";
                        echo "<p class='title'>" . $row['title'] . "</p>";
                        echo "</div>";

                        echo "<div class='cart-price'>";
                        echo "<div class='item-price'>";
                        echo "<p class='weight'>" . $row['weight'] . "</p>";
                        if ($row['offer'] == 0) {
                            echo "<p class='price'>&#8377;" . $row['price'] . "</p>";
                        } else {
                            echo "<p class='price' style='text-decoration: line-through; font-weight:normal'>&#8377;" . $row['price'] . "</p>";
                            echo "<p class='price'>&#8377;" . (($row['price'] * (100 - $row['offer'])) / 100) . "</p>";
                        }

                        echo "</div>";
                        echo "<div class='item-add'><button><a href='product.php?add_to_cart=".$row['id']."'>Add to cart</a></button></div>";
                        echo "</div>";

                        echo "</div>";
                    }
                }
            }



            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } 
            else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            if(isset($_GET['add_to_cart'])) {
                $get_ip_add = $ip;
                $product_id = $_GET['add_to_cart'];

                $query = "SELECT * FROM cart_details WHERE product_id='".$product_id."' AND ip_address='".$get_ip_add."'";
                $sql = mysqli_query($conn, $query);

                $num = mysqli_num_rows($sql);

                if($num > 0) {
                    echo "<script>alert('This item is already present inside cart')</script>";
                    echo "<script>window.open('product.php', '_self')</script>";
                } else {
                    $query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ($product_id, '$get_ip_add', 1)";
                    $sql = mysqli_query($conn, $query);
                    echo "<script>window.open('product.php', '_self')</script>";
                }
            }

            ?>

        </div>


    </div>



</body>

</html>