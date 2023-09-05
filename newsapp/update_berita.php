<?php

include 'koneksi.php';

$picture = $_POST["imageStr"];
$judulBerita = $_POST['judul'];
$isiBerita = $_POST['isi'];
$idBerita = $_POST["idBerita"];

$nama_file = time() . ".jpg";
$folder_path = "gambar_berita/" . $nama_file;

$data = str_replace('data:image/png;base64,', '', $picture);
$data = str_replace(' ', '+', $data);
$data = base64_decode($data);

// Add error handling for file write
if (file_put_contents($folder_path, $data)) {
    $sql = "UPDATE berita SET gambar_berita = '$nama_file', judul = '$judulBerita', isi_berita = '$isiBerita' WHERE id=$idBerita";

    if (mysqli_query($koneksi, $sql)) {
        $response['value'] = 1;
        $response['message'] = "Berhasil Update Data";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal Update Data";
        echo json_encode($response);
    }
} else {
    // Handle file write error
    $response['value'] = 0;
    $response['message'] = "Gagal menyimpan gambar";
    echo json_encode($response);
}
