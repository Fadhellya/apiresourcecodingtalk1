<?php

include 'common\koneksi.php';

// Pastikan nama field yang digunakan di Postman sesuai dengan yang digunakan di sini
$title = $_POST['title'];
$artist = $_POST['artist'];
$id_music = $_POST["id_music"];
$music = $_POST['music'];

// Periksa apakah ID produk valid
if (is_numeric($id_music)) {
    $sql = "UPDATE musictask8 SET title = '$title', artist = '$artist', music = '$music' WHERE id_music='$id_music'";

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
    $response['value'] = 0;
    $response['message'] = "ID Produk Tidak Valid";
    echo json_encode($response);
}
?>
