<?php
include_once 'koneksi.php';
$query = "SELECT nama,alamat FROM user";
$execute = mysqli_query($conn,$query);
$arruser =[];

while($rows = mysqli_fetch_array($execute)){
    $arruser[]=$rows;
}
print(json_encode($arruser));
?>