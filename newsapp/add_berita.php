<?php

include 'koneksi.php';
 
$picture = $_POST["imageStr"];
$judulBerita = $_POST['judul'];
$isiBerita = $_POST['isi_berita'];
$jenisBerita = $_POST['jenis_berita'];

$nama_file = time() . ".jpg";
$folder_path = "gambar_berita/" . $nama_file;
 
$data = str_replace('data:image/png;base64,', '', $picture);
$data = str_replace(' ', '+', $data);
$data = base64_decode($data);
file_put_contents($folder_path, $data);
 
$sql = "INSERT INTO berita (gambar_berita, judul, isi_berita, tgl_berita,jenis_berita) VALUES ('$nama_file', '$judulBerita', '$isiBerita', NOW(),'$jenisBerita')";

if(mysqli_query($koneksi, $sql)) {
	$response['value'] = 1;
	$response['message'] = "Berhasil Insert Data";
	echo json_encode($response);
} else {
	$response['value'] = 0;
	$response['message'] = "Gagal Insert Data";
	echo json_encode($response);
}
 return;
?>

<!-- <?php
// include 'koneksi.php';

// if($_SERVER['REQUEST_METHOD'] == "POST") {
// 	$response = array();
// 	$judulBerita = $_POST['judul'];
// 	$isiBerita = $_POST['isi'];
// 	$tglBerita = $_POST['tgl'];
// 	$filename = $_FILES['gambar']['name'];
// 	$filetmpname = $_FILES['gambar']['tmp_name'];

// 	$folder = 'gambar_berita/';
// 	move_uploaded_file($filetmpname, $folder . $filename);

// 	$insert = "INSERT INTO tb_berita VALUE(NULL, '$judulBerita', '$isiBerita', '$tglBerita', '$filename')";

// 	if(mysqli_query($koneksi, $insert)) {
// 		$response['value'] = 1;
// 		$response['message'] = "Berhasil Insert Data";
// 		echo json_encode($response);
// 	} else {
// 		$response['value'] = 0;
// 		$response['message'] = "Gagal Insert Data";
// 		echo json_encode($response);
// 	}
// }
?> -->