<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .carousel-item img {
        object-fit: cover;
        height: 500px; /* Adjust the height as needed */
      }
      
      .navbar {
        background-image: linear-gradient(to right, #ff69b4, #ffe6cc, #ff99cc); /* Add a colorful gradient background to the navbar */
        padding: 1rem 1rem; /* Add some padding to the navbar */
      }
      
      .navbar-brand {
        font-size: 1.5rem; /* Increase the font size of the navbar brand */
        font-weight: bold; /* Make the navbar brand font bold */
        color: #fff; /* Change the text color of the navbar brand to white */
      }
      
      .nav-link {
        font-size: 1.2rem; /* Increase the font size of the navbar links */
        color: #fff; /* Change the text color of the navbar links to white */
      }
      
      .nav-link:hover {
        color: #ccc; /* Change the text color of the navbar links on hover to light gray */
      }
      
      .btn-outline-success {
        border-color: #fff; /* Change the border color of the MY CART button to white */
        color: #fff; /* Change the text color of the MY CART button to white */
      }
      
      .btn-outline-success:hover {
        background-color: #fff; /* Change the background color of the MY CART button on hover to white */
        color: #333; /* Change the text color of the MY CART button on hover to dark gray */
      }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="image/logo.png" alt="WATCH SHOP" height="40"> <!-- Update the src to your logo path -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="cart.php" class="btn btn-outline-success">MY CART</a>
      </form>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-c8EJrA9Psz9CV2VYg9bV1Qo4DlKpeT4sU0UDFvA5xD/Aa2dFfcvPax7fB5fkwSZT" crossorigin="anonymous"></script>
</body>
</html>
