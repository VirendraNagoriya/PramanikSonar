<?php
// Database connection
$host = "localhost";       // DB host
$user = "root";            // DB username
$pass = "";                // DB password
$db   = "gold_products_db"; // DB name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get category filter
$category = $_GET['category'] ?? 'all';

// Fetch products
$sql = "SELECT * FROM products WHERE available = 1";
if ($category != 'all') {
    $category_safe = $conn->real_escape_string($category);
    $sql .= " AND type='$category_safe'";
}
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) $products[] = $row;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pramani Sonar Collection</title>
<link rel="icon" href="images/logo file/icononly_transparent_nobuffer.png" type="image/gif" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="web-css/collection.css" rel="stylesheet" />

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Header -->
<header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand d-flex align-items-center" href="index.html">
        <img src="images/logo2.png" alt="Gold Shop Logo" class="logo-img">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="offers.html">Offers</a></li>
          <li class="nav-item"><a class="nav-link" href="collection.php">Collection</a></li>
          <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
          <li class="nav-item">
            <a class="btn btn-outline-light ml-lg-3 mt-2 mt-lg-0" href="login.html">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>

<!-- Hero Section -->
<header class="hero"></header>

<!-- Product Section -->
<div class="container">
  <div class="title">PRODUCT LIST</div>

  <!-- Category Filter Navbar -->
  <div class="navbar2">
    <?php
    $categories = [
        'all'=>'All',
        'Gold Ring'=>'Gold Ring',
        'Mangalsutr'=>'Mangalsutr',
        'Gold Coins'=>'Gold Coins',
        'Earring'=>'Earring',
        'Bangeles'=>'Bangeles'
    ];
    foreach($categories as $key => $name){
        $active = ($category==$key) ? 'active' : '';
        echo "<a href='?category=$key' class='$active'>$name</a>";
    }
    ?>
  </div>

  <!-- Products Grid -->
  <div class="listProduct">
    <?php if(count($products)>0): ?>
      <?php foreach($products as $p): ?>
        <a href="details.php?id=<?= $p['id'] ?>" class="item">
          <!-- ✅ Fixed image path -->
          <img src="uploads/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
          <h2><?= htmlspecialchars($p['name']) ?></h2>
          <div class="price"><?= htmlspecialchars($p['price'] ?? '') ?></div>
        </a>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No products found.</p>
    <?php endif; ?>
  </div>
</div>

<!-- WhatsApp & Call Buttons -->
<a href="https://wa.me/919999999999?text=Hello%2C%20I%20have%20an%20inquiry%20about%20your%20jewelry%20collection."
   class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
  <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp Icon"/>
</a>
<a href="tel:+919999999999" class="phone-float" title="Call Us">
  <img src="https://img.icons8.com/color/48/000000/phone.png" alt="Phone Icon"/>
</a>

<!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    <!-- Column 1: Logo & Info -->
    <div class="footer-column">
      <img src="images/logo file/fulllogo_transparent.png" alt="Pramanik Sonar Logo" class="footer-logo">
      <p class="footer-about">Shop Time</p>
      <ul class="footer-contact"><li>🕒 4:00 am to 8:00 pm </li></ul>
      <div class="footer-social">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

    <!-- Column 2: Services -->
    <div class="footer-column">
      <h4>Our Service</h4>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Shipping Policy</a></li>
        <li><a href="#">Return & Refund</a></li>
      </ul>
    </div>

    <!-- Column 3: Information -->
    <div class="footer-column">
      <h4>Information</h4>
      <ul>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="blog.html">Latest News</a></li>
        <li><a href="#">FAQ HUID</a></li>
      </ul>
    </div>

    <!-- Column 4: QR Explore -->
    <div class="footer-column">
      <h4>Explore Here</h4>
      <img src="images/QR Code.png" alt="QR Code" class="qr-code">
      <p>Scan & Explore</p>
    </div>

    <!-- Column 5: Location -->
    <div class="footer-column">
      <h4>Location</h4>
      <p>📍 Near World-famous Sadashiv Peth,<br>Shedge Aali,<br> Pune – 411030</p>
      <p>📞 +91 9579370803</p>
      <img src="images/a1.jpg" alt="Shop Image" class="shop-image">
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 Pramanik Sonar | All Rights Reserved</p>
  </div>
</footer>

</body>
</html>
