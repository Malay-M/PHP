<?php
include('Connect/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickOrder - Fresh Food Delivered Daily</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <nav class="navbar">
            <div class="logo"><a href="index.php">QuickOrder</a></div>
            <div class="options">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Products/product.php">Products</a></li>
                    <li><a href="Order/order.php">Orders</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="help.php">Help</a></li>
                </ul>
            </div>
            <?php
            if (isset($_COOKIE['username'])) {
                $username = $_COOKIE['username'];

                $query = "SELECT * FROM profile_details WHERE username = '$username'";
                $sql = mysqli_query($conn, $query);
                $value = mysqli_fetch_assoc($sql);
                $filename = $value['url'];

                $query = "SELECT * FROM register WHERE username = '$username'";
                $sql = mysqli_query($conn, $query);
                $value = mysqli_fetch_assoc($sql);
                $name = $value['name'];
                $email = $value['email'];
            }

            if (isset($_COOKIE['username'])) {
                echo "<div class='user-profile'>";
                echo "<div class='user-pic'><img src='Profile/Image/$filename'></div>";
                echo "<div class='dropdown'>";
                echo "<button id='profileBtn' class='dropbtn' onclick='toggleDropdown()'>Welcome, " . $_COOKIE['name'] . "&#x25BC;</button>";
                echo "<div id='dropdownContent' class='dropdown-content'>";
                echo "<div class='show-profile'>";
                echo "<div class='user-pic'><img src='Profile/Image/$filename'></div>";
                echo "<div><p>$name</p><p>$email</p></div>";
                echo "</div>";
                echo "<a href='Account/account.php' style='margin: 5px;'>Account</a>";
                echo "<a href='Profile/profile.php' style='margin: 5px;'>Profile</a>";
                echo "<a href='Order/order.php' style='margin: 5px;'>Orders</a>";
                echo "<div class='logout'><a href='Login/logout.php'>Logout</a></div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='login'>
                    <button><a href='Login/login.php'>Login</a></button>
                    <button><a href='SignUp/signUp.php'>Sign Up</a></button>
                </div>";
            }
            ?>
        </nav>
    </header>

    
    <main>
        <div class="container">
            <div class="text">
                <h3>Fresh Food Delivered to Your Doorstep</h3>
                <p>Welcome to QuickOrder, your go-to service for fresh, daily food deliveries. From farm-fresh produce to gourmet meals, we bring the best of the market straight to your door. Enjoy convenience and quality with QuickOrder.</p>
                <button><a href="Products/product.php">Order Now</a></button>
            </div>
            <div class="image">
                <img src="Image/indexPic.png" alt="Fresh Food Delivery">
            </div>
        </div>

        <div class="container">
            
            <div class="text">
                <h3>Fresh Produce</h3>
                <p>Get the freshest fruits and vegetables delivered to your home. Our produce is sourced directly from local farms to ensure quality and freshness. Order now and taste the difference.</p>
                <button><a href="Products/product.php">Order Now</a></button>
            </div>
            <div class="image">
                <img src="Image/produce.png" alt="Fresh Produce">
            </div>
        </div>


        <div class="container">
            
            <div class="text">
                <h3>Dairy Products</h3>
                <p>From fresh milk to artisanal cheeses, our dairy selection is unmatched. Enjoy high-quality dairy products delivered to your home. Order today and indulge in the best dairy products available.</p>
                <button><a href="Products/product.php">Order Now</a></button>
            </div>
            <div class="image">
                <img src="Image/dairy.png" alt="Dairy Products">
            </div>
        </div>
    </main>

    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" aria-label="Google Plus"><i class="fa-brands fa-google-plus"></i></a>
                <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Account/account.php">Account</a></li>
                    <li><a href="Products/product.php">Products</a></li>
                    <li><a href="Order/order.php">Order</a></li>
                    <li><a href="Admin/login.php">Admin Login</a></li>

                    <li><a href="about.php">About</a></li>
                    <li><a href="help.php">Help</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy; 2024 | Designed by Malay</p>
        </div>
    </footer>

    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            var profileBtn = document.getElementById("profileBtn");
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
                profileBtn.classList.remove("active");
            } else {
                dropdownContent.style.display = 'block';
                profileBtn.classList.add("active");
            }
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn') && !event.target.matches('.dropdown-content')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                        document.getElementById("profileBtn").classList.remove("active");
                    }
                }
            }
        }
    </script>
</body>

</html>
