<?php
include '../common/koneksi.php';

if (isset($_POST["id_product"])) {
    $id_product = $_POST["id_product"];

    // Buat query penghapusan
    $query = "DELETE FROM product WHERE id_product = '$id_product'";
    
    // Eksekusi query penghapusan
    $execute = mysqli_query($koneksi, $query);

    // Periksa apakah penghapusan berhasil
    if ($execute && mysqli_affected_rows($koneksi) > 0) {
        $response['success'] = true;
        $response['message'] = "berhasil menghapus product";
    } else {
        $response['success'] = false;
        $response['message'] = "gagal menghapus product";
    }
} else {
    $response['success'] = false;
    $response['message'] = "gagal menghapus product";
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);
?>
