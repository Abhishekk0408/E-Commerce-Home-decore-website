<?php
include 'config.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Perform the deletion
    $deleteQuery = "DELETE FROM `e/dproduct` WHERE id = $productId";
    if (mysqli_query($conn, $deleteQuery)) {
        // Product deleted successfully, redirect back to the product list
        header("Location: index.php");
        exit();
    } else {
        // Handle the error
        echo "Error deleting the product: " . mysqli_error($conn);
    }
}
?>
