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
    $id = $_POST['id'];

    //deleting product
    $sql = "DELETE FROM product WHERE id = $id";
    if ($conn->query($sql) === true) 
    {
        $message = "Product deleted successfully";
    } 

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Product</title>
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
    <form action="DeleteProduct.php" method="post">
        <label for="id">Product ID:</label>
        <input type="number" name="id" id="id">
        <br>
        <input type="submit" value="Delete Product">
    </form>
    </div>
</body>
</html>