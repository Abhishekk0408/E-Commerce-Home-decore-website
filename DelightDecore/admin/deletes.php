<?php
$Id = $_GET['id'];
$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');
mysqli_query($conn, "DELETE FROM `order` WHERE Id='$Id'");
header("location:orders.php");
?>