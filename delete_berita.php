<?php
include_once 'koneksi.php';
include_once "check_login.php";
$user = $_SESSION['user_login'];
$id_user = $user['id'];
$id = $_GET['id'];

$sql_check_permission = "SELECT * FROM post WHERE id_user ='$id_user'";
$result = $koneksi->query($sql_check_permission);

if ($result->num_rows == 0) {
    echo "Anda tidak memiliki izin untuk menghapus berita ini.";
    exit;
}

$sql_delete_post = "DELETE FROM post WHERE id = $id AND id_user = '$id_user'";
if ($koneksi->query($sql_delete_post)) {
    echo "Berita berhasil dihapus.";
} else {
    echo "Gagal menghapus berita: " . $koneksi->error;
}

header("Location: berita.php");
exit;
?>
