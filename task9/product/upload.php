<!-- <?php

include '../common/koneksi.php';

// // Cek apakah ada file yang diunggah
// if (isset($_FILES['picture'])) {
//     $picture = $_FILES['picture'];

//     // Cek apakah pengunggahan gambar sukses
//     if ($picture['error'] === UPLOAD_ERR_OK) {
//         $tmp_name = $picture['tmp_name'];

//         // Tentukan direktori penyimpanan
//         $folder_path = "../product/gambar_res/";
//         $nama_file = time() . "_" . $picture['name'];

//         // Pindahkan gambar ke direktori penyimpanan
//         if (move_uploaded_file($tmp_name, $folder_path . $nama_file)) {

//             // Data gambar sudah diunggah dengan sukses, lanjutkan dengan penyimpanan informasi produk ke database
//             $name = $_POST['name'];
//             $description = $_POST['description'];
//             $price = $_POST['price'];
//             $price_int = intval($price);

//             $sql = "INSERT INTO product (name, description, price, picture) VALUES ('$name', '$description', '$price_int', '$nama_file')";

//             if (mysqli_query($koneksi, $sql)) {
//                 $response['value'] = 1;
//                 $response['message'] = "Berhasil Menambahkan Product";
//                 echo json_encode($response);
//             } else {
//                 $response['value'] = 0;
//                 $response['message'] = "Gagal Menambahkan Product";
//                 echo json_encode($response);
//             }
//         } else {
//             $response['value'] = 0;
//             $response['message'] = "Gagal Mengunggah Gambar";
//             echo json_encode($response);
//         }
//     } else {
//         $response['value'] = 0;
//         $response['message'] = "Gagal Mengunggah Gambar";
//         echo json_encode($response);
//     }
// } else {
//     $response['value'] = 0;
//     $response['message'] = "Gambar Tidak Ditemukan";
//     echo json_encode($response);
// }

// return;

$picture = $_POST["picture"];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$price_int = intval($price);

$nama_file = time() . ".jpg";
$folder_path = "gambar_res/" . $nama_file;
 
$data = str_replace('data:image/png;base64,', '', $picture);
$data = str_replace(' ', '+', $data);
$data = base64_decode($data);
file_put_contents($folder_path, $data);
 
$sql = "INSERT INTO product (name, description, price, picture) VALUES ('$name', '$description', '$price_int', '$nama_file')";

if(mysqli_query($koneksi, $sql)) {
	$response['value'] = 1;
	$response['message'] = "Berhasil Insert Data";
	echo json_encode($response);
} else {
	$response['value'] = 0;
	$response['message'] = "Gagal Insert Data";
	echo json_encode($response);
}
 return;
?> -->
