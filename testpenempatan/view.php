<?php

header("Content-Type: application/json");

include 'koneksi.php';

$sql = "SELECT * FROM sekolah";

// Eksekusi query
$result = mysqli_query($koneksi, $sql);


$sekolah = [];

// Loop melalui hasil query dan tambahkan data pengguna ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
    $sekolah[] = $row;
}

// Tutup koneksi database
mysqli_close($koneksi);

// Kembalikan data pengguna dalam format JSON
echo json_encode($sekolah);
?>
