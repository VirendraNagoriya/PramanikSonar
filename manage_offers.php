<?php
include '../config.php';
$offers = $conn->query("SELECT * FROM offers ORDER BY sort_order ASC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Offers</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h2>Manage Offers</h2>
<a href="add_offer.php" class="btn btn-success mb-3">Add New Offer</a>

<table class="table table-bordered">
  <tr>
    <th>Order</th>
    <th>Image</th>
    <th>Title</th>
    <th>Description</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
  <?php while($offer = $offers->fetch_assoc()): ?>
  <tr>
    <td><?= $offer['sort_order'] ?></td>
    <td><img src="../uploads/<?= $offer['image'] ?>" width="80"></td>
    <td><?= $offer['title'] ?></td>
    <td><?= $offer['description'] ?></td>
    <td><?= $offer['status'] ? "Active" : "Inactive" ?></td>
    <td>
      <a href="edit_offer.php?id=<?= $offer['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
      <a href="delete_offer.php?id=<?= $offer['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
