<?php 

//  session_start();
 require 'functions.php';

if( isset($_COOKIE["level"]) && isset($_COOKIE["nama"]) && isset($_COOKIE["username"]) && isset($_COOKIE["password"]) ) {
	$level = $_COOKIE["level"];
	$nama = $_COOKIE["nama"];
	$user = $_COOKIE["username"];
	$pass = $_COOKIE["password"];
	$profile = $_COOKIE["profile"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");
	$row = mysqli_fetch_assoc($result);

	if( $user === $row["username"] && $pass === $row["password"] ) {
		$_SESSION["level"] = $level;
		$_SESSION["nama"] = $nama;
		$_SESSION["username"] = $user;
		$_SESSION["profile-picture"] = $profile;
	}
}

// Cek apakah session ada atau tidak
if (isset($_SESSION["level"])) {
	header("location:index.php");
	exit;
}


if (isset($_POST["submit"])) {
	$user = strtolower($_POST["username"]);
	$pass = hash('sha256', $_POST["password"]);
	$query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'"; 
	$data_user = mysqli_query($conn, $query);

	// Cek apakah user tersedia di database
	if (mysqli_num_rows($data_user) === 1) {
		$r = mysqli_fetch_assoc($data_user);
		$db_user = $r["username"];
		$db_pass = $r["password"];
		$db_level = $r["level"];
		$db_nama = $r["nama"];
		$db_profile = $r["profile-picture"];
		$db_city = $r["City"];
		$db_date = $r["born"];
		$db_hoby = $r["hoby"];

		if ($user == $db_user && $pass == $db_pass) {
			$_SESSION["level"] = hash('sha256', $db_level);
			$_SESSION["nama"] = $db_nama;
			$_SESSION["username"] = $db_user;
			$_SESSION["profile-picture"] = $db_profile;
			$_SESSION["city"] = $db_city;
			$_SESSION["born"] = $db_date;
			$_SESSION["hoby"] = $db_hoby;

			// Cek Remember Me
			if(isset($_POST["remember"])) {
				setcookie('level', hash('sha256', $db_level), time() + 2628002.88);
				setcookie('nama', $db_nama, time() + 2628002.88);
				setcookie('username', $db_user, time() + 2628002.88);
				setcookie('password', $db_pass, time() + 2628002.88);
				setcookie('profile', $db_profile, time() + 2628002.88);
			}
			header("location:index.php");
			exit;
		}

	}

	$error = true;

	// $r = mysqli_fetch_assoc($data_user);
	// $db_user = $r["username"];
	// $db_pass = $r["password"];
	// $db_level = $r["level"];
	// $db_nama = $r["nama"];

	// if ($user == $db_user && $pass == $db_pass) {
	// 	$_SESSION["level"] = $db_level;
	// 	$_SESSION["nama"] = $db_nama;
	// 	$_SESSION["username"] = $db_user;
	// 	header("location:index.php");
	// 	exit;
	// }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to R2Z Answer Sharing</title>
	<link rel="shortcut icon" href="app_icon.ico">

	<meta charset="utf-8">
      <title>FerdiDataSet - Coronavirus Update</title>
      <link rel="shortcut icon" href="app_icon.ico">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="css/style.css">

      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!-- jQuery Script -->
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

       <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <!-- SweetAlert -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style type="text/css">
      	html,
		body,
		.login-box {
		  height: 100%;
		}

		@media (max-width: 1080px) {
			.regist {
				margin-bottom : 10px;
			}
		}
      </style>
</head>
<body>

	<div class="valign-wrapper row login-box">
	  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
	    <form action="" method="post">
	      <div class="card-content">
	        <span class="card-title">Enter credentials</span>
	        <div class="row">
	          <div class="input-field col s12">
	            <label for="email">Username</label>
	            <input type="text" class="validate" name="username" id="email" autocomplete="off" />
	          </div>
	          <div class="input-field col s12">
	            <label for="password">Password </label>
	            <input type="password" class="validate" name="password" id="password" autocomplete="off" />
	            <?php if (isset($error)) : ?>
	            	<p style="color:#f00;">User tidak terdaftar atau Password salah!</p>
	            <?php endif ?>
	          </div>
	          <div class="input-field col s12">
	            <label>
	            	<input type="checkbox" name="remember">
	            	<span>Remember Me</span>
	            </label>
	          </div>
	        </div>
	      </div>
	      <div class="card-action right-align">
	      	<button class="btn blue waves-effect waves-light" type="submit" name="submit">
               	Login
                <i class="material-icons right">login</i>
            </button>
	      	<br><br>
	      	<a href="register.php" class="btn green waves-effect waves-light regist">Register</a>
	      	<a href="forgot.php" class="btn red waves-effect waves-light regist">Forgot Account</a>
	      </div>
	    </form>
	  </div>
	</div>

	<script type="text/javascript">
		$("#reset").on("click", function() {
		  $('label').removeClass('active');
		});
	</script>
</body>
</html>