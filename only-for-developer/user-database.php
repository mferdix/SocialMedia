 <?php 

 session_start();

if (!isset($_SESSION["level"])) {
	header("location:../login.php");
}

if ($_SESSION["username"] != "useradmin") {
    header("location:../index.php");
} 


require "functions.php";

$dataset = query("SELECT * FROM user");

if ( isset($_POST["submit"]) ) {
  if (tambah($_POST) > 0) {
        echo "
          <script>
            document.location.href = 'user-database.php';
          </script>";
    }
    else {
        echo "
          <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'user-database.php';
          </script>";
    }
}

if (isset($_POST["cari"])) {
  $keyword = $_POST["search"];
  $dataset = query("SELECT * FROM user WHERE nama LIKE '%".$keyword."%' or username LIKE '%".$keyword."%' or password LIKE '%".$keyword."%' or level LIKE '%".$keyword."%'");
}


  ?>

 <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>R2Z Sharing Online UAS</title>
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

        body {
          background-color: #F0F0F0;
        }

        .sidenav-trigger {
        	display: block !important;
        	opacity: 1 !important;
        	position: static !important;
        }

        .post-user {
          margin-top: 20px !important;
          background: #fff !important;
          padding: 50px;
          border-radius: 20px;
        }

        .cari {
              height: 150px;
              margin-bottom: 10px;
              padding: 20px;
              border-radius: 10px;
              background-color: #fff;
          }


          .cari button {
            margin-top: 0px;
          }

        

        .data {
          width: 60%;
          margin: 0px auto;
        }

        .data .post ul li {
          display: inline-block;
          list-style-type: none;
        }

        .data .post h5 {
          font-size: 20px;
        }

        .upload {
          width: 57% !important;
          margin: 0px auto;
        }

        footer{
          position: fixed;
          width: 80%;
          margin: 0px auto;
          bottom: 0;
          right: 0;
          left: 0;
        }

        #dataframe {
          height: 250px;
        }

        .recent-cards {
          margin-top: 50px;
        }

        .tabs .tab a{
            color:#000;
        } /*Black color to the text*/

        .tabs .tab a:hover {
            background-color:#eee;
            color:#000;
        } /*Text color on hover*/

        .tabs .tab a.active {
            background-color:#fff;
            color:#000;
        } /*Background and text color when a tab is active*/

        .tabs .indicator {
            background-color:#1E88E5;
        } /*Color of underline*/

        .nav-wrapper {
          padding: 0px 15px;
        }

        .posting {
          background-color: #fff;
          border-radius: 10px;
          padding: 20px;
          position: fixed;
          width: 32%;
        }


        table .aksi, table .aksi-user {
          text-align: center !important;
        }



        /*RESPONSIVE DESIGN*/

         @media (max-width: 1080px) { 

	          .brand-logo {
	            font-size: 14px !important;
	          }

	          .cari {
	              height: 160px;
	              margin-bottom: 10px;
	              padding: 20px;
	              border-radius: 10px;
	              background-color: #fff;
	              width: 100%;
	          }

	          .cari textarea {
	            width: 100%;
	          }

	          .cari button {
	            margin-top: 0px;
	          }

	          .posting .file {
	            margin-bottom: 10px;
	          }

	          .post-user img {
	          width: 100%;
	        }

	        .post-user {
	          background-color: rgba(255,255,255,0);
	          border-radius: 10px;
	          margin-top: 10px;
	          height: 330px !important;
	        }

          .tambah-user {
            display: none !important;
          }

         }
      </style>
    </head>

    <body>

      <!-- Navbar -->
      <div class="navbar-fixed">
        <nav class="light-blue darken-1">
          <div class="nav-wrapper">
			<a href="#" data-target="slide-out" class="sidenav-trigger">
               <i class="material-icons left">menu</i>
            </a>
            <a href="#!" class="brand-logo center">R2Z UAS Online Sharing</a>
            <a href="../logout.php">
               <i class="material-icons right">logout</i>
            </a>
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
          <a href="#!"><span class="white-text email"><?= $_SESSION["username"]; ?></span></a>
        </div></li>
        <li><a class="waves-effect" href="../index.php">Beranda <i class="material-icons">home</i></a></li>
        <li><a class="subheader">Engine</a></li>
        <li><a class="waves-effect" href="#">Account Profile</a></li>
        <li><a class="waves-effect" href="#">See You All Post</a></li>
        <li><a class="waves-effect" href="#">About This App</a></li>
        <li><a class="subheader">Action</a></li>
        <li><a class="waves-effect" href="../logout.php">Logout <i class="material-icons">logout</i></a></li>
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
                        <textarea id="textarea1" class="materialize-textarea" name="search"></textarea>
                        <label for="textarea1">Search User Data</label>
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

            <!-- Halaman Isi -->
            <div class="post-user">
                      <table class="highlight">
                      <thead>
                        <tr>
                            <th>
                                Aksi
                            </th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($dataset as $data): ?>
                        <tr>
                          <td class="aksi-user">
                              <a href="hapus-user.php?id=<?= $data["id"]; ?>" class="btn-small red"><i class="material-icons">delete</i></a>
                              <br><br>
                               <a href="edit-user.php?id=<?= $data["id"]; ?>" class="btn-small"><i class="material-icons">edit</i></a>
                          </td>
                          <td><?= $data["nama"];  ?></td>
                          <td><?= $data["username"];  ?></td>
                          <td><?= $data["level"];  ?></td>
                        </tr>
                      <?php $i++; ?>
                      <?php endforeach ?>
                      </tbody>
                    </table>
            </div>
            <!-- Akhir Halaman Isi -->
          </div>
          <!-- akhir kiri -->

          <div class="col s12 m4 tambah-user">
                        <!-- Halaman Posting -->
              <div class="posting">
                <div class="row">
                  <form action="" method="post" class="col s12">
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="username" name="username" type="text" class="validate" autocomplete="off">
                        <label for="username">Username</label>
                      </div>
                      <div class="input-field col s6">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="name" name="nama" type="text" class="validate"  autocomplete="off">
                        <label for="name">Your Name</label>
                      </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                          <select name="level">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="user">User</option>
                            <option value="admin">Administrator</option>
                          </select>
                          <label>Materialize Select</label>
                            <button type="submit" class="btn waves-effect waves-light" name="submit">Add <i class="material-icons right">add</i></button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            <!-- Akhir Halaman Posting -->
          </div>

        </div>
      </div>

    <script type="text/javascript" src="js/script.js"></script>  
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.sidenav').sidenav();
        $('select').formSelect();
    	});
    </script>
    </body>
  </html>