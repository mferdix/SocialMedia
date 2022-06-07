<?php 

// Kalau mau hosting 000webhost pake yg ini
// $conn = mysqli_connect("localhost", "id14271558_ferdiadit12",	 "BRNy-L53={FR/0PH", "id14271558_uas_online");

// Kalau mau hosting Infinityfree pake yg ini
// $conn = mysqli_connect("sql301.epizy.com", "epiz_26371489", "DGC7Tb41pQNXQT", "epiz_26371489_uas_online");

// // Kalau mau debug pake yg ini
$conn = mysqli_connect("localhost", "root", "", "id14271558_uas_online");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function queryComment($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function tambah($data) {
	global $conn;
	$soal = htmlspecialchars($data["soal"]);
	$gambar = upload();
	$nama = htmlspecialchars($data["nama"]);
	$code = htmlspecialchars($data["code"]);
	$username = htmlspecialchars($data["username"]);
	$profile = $data["profile-picture"];

	$query = "INSERT INTO `posting` VALUES (NULL, '$soal', '$gambar', '$nama', '$username', '$profile', '$code')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function tambahKomen($data, $asal) {
	global $conn;
	$soal = htmlspecialchars($data["soal"]);
	$gambar = upload();
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$code = htmlspecialchars($data["code"]);
	$profile = $data["profile-picture"];

	$query = "INSERT INTO comment VALUES (NULL, '$nama', '$username', '$profile', '$soal', '$gambar', '$code')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function register($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$username = mysqli_real_escape_string($conn, strtolower(htmlspecialchars($data["username"])));
	$pass = mysqli_real_escape_string($conn, stripcslashes(htmlspecialchars($data["password"])));
	$gambar = profileImage();
	$birthdate = mysqli_real_escape_string($conn, stripcslashes(htmlspecialchars($data["birthdate"])));
	$city = mysqli_real_escape_string($conn, stripcslashes(htmlspecialchars($data["city"])));
	$country = mysqli_real_escape_string($conn, stripcslashes(htmlspecialchars($data["country"])));
	$hoby = mysqli_real_escape_string($conn, stripcslashes(htmlspecialchars($data["hoby"])));
	$city = strtoupper($city);
	$city = $city . ', ' . $country;

	// Cek Username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {
		echo "
		<script>
			alert('Username sudah ada yang menggunakan');
		</script>
		";
		return false;
	}

	// Enkripsi Password
	$pass = hash('sha256', $pass);

	// $query = "INSERT INTO `user` VALUES (NULL, '$nama', '$username', '$pass', 'user', '$gambar, '$hoby', '$city', '$birthdate')";

	$query = "INSERT INTO `user` VALUES (NULL, '$nama', '$username', '$pass', 'user', '$gambar', '$hoby', '$city', '$birthdate')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function forgot($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$username = strtolower(htmlspecialchars($data["username"]));
	$pass = htmlspecialchars($data["password"]);

	$query = "INSERT INTO `lupa` VALUES (NULL, '$nama', '$username', '$pass')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function profileImage() {
	$namaFile = $_FILES["file"]["name"];
	$ukuranFile = $_FILES["file"]["size"];
	$error = $_FILES["file"]["error"];
	$tmpName = $_FILES["file"]["tmp_name"];

	// cek jika ukuran terlalu besar
	// if ($ukuranFile > 500000) {
	// 	echo "<script>Yg anda upload terlalu besar</script>";
	// 	return false;
	// }

	// cek apakah tidak ada gambar yang di upload
	if ($error === 4) {
		return "app_icon.png";
	}

	//  cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ["jpg", "jpeg", "png"];
	$ekstensiGambar = explode(".", $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>Yg anda upload bukan gambar</script>";
		return false;
	}

	// Generate gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

	// Lolos pengecekan
	// move_uploaded_file($tmpName, 'img/'.$namaFile);
	$target_path = "images/profile-picture/".$namaFileBaru;
	$source_img = $tmpName;
    $destination_img = $target_path;

	compress($source_img, $destination_img, 4);
	return $namaFileBaru;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function upload() {
	$namaFile = $_FILES["file"]["name"];
	$ukuranFile = $_FILES["file"]["size"];
	$error = $_FILES["file"]["error"];
	$tmpName = $_FILES["file"]["tmp_name"];

	// cek jika ukuran terlalu besar
	// if ($ukuranFile > 50000) {
	// 	echo "<script>Yg anda upload terlalu besar</script>";
	// 	return false;
	// }

	// cek apakah tidak ada gambar yang di upload
	// if ($error === 4) {
	// 	return "";
	// }

	//  cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ["jpg", "jpeg", "png"];
	$ekstensiGambar = explode(".", $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>Yg anda upload bukan gambar</script>";
		return false;
	}

	// Generate gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

	// Lolos pengecekan
	// move_uploaded_file($tmpName, 'img/'.$namaFile);
	$target_path = "img/".$namaFileBaru;
	$source_img = $tmpName;
    $destination_img = $target_path;

	compress($source_img, $destination_img, 7);
	return $namaFileBaru;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 function compress($source, $destination, $quality)
 {
     $info = getimagesize($source);
     if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
     elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source);
     elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
     imagejpeg($image, $destination, $quality);
     return $destination;
 }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 // function bikinTable($code) {
 // 	global $conn;
 // 	mysqli_query($conn, "CREATE TABLE $code ( 
 // 		`id` INT NOT NULL AUTO_INCREMENT ,  
 // 		`nama` VARCHAR(65535) NOT NULL, 
 // 		`username` VARCHAR(65535) NOT NULL ,  
 // 		`profile-picture` VARCHAR(65535) NOT NULL ,  
 // 		`comment` VARCHAR(65535) NOT NULL ,  
 // 		`gambar` VARCHAR(65535) NOT NULL ,    
 // 		PRIMARY KEY  (`id`)) ENGINE = InnoDB;");
 // 	return mysqli_affected_rows($conn);
 // }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 function random($long) {
 	$karakter = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
 	$string = '';

 	for($i = 0; $i < $long; $i++) {
 		$pos = rand(0, strlen($karakter)-1);
 		$string .= $karakter[$pos];
 	}
 	return $string;
 }

 ?>