

<?php
include_once 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = $koneksi
    ->query("SELECT * FROM user where email = '$email' && password = '$password'")
    ->fetch_assoc();

session_start();
$_SESSION['user_login'] = $user;
$_SESSION['id'] = $user;
header("Location: beranda_berita.php");

?>
