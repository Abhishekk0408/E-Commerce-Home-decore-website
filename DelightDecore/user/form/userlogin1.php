<?php
$Name=$_POST['name'];
$Password=$_POST['password'];

$conn=mysqli_connect('localhost','root','','shop_db');
$result=mysqli_query($conn,"SELECT * FROM `tbluser` WHERE (UserName='$Name' OR Email='$Name') AND Password= '$Password'");

session_start();
if(mysqli_num_rows($result)){

    $_SESSION['user']=$Name;

    echo"
        <script>
        alert('Succesfully Login');
        window.location.href='../cart.php';
        </script>
        
        ";
}
else{
    echo"
        <script>
        alert('Incorrect username/email/password');
        window.location.href='userlogin.php';
        </script>
        
        ";
}

?>