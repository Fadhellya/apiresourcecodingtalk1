<?php

$koneksi = mysqli_connect("localhost", "root", "", "beritadb");

if($koneksi) {

	// echo "Berhasil konek ke database";
	
} else {
	echo "Gagal koneksi";
}

?>