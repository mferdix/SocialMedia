<?php 

// session_start();
session_destroy();

setcookie('level', '', time() - 120);
setcookie('nama', '', time() - 120);
setcookie('username', '', time() - 100);
setcookie('password', '', time() - 100);

header("location:login.php");

 ?>