<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$title = $_POST['title'];
$brand = $_POST['brand'];
$review = $_POST['review'];
$price = $_POST['price'];
$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$category_id = $_POST['category_id'];
$expired_date = date('Y-m-d H:i:s', strtotime("+4 months", strtotime("now")));
$material = $_POST['material'];
$width = $_POST['width'];
$height = $_POST['height'];

if($photo) {
    move_uploaded_file($tmp, "images/$photo");
}

mysqli_query($conn, "INSERT INTO items(title,brand,review,price,photo,category_id,reached_date,expired_date,material,width,height) VALUES('$title','$brand','$review','$price','$photo','$category_id',now(),'$expired_date','$material','$width','$height')");

header("location:item-list.php");

?>