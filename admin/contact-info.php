<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$result = mysqli_query($conn, "SELECT * FROM contact_info WHERE id=1");
$contact = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <ul class="nav nav-tabs nav-fill sticky-top bg-white">
        <li class="nav-item">
            <a href="cat-new.php" class="nav-link text-black">New Category</a>
        </li>
        <li class="nav-item">
            <a href="cat-list.php" class="nav-link text-black">Manage Category</a>
        </li>
        <li class="nav-item">
            <a href="item-new.php" class="nav-link text-black">New Item</a>
        </li>
        <li class="nav-item">
            <a href="item-list.php" class="nav-link text-black">Manage Item</a>
        </li>
        <li class="nav-item">
            <a href="orders001.php" class="nav-link text-black">Manage Orders</a>
        </li>
        <li class="nav-item">
            <a href="contact-info.php" class="nav-link active">Contact Info</a>
        </li>
        <li class="nav-item">
            <a href="../index.php" class="nav-link text-black">Customers' Side</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link text-black" onclick="return confirm('Are you committed to log out?')">Logout</a>
        </li>
    </ul>

    <div class="text-center p-5">
        <div class="fw-bold my-3">Contact Us</div>
        <p><i class="fa-solid fa-phone"></i> <?= $contact['phone']; ?></p>
        <p><i class="fa-solid fa-envelope"></i> <?= $contact['email']; ?></p>
        <p><i class="fa-solid fa-house"></i> <?= $contact['address']; ?></p>
        <div class="fs-2">
            <a href="<?= $contact['fb_link']; ?>" class="text-decoration-none text-black"><i class="fa-brands fa-facebook"></i></a>
            <a href="<?= $contact['ig_link']; ?>" class="text-decoration-none text-black"><i class="fa-brands fa-instagram"></i></a>
            <a href="<?= $contact['twitter_link']; ?>" class="text-decoration-none text-black"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <h1>BagLuxe</h1>
        <div class="underline mb-3"></div>
        <p>
            Copyright &copy; <?php echo date('Y'); ?> BagLuxe Co Ltd.,
            All Rights Reserved.
        </p>
    </div>
    <div class="container">
        <h2>Edit Contact Info</h2>
        <form action="contact-info-update.php" method="post">
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?= $contact['phone']; ?>" required> 
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $contact['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="<?= $contact['address'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="fb_link">Facebook Link</label>
                <input type="text" name="fb_link" id="fb_link" class="form-control" value="<?= $contact['fb_link']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ig_link">Instagram Link</label>
                <input type="text" name="ig_link" id="ig_linl" class="form-control" value="<?= $contact['ig_link']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="twitter_link">Twitter Link</label>
                <input type="text" name="twitter_link" id="twitter_link" class="form-control" value="<?= $contact['twitter_link']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="Update Contact Info" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>