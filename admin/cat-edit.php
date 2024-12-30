<?php 

error_reporting(E_ALL);
ini_set("display errors", 1);

include("confs/auth.php");
include("confs/config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM categories WHERE id=$id");
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Edit Category</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Edit <?php echo $row['name']; ?></h2>
    <div class="underline"></div>
    <form action="cat-update.php" method="post" enctype="multipart/form-data" class="container">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="photo">Photo</label>
            <input type="file" name="title_images" id="photo" class="form-control">
        </div>
        <input type="submit" value="Update Category" class="btn btn-primary">
    </form>
</body>
</html>