<?php
include 'config.php';

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
            $message[] = 'Failed to add the product to the cart';
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
include 'header.php';
?>
<section class='templeproducts'>
    <div class='woodentempleheading1'>
        <h1>Wall Art</h1>
    </div>
    <div class='product-section'>
            <?php
            include 'config.php';
            $record = mysqli_query($conn, "SELECT * FROM `e/dproduct`");
            if (mysqli_num_rows($record) > 0) {
                while ($row = mysqli_fetch_assoc($record)) {
                    $check_page = $row['category'];
                    if ($check_page === 'Wall Art') {
                        echo "
                        <form action='' method='post'>
                        <div class='product'>
                        <img src='../admin/product/$row[image]' class='card-img-top' alt='...'>
                                <h2 class='product-title'>{$row['name']}</h2>
                                <div class='product-price'>Rs.{$row['price']}</div>
                                <input type='hidden' name='pname' value='{$row['name']}'>
                                <input type='hidden' name='pprice' value='{$row['price']}'>
                                <input type='hidden' name='pimage' value='{$row['image']}'>
                                
                                <input type='submit' name='add_to_cart' class='btnn text-white w-100' value='Add to Cart'>
                            
                           
                            </div>
                        </form>
                        ";
                    }
                }
            }
            ?>
        
    </section>


</div>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

<?php
include 'footer.php';
?>

</body>

</html>
