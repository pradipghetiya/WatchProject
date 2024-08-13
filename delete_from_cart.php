<?php
require('connect.php');

if (isset($_POST['cart_id'])) {
    $cartId = intval($_POST['cart_id']);

    // Delete the product from the cart
    $deleteQuery = "DELETE FROM carts WHERE id = '$cartId'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Record has been deleted.');</script>";
        echo "<script>window.location.href='cart.php'</script>";

        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No product ID provided.";
}

mysqli_close($conn);
?>
