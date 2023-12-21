<?php
include 'config.php';

if (isset($_GET['name'])) {
    $name = urldecode($_GET['name']);

    $select_orders = $conn->prepare("SELECT * FROM `order` WHERE name = ?");
    $select_orders->bind_param("s", $name);
    $select_orders->execute();
    $select_orders->store_result();

    if ($select_orders->num_rows > 0) {
        echo "<h2>Orders for Name: $name</h2>";
        echo "<table>";
        echo "<tr><th>Order ID</th><th>Name</th><th>Phone Number</th><th>Email</th><th>Address</th><th>Total Products</th><th>Total Price</th></tr>";

        $select_orders->bind_result($id, $name, $number, $email, $flat, $street, $city, $state, $country, $pin_code, $total_products, $total_price);

        while ($select_orders->fetch()) {
            echo "<tr id='col_$id'>"; // Add the 'id' attribute to the <tr> element
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$number</td>";
            echo "<td>$email</td>";
            echo "<td>$flat, $street, $city, $state, $country - $pin_code</td>";
            echo "<td>$total_products</td>";
            echo "<td>$total_price</td>";
            
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No orders found for name: $name";
    }

    $select_orders->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #eee;
        margin: 0;
        padding: 0;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-top: 20px;
    }

    .order-details {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    /* Common styling for both buttons */
    .button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        display: inline-block;
        transition: background-color 0.3s;
        text-decoration: none; /* Remove underline for links */
    }

    .button:hover {
        background-color: #555;
    }

    /* Styling for the container div */
    .button-container {
        margin-top: 20px;
        margin-left: 10px;
    }
</style>
</head>
<body>
<div class="button-container">
    <button class="button" id="printButton">Print Receipt</button>
    <a href="home.php" class="button show-now-link">Continue Shopping</a>
</div>

<!-- Your existing JavaScript for printing PDFs -->
<script>
     const printButton = document.getElementById("printButton");
     printButton.addEventListener("click", () => {
         window.print();
     });
</script>
</body>
</html>