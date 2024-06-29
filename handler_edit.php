<?php
if (isset($_POST["update"])) {
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
$id = $_GET['id'];
$author = $_POST['author'];

$sql = "UPDATE post SET title= '$judul', image = '$rename', description = '$isi', date='$tgl_pembuatan', id_user= $id_user, author='$author'
where id = $id";

$insert  = $koneksi->query($sql);

if ($insert) {
    echo "Input berita berhasil";
}else {
    echo "Input berita Gagal";
}

header("Location: berita.php");
}
?>


