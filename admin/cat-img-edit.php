<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM categories WHERE id='$id'");
$category = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Edit Category photo</title>
    <?php include("head-section.php"); ?>
</head>
<body>
<h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Edit <?php echo $category['name']; ?>' Photo</h2>
    <div class="underline"></div>
    <div class="container">
        <h4>Current Photo of <?php echo $category['name']; ?></h4>
        <img src="images/<?php echo $category['title_images']; ?>" alt="title image" class="img-fluid w-50 d-block">
        <form action="cat-img-update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $category['id']; ?>">
            <label for="photo">Photo</label>
            <input type="file" name="title_images" id="photo" class="form-control" required>
            <input type="submit" value="Update Photo" class="btn btn-primary mt-3">
        </form>
    </div>
</body>
</html>