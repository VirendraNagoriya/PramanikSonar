<?php include 'config.php'; ?>

<?php
// Fetch hero section (only 1 record expected)
$hero = $conn->query("SELECT * FROM hero_section LIMIT 1")->fetch_assoc();

// Fetch all offers
$offers = $conn->query("SELECT * FROM offers WHERE status=1 ORDER BY sort_order ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $hero['heading'] ?? 'Jewelry Offers' ?></title>
  <link rel="stylesheet" href="web-css/offers.css">
</head>
<body>

<!-- Hero Section -->
<section class="offer-section" style="background:linear-gradient(135deg,#fff8e1,#fff3cd);">
  <h1 class="section-heading"><?= $hero['heading'] ?? 'Special Jewellery Offers!' ?></h1>
  <p class="offer-text"><?= $hero['subheading'] ?? 'Celebrate the culture and elegance of Maharashtra with amazing deals.' ?></p>
</section>

<!-- Offers Section -->
<section class="offers">
  <?php while($offer = $offers->fetch_assoc()): ?>
    <div class="offer-card" style="background-image: url('uploads/<?= $offer['image'] ?>')">
      <div class="offer-content">
        <div class="offer-title"><?= $offer['title'] ?></div>
        <div class="offer-description"><?= $offer['description'] ?></div>
        <div class="offer-btn-wrapper">
          <a href="<?= $offer['btn_link'] ?>" class="btn"><?= $offer['btn_text'] ?></a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</section>

</body>
</html>
