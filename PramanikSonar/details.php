<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "gold_products_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get product id from URL
$id = $_GET['id'] ?? 0;
$id = $conn->real_escape_string($id);

// Fetch product
$sql = "SELECT * FROM products WHERE id='$id' AND available=1 LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: collection.php");
    exit;
}

$product = $result->fetch_assoc();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail</title>
  <link rel="stylesheet" href="web-css/dstyle.css">

  <style>
    /* Zoom Effect */
    .image img {
      width: 100%;
      max-width: 400px;
      transition: transform 0.4s ease;
      cursor: zoom-in;
    }

    .image img:hover {
      transform: scale(1.2); /* Zoom effect */
    }

    /* Similar product images */
    .listProduct .item img {
      width: 200px;
      height: auto;
      transition: transform 0.3s ease;
      cursor: zoom-in;
    }

    .listProduct .item img:hover {
      transform: scale(1.1);
    }
  </style>
</head>
<body>


    <div class="container">

    <!-- Back Button -->
    <a href="collection.php" class="back-btn">
      ← Back
    </a>
    


    <div class="container">
  <div class="detail">
    <div class="image">
     <img src="uploads/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">

    </div>
    <div class="content">
      <h1><?= htmlspecialchars($product['name']) ?></h1>
     <!-- <div class="price">₹<?= htmlspecialchars($product['price']) ?></div>  -->
      <div class="buttons">
        <button class="checkout">Check Out</button>
        <button class="add-cart">Add To Cart</button>
      </div>
      <div class="description"><?= nl2br(htmlspecialchars($product['description'])) ?></div>
    </div>
  </div>
</div>


    <!-- Similar Products Section -->
    <!-- <div class="title">Similar Products</div>
    <div class="listProduct"></div>
  </div> -->

  
</body>
</html>

 


