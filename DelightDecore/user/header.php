<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@500&family=Nunito&family=Palanquin+Dark:wght@500&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/48631f42f1.js" crossorigin="anonymous"></script>
    <style>
        .logout-link {
           color: white; }
    </style>
</head>
<body>
<nav id="nav">
        <div class="navTop">
        <div class="search-container">
            
            <!-- edited by venom -->
           <form method="POST" action="search.php">
            <input type="search" class="search-input" placeholder="Search"
             aria-label="Search" name="search_data">
            <!-- <input type="submit" value="Search" class="btn btn-outline-light search-button" name="search_data_product"> -->
            <button type="submit" value="Search" id="xyz" class="search-button" name="search_data_product">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 72 72"
                style="fill:#FFFFFF; width: 40px; height: 40px;">
                <path d="M 31 11 C 19.973 11 11 19.973 11 31 C 11 42.027 19.973 51 31 51 C 34.974166 51 38.672385 49.821569 
                41.789062 47.814453 L 54.726562 60.751953 C 56.390563 62.415953 59.088953 62.415953 60.751953 60.751953 C 62.415953 
                59.087953 62.415953 56.390563 60.751953 54.726562 L 47.814453 41.789062 C 49.821569 38.672385 51 34.974166 51 31 C 
                51 19.973 42.027 11 31 11 z M 31 19 C 37.616 19 43 24.384 43 31 C 43 37.616 37.616 43 31 43 C 24.384 43 19 37.616 19 
                31 C 19 24.384 24.384 19 31 19 z"></path>
                </svg>
            </button>
           </form>
           <!-- ------------- -->
        </div>
            <div class="nav1middle">
                <img src="Images\image.png" width="240" height="150">
            </div>
            <div class="nav1right">
                <div class="rightnav">
                 <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                 <span class="Cart">Cart</span>
                </div>
                <?php if(isset($username)) { ?>
    <div class="user-info">
        <span class="user-info-text">
            <div class="container-fluid text-white">
                <i class="fa-solid fa -shield-halved"></i>
                Hello, <?= $username ?>
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="logout.php" class="text-decoration-none text-white logout-link">Logout</a>
            </div>
        </span>
    </div>
<?php } ?>
        </div>
    </nav>
    <nav class="navg">

        <!---list------------->
        <ul>
            <li><a href="home.php">Home</a></li>
            <div class="dropdown">
                <div class="dropdown-select">Categeory<i class="fa-solid fa-caret-down"></i></div>
                <div class="dropdown-options">
                  <div class="dropdown-option"><a href="woodentemple.php">Wooden Temple</a></div>
                  <div class="dropdown-option"><a href="tableclock.php">Table Clock</a></div>
                  <div class="dropdown-option"><a href="wallart.php">Wall Art</a></div>
                  <div class="dropdown-option"><a href="artificialflower.php">Artificial flower</a></div>
                </div>
              </div>
            <!--<li><a href="#">Categeory</a><i class="fa-solid fa-caret-down"></i></li>
            <ul>
                <li><a href="#">Lights</a></li>
                <li><a href="#">Sofas</a></li>
                <li><a href="#">Wooden Temple</a></li>
                <li><a href="#">Wall Painting</a></li>
            </ul>-->
            <li><a href="products.php">Products</a></li>
            <li><a href="services.html">Services</a></li>
              
        </ul>
      </nav>

</body>
</html>