<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
        <!--Bootstrap start-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Bootstrap end-->

</head>
<body>
<?php 
$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');
$record = mysqli_query($conn , "SELECT * FROM `tbluser`");
$row_count=mysqli_num_rows($record);
?>

    <h1 class="text-center">User Information</h1>
    <table class="table table-secondary table-bordered">
        <thead class="text-center">
        
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Delete</th>

        </thead>

        <tbody class="text-center text-danger">
         <?php
         $i=0;
         while ($row = mysqli_fetch_array($record)){
            echo"  
            <tr>
                <td>";?><?php echo ++$i; ?><?php echo"</td>
                <td>$row[UserName]</td>
                <td>$row[Email]</td>
                <td>$row[Number]</td>
                <td> <a href='delete.php ? id=$row[id]' class='btn btn-outline-danger'>Delete</td>
            </tr>
            ";
         }
         ?>   
        </tbody>
    
</body>
</html>
