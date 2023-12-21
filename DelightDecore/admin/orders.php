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
$record = mysqli_query($conn , "SELECT * FROM `order`")
?>

    <h1 class="text-center">Orders Information</h1>
    <table class="table table-secondary table-bordered">
        <thead class="text-center">
        
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th>number</th>
            <th>flat</th>
            <th>street</th>
            <th>city</th>
            <th>state</th>
            <th>country</th>
            <th>pin_code</th>
            <th>total_products</th>
            <th>total_price</th>
            <th>Delete</th>

        </thead>

        <tbody class="text-center text-danger">
         <?php
         while ($row = mysqli_fetch_array($record)){
            echo"  
            <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[number]</td>
                <td>$row[flat]</td>
                <td>$row[street]</td>
                <td>$row[city]</td>
                <td>$row[state]</td>
                <td>$row[country]</td>
                <td>$row[pin_code]</td>
                <td>$row[total_products]</td>
                <td>$row[total_price]</td>
                <td> <a href='deletes.php ? id=$row[id]' class='btn btn-outline-danger'>Delete</td>
            </tr>
            ";
         }
         ?>   
        </tbody>
    
</body>
</html>
