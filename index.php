<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("admin/confs/config.php");

$category = mysqli_query($conn, "SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Home</title>
    <?php include("head-section.php"); ?>
    <style>
        img {
            opacity: 0.5;  
        }

        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 10px;
        }

        @media(max-width:600px) {
            .container {
                gap: 2px;
            }
        }
    </style>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Shop by Category</h2>
    <div class="underline"></div>
    <div class="container mt-4">
        <?php  while($cat_row = mysqli_fetch_assoc($category)) { ?>
            <div class="item">
                <div class="w-100 h-100 mt-4">
                    <div class="card text-bg-light w-75 mb-4">
                        <a href="cat-item-list.php?id=<?php echo $cat_row['id'] ?>" class="text-black">
                            <img src="admin/images/<?php echo $cat_row['title_images']; ?>" alt="title image" class="img-fluid">
                            <div class="card-img-overlay">
                                <h5 class="card-title position-absolute top-50 start-50 translate-middle"><strong><?php echo $cat_row['name']; ?></strong></h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>