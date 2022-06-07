 <?php 

//  session_start();



if (!isset($_SESSION["level"])) {
	header("location:login.php");
}



require "functions.php";


$id = $_GET["username"];

$dataset = query(" SELECT * FROM posting WHERE username = '$id' ");

if ( isset($_POST["submit"]) ) {
	if( $_POST["soal"] == NULL ) {
		if ( $_FILES["file"]["error"] === 4 ) {
			echo "
		      <script>
		        alert('Data Gagal Ditambahkan');
				document.location.href = 'index.php';
		      </script>";
		} else {
			if (tambah($_POST) > 0) {
			    echo "
			      <script>
			        document.location.href = 'index.php';
			      </script>";
			  }else {
			    echo "
			      <script>
			        document.location.href = 'index.php';
			      </script>";
			  }
		}
	} else {
		if (tambah($_POST) > 0) {
		    echo "
		      <script>
		        document.location.href = 'index.php';
		      </script>";
		  }else {
		    echo "
		      <script>
		        
		        document.location.href = 'index.php';
		      </script>";
		  }
	}
}

if (isset($_POST["cari"])) {
  $keyword = $_POST["search"];
  $dataset = query(" SELECT * FROM posting WHERE post LIKE '%".$keyword."%' OR username LIKE '%".$keyword."%' OR nama LIKE '%".$keyword."%' ");
}

?>

 <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Ferdi's Social Media</title>
      <link rel="shortcut icon" href="images/app_icon.ico">
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
      <!-- Customize CSS -->
      <link rel="stylesheet" type="text/css" href="css/gaya.css">

    </head>



    <body>

      <!-- Navbar -->
      <div class="navbar-fixed">
        <nav class="light-blue darken-1">
          <div class="nav-wrapper">
			     <a href="#" data-target="slide-out" class="sidenav-trigger">
            <i class="material-icons left">menu</i>
           </a>
           <h5 class="brand-logo center">Ferdi's Social Media</h5>
          </div>

        </nav>

      </div>



      <!-- Sidenav -->

        <ul id="slide-out" class="sidenav">

        <li><div class="user-view">

          <div class="background">

            <img src="images/macOS-Mojave-Day-wallpaper-min.jpg">

          </div>

          <a href="#!"><img class="circle" src="images/app_icon.png"></a>

          <a href="#!"><span class="white-text name"><?= $_SESSION["nama"];  ?></span></a>

          <a href="#!">
            <span class="white-text email"><?= $_SESSION["username"]; ?></span>
          </a>

        </div></li>

        <li><a class="subheader">Engine</a></li>

        <li><a class="waves-effect" href="#">Account Profile</a></li>

        <li><a class="waves-effect" href="#">See You All Post</a></li>

        <li><a class="waves-effect" href="#">About This App</a></li>

        <li><a class="subheader">Action</a></li>

        <?php if ($_SESSION["username"] == "useradmin") : ?>

          <li><a class="waves-effect" href="only-for-developer/user-database.php">User Management</a></li>

        <?php endif ?>

        <li><a class="waves-effect" href="logout.php">Logout <i class="material-icons">logout</i></a></li>

      </ul> 

      <!-- Akhir Sidenav -->

        <br>



      <div class="container-fluid">
        <div class="row">
          <!-- Left content -->
          <div class="col s12 m8">
            <form method="post" action="">
              <div class="cari">
                <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="cari" class="materialize-textarea" name="search"></textarea>
                        <label for="cari">Search Post</label>
                        <button class="btn waves-effect waves-light" type="submit" name="cari">
                          Cari
                          <i class="material-icons right">search</i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <!-- Halaman Posting -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="posting">
                <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                      	<input type="hidden" name="nama" value="<?= $_SESSION["nama"]; ?>">
                        <input type="hidden" name="username" value="<?= $_SESSION["username"]; ?>">
                        <textarea id="post" class="materialize-textarea" name="soal"></textarea>
                        <label for="post">Apa yang anda pikirkan?</label>
                      </div>
                      <div class="col s12">
                        <div class="row">
                          <div class="input-field col s12 m8">
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
                          <div class="input-field col s12 m4">
                            <button class="btn waves-effect waves-light" type="submit" name="submit">
                              Submit
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!-- Akhir Halaman Posting -->

            <!-- Halaman Isi -->
            <?php foreach ($dataset as $data) : ?>
            <div class="post-user all-post">
              <div class="header">
                <ul>  
                  <li>
                    <img src="images/app_icon.png">
                  </li>
                  <li>
                    <ul>
                      <li><?= $data["nama"]; ?></li>
                      <li><?= $data["username"]; ?></li>
                    </ul>
                  </li>
                </ul>
                <p><?= $data["post"]; ?></p>
              </div>
                <center>
                  <?php if ($data["gambar"] != NULL): ?>
                    <img src="img/<?= $data["gambar"];  ?>">
                  <?php endif ?>
                </center>
              <center>
                <a href="post.php?code=<?= $data["code"]; ?>" class="btn-small green waves-effect waves-light">See a Comment!</a>
                <?php if ($_SESSION["level"] === hash('sha256', 'admin')) : ?>
                  <a href="hapus.php?id=<?= $data['id'];?>&code=<?= $data['code'];?>" class="btn-small red"><i class="material-icons">delete</i></a>
                <?php endif ?>
                <?php if ($_SESSION["username"] === $data['username'] && $_SESSION["level"] === hash('sha256', 'user')) : ?>
                  <a href="hapus.php?id=<?= $data['id'];?>&code=<?= $data['code'];?>" class="btn-small red"><i class="material-icons">delete</i></a>
                <?php endif ?>
                <br><br>
              </center>
            </div>
            <!-- Akhir Halaman Isi -->
            <?php endforeach; ?>
          </div>


          <!-- Sidenav Right -->
          <div class="col s12 m4">
          	<div class="side-right">
          		<div class="collection">
				        <a href="../bahasa-inggris/index.php" class="collection-item"><span class="badge"></span>Account Profile</a>
				        <a href="index.php?username=<?= $_SESSION["username"]; ?>" class="collection-item"><span class="badge"></span>See You All Post</a>
				        <a href="../pkn/index.php" class="collection-item"><span class="badge"></span>About this App</a>
				      </div>
          	</div>
          </div>
        </div>
      </div>

    <script type="text/javascript" src="js/script.js"></script>  
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.sidenav').sidenav();
        setTimeout(function() {
            location.reload();
        }, 300000);
    	});
    </script>
    </script>
    </body>
  </html>