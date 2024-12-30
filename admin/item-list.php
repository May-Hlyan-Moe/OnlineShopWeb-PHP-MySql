<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$result = mysqli_query($conn, "SELECT items.*,categories.name FROM items LEFT JOIN categories ON items.category_id=categories.id ORDER BY items.reached_date DESC");

$row_count = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Item List</title>
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
            <a href="item-list.php" class="nav-link active">Manage Item</a>
        </li>
        <li class="nav-item">
            <a href="orders001.php" class="nav-link text-black">Manage Orders</a>
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
    <h2 class="text-center my-3">Item List</h2>
    <div class="underline"></div>
    <div class="container">
        <ul>
            <?php while($row=mysqli_fetch_assoc($result)) { 
                $row_count++;
            ?>
                <li>
                    <div class="row">
                        <div class="col-md-6">
                        <a href="item-img-edit.php?id=<?php echo $row['id']; ?>">
                                <img src="images/<?php echo $row['photo']; ?>" alt="item image" title="edit image ?" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-6 mt-3">
                            <h3>
                                <?php echo $row['title'] ?> from
                                <?php echo $row['brand']; ?>
                            </h3>
                            <h4><?php echo $row['price'] ?>.00 USD</h4>
                            <div class="card mt-3">
                                <div class="card-header">
                                    Description
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">material: <?php echo $row['material']; ?></li>
                                        <li class="list-group-item">width: <?php echo $row['width']; ?> inches</li>
                                        <li class="list-group-item">height: <?php echo $row['height']; ?> inches</li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="list-group mt-4">
                                <li class="list-group-item list-group-item-success">
                                    <a href="item-edit.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-black">edit <?php echo $row['title']; ?></a>
                                </li>
                                <li class="list-group-item list-group-item-success">
                                    <a href="item-img-edit.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-black">edit <?php echo $row['title']; ?>' photo</a>
                                </li>
                                <li class="list-group-item list-group-item-danger">
                                    <a href="item-delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you committed to deleting?')" class="text-decoration-none text-black">delete <?php echo $row['title']; ?></a>
                                </li>    
                            </ul>
                        </div>
                    </div>
                </li>
                <br>
                <?php if ($row_count < mysqli_num_rows($result)) { ?>
                    <hr>
                <?php } ?>
                <br>
            <?php } ?>
        </ul>
    </div>
</body>
</html>