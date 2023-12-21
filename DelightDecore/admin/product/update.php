
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin homepage</title>

    <!--Bootstrap start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Bootstrap end-->

    <script src="https://kit.fontawesome.com/48631f42f1.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">

    <style>
    .Form {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 10px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    background-color: #f0f0f0;
  }

  .form-container {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 15px;
    padding-top: 10px;
  }

  .form-label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .form-input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  .form-button {
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
  }
    </style>
</head>
<body>
    
<?php
ob_start(); // Start output buffering
if(isset($_GET["ID"]) && is_numeric($_GET["ID"])){
  $id=$_GET["ID"];
  include 'config.php';
  $record=mysqli_query($conn,"SELECT * FROM `e/dproduct` WHERE id= $id ");
  $data=mysqli_fetch_array($record);

  
}
else {
    echo "Invalid ID parameter.";
}
?>

    <div class="Form">
<div class="form-container">
    <h2>Product Details</h2>
    <form action="update.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label class="form-label">Product Name</label>
        <input class="form-input" type="text" value="<?php echo $data['name']?>" name="pname" required>
      </div>
      <div class="form-group">
        <label class="form-label">Product Price</label>
        <input class="form-input" type="text" value="<?php echo $data['price']?>" name="pprice" required>
      </div>
      <div class="form-group">
        <label class="form-label">Add Product Image</label>
        <input class="form-input" type="file"  name="pimage" required>
        <img src='uploaded_img/<?php echo $data['image']; ?>' alt='Product Image' style="height:100px;">
      </div>
      <div class="form-group">
        <label for="cars">Choose a Category:</label>
        <select class="category" name="pages">
        <option value="Wooden Temple">Wooden Temple</option>
        <option value="Table Clock">Table Clock</option>
        <option value="Wall Art">wall Art</option>
        <option value="Artificial flower">Artificial flower</option>
        <option value="Products">Products</option>
        </select>
      </div>
      <input type="hidden" name="id" value="<?php echo $data['id']?>">
      <button class="form-button" name="submit" type="submit">Upload</button>
    </form>
  </div>
  </div>

  <!--php update code-->

  <?php
if(isset($_POST['submit'])){
  $id=$_POST['id'];
  $product_name=$_POST['pname'];
  $product_price=$_POST['pprice'];
  $product_image=$_FILES['pimage'];
  $image_loc=$_FILES['pimage']['tmp_name'];
  $image_name=$_FILES['pimage']['name'];
  $img_des="uploaded_img/".$image_name;
  move_uploaded_file($image_loc,"uploaded_img/".$image_name);

  $product_category=$_POST['pages'];

  include 'config.php';

  $updateQuery = "UPDATE `e/dproduct` SET `name`='$product_name', `price`='$product_price', `image`='$img_des', `category`='$product_category' WHERE id=$id";
  
  if (mysqli_query($conn, $updateQuery)) {
      header("location:index.php");
  } else {
      echo "Error updating product: " . mysqli_error($conn);
  }
}

  
  
  ?>
  <?php
ob_end_flush(); // End output buffering and send content to the browser
?>

</body>
</html>