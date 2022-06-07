<?php 

// session_start();

if (isset($_SESSION["level"])) {
	header("location:index.php");
}

require 'functions.php';

if ( isset($_POST["submit"]) ) {
	$error;
	if( $_POST["nama"] == NULL || $_POST["username"] == NULL || $_POST["password"] == NULL ) {
		  $error = true;
	}else {
		if (forgot($_POST) > 0) {
		    echo "
		      <script>
		      	alert('Berhasil Dikirimkan, Silahkan tunggu Email anda dari kami');
		        document.location.href = 'login.php';
		      </script>";
		  }else {
		    echo "
		      <script>
		        alert('Gagal Dikirimkan');
		        document.location.href = 'forgot.php';
		      </script>";
		  }
	}

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
      </style>
</head>
<body>

	<div class="valign-wrapper row login-box">
	  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
	    <form action="" method="post" enctype="multipart/form-data">
	      <div class="card-content">
	        <span class="card-title">Input your Account Data</span>
	        <div class="row">
	          <div class="input-field col s12">
	            <label for="yourname">Your Name</label>
	            <input type="text" class="validate" name="nama" id="yourname" autocomplete="off" />
	          </div>
	          <div class="input-field col s12">
	            <label for="username">Your Email</label>
	            <input type="email" class="validate" name="username" id="username" autocomplete="off" />
	          </div>
	          <div class="input-field col s12">
	            <label for="password">Username</label>
	            <input type="text" class="validate" name="password" id="password" autocomplete="off" />

	            <?php if (isset($error)) : ?>
	            	<p style="color: #f00"><i>Isi Semua Data !!!</i></p>
	            <?php endif ?>
	          </div>
	        </div>
	      </div>
	      <div class="card-action right-align">
	        <button class="btn blue waves-effect waves-light" type="submit" name="submit">
               	Send to Admin
                <i class="material-icons right">login</i>
            </button>
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