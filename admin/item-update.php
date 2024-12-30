<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$id = $_POST['id'];
$title = $_POST['title'];
$brand = $_POST['brand'];
$review = $_POST['review'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$expired_date = date('Y-m-d H:i:s', strtotime("+4 months", strtotime("now")));
$material = $_POST['material'];
$width = $_POST['width'];
$height = $_POST['height'];

if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp, "images/$photo");

    mysqli_query($conn, "UPDATE items SET title='$title',brand='$brand',review='$review',price='$price',photo='$photo',category_id='$category_id',expired_date='$expired_date',material='$material',width='$width',height='$height' WHERE id='$id'");
} else {
    mysqli_query($conn, "UPDATE items SET title='$title',brand='$brand',review='$review',price='$price',category_id='$category_id',expired_date='$expired_date',material='$material',width='$width',height='$height' WHERE id='$id'");
}

header("location:item-list.php");

?>