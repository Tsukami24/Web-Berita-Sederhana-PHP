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
    include_once "koneksi.php";

    $user = $_SESSION['user_login'];
    $id = $_GET['id'];


    $stmt = $koneksi->prepare("SELECT * FROM post WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    ?>

        <form action="handler_edit.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Judul</label>
            <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($data['title']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="isi" class="block text-gray-700 font-bold mb-2">Isi</label>
            <textarea name="isi" id="isi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= htmlspecialchars($data['description']) ?></textarea>
        </div>
        <div class="mb-4">
            <label for="tgl_pembuatan" class="block text-gray-700 font-bold mb-2">Tanggal Pembuatan</label>
            <input type="date" name="tgl_pembuatan" id="tgl_pembuatan" value="<?= htmlspecialchars($data['date']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <input type="hidden" name="author" value="<?php echo $user['nama'] ?>">
            <div>
            <button type="submit"name="update" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </div>
    </form>
</div>

</body>
</html>
