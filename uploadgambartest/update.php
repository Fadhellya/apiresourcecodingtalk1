<?php
include_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image']['name'];
    $imagePath = "uploads/" . $image;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        $connect = new mysqli("localhost", "root", "", "picture");

        if ($connect->connect_error) {
            die("Koneksi ke database gagal: " . $connect->connect_error);
        }

        $imageIdToUpdate = $_POST['id'];

        $sql = "UPDATE picture SET picture = '$image' WHERE id = $imageIdToUpdate";

        if ($connect->query($sql) === TRUE) {
            echo('Data berhasil diperbarui');
        } else {
            echo('Data gagal diperbarui: ' . $connect->error);
        }

        $connect->close();
    } else {
        echo "Gagal mengunggah gambar.";
    }
}
?>
