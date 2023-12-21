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
    <style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Use 100vh for full viewport height */
        background-color: black; /* Change the background color as desired */
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 300px; /* Adjust the width as needed */
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
    <div class="form-container">
        <h2>Admin Login </h2>
        <form action="logindb.php" method="POST">
            <div class="form-group">
                <label class="form-label">user name</label>
                <input class="form-input" type="text" name="username" required>
            </div>
            <div class="form-group">
                <label class="form-label">user password</label>
                <input class="form-input" type="password" name="userpassword" required>
            </div>
            <button class="form-button" name="submit" type="submit">Login</button><br><br>
        </form>
    </div>
</body>
</html>
