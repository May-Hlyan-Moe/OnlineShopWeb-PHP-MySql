<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
include("admin/confs/config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone_no = $_POST['phone'];
$visa_card = $_POST['visa'];
$address = $_POST['address'];
$received_date = date('Y-m-d H:i:s', strtotime('+7days', strtotime('now')));

mysqli_query($conn, "INSERT INTO orders(name, email, phone_no, visa_card, address, status, ordered_date, received_date) VALUES('$name', '$email', '$phone_no', '$visa_card', '$address', 0, now(), '$received_date')");

$order_id = mysqli_insert_id($conn);

foreach($_SESSION['cart'] as $id => $qty) {
    mysqli_query($conn, "INSERT INTO ordered_items(item_id,order_id,qty) VALUES('$id', '$order_id', '$qty')");
}

unset($_SESSION['cart']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Order Submitted</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Order Submitted !</h2>
    <div class="underline"></div>
    <div class="container mt-4">
        <h5 class="text-center">
            Your order is submitted. 
            <br><br>
            They'll be delivered on time.
            <br><br>
            Thanks a million for shopping with <strong>BagLuxe</strong>.
            <br><br>
            Have a great day !!
        </h5>
        <br>
        <a href="index.php" class="btn btn-success d-block m-auto w-25">Home</a>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>