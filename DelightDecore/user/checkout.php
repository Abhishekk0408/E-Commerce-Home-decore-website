<?php


@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $total = 0;
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         if (is_numeric($product_price)) {
            $total_price = $product_price;
            $total += $total_price;
         }
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email,flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$flat','$street','$city','$state','$country','$pin_code','$total_product','$total')") or die('query failed');


   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".number_format($total)."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p>(*choose a payment method*)</p>
         </div>
            <a href='payment.html' class='btn'>Make Payment</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script>
      function validateForm() {
         var name = document.forms["orderForm"]["name"].value;
         var number = document.forms["orderForm"]["number"].value;
         var email = document.forms["orderForm"]["email"].value;
         var flat = document.forms["orderForm"]["flat"].value;
         var street = document.forms["orderForm"]["street"].value;
         var city = document.forms["orderForm"]["city"].value;
         var state = document.forms["orderForm"]["state"].value;
         var country = document.forms["orderForm"]["country"].value;
         var pin_code = document.forms["orderForm"]["pin_code"].value;

         // Mobile number validation using regex (10 digits, optional country code)
         var numberRegex = /^[0-9]{10}$/;

         if (name == "" || !number.match(numberRegex) || email == "" || flat == "" || street == "" || city == "" || state == "" || country == "" || pin_code == "") {
            alert("Please enter valid information in all fields");
            return false;
         }

         // You can add more specific validations for each field if needed.

         return true;
      }
   </script>

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
 $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
 $total = 0;
 $grand_total = 0;
 
 if (mysqli_num_rows($select_cart) > 0) {
     while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
         $product_price = $fetch_cart['price'] * $fetch_cart['quantity']; // Calculate the numeric total price
         $total += $product_price; // Accumulate the total
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : Rs.<?= $total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. maharashtra" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. india" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>