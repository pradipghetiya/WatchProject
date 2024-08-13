<?php
require('connect.php');

if (isset($_POST['add_to_cart'])) {
    $userId = 1; 
    $productId = intval($_POST['product_id']);

    $priceQuery = "SELECT price FROM products WHERE id = '$productId'";
    $priceResult = mysqli_query($conn, $priceQuery);

    if ($priceResult && mysqli_num_rows($priceResult) > 0) {
        $row = mysqli_fetch_assoc($priceResult);
        $price = floatval($row['price']);
        
        $name = mysqli_real_escape_string($conn, $_POST['name']); 

        $sql = "SELECT * FROM carts WHERE user_id = '$userId' AND product_id = '$productId'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $sql = "UPDATE carts SET quantity = quantity + 1 WHERE user_id = '$userId' AND product_id = '$productId'";
        } else {
            $sql = "INSERT INTO carts (user_id, product_id, name, price, quantity) VALUES ('$userId', '$productId', '$name', '$price', 1)";
        }

        if (mysqli_query($conn, $sql)) {
            header('Location: cart.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Product not found.";
    }
}

mysqli_close($conn);
?>
