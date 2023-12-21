<?php
include 'header.php';

// Initialize $message as an empty array
$message = [];
$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');

if (isset($_POST['search_data_product'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_POST['search_data']);

    $sql = "SELECT * FROM `e/dproduct` WHERE `name` LIKE '%$searchQuery%'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="container">';
            echo '<h2>Search Results:</h2>';
            echo '<div class="box-container">';
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <form action='' method='post'>
                <div class='product-section'>
                <div class='product'>
                <img src='../admin/product/$row[image]' class='card-img-top' alt='...'>
                        <h2 class='product-title'>{$row['name']}</h2>
                        <div class='product-price'>Rs. {$row['price']}</div>
                        <input type='hidden' name='pname' value='{$row['name']}'>
                        <input type='hidden' name='pprice' value='{$row['price']}'>
                        <input type='hidden' name='pimage' value='{$row['image']}'>
                        <input type='submit' name='add_to_cart' class='btn text-white w-100' value='Add to Cart'>
                    
                    </div>
                    </div>
                </form>
                ";
            }
            
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="container">';
            echo '<h2>No products found.</h2>';
            echo '</div>';
        }
    } else {
        echo '<div class="container">';
        echo '<h2>Search failed.</h2>';
        echo '</div>';
    }
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['pname'];
    $product_price = $_POST['pprice'];
    $product_image = $_POST['pimage'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
        
        if ($insert_product) {
            $message[] = 'Product added to cart successfully';
        } else {
            $message[] = 'Failed to add the product to the cart: ' . mysqli_error($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="product.css">

    <style>
        .message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            position: relative;
        }

        .message span {
            display: block;
            margin-bottom: 5px;
        }

        .message i {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #721c24;
        }
    </style>
</head>
<body>
<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}
?>
<?php
include 'footer.php';
?>
</body>
</html>
