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
		if (register($_POST) > 0) {
		    echo "
		      <script>
		        document.location.href = 'login.php';
		      </script>";
		  }else {
		    echo "
		      <script>
		        alert('Data Gagal Ditambahkan');
		        document.location.href = 'register.php';
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
	        <span class="card-title">Create your account</span>
	        <div class="row">
	          <div class="input-field col s6">
	            <label for="yourname">Your Name</label>
	            <input type="text" class="validate" name="nama" id="yourname" autocomplete="off" />
	          </div>
	          <div class="input-field col s6">
                	<input type="text" name="birthdate" class="datepicker" placeholder="Birthdate">
                </div>
	          <div class="input-field col s6">
	            <label for="username">Username</label>
	            <input type="text" class="validate" name="username" id="username" autocomplete="off" />
	          </div>
	          <div class="input-field col s6">
	            <label for="password">Password </label>
	            <input type="password" class="validate" name="password" id="password" autocomplete="off" />
	          </div>
	          <div class="input-field col s4">
	            <label for="city">City</label>
	            <input type="text" class="validate" name="city" id="city" autocomplete="off" />
	          </div>
	          <div class="input-field col s4">
	            <select name="country">
			      <option value="" disabled selected>Choose your option</option>
			      <option value="Indonesia">Indonesia</option>
			      <option value="Japan">Japan</option>
			      <option value="United States of America">United States of America</option>
			    </select>
			    <label>Country</label>
	          </div>
	          <div class="input-field col s4">
	            <select name="hoby">
			      <option value="" disabled selected>Choose your option</option>
			      <option value="Swimming">Swimming</option>
			      <option value="Badminton">Badminton</option>
			      <option value="Football">Football</option>
			    </select>
			    <label>hoby</label>
	          </div>

	          <?php if (isset($error)) : ?>
	            	<p style="color: #f00"><i>Isi Semua Data !!!</i></p>
	            <?php endif ?>
	          
                <div class="input-field col s6 m8">
                    <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                  <input type="file" name="file">
                            </div>
                    <div class="file-path-wrapper">
                    	<input class="file-path validate" type="text">
                    </div>
                </div>
	        </div>
	      </div>
	      <div class="card-action right-align">
	        <button class="btn blue waves-effect waves-light" type="submit" name="submit">
               	Register Now
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

		$('.datepicker').datepicker();;
   		$('select').formSelect();	
	</script>
</body>
</html>