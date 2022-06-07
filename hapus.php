<?php

// session_start();

require "functions.php";

$id = $_GET["id"];
$username = $_GET["username"];
$code = $_GET["code"];

$query = "DELETE FROM posting WHERE id = '$id'";
$queryComment = "DELETE FROM comment WHERE code = '$code'";

mysqli_query($conn, $query);
mysqli_query($conn, $queryComment);

header("location:index.php");


 ?>