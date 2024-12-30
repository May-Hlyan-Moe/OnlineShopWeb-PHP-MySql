<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$id = $_POST['id'];
$name = $_POST['name'];

if(isset($_FILES['title_images']) && $_FILES['title_images']['error'] == 0) {
    $photo = $_FILES['title_images']['name'];
    $tmp = $_FILES['title_images']['tmp_name'];
    move_uploaded_file($tmp, "images/$photo");

    mysqli_query($conn, "UPDATE categories SET name='$name', modified_date=now(), title_images='$photo' WHERE id='$id'");
} else {
    mysqli_query($conn, "UPDATE categories SET name='$name', modified_date=now() WHERE id='$id'");
}

header("location:cat-list.php");

?>