<?php

require "functions.php";

$id = $_GET["id"];

$query = "DELETE FROM user WHERE id = '$id'";

mysqli_query($conn, $query) or die(mysql_error());

header("location:user-database.php");


 ?>