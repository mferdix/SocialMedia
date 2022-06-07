 <?php 

//  session_start();

if (!isset($_SESSION["level"])) {

	header("location:login.php");

}
require "functions.php";

$id = $_GET["code"];

// Query ke ISI POSTnya
$dataset = query("SELECT * FROM posting WHERE code = '$id'")[0];

// QUERY ke ISI COMMENT nya
$semuaKomen = queryComment("SELECT * FROM comment WHERE code = '$id' ORDER BY id DESC");

if ( isset($_POST["submit"]) ) {
  if( $_POST["soal"] == NULL && $_POST["jawab"] == NULL ) {
    if ( $_FILES["file"]["error"] === 4 ) {
      echo "
          <script>
            alert('Data Gagal Ditambahkan');
          </script>";
          header("Location:post.php?code=$id");
    } else {
      if (tambahKomen($_POST, $id) > 0) {
          header("Location:post.php?code=$id");
        }else {
          echo "
            <script>
              alert('Data Gagal Ditambahkan');
            </script>";
            header("Location:post.php?code=$id");
        }
    }
  } else {
    if (tambahKomen($_POST, $id) > 0) {
          header("Location:post.php?code=$id");
      }else {
        echo "
          <script>
            alert('Data Gagal Ditambahkan');
          </script>";
          header("Location:post.php?code=$id");
      }
  }
}

?>



 <!DOCTYPE html>

  <html>

    <head>

      <meta charset="utf-8">

      <title>Ferdi's Social Media</title>

      <link rel="shortcut icon" href="../images/app_icon.ico">
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
      <link rel="stylesheet" type="text/css" href="css/poststyle.css">
    </head>



    <body>



      <!-- Navbar -->

      <div class="navbar-fixed">

        <nav class="light-blue darken-1">

          <div class="nav-wrapper">

			<a href="#" data-target="slide-out" class="sidenav-trigger">

               <i class="material-icons left">menu</i>

            </a>

            <a class="brand-logo center">Ferdi's Social Media</a>

          </div>

        </nav>

      </div>



      <!-- Sidenav -->

        <ul id="slide-out" class="sidenav">

        <li><div class="user-view">

          <div class="background">

            <img src="images/macOS-Mojave-Day-wallpaper-min.jpg">

          </div>

          <a href="#!"><img class="circle" src="images/profile-picture/<?= $_SESSION["profile-picture"];?>"></a>

          <a href="#!"><span class="white-text name"><?= $_SESSION["nama"];  ?></span></a>

          <a href="#!"><span class="white-text email"><?= $_SESSION["username"]; ?></span></a>

        </div></li>

        <li><a class="waves-effect" href="index.php"><i class="material-icons">home</i>Beranda</a></li>

        <li><a class="subheader">Engine</a></li>

        <li><a class="waves-effect" href="#">Account Profile</a></li>

        <li><a class="waves-effect" href="#">See You All Post</a></li>

        <li><a class="waves-effect" href="#">About This App</a></li>

        <li><a class="subheader">Action</a></li>

        <?php if ($_SESSION["username"] == "useradmin"): ?>

          <li><a class="waves-effect" href="only-for-developer/user-database.php">User Management</a></li>

        <?php endif ?>

        <li><a class="waves-effect" href="logout.php">Logout <i class="material-icons">logout</i></a></li>

      </ul> 

      <!-- Akhir Sidenav -->

        <br>



      <div class="container">

        <div class="row">
          <div class="col s12">
                  <!-- Halaman Isi -->
                  <div class="post-user">
                    <div class="header">
                      <ul>  
                        <li>
                          <img class="icon" src="images/profile-picture/<?= $dataset["profile-picture"];?>">
                        </li>
                        <li>
                          <ul class="user-details">
                            <li><?= $dataset["nama"]; ?></li>
                            <li><?= $dataset["username"]; ?></li>
                          </ul>
                        </li>
                      </ul>
                      <p><?= $dataset["post"]; ?></p>
                    </div>
                    <div class="isi">
                      <center>
                        <?php if ($dataset["gambar"] != NULL): ?>
                          <img class="gambar" src="img/<?= $dataset["gambar"];  ?>">
                        <?php endif ?>
                      </center>
                    </div>

                    <div>
                      <center>
                        <?php if ($_SESSION["level"] === hash('sha256', 'admin')) : ?>
                          <a href="hapus.php?id=<?= $dataset['id'];?>&code=<?= $dataset['code'];?>" class="btn red"><i class="material-icons">delete</i></a><br><br>
                        <?php endif ?>
                        <?php if ($_SESSION["username"] === $dataset['username'] && $_SESSION["level"] === hash('sha256', 'user')) : ?>
                          <a href="hapus.php?id=<?= $dataset['id'];?>&code=<?= $dataset['code'];?>" class="btn-small red"><i class="material-icons">delete</i></a><br><br><br><br>
                        <?php endif ?>
                      </center>
                    </div>
                  </div>
                  <!-- Akhir Halaman Isi -->

                  <!-- Halaman Kolom Komentar -->
                  <div class="kirim-komen">
                        <form method="post" action="" enctype="multipart/form-data">
                          <div class="posting">
                            <div class="row">
                              <div class="col s12">
                                <div class="row">
                                  <div class="input-field col s12">
                                    <!-- Hidden Input -->
                                    <input type="hidden" name="nama" value="<?= $_SESSION["nama"]; ?>">
                                    <input type="hidden" name="username" value="<?= $_SESSION["username"]; ?>">
                                    <input type="hidden" name="code" value="<?= $id; ?>">
                                    <input type="hidden" name="profile-picture" value="<?= $_SESSION["profile-picture"]; ?>">
                                    <!-- Akhir Hidden Input -->
                                    <textarea id="post" class="materialize-textarea" name="soal"></textarea>
                                    <label for="post">Kirim Komentar?</label>
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
                        </div>
                  <!-- Akhir Isi Kolom Komentar -->

                    <div class="semua-komen">
                      <?php foreach ($semuaKomen as $komen) : ?>
                      <div class="isi-komen">
                        <div class="header">
                            <ul>  
                              <li>
                                <img class="icon" src="images/profile-picture/<?= $komen["profile-picture"]; ?>">
                              </li>
                              <li>
                                <ul class="user-details">
                                  <li><?= $komen["nama"]; ?></li>
                                  <li><?= $komen["username"]; ?></li>
                                </ul>
                              </li>
                            </ul>
                            <p><?= $komen["comment"]; ?></p>
                        </div>

                        <div class="isi">
                           <center>
                              <?php if ($komen["gambar"] != NULL) : ?>
                                <img class="gambar" src="img/<?= $komen["gambar"];?>">
                              <?php endif ?>
                           </center>
                        </div> 

                        <div>
                          <center>
                            <?php if ($_SESSION["level"] === hash('sha256', 'admin')) : ?>
                              <a href="hapus-komen.php?id=<?= $komen['id']; ?>&username=<?= $komen['username'];?>&code=<?= $id; ?>" class="btn-small red"><i class="material-icons">delete</i></a><br><br>
                            <?php endif ?>
                            <?php if ($_SESSION["username"] === $komen['username'] && $_SESSION["level"] === hash('sha256', 'user')) : ?>
                              <a href="hapus-komen.php?id=<?= $komen['id']; ?>&username=<?= $komen['username'];?>&code=<?= $id; ?>" class="btn-small red"><i class="material-icons">delete</i></a><br><br>
                            <?php endif ?>
                          </center>
                        </div>   
                      </div>
                      <?php endforeach; ?>
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