<?php
include 'koneksi.php';
$picture = $_POST["picture"];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$lat = $_POST['lat'];
$longitude = $_POST['longitude'];

$nama_file = time() . ".jpg";
$folder_path = "gambar_res/" . $nama_file;
 
$data = str_replace('data:image/png;base64,', '', $picture);
$data = str_replace(' ', '+', $data);
$data = base64_decode($data);
file_put_contents($folder_path, $data);
 
$sql = "INSERT INTO sekolah (nama,alamat,nohp,gambar,lat,longitude) VALUES ('$nama', '$alamat', '$nohp', '$nama_file','$lat','$longitude')";


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