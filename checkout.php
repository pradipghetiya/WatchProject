<?php
require('connect.php');
require('header.php');
define('CURRENCY', '₹'); // Set your desired currency symbol

// Assuming user ID is 1 for simplicity; you might want to replace this with the actual user ID
$userId = 1; 

// Fetch cart items for the user
$sql = "SELECT * FROM carts WHERE user_id = '$userId'";
$result = mysqli_query($conn, $sql);

$totalAmount = 0;
$cartItems = [];

while ($row = mysqli_fetch_assoc($result)) {
    $cartItems[] = [
        'name' => htmlspecialchars($row['name']),
        'price' => floatval($row['price']),
        'quantity' => intval($row['quantity']),
        'total' => floatval($row['price']) * intval($row['quantity'])
    ];
    $totalAmount += $cartItems[count($cartItems) - 1]['total'];
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
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
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Checkout</h2>
        <form action="process_checkout.php" method="POST">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartItems as $item): ?>
                        
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo CURRENCY . " " . number_format($item['price'], 2); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo CURRENCY . " " . number_format($item['total'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="text-end total-amount"><strong>Total Amount:</strong></td>
                            <td class="total-amount"><strong><?php echo CURRENCY . " " . number_format($totalAmount, 2); ?></strong></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <form action="process_checkout.php" method="POST">
    

    
    <div class="mb-3">
        <label for="payment_method" class="form-label">Payment Method</label>
        <select class="form-select" id="payment_method" name="payment_method" required>
            <option value="credit_card">Credit Card</option>
            <option value="paypal">PayPal</option>
            <option value="cash_on_delivery">Cash on Delivery</option>
    
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Complete Purchase</button>
</form>
            
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
