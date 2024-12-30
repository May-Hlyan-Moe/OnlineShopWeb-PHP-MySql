<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/config.php");
include("confs/auth.php");

$id = $_POST['id'];
$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
    
move_uploaded_file($tmp, "images/$photo");

mysqli_query($conn, "UPDATE items SET photo='$photo' WHERE id='$id'");

header("location:item-list.php");

?>