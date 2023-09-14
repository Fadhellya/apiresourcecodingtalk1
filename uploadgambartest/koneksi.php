<?php

$connect = new mysqli("localhost", "root", "", "picture");

if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}

?>