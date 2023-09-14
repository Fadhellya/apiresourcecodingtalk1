<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$lat = $_POST['lat'];
$longitude = $_POST['longitude'];
$id = $_POST["id"];

// Periksa apakah ID produk valid
if (is_numeric($id)) {
    $sql = "UPDATE sekolah SET nama = '$nama', alamat = '$alamat', nohp = '$nohp', lat = '$lat', longitude = '$longitude'";
    
    // Cek apakah ada gambar yang diunggah
    if (!empty($_FILES['picture']['name'])) {
        $nama_file = time() . ".jpg";
        $folder_path = "gambar_res/" . $nama_file;

        $data = file_get_contents($_FILES['picture']['tmp_name']);
        file_put_contents($folder_path, $data);

        $sql .= ", gambar = '$nama_file'";
    }

    $sql .= " WHERE id='$id'";

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
