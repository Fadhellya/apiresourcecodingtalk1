<?php

date_default_timezone_set('Asia/Jakarta');
include_once 'dbconnect.php';

$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$isi_berita = mysqli_real_escape_string($conn, $_POST['isi_berita']);
$gambar_berita = mysqli_real_escape_string($conn, $_POST['gambar_berita']);
$tgl_berita = date('Y-m-d H:i:s'); // Ubah NOW() menjadi date('Y-m-d H:i:s')

$query = "INSERT INTO berita (judul, isi_berita, gambar_berita, tgl_berita) VALUES ('$judul', '$isi_berita', '$gambar_berita', '$tgl_berita')";
$execute = mysqli_query($conn, $query);

if ($execute) {
    echo "Data berita berhasil ditambahkan";
} else {
    echo "Gagal menambahkan data berita";
}
?>