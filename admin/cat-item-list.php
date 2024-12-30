<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$category_id = $_GET['id'];
$category_query = mysqli_query($conn, "SELECT * FROM categories WHERE id='$category_id'");
$category_result = mysqli_fetch_assoc($category_query);
$category_name = $category_result['name'];

$result = mysqli_query($conn, "SELECT items.*, categories.name AS category_name FROM items LEFT JOIN categories ON items.category_id = categories.id WHERE categories.name = '$category_name' ORDER BY items.reached_date DESC");

$row_count = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Products</title>
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
            <a href="logout.php" class="nav-link text-black">Logout</a>
        </li>
    </ul>
    <h1 class="text-center my-4">BagLuxe</h1>
    <h2 class="text-center my-4">Item List of <?php echo $category_name ?></h2>
    <div class="underline"></div>
    <div class="container mt-3">
        <ul>
            <?php while($item_row = mysqli_fetch_assoc($result)) {
                $row_count++;
                ?>
                <li>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="item-img-edit.php?id=<?php echo $item_row['id']; ?>">
                                <img src="images/<?php echo $item_row['photo']; ?>" alt="item image" title="edit image ?" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-6 mt-3">
                            <h3>
                                <?php echo $item_row['title'] ?> from
                                <?php echo $item_row['brand']; ?>
                            </h3>
                            <h4><?php echo $item_row['price'] ?>.00 USD</h4>
                            <div class="card mt-3">
                                <div class="card-header">
                                    Description
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">material: <?php echo $item_row['material']; ?></li>
                                        <li class="list-group-item">width: <?php echo $item_row['width']; ?> inches</li>
                                        <li class="list-group-item">height: <?php echo $item_row['height']; ?> inches</li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="list-group mt-4">
                                <li class="list-group-item list-group-item-success">
                                    <a href="item-edit.php?id=<?php echo $item_row['id']; ?>" class="text-decoration-none text-black">edit <?php echo $item_row['title']; ?></a>
                                </li>
                                <li class="list-group-item list-group-item-success">
                                    <a href="item-img-edit.php?id=<?php echo $item_row['id']; ?>" class="text-decoration-none text-black">edit <?php echo $item_row['title']; ?>' photo</a>
                                </li>
                                <li class="list-group-item list-group-item-danger">
                                    <a href="item-delete.php?id=<?php echo $item_row['id'] ?>" onclick="return confirm('Are you committed to deleting?')" class="text-decoration-none text-black">delete <?php echo $item_row['title']; ?></a>
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