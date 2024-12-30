<?php
    error_reporting(E_ALL);
    ini_set("display errors", 1);

    include("confs/auth.php");
    include("confs/config.php");
    $result = mysqli_query($conn, "SELECT * FROM categories");

    $row_count = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Catgory List</title>
    <?php include("head-section.php"); ?>
    <style>
        img {
            opacity: 0.5;   
        }
    </style>
</head>
<body>
    <ul class="nav nav-tabs nav-fill sticky-top bg-white">
        <li class="nav-item">
            <a href="cat-new.php" class="nav-link text-black">New Category</a>
        </li>
        <li class="nav-item">
            <a href="cat-list.php" class="nav-link active">Manage Category</a>
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
            <a href="contact-info.php" class="nav-link text-black">Contact Info</a>
        </li>
        <li class="nav-item">
            <a href="../index.php" class="nav-link text-black">Customers' Side</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link text-black" onclick="return confirm('Are you committed to log out?')">Logout</a>
        </li>
    </ul>
    <h1 class="text-center my-4">BagLuxe</h1>
    <h2 class="text-center my-4">Category List</h2>
    <div class="underline"></div>
    <div class="container mt-5">
        <ul>
            <?php while($row = mysqli_fetch_assoc($result)) {
                $row_count++;
                ?>
                <li>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-bg-light w-75">
                                <a href="cat-item-list.php?id=<?php echo $row['id']; ?>" class="text-black">
                                    <img src="images/<?php echo $row['title_images']; ?>" alt="title image" class="img-fluid">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title position-absolute top-50 start-50 translate-middle"><?php echo $row['name']; ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group mt-4">
                                <li class="list-group-item list-group-item-success">
                                    <a href="cat-edit.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-black">edit <?php echo $row['name']; ?></a>
                                </li>
                                <li class="list-group-item list-group-item-success">
                                    <a href="cat-img-edit.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-black">edit <?php echo $row['name']; ?>' photo</a>
                                </li>
                                <li class="list-group-item list-group-item-danger">
                                    <a href="cat-delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you committed to deleting?')" class="text-decoration-none text-black">delete <?php $row['name']; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <?php if ($row_count < mysqli_num_rows($result)) { ?>
                        <hr>
                    <?php } ?>
                    <br>
                </li>
            <?php } ?>
        </ul>
    </div>
    <hr>
</body>
</html>