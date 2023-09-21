<?php

//linking to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

//making the connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    //displaying message to the user, will check if there is more than 0 rows, if it does it gets the first row, places it into user and checks if the password matches in the database
    if ($result->num_rows > 0) 
    {
        $user = $result->fetch_assoc(); //places the first row into the user Note:I learned how to use this fetch_assoc function using online resources
        if ($password === $user['password']) 
        { 
            $message = "You have successfully logged in!";
        }
    } 
        else 
        {
            $message = "Incorrect Login Details. Please try again";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

    <?php if (isset($message)) echo '<p>'.$message.'</p>'; ?>     <!-- I learned how to use this isset function using online resources-->
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Login">
    </form>
    </div>
</body>
</html>