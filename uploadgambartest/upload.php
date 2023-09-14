<?php
include_once 'koneksi.php';

$image = $_FILES['image']['name'];
$imagePath = "uploads/".$image;

move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);

$connect = new mysqli("localhost", "root", "", "picture");

if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}

$sql = "INSERT INTO picture (picture) VALUES ('$image')";

if ($connect->query($sql) === TRUE) {
    echo('Data berhasil');
} else {
    echo('Data gagal: ' . $connect->error);
}

$connect->close();
?>
