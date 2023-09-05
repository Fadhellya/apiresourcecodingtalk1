<?php
include_once 'dbconnect.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$isi_berita = mysqli_real_escape_string($conn, $_POST['isi_berita']);
$gambar_berita = mysqli_real_escape_string($conn, $_POST['gambar_berita']);
$tgl_berita = mysqli_real_escape_string($conn, $_POST['tgl_berita']);

$query = "UPDATE berita SET judul='$judul', isi_berita='$isi_berita', gambar_berita='$gambar_berita', tgl_berita='$tgl_berita' WHERE id='$id'";
$execute = mysqli_query($conn, $query);

if ($execute) {
    echo "Data user berhasil diperbarui";
} else {
    echo "Gagal memperbarui data user";
}
?>
