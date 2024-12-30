<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$orders_data = mysqli_query($conn, "SELECT * FROM orders");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Order List</title>
    <?php include("head-section.php"); ?>
    <style>
        .delivered {
            background-color: pink;
            text-decoration: line-through;
        }
    </style>
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
            <a href="orders001.php" class="nav-link active">Manage Orders</a>
        </li>
        <li class="nav-item">
            <a href="contact-info.php" class="nav-link text-black">Contact Info</a>
        </li>
        <li class="nav-item">
            <a href="../index.php" class="nav-link text-black">Customers' Side</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link text-black" onclick="return confirm('Are you committed to log out?')">Logout</a>
        </li>
    </ul>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Customers' Order List</h2>
    <div class="underline"></div>
    <br>

    <ul class="list-group container">
        <?php while($orders = mysqli_fetch_assoc($orders_data)) {
                if($orders['status']) {

        ?>
        <li class="delivered list-group-item">

        <?php } else { ?>

        <li class="list-group-item">
        <?php } ?>

            <div class="orders">
                Name : <?php echo $orders['name']; ?> <br>
                Email : <?php echo $orders['email']; ?> <br>
                Phone : <?php echo $orders['phone_no']; ?> <br>
                Visa Card : <?php echo $orders['visa_card']; ?> <br>
                Address : <?php echo $orders['address']; ?> <br>
                Ordered Date : <?php echo $orders['ordered_date']; ?> <br>
                Received Date : <?php echo $orders['received_date']; ?> <br>

                <?php if($orders['status']) { ?>

                * <a href="order-status.php?id=<?php echo $orders['id']; ?>&status=0" class="deliver">Undo</a>

                <?php } else { ?>

                * <a href="order-status.php?id=<?php echo $orders['id']; ?>&status=1" class="deliver">Mark as delivered</a>

                <?php } ?>
             </div>

            <div class="items">
                <?php
                    $orders_id = $orders['id'];
                    $orders_item = mysqli_query($conn, "SELECT ordered_items.*, items.title FROM ordered_items LEFT JOIN items ON ordered_items.item_id = items.id WHERE ordered_items.order_id = '$orders_id'");

                    while($items = mysqli_fetch_assoc($orders_item)) {
                ?>

                Order's Item :
                <a href="item-details.php?id=<?php echo $items['item_id']; ?>">
                    <?php echo $items['title']; ?>
                </a>
                (Quantity : <?php echo $items['qty']; ?>)
                <br>

                <?php } ?>
            </div>
        </li>
        </li>
        <?php } ?>
    </ul>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deliverButton = document.querySelectorAll(".deliver");

            deliverButton.addEventListener("click", function(event){
                event.preventDefault();
                
            });
        });
    </script>
</body>
</html>