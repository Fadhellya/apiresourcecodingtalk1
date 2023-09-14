<?php

$koneksi = mysqli_connect("localhost", "root", "", "dbtaskflutter");

if($koneksi) {	
} else {
	echo "Gagal koneksi";
}

?>