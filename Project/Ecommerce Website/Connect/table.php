<?php 
    include ("connect.php");

    $query = "CREATE TABLE IF NOT EXISTS register (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(50) NOT NULL,
        address VARCHAR(200) NOT NULL,
        phone VARCHAR(10) NOT NULL,
        email VARCHAR(50) NOT NULL,
        username VARCHAR(50) UNIQUE,
        password VARCHAR(50) NOT NULL
    )";

    $sql = mysqli_query($conn, $query);



?>

<!-- 
    
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY,
    title VARCHAR(50)  NOT NULL,
    price INT NOT NULL,
    weight VARCHAR(20) NOT NULL,
    offer INT DEFAULT 0,
    category VARCHAR(50) NOT NULL,
    brand VARCHAR(50) NOT NULL,
    url VARCHAR(200) NOT NULL
);




CREATE TABLE IF NOT EXISTS adminlogin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL,
    refer VARCHAR(50) NOT NULL
);



//Insert category table

CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL
);



//Insert brand table

CREATE TABLE IF NOT EXISTS brands (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(50) NOT NULL
);



//Cart_details table
CREATE TABLE IF NOT EXISTS cart_details (
    product_id INT PRIMARY KEY,
    ip_address VARCHAR(255) NOT NULL,
    quantity INT DEFAULT 0
);



//profile table 

CREATE TABLE IF NOT EXISTS profile_details (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    email VARCHAR(50),
    phone VARCHAR(50),
    address VARCHAR(200),
    country VARCHAR(50),
    state VARCHAR(50),
    pincode VARCHAR(50),
    url VARCHAR(255) DEFAULT 'profile.png'

);


// USER INVOICE TABLE

CREATE TABLE IF NOT EXISTS user_invoice (
    invoice_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    invoice_number VARCHAR(50) NOT NULL,
    amount INT NOT NULL,
    total_items INT NOT NULL,
    order_status VARCHAR(50) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()

);


// ORDERS TABLE

CREATE TABLE IF NOT EXISTS orders(
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_number VARCHAR(50) NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);


// ORDER ADDRESS 

CREATE TABLE IF NOT EXISTS order_address (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_number VARCHAR(50) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    address VARCHAR(200) NOT NULL,
    country VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    pincode VARCHAR(50) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()	
);


CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    invoice_number VARCHAR(50) NOT NULL,
    amount INT NOT NULL,
    payment_id VARCHAR(50),
    payment_status VARCHAR(50),
    add_on DATETIME NOT NULL
);


CREATE TABLE deleted_accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    deleted_at DATETIME NOT NULL,
    reason VARCHAR(255)
);




-->