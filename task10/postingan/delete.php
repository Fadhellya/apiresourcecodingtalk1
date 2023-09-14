<?php
include '../common/koneksi.php';

if (isset($_POST["id_postingan"])) {
    $id_postingan = $_POST["id_postingan"];

    // Buat query penghapusan
    $query = "DELETE FROM postingantask10 WHERE id_postingan = '$id_postingan'";
    
    // Eksekusi query penghapusan
    $execute = mysqli_query($koneksi, $query);

    // Periksa apakah penghapusan berhasil
    if ($execute && mysqli_affected_rows($koneksi) > 0) {
        $response['success'] = true;
        $response['message'] = "berhasil menghapus postingan";
    } else {
        $response['success'] = false;
        $response['message'] = "gagal menghapus postingan";
    }
} else {
    $response['success'] = false;
    $response['message'] = "gagal menghapus postingan";
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);
?>
