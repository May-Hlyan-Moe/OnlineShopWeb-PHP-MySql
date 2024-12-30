<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM items WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Edit Item</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Edit <?php echo $row['title'] ?></h2>
    <div class="underline"></div>
    <div class="container">
        <form action="item-update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="brand">Brand</label>
                <input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="review">Review</label>
                <input type="text" name="review" id="review" value="<?php echo $row['review']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <div class="input-group">
                    <input type="text" name="price" id="price" value="<?php echo $row['price']; ?>" class="form-control" required>
                    <span class="input-group-text">.00 USD</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="material">Material</label>
                <input type="text" name="material" id="material" value="<?php echo $row['material']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="width">Width</label>
                <div class="input-group">
                    <input type="text" name="width" id="width" value="<?php echo $row['width']; ?>" class="form-control" required>
                    <span class="input-group-text">inches</span>
                </div> 
            </div>
            <div class="mb-3">
                <label for="height">height</label>
                <div class="input-group">
                    <input type="text" name="height" id="height" value="<?php echo $row['height'] ?>"   class="form-control" required>
                    <span class="input-group-text">inches</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="photo">Photo</label>
                <input type="file" name="title_images" id="photo" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <?php 
                        $cat_result = mysqli_query($conn, "SELECT * FROM categories");
                        while($cat_row = mysqli_fetch_assoc($cat_result)) { 
                    ?>
                    <option value="<?php echo $cat_row['id'] ?>">
                        <?php echo $cat_row['name']; ?>
                        <?php if($cat_row['id'] === $row['id']) echo "selected"; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="Update Item" class="btn btn-primary">
            </div>
        </form>
        <a href="item-list.php" class="btn btn-success float-right">Back</a>
    </div>
</body>
</html>