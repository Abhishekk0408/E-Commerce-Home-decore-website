<?php

if(isset($_POST['submit'])){

$conn=mysqli_connect('localhost','root','','shop_db');

    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Number=$_POST['number'];
    $Password=$_POST['password'];

    //mysqli_query($con,"INSERT INTO `tbluser`(`UserName`, `Email`, `Number`, `Password`) VALUES ('$Name','$Email','$Number','$Password')");
    $Dup_email=mysqli_query($conn,"SELECT * FROM `tbluser` WHERE Email='$Email'");
    $Dup_username=mysqli_query($conn,"SELECT * FROM `tbluser` WHERE UserName='$Name'");

    if(mysqli_num_rows($Dup_email)){

        echo"
        <script>
        alert('This Email is alredy taken');
        window.location.href='register.php';
        </script>
        
        ";
    }

    if(mysqli_num_rows($Dup_username)){

        echo"
        <script>
        alert('This Username is alredy taken');
        window.location.href='register.php';
        </script>
        
        ";
    }
    else{
        mysqli_query($conn,"INSERT INTO `tbluser`(`UserName`, `Email`, `Number`, `Password`) VALUES ('$Name','$Email','$Number','$Password')");
        echo"
        <script>
        alert('Register Succesfully');
        window.location.href='userlogin.php';
        </script>
        
        ";
    }


}

?>