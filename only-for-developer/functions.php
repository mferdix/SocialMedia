<?php 

// Kalau mau hosting 000webhost pake yg ini
$conn = mysqli_connect("localhost", "id14271558_ferdiadit12", "BRNy-L53={FR/0PH", "id14271558_uas_online");

// Kalau mau hosting Infinityfree pake yg ini
// $conn = mysqli_connect("sql301.epizy.com", "epiz_26371489", "DGC7Tb41pQNXQT", "epiz_26371489_uas_online");

// Kalau mau debug pake yg ini
// $conn = mysqli_connect("localhost", "root", "", "uas_online");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function tambah($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$user = htmlspecialchars($data["username"]);
	$pass = htmlspecialchars($data["password"]);
	$level = htmlspecialchars($data["level"]);

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

	$query = "INSERT INTO `user` VALUES (NULL, '$nama', '$user', '$pass', '$level')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function update($data) {
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$user = htmlspecialchars($data["username"]);
	$pass = hash('sha256', htmlspecialchars($data["password"]));
	$level = htmlspecialchars($data["level"]);

	$query = "UPDATE `user` SET `nama` = '$nama', `username` = '$user', `password` = '$pass', `level` = '$level' WHERE `user`.`id` = $id;";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function register($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$username = mysqli_real_escape_string($conn, strtolower(htmlspecialchars($data["username"])));
	$pass = mysqli_real_escape_string($conn, stripcslashes(htmlspecialchars($data["password"])));

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
	$query = "INSERT INTO `user` VALUES (NULL, '$nama', '$username', '$pass', 'user')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}

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

	// Lolos pengecekan
	move_uploaded_file($tmpName, 'img/'.$namaFile);
	return $namaFile;
}


function compressImage($source, $destination, $quality) {
	// Mendapatkan info gambar
	$imgInfo = getimagesize($source);
	$mime = $imginfo['mime'];

	// membuat gambar baru dari file yang di upload
	switch($mime){
		case 'image/jpeg' : $image = imagecreatefromjpeg($source);
							break;
		case 'image/png' : $image = imagecreatefrompng($source);
							break;
		case 'image/gif' : $image = imagecreatefromgif($source);
							break;
		default : $image = imagecreatefromjpeg($source);
	}

	// Simpan gambar
	imagejpeg($image, $destination, $quality);

	// Return Gambar
	return $destination;
}




 ?>