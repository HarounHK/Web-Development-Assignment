<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="" method="POST"> <!-- Update the action attribute to an empty string -->
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" id="fullname" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <label for="address">Home Address:</label>
        <input type="text" name="address" id="address" required><br><br>
        
        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode" id="postcode" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];

    // Insert data into the 'users' table
    $sql = "INSERT INTO user (Name, Email, Username, password, Address, Postcode) VALUES ('$fullname', '$email', '$user', '$pass', '$address', '$postcode')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
