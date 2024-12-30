<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("confs/config.php");

$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, "DELETE FROM items WHERE id='$id'");

if($result) {
    header("location:item-list.php");
} else {
    echo "Errors" . mysqli_error($conn);
}

?>