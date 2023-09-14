<?php
include 'common\koneksi.php';

if (isset($_POST["id_music"])) {
    $id_music = $_POST["id_music"];

    // Buat query penghapusan
    $query = "DELETE FROM musictask8 WHERE id_music = '$id_music'";
    
    // Eksekusi query penghapusan
    $execute = mysqli_query($koneksi, $query);

    // Periksa apakah penghapusan berhasil
    if ($execute && mysqli_affected_rows($koneksi) > 0) {
        $response['success'] = true;
        $response['message'] = "berhasil menghapus music";
    } else {
        $response['success'] = false;
        $response['message'] = "gagal menghapus music";
    }
} else {
    $response['success'] = false;
    $response['message'] = "gagal menghapus music";
}

// Mengembalikan respons dalam format JSON
echo json_encode($response);
?>
