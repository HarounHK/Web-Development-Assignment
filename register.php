<?php

//linking to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

//making the connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

//checking if submit button was entered and info from the form was submitted, if i dont add this in the code doesnt work
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    //adding user to databases
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === true) 
    {
        $message = "Registered Successfully";
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
    <title>Register</title>
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
        <h2>HPharmaceuticals</h2>

    <?php if (isset($message)) echo '<p>' . $message . '</p>'; ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Register">
    </form>
    </div>
</body>
</html>