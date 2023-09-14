<?php

header("Content-Type: application/json");

include 'common\koneksi.php';

$sql = "SELECT * FROM musictask8";

// Eksekusi query
$result = mysqli_query($koneksi, $sql);


$music = [];

// Loop melalui hasil query dan tambahkan data pengguna ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
    $music[] = $row;
}

// Tutup koneksi database
mysqli_close($koneksi);

// Kembalikan data pengguna dalam format JSON
echo json_encode($music);
?>
