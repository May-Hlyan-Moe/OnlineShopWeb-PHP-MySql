<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpasword = "";
$dbname = "finalProject";
$conn = mysqli_connect($dbhost, $dbuser, $dbpasword);

mysqli_select_db($conn, $dbname);

?>