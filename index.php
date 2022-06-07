<?php 

//  session_start();



if (!isset($_SESSION["level"])) {
  header("location:login.php");
}



require "functions.php";



$dataset = query("SELECT * FROM posting ORDER BY id DESC");



if ( isset($_POST["submit"]) ) {
  $code = $_POST["code"];
  
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
<title>Ferdi's Social Media</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/app_icon.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top" style="position: fixed;">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Ferdi's Social Media</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="My Account">
    <img src="images/profile-picture/<?= $_SESSION['profile-picture'];?>" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
  </a>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a> -->
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Logout"><i class="fa fa-power-off"></i></a>
  
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large" style="position: fixed; width: 100%; margin-top: -6%;">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?= $_SESSION["nama"];  ?></h4>
         <p class="w3-center"><img src="images/profile-picture/<?= $_SESSION['profile-picture'];?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?= $_SESSION["hoby"] ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?= $_SESSION["city"] ?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?= $_SESSION["born"] ?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="snow.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">What happened today?</h6>
              <form method="post" action="" enctype="multipart/form-data">
                <!-- Hidden Input -->
                        <input type="hidden" name="nama" value="<?= $_SESSION['nama']; ?>">
                        <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>">
                        <input type="hidden" name="code" value="<?= random(20); ?>">
                        <input type="hidden" name="profile-picture" value="<?= $_SESSION['profile-picture']; ?>">
                <textarea placeholder="Status : Feeling Time" style="width: 100%;" id="post" class="w3-border w3-padding" name="soal"></textarea><br><br>
                <input type="file" name="file" class="w3-button w3-theme" style="width: 50%">
                <button type="submit" name="submit" class="w3-button w3-theme w3-right"><i class="fa fa-pencil"></i>  Post</button> 
              </form>  
            </div>
          </div>
        </div>
      </div>
      
      <!-- Start Content -->
      <?php foreach ($dataset as $data) : ?>
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="images/profile-picture/<?= $data['profile-picture']; ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:50px ; height: 50px;">
        <span class="w3-right w3-opacity"><?= $data["username"]; ?></span>
        <h4><?= $data["nama"]; ?></h4><br>
        <hr class="w3-clear">
        <p><?= $data["post"]; ?></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <?php if ($data["gambar"] != NULL): ?>
              <img src="img/<?= $data["gambar"];  ?>" style="width:100%;" alt="Northern Lights" class="w3-margin-bottom">
              <?php endif ?>
            </div>
            <div class="w3-half">
              <!-- <img src="nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom"> -->
          </div>
        </div>
        <a href="#" class="w3-button w3-theme-d1 w3-margin-bottom" onclick="alert('Comming Soon :)')";><i class="fa fa-thumbs-up"></i>  Like</a> 
        <a href="#" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</a>
        <?php if ($_SESSION["level"] === hash('sha256', 'admin')) : ?>
          <a href="hapus.php?id=<?= $data['id'];?>&code=<?= $data['code'];?>" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-trash"></i></a>
        <?php endif ?>
        <?php if ($_SESSION["username"] === $data['username'] && $_SESSION["level"] === hash('sha256', 'user')) : ?>
          <a href="hapus.php?id=<?= $data['id'];?>&code=<?= $data['code'];?>" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-trash"></i></a>
        <?php endif ?> 
      </div>
      <?php endforeach; ?>
      <!-- End of Content -->
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><b><?= date("l") ?></b></p>
          <p><?= date("jS \of F Y") ?></p>
          <img src="https://www.theweather.com/wimages/fotocde88804cf1290991d842fb5b60676ee.png" style="width: 100%;">
          <!-- <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p> -->
          <p><a target="_blank" href="https://www.theweather.com/jakarta.htm" class="w3-button w3-block w3-theme-l4">Info</a></p>
        </div>
      </div>
      <br>

      <!-- KAWAL CORONA API -->
      <?php 

      //ambil data json dari file
      $content=file_get_contents("https://api.kawalcorona.com/indonesia");

      //mengubah standar encoding
      $content=utf8_encode($content);

      //mengubah data json menjadi data array asosiatif
      $result=json_decode($content,true);

      //looping data menggunakan foreach
      // foreach ($result as $value) { 
      //  echo "Negara : ".$value['name']."<br>";
      //  echo "Positif : ".$value['positif']."<br>";
      //  echo "Sembuh : ".$value['sembuh']."<br>";
      //  echo "Meninggal : ".$value['meninggal']."<br>";
      // }

       ?>


      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <h5>Covid Update Indonesia</h5>
          <center>
            <?php foreach ($result as $value) : ?>
              <p style="color: #00f;">Healed : <?= $value['sembuh']; ?> </p>
              <p style="color: #0f0;">Positif : <?= $value['positif']; ?> </p>
              <p style="color: #f00;">Death : <?= $value['meninggal']; ?> </p>
            <?php endforeach;?>
          </center>
          <div class="w3-row w3-opacity">
            <!-- <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div> -->
            <div class="w3-half">
              <a target="_blank" href ="https://www.worldometers.info/coronavirus/country/indonesia/" class="w3-button w3-block w3-green w3-section" title="Accept">See Info</a>
            </div>
            <div class="w3-half">
              <a target="_blank" href="https://www.alodokter.com/ketahui-cara-untuk-mencegah-penularan-virus-corona" class="w3-button w3-block w3-red w3-section" title="Decline">Stay Safe</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
 
<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html> 