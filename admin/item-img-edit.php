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
    <title>BagLuxe - Edit Photo</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Edit photo of <?php echo $item['title']; ?>?</h2>
    <div class="underline"></div>
    <div class="container">
        <h4>Current photo of <?php echo $item['title']; ?></h4>
        <img src="images/<?php echo $item['photo']; ?>" alt="item image" class="img-fluid w-50 d-block">
        <form action="item-img-update.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" id="id" value="<?php echo $item['id']; ?>">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" src="images/<?php echo $row['photo']; ?>" required>  
                <input type="submit" value="Update Photo"> 
            </div>
        </form>
    </div>
</body>
</html>