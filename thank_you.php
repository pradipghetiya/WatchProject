<?php
require('connect.php');
define('CURRENCY', '₹'); // Set your desired currency symbol

// Assuming user ID is 1 for simplicity. Ideally, this should be dynamic or passed through session or a query parameter.
$userId = 1;

// Retrieve the latest order for the user
$orderSql = "SELECT * FROM myorder WHERE user_id = '$userId' ORDER BY id DESC LIMIT 1";
$orderResult = mysqli_query($conn, $orderSql);
$order = mysqli_fetch_assoc($orderResult);

if ($order) {
    $orderId = $order['id'];
    $totalAmount = $order['total_amount'];

    // Retrieve order items
    $orderItemsSql = "SELECT * FROM items_orders WHERE order_id = '$orderId'";
    $orderItemsResult = mysqli_query($conn, $orderItemsSql);
} else {
    // Handle case where no order is found
    echo "No order found.";
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You</title>
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
        .total-amount {
            font-weight: bold;
            font-size: 1.25rem; /* Larger font size for total amount */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Thank You for Your Order!</h2>
        <p>Your order has been successfully placed. Your order details are below:</p>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = mysqli_fetch_assoc($orderItemsResult)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo CURRENCY . " " . number_format($item['price'], 2); ?></td>
                    <td><?php echo intval($item['quantity']); ?></td>
                    <td><?php echo CURRENCY . " " . number_format($item['total'], 2); ?></td>
                </tr>
                <?php endwhile; ?>
                <tr>
                    <td colspan="3" class="text-end total-amount"><strong>Total Amount:</strong></td>
                    <td class="total-amount"><strong><?php echo CURRENCY . " " . number_format($totalAmount, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <a href="main.php" class="btn btn-primary mt-3">Return to Homepage</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

<?php mysqli_close($conn); ?>
