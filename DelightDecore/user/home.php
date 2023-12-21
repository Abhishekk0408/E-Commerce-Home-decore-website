<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delight Decor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@500&family=Nunito&family=Palanquin+Dark:wght@500&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/48631f42f1.js" crossorigin="anonymous"></script>

</head>
<body>
<?php include 'header.php'?>
      
<div class="slideshow-container">
    <div class="mySlides1">
    <div class="heading">
    <img src="./Images/dealimg.jpg" alt="banner" class="img" width="90%" height="100%">
    <div class="banner-text">
        <h4>10% off on Your First Order</h4>
        <h3>Newest Home Decors</h3>

        </div>
        </div> 
    </div>
    <div class="mySlides1">
        <div class="heading">
            <img src="./Images/image.jpg" alt="banner" width="90%" height="100%">
            <div class="banner-text">
            <h4>20% off on New Arrivals</h4>
            <h3>Newest Home Decors</h3> 
                

            </div>
        </div>
    </div>
    <script src="home.js"></script>
    <div>
    <!-- Move the "Show Now" button here -->
    
</div>
</div>

</div>

    <!-- Move the "Show Now" button here -->
    <a href="products.php" class="show-now-link">Show Now </a>

      <div class="heading3">
      <h1>Top Pick For You</h1>
   </div>
    <div class="sliding-container">
        <div class="product-card">
           <a href="tableclock.php"><img src="Images/clock5.png" alt="Product 1"></a>
            <h3>Check it Out</h3>
            <p style="font-size: 15px;">Top Seller in the Clock</p>
        </div>
        <div class="product-card">
        <a href="artificialflower.php"><img src="Images/flower4.jpeg" alt="Product 2"></a>
            <h3>Check it Out</h3>
            <p style="font-size: 15px;">Top Seller in the flower</p>
        </div>
        <div class="product-card">
        <a href="woodentemple.php"><img src="Images\temple7" alt="Product 3"></a>
            <h3>Check it Out</h3>
            <p style="font-size: 15px;">Top Seller in the temple</p>
        </div>
        <div class="product-card">
        <a href="wallart.php"><img src="Images/wall8.jpeg" alt="Product 4"></a>
         <h3>Check it Out</h3>
         <p style="font-size: 15px;">Top Seller in the wallart</p>
     </div>
    </div>

    

       

      <div class="discover">
      <div class="heading2">
        <h2>Discover our Newest Arrival</h2>
      </div>  
      <div class="card-container">
        <div class="arrivalimage">
            <a href="woodentemple.php"><img src="Images/newarrival1" alt=""></a>
        </div>
        <div class="arrivalimage">
            <a href="tableclock.php"><img src="Images/newarrival2" alt=""></a>
        </div>
        <div class="arrivalimage">
            <a href="wallart.php"><img src="Images/newarrival3" alt=""></a>
        </div>
        <div class="arrivalimage">
            <a href="artificialflower.php"><img src="Images/newarrival42" alt=""></a>
        </div>
      </div>
      </div>


      <!-------------------new arrival end---------------->


      <div class="features">
        <div class="feature">
            <img decoding="async" src="Images/freeshiping.png" alt="" class="featureIcon">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDesc">Free worldwide shipping on all orders.</span>
        </div>
        <div class="feature">
            <img decoding="async" class="featureIcon" src="Images/30days.png" alt="">
            <span class="featureTitle">30 DAYS RETURN</span>
            <span class="featureDesc">No question return and easy refund in 14 days.</span>
        </div>
        <div class="feature">
            <img decoding="async" class="featureIcon" src="Images/giftcard.png" alt="">
            <span class="featureTitle">GIFT CARDS</span>
            <span class="featureDesc">Buy gift cards and use coupon codes easily.</span>
        </div>
        <div class="feature">
            <img decoding="async" class="featureIcon" src="Images/contact us.png" alt="">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDesc">Keep in touch via email and support system.</span>
        </div>
    </div>
<?php include
    "footer.php";
?>



</body>
</html>