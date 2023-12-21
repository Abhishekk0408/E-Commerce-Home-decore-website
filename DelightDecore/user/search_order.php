<?php
include 'config.php';

if (isset($_POST['search'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    header("Location: order_details.php?name=" . urlencode($name));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #eee;
        margin: 0;
        padding: 0;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-top: 20px;
    }

    .search-form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    label {
        font-weight: bold;
    }

    input[type="text"] {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }
</style>
</head>
<body>
<div class="search-form">
    <h2>Search for an Order receipt</h2>
    <form action="search_order.php" method="POST">
        <label for="name">Enter Name:</label>
        <input type="text" name="name" id="name" required>
        <input type="submit" name="search" value="Search Orders">
    </form>
</div>
</body>
</html>
