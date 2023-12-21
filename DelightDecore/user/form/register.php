<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    body {
        background: #34495e;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        border-radius: 10px;
        padding: 20px;
    }

    .d-grid {
        justify-content: center; /* Center the buttons horizontally */
    }
  </style>
</head>

<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">User Register</h3>
          <form action="insert.php" method="post" onsubmit="return validateForm()">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="name" id="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="number" class="form-label">Mobile Number</label>
              <input type="tel" name="number" id="number" class="form-control" placeholder="Enter your mobile number" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </div><br>
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-primary py-2"><a href="userlogin.php" class="text-decoration-none text-white">Already Registered</a></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var number = document.getElementById("number").value;
    var password = document.getElementById("password").value;

    // Validate username (minimum 4 characters)
    if (username.length < 4) {
      alert("Username must be at least 4 characters long.");
      return false;
    }

    // Validate email format
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!email.match(emailPattern)) {
      alert("Invalid email format.");
      return false;
    }

    // Validate mobile number (must be a valid number)
    var numberPattern = /^[0-9]{10}$/;
    if (!number.match(numberPattern)) {
      alert("Mobile number must be a 10-digit number.");
      return false;
    }

    // Validate password (minimum 8 characters)
    if (password.length < 8) {
      alert("Password must be at least 8 characters long.");
      return false;
    }

    return true;
  }
</script>

</body>
</html>
