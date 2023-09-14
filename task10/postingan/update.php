<?php

include '../common/koneksi.php';

// Pastikan nama field yang digunakan di Postman sesuai dengan yang digunakan di sini
$title = $_POST['title'];
$content = $_POST['content'];
$id_postingan = $_POST["id_postingan"];

// Periksa apakah ID produk valid
if (is_numeric($id_postingan)) {
    $sql = "UPDATE postingantask10 SET title = '$title', content = '$content' WHERE id_postingan='$id_postingan'";

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
