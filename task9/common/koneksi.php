<?php

$koneksi = mysqli_connect("localhost", "root", "", "dbtaskflutter");

if($koneksi) {

	// echo "Berhasil konek ke database";
	
} else {
	echo "Gagal koneksi";
}

?>