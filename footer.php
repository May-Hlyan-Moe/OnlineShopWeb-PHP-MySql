<?php

include("admin/confs/config.php");

$result = mysqli_query($conn, "SELECT * FROM contact_info WHERE id=1");
$contact = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <div class="text-center p-5">
        <hr>
        <div class="fw-bold my-3">Contact Us</div>
        <p><i class="fa-solid fa-phone"></i> <?= $contact['phone']; ?></p>
        <p><i class="fa-solid fa-envelope"></i> <?= $contact['email']; ?></p>
        <p><i class="fa-solid fa-house"></i> No.123, Main Sreet, Thaketa Township, Yangon</p>
        <div class="fs-2">
            <a href="<?php ?>" class="text-decoration-none text-black"><i class="fa-brands fa-facebook"></i></a>
            <a href="<?php ?>" class="text-decoration-none text-black"><i class="fa-brands fa-instagram"></i></a>
            <a href="<?php ?>" class="text-decoration-none text-black"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <h1>BagLuxe</h1>
        <div class="underline mb-3"></div>
        <p>
            Copyright &copy; <?php echo date('Y'); ?> BagLuxe Co Ltd.,
            All Rights Reserved.
        </p>
    </div>
</body>
</html>