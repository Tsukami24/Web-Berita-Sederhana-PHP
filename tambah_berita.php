<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

<div class="container mx-auto bg-white p-8 rounded shadow">
    <?php
    include_once 'menu.php';
    include_once "check_login.php";
        $user = $_SESSION['user_login'];

    ?>

    <form action="handler_berita.php" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Judul</label>
            <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="isi" class="block text-gray-700 font-bold mb-2">Isi</label>
            <textarea name="isi" id="isi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <label for="tgl_pembuatan" class="block text-gray-700 font-bold mb-2">Tanggal Pembuatan</label>
            <input type="date" name="tgl_pembuatan" id="tgl_pembuatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <input type="hidden" name="author" value="<?php echo $user['nama'] ?>">
        <div>
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Data</button>
        </div>
    </form>
</div>

</body>
</html>
