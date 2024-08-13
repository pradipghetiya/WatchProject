<?php
require('header.php');
require('connect.php');
define('CURRENCY', '₹'); 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WATCH PROJECT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background: #f0f0f0; /* Light grey background for the whole page */
        color: #333; /* Dark text color for better readability */
      }

      .carousel-item img {
        width: 100%;
        height: 500px;
        object-fit: cover;
      }

      .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for captions */
        border-radius: 0.25rem;
        padding: 0.5rem;
      }

      .container {
        background-color: transparent; /* Make the container background transparent */
        padding: 1.5rem; /* Padding inside the container */
      }

      .card {
        margin: auto;
        margin-top: 15px;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
        transition: transform 0.2s; /* Smooth transition for hover effect */
        background-color: transparent; /* Make the card background transparent */
        max-width: 300px; /* Set a maximum width for the card */
      }

      .card:hover {
        transform: scale(1.02); 
      }

      .card-img-top {
    height: auto;
    max-height: 200px; 
    object-fit: cover; 
    width: 100%; 
}


      .card-body {
        padding: 1.25rem;
        text-align: center; 
        background-color: rgba(255, 255, 255, 0.8); 
      }

      .text-center-custom {
        text-align: center;
      }

      .mt-2 {
        margin-top: 2rem; /* Increase top margin */
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
    <div class="container mt-2">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                    
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/slider1.jpg" class="d-block w-100" alt="Watch 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>WATCH 1</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="image/slider2.jpg" class="d-block w-100" alt="Watch 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>WATCH 2</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="image/slider3.jpg" class="d-block w-100" alt="Watch 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>WATCH 3</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-1">
        <div class="row justify-content-center">
            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            while ($row = $result->fetch_assoc()) {
                $productId = ($row['id']);
                $image = ($row['image']);
                $productName = ($row['name']);
                $productPrice = number_format($row['price'], 2);
                $productHsnCode = ($row['hsn_code']);
                $productType = ($row['type']);

                echo "<div class='col-md-4 col-lg-3 mt-1 text-center-custom'>";
                echo "<div class='card'>";
                echo "<img src='$image' class='card-img-top' alt='$productName'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$productName</h5>";
                echo "<p class='card-text'>HSN Code: $productHsnCode</p>";
                echo "<p class='card-text'>Type: $productType</p>";
                echo "<p class='card-text'>Price: " . CURRENCY . " $productPrice</p>";
                echo "<form action='add_to_cart.php' method='POST'>";
                echo "<input type='hidden' name='product_id' value='$productId'>";
                echo "<input type='hidden' name='name' value='$productName'>";
                echo "<input type='hidden' name='price' value='$productPrice'>";
                echo "<button type='submit' name='add_to_cart' class='btn btn-primary'>Add to Cart</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    >
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 footer-section">
        <h5>About WATCH SHOP</h5>
        <p>Your one-stop destination for premium quality watches. We offer a wide range of timepieces that cater to every style and occasion.</p>
      </div>
      <div class="col-md-4 footer-section">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="main.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-4 footer-section">
        <h5>Follow Us</h5>
        <div class="social-icons">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-twitter"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <p>&copy; 2024 WATCH SHOP. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

<?php mysqli_close($conn); ?>
