<?php
include 'koneksi.php';

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    // Buat query penghapusan
    $query = "DELETE FROM sekolah WHERE id = '$id'";
    
    // Eksekusi query penghapusan
    $execute = mysqli_query($koneksi, $query);

    // Periksa apakah penghapusan berhasil
    if ($execute && mysqli_affected_rows($koneksi) > 0) {
        $response['success'] = true;
        $response['message'] = "berhasil menghapus sekolah";
    } else {
        $response['success'] = false;
        $response['message'] = "gagal menghapus sekolah";
    }
} else {
    $response['success'] = false;
    $response['message'] = "gagal menghapus sekolah";
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);
?>
