<?php
require('connect.php');

if (isset($_POST['cart_id'])) {
    $cartId = intval($_POST['cart_id']);

    if (isset($_POST['increment'])) {
        $sql = "UPDATE carts SET quantity = quantity + 1 WHERE id = '$cartId'";
    } elseif (isset($_POST['decrement'])) {
        // Ensure quantity doesn't go below 1
        $sql = "UPDATE carts SET quantity = quantity - 1 WHERE id = '$cartId' AND quantity > 1";
    }

    if (mysqli_query($conn, $sql)) {
        header('Location: cart.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
