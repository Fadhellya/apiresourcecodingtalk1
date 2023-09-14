<?php

include '../common/koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$response = array();
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$cek = "SELECT * FROM usertask10 WHERE username = '$username' AND password = '$password'";
	$result = mysqli_fetch_array(mysqli_query($koneksi, $cek));

	if(isset($result)){
		$response['value'] = 1;
		$response['message'] = "Login Berhasil";
		$response['username'] = $result['username'];
		$response['email'] = $result['email'];
		$response['id'] = $result['id'];
		echo json_encode($response);

	} else {
		$response['value'] = 0;
		$response['message'] = "Gagal Login";
		echo json_encode($response);
	}
}
?>