<?php
include '../common/koneksi.php';
$picture = $_POST["picture"];
$title = $_POST['title'];
$content = $_POST['content'];

$nama_file = time() . ".jpg";
$folder_path = "gambar_res/" . $nama_file;
 
$data = str_replace('data:image/png;base64,', '', $picture);
$data = str_replace(' ', '+', $data);
$data = base64_decode($data);
file_put_contents($folder_path, $data);
 
$sql = "INSERT INTO postingantask10 (title, content, picture) VALUES ('$title', '$content', '$nama_file')";

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