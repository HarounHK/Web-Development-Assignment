<?php

//linking to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

//making the connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM product;"; //getting sql query
$result = $conn->query($sql);  // placing sql query into result variable

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 50%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: left;
        }

    </style>
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

    <!-- Certain parts here, such as the php else and end if statements i learned how to do using online resources -->
    <?php if ($result->num_rows > 0): ?> 
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
    </div>
</body>
</html>