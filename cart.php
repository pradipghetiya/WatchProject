<?php
require('connect.php');
require('header.php');
define('CURRENCY', '₹');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            color: #495057; /* Dark grey text for better readability */
        }
        .container {
            background-color: #ffffff; /* White background for the container */
            border-radius: 0.5rem; /* Rounded corners for the container */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1); /* Light shadow for container */
            padding: 2rem; /* Padding inside the container */
        }
        table {
            margin-top: 1rem; /* Margin top for the table */
        }
        th, td {
            text-align: center; /* Center-align text in table headers and cells */
        }
        th {
            background-color: #007bff; /* Primary color for table headers */
            color: #ffffff; /* White text for table headers */
            font-weight: bold;
        }
        .btn-danger {
            background-color: #dc3545; /* Danger button color */
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
        }
        .btn {
            border-radius: 0.25rem; /* Rounded corners for buttons */
        }
        .total-amount {
            font-weight: bold;
            font-size: 1.25rem; /* Larger font size for total amount */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Your Cart</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userId = 1;
                $sql = "SELECT * FROM carts WHERE user_id = '$userId'";
                $result = mysqli_query($conn, $sql);
                $totalAmount = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $name = htmlspecialchars($row['name']);
                    $price = floatval($row['price']);
                    $quantity = intval($row['quantity']);
                    $total = $price * $quantity;
                    $totalAmount += $total;
                    $cartId = intval($row['id']); 

                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>" . CURRENCY . " " . number_format($price, 2) . "</td>";
                    echo "<td>";
                    echo "<form action='update_quantity.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='cart_id' value='$cartId'>";
                    echo "<button type='submit' name='decrement' class='btn btn-outline-secondary btn-sm'>-</button>";
                    echo "<span class='mx-2'>$quantity</span>";
                    echo "<button type='submit' name='increment' class='btn btn-outline-secondary btn-sm'>+</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "<td>" . CURRENCY . " " . number_format($total, 2) . "</td>";
                    echo "<td>";
                    echo "<form action='delete_from_cart.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='cart_id' value='$cartId'>";
                    echo "<button type='submit' name='delete_from_cart' class='btn btn-danger btn-sm'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td colspan="4" class="text-end total-amount"><strong>Total Amount:</strong></td>
                    <td class="total-amount"><strong><?php echo CURRENCY . " " . number_format($totalAmount, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>
        <a href="register.php" class="btn btn-primary mt-3">Proceed to Checkout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

<?php mysqli_close($conn); ?>
