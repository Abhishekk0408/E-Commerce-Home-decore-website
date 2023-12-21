<?php

$conn=mysqli_connect('localhost','root','','shop_db');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$admin_name=$_POST['username'];
$admin_password=$_POST['userpassword'];

$result=mysqli_query($conn,"SELECT * FROM `admin_loginform` WHERE  username='$admin_name' AND userpassword='$admin_password'");

session_start();

if(mysqli_num_rows($result)){


    $_SESSION['admin']=$admin_name;

    echo"
    <script>
    alert('Login successfully');
    window.location.href='../mystore.php';
    </script>
    ";
}
else{

    echo"
    <script>
    alert('invalid username password');
    window.location.href='admin_login.php';
    </script>
    ";
}


?>