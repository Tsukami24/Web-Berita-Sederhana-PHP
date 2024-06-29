
<?php
include_once 'koneksi.php';
include_once "check_login.php";
$user = $_SESSION['user_login'];

$judul = $_POST['judul'];

$gambar = $_FILES['gambar'];
$rename = md5(date("Y-m-d H:i:s"));

$image = move_uploaded_file($gambar['tmp_name'], 'assets/gambar_berita/'.$rename);

$isi = $_POST['isi'];
$tgl_pembuatan = $_POST['tgl_pembuatan'];
$id_user = $user['id'];
$author = $_POST['author'];


$sql = "INSERT INTO post (title, image, description, date,author,id_user) 
values ('$judul', '$rename','$isi','$tgl_pembuatan','$author',$id_user)";

$insert  = $koneksi->query($sql);

if ($insert) {
    echo "Input berita berhasil";
}else {
    echo "Input berita Gagal";
}
header("Location: berita.php");

?>
