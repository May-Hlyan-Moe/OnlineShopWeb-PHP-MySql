<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("admin/confs/config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    $_SESSION['cart'][$item_id] = $quantity;

    http_response_code(200);
    echo "Item add to cart successfully001";
} else {
    http_response_code(400);
        echo "Error: Invalid request.002";
}

?>