<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin homepage</title>

    <!--Bootstrap start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Bootstrap end-->

    <script src="https://kit.fontawesome.com/48631f42f1.js" crossorigin="anonymous"></script>
<style>
    .adminbutton {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content:center;
    align-items: center;
    height: 70vh;       /*heading se bich lane ke liye*/
    margin: 0;
    padding-bottom: 250px;
  }
    .button {
    padding: 50px 50px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px;
    box-shadow: 0px 0px 5px 5px gray;
  }

  .button-primary {
    background-color: #3498db;
    color: white;
  }

  .button-secondary {
    background-color: #e74c3c;
    color: white;
  }
</style>
</head>

<?php

session_start();

if(!$_SESSION['admin']){

  header("location:form/admin_login.php");
}

?>
<body>
<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white"><h1>Admin Panel</h1></a>
    <span>
    <i class="fa-solid fa-shield-halved"></i>
    Hello,<?php echo $_SESSION['admin']; ?>
    <i class="fa-solid fa-right-from-bracket"></i>|
    <a href="form/logout.php" class="text-decoration-none text-white">Logout</a> |
    
    </span>
  </div>
</nav>

<div>
    <h2 class="text-center">Dashboard</h2>
</div>
<div class="adminbutton">
<a href="product/index.php"><button class="button button-primary">Add Post</button></a>
<a href="user.php"><button class="button button-secondary">Users</button></a>
<a href="orders.php"><button class="button button-primary">Orders</button></a>
</div>
</body>
</html>