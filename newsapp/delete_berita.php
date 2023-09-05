<?php
include_once 'koneksi.php';
if(isset($_POST["id"])){
    $id =$_POST["id"]; 
}else{
    return;
}
$query = "DELETE FROM berita WHERE id = '$id'";
$execute = mysqli_query($conn,$query);
$arrberita = [];
if($execute){
    $arrberita["success"]="true";
}else{
    $arrberita["gagal"]="false";
}
print(json_encode($arrberita));
?>