<?php
include 'config.php'; // Include the database connection script

if (isset($_POST['submit'])) {
    // Get product details from the form
    $product_name = $_POST['pname'];
    $product_price = $_POST['pprice'];
    $product_image = $_FILES['pimage'];
    $product_category = isset($_POST['pcategory']) ? $_POST['pcategory'] : '';

    // Validate the uploaded image
    if (!empty($product_name) && is_numeric($product_price) && $product_image['error'] === 0) {
        $image_name = $_FILES['pimage']['name'];
        $image_tmp_name = $_FILES['pimage']['tmp_name'];
        $image_destination = "uploaded_img/" . $image_name;

        // Move the uploaded image to the destination folder
        if (move_uploaded_file($image_tmp_name, $image_destination)) {
            // Insert product details into the database using a prepared statement
            $sql = "INSERT INTO `e/dproduct` (`name`, `price`, `image`, `category`) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssss", $product_name, $product_price, $image_destination, $product_category);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header("location: index.php");
                    exit();
                } else {
                    echo "Error executing the query: " . mysqli_error($conn);
                }
            } else {
                echo "Error preparing the statement: " . mysqli_error($conn);
            }
        } else {
            echo "Error moving the uploaded file to the destination folder.";
        }
    } else {
        echo "Invalid input or file upload error.";
    }
}
?>
