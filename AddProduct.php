<?php

//linking to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

//making the connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

$message;

//checking if submit button was entered and info from the form was submitted, if i dont add this in the code doesnt work
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //Insreting into the database
    $sql = "INSERT INTO product (name, price, quantity) VALUES ('$name', $price, $quantity)";
    
    if ($conn->query($sql) === true) 
    {
        $message = "Product added successfully!";
    } 
    else 
    {
        $message = "Error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="logo">
        <img src="logo.png" alt="Brand Logo" width="100" height="100">
    </div>
    <nav>
        <a href="HomePage.html">Home</a>
        <a href="Login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="ViewProducts.php">View Products</a>
        <a href="AddProduct.php">Add Product</a>
        <a href="EditProduct.php">Edit Product</a>
        <a href="DeleteProduct.php">Delete Product</a>
        <a href="AboutUs.html">About Us</a>
    </nav>

    <div class="banner-area">
        <h2>HKPharmaceuticals</h2>


    <?php if (isset($message)) echo '<p>'.$message.'</p>'; ?>
    <form action="AddProduct.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity"s><br>
        <input type="submit" value="Add">
    </form>
    </div>
</body>
</html>