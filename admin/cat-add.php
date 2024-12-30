<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$name = $_POST['name'];
$photo = $_FILES['title_images']['name'];
$tmp = $_FILES['title_images']['tmp_name'];

if($photo) {
    move_uploaded_file($tmp, "images/$photo" );
}

$result = mysqli_query($conn, "INSERT INTO categories(name,created_date,modified_date,title_images) VALUES('$name',now(),now(),'$photo')");

if(!$result) {
    echo mysqli_error($conn);
}

header("location:cat-list.php");

?>