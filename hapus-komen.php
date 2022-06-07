<?php

// session_start();

require "functions.php";

$id = $_GET["id"];
$code = $_GET["code"];

$query = "DELETE FROM comment WHERE id='$id' AND code = '$code'";

mysqli_query($conn, $query);

header("location:post.php?code=$code");


 ?>