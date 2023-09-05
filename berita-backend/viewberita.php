<?php
include_once 'dbconnect.php';
$query = "SELECT id, judul, isi_berita, gambar_berita, tgl_berita FROM berita";
$execute = mysqli_query($conn, $query);
$arrberita = [];
while($rows = mysqli_fetch_array($execute)){
    $arrberita[]=$rows;
}
print(json_encode($arrberita));
?>