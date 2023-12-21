<?php
// Database connection settings
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "UserName"; // Replace with your database username
$password = "Password"; // Replace with your database password
$database = "tbluser"; // Replace with your database name

// Establish a connection to the database
$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["email"]) && isset($_POST["new_password"])) {
    $email = $_POST["email"];
    $newPassword = $_POST["new_password"];

    // Update the user's password in the database using a prepared statement
    $updateQuery = "UPDATE `tbluser` SET `Password` = ? WHERE `Email` = ?";

    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ss", $newPassword, $email);

    if (mysqli_stmt_execute($stmt)) {
        // Password updated successfully, redirect the user
        header("location:userlogin.php");
        exit(); // Terminate the script after redirection
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Forgot Password</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
