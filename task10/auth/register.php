<?php

include '../common/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $response = array();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $cek = "SELECT * FROM usertask10 WHERE username = '$username' AND email = '$email'";
    $result = mysqli_fetch_array(mysqli_query($koneksi, $cek));

    if (isset($result)) {
        $response['value'] = 2;
        $response['message'] = "Username atau email telah digunakan";
        echo json_encode($response);
    } else {

        $insert = "INSERT into usertask10 (email, password, username) VALUES ('$email', '$password', '$username')";
        if (mysqli_query($koneksi, $insert)) {
            $response['value'] = 1;
            $response['message'] = "Berhasil didaftarkan";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Gagal didaftarkan";
            echo json_encode($response);
        }
    }
}
?>
