<?php
require('connect.php');

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    ?>
    <h1>Shopping</h1>
    <div class="container">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                        <h5><?php echo $row['name']; ?></h5>
                        <p><?php echo $row['description']; ?></p>
                        <p>Price: $<?php echo $row['price']; ?></p>
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <input type="number" name="quantity" value="1" max="100">
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
} else {
    ?>
    <p>No products found</p>
    <?php
}
?>