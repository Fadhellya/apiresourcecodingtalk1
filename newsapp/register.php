<?php

include "koneksi.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	$response = array();
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	// $filename = $_FILES['gambar']['name'];

	// // JIKA SEMUANYA TIDAK KOSONG
	// $filetmpname = $_FILES['gambar']['tmp_name'];

	// // FOLDER DIMANA GAMBAR AKAN DI SIMPAN
	// $folder = 'gambar_berita/';
	// // GAMBAR DI SIMPAN KE DALAM FOLDER
	// move_uploaded_file($filetmpname, $folder . $filename);

	$cek = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
	$result = mysqli_fetch_array(mysqli_query($koneksi, $cek));

	if(isset($result)) {
		$response['value'] = 2;
		$response['message'] = "Username atau emailtelah digunakan";
		echo json_encode($response); 
	} else {
		// $insert = "INSERT INTO tb_users VALUE(NULL, '$username', '$email', '$password', '$fullname', '$filename', NOW())";
		$insert = "INSERT INTO users VALUE(NULL, '$username', '$email', '$password', '$fullname', NOW())";
		if(mysqli_query($koneksi, $insert)){
			$response['value'] = 1;
			$response['message'] = "Berhasil didaftarkan";
			echo json_encode($response); 
		} else {
			$response['value'] = 0;
			$response['message'] = "Gagal didaftarkan";
			echo json_encode($response); 
		}
	}
}

?>