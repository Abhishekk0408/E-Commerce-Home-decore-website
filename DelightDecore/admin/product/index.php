<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/48631f42f1.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom CSS -->
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
<div class="Form">
    <div class="form-container">
        <h2>Product Details</h2>
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label">Product Name</label>
                <input class="form-input" type="text" name="pname" required>
            </div>
            <div class="form-group">
                <label class="form-label">Product Price</label>
                <input class="form-input" type="text" name="pprice" required>
            </div>
            <div class="form-group">
                <label class="form-label">Add Product Image</label>
                <input class="form-input" type="file" name="pimage" required>
            </div>
            <div class="form-group">
                <label for="pcategory">Choose a Category:</label>
                <select class="form-select" name="pcategory" id="pcategory">
                    <option value="Wooden Temple">Wooden Temple</option>
                    <option value="Table Clock">Table Clock</option>
                    <option value="Wall Art">Wall Art</option>
                    <option value="Artificial Flower">Artificial Flower</option>
                    <option value="Products">Products</option>
                </select>
            </div>
            <button class="form-button" name="submit" type="submit">Upload</button>
        </form>
    </div>
</div>

<!-- Fetch data from the database and display it -->
<div class="container mt-5">
    <h1 class="text-center">Product List</h1>
    <table class="table border border-warning table-hover my-5">
        <thead class="bg-dark text-white fs-5 font-monospace text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Images</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        include 'config.php';
        $record = mysqli_query($conn, "SELECT * FROM `e/dproduct`");

        while ($row = mysqli_fetch_array($record)) {
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                <td><img src='{$row['image']}' height='90px' width='200px'></td>
                <td>{$row['category']}</td>
                <<td><a href='delete_product.php?id={$row['id']}' class='btn btn-dark'>Delete</a></td>
                
                <td><a href='update.php?ID={$row['id']}' class='btn btn-dark'>Update</a></td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
