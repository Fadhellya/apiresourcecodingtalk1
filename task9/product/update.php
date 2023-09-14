<?php

include '../common/koneksi.php';

// Pastikan nama field yang digunakan di Postman sesuai dengan yang digunakan di sini
$name = $_POST['name'];
$description = $_POST['description'];
$id_product = $_POST["id_product"];
$price = $_POST['price'];

// Periksa apakah ID produk valid
if (is_numeric($id_product)) {
    $sql = "UPDATE product SET name = '$name', description = '$description', price = '$price' WHERE id_product='$id_product'";

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
