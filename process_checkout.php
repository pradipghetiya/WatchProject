<?php
require('connect.php');
define('CURRENCY', '₹'); 

$name = mysqli_real_escape_string($conn, $_POST['name']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$paymentMethod = mysqli_real_escape_string($conn, $_POST['payment_method']); 
$userId = 1; 

$sql = "SELECT * FROM carts WHERE user_id = '$userId'";
$result = mysqli_query($conn, $sql);
$totalAmount = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $totalAmount += floatval($row['price']) * intval($row['quantity']);
}

$orderSql = "INSERT INTO myorder (user_id, name, address, phone, email, total_amount, payment_method) VALUES ('$userId', '$name', '$address', '$phone', '$email', '$totalAmount', '$paymentMethod')";
if (mysqli_query($conn, $orderSql)) {
    $orderId = mysqli_insert_id($conn);

    $cartSql = "SELECT * FROM carts WHERE user_id = '$userId'";
    $cartResult = mysqli_query($conn, $cartSql);
    while ($row = mysqli_fetch_assoc($cartResult)) {
        $productId = intval($row['product_id']);
        $productName = mysqli_real_escape_string($conn, $row['name']);
        $price = floatval($row['price']);
        $quantity = intval($row['quantity']);
        $total = $price * $quantity;

        $orderItemSql = "INSERT INTO items_orders (order_id, product_id, name, price, quantity, total) VALUES ('$orderId', '$productId', '$productName', '$price', '$quantity', '$total')";
        mysqli_query($conn, $orderItemSql);
    }

    
    $clearCartSql = "DELETE FROM carts WHERE user_id = '$userId'";
    mysqli_query($conn, $clearCartSql);


    header('Location: thank_you.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
