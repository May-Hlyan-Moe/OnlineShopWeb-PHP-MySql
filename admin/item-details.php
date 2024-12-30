<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/config.php");
include("confs/auth.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM items WHERE id='$id'");
$item = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Item Details</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Item Details of <?php echo $item['title']; ?></h2>
    <div class="underline"></div>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <img src="images/<?php echo $item['photo']; ?>" alt="item-image" class="img-fluid">
            </div>
            <div class="col-md-6 mt-3">
                <h3>
                    <?php echo $item['title']; ?> from 
                    <?php echo $item['brand']; ?>
                </h3>
                <h4><?php echo $item['price']; ?>.00 USD</h4>
                <div class="card mt-3">
                    <div class="card-header">
                        Description
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">materia: <?php echo $item['material']; ?></li>
                            <li class="list-group-item">width: <?php echo $item['width']; ?> inches</li>
                            <li class="list-group-item">height: <?php echo $item['height']; ?> inches</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>