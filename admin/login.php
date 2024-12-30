<?php

session_start();

if(!isset($_POST['name'], $_POST['password'])) {
    header("location:index.php?error=missing_fields");
    exit();
}

$name = $_POST['name'];
$password = $_POST['password'];

$hashed_password = password_hash("123456", PASSWORD_DEFAULT);

if($name == "admin" && password_verify($password, $hashed_password)) {
    $_SESSION["auth"] = true;
    header("location:cat-list.php");
    exit();
} else {
    header("location:index.php?incorrect=1");
    exit();
}

?>