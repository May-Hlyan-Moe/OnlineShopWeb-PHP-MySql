<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$id = $_POST['id'];
$photo = $_FILES['title_images']['name'];
$tmp = $_FILES['title_images']['tmp_name'];

move_uploaded_file($tmp, "images/$photo");

mysqli_query($conn, "UPDATE categories SET title_images='$photo' WHERE id='$id'");

header("location:cat-list.php");

?>

