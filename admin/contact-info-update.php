<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/auth.php");
include("confs/config.php");

$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$fb_link = $_POST['fb_link'];
$ig_link = $_POST['ig_link'];
$twitter_link = $_POST['twitter_link'];

mysqli_query($conn, "UPDATE contact_info SET phone='$phone', email='$email', address='$address', fb_link='$fb_link', ig_link='$ig_link', twitter_link='$twitter_link' WHERE id=1");

header("location:contact-info.php");

?>