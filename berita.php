<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        table, th, tr, td {
            border: 1px solid black;
        }
        table {
            margin-top: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            color: #000; /* Set font color to black */
        }
        thead {
            background-color: #f3f4f6;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .text-gradient {
            background: linear-gradient(90deg, #f3ec78, #af4261);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .h2-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .button-custom {
            background-color: #ef4444;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .button-custom:hover {
            background-color: #dc2626;
        }
        .header-container {
            background-color: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header-container h2,
        .header-container h3 {
            color: #000; /* Set font color to black */
        }
    </style>
</head>
<body class="bg-gray-100 p-6">

<div class="header-container mb-6">
    <?php
    include_once "menu.php";
    include_once "check_login.php";

    $user = $_SESSION['user_login'];
    ?>
</div>

<div class="header-container mb-6">
    <?php
    include_once "check_login.php";
    include_once "koneksi.php";
    include_once "menu.php";
    ?>
    <div class="flex justify-between items-center mb-4">
        <div class="h2-container">
            <h2 class="text-2xl font-semibold text-gray-800  text-shadow">Hallo, <?php echo $user['nama']; ?></h2>    
            <h2 class="text-lg text-gray-600  text-shadow">Email : <?php echo $user['email']; ?></h2>
        </div>
        <a href="tambah_berita.php" class="button-custom">Tambah Berita</a>
    </div>
    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th class="border border-gray-300">ID</th>
                <th class="border border-gray-300">Judul</th>
                <th class="border border-gray-300">Gambar</th>
                <th class="border border-gray-300">Isi</th>
                <th class="border border-gray-300">Tanggal Pembuatan</th>
                <th class="border border-gray-300">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $user = $_SESSION['user_login'];
        $id_user  = $user['id'];
        $berita = $koneksi->query("SELECT * from post where id_user = $id_user");
        $data = $berita->fetch_all();
        foreach ($data as $v) {
        ?>
            <tr>
                <td class="border border-gray-300"><?= $v[0] ?></td>
                <td class="border border-gray-300"><?= $v[1] ?></td>
                <td class="border border-gray-300">
                    <img src="assets/gambar_berita/<?= $v[2] ?>" class="w-24 h-auto" alt="">
                </td>
                <td class="border border-gray-300"><?= $v[3] ?></td>
                <td class="border border-gray-300"><?= $v[4] ?></td>
                <td class="border border-gray-300">
                    <a href="edit_berita.php?id=<?= $v[0] ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                    |
                    <a href="delete_berita.php?id=<?= $v[0] ?>" class="text-red-500 hover:text-red-700 ml-2">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>

<div class="header-container">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Silahkan tekan tombol ini jika ingin logout</h3>
    <a href="logout.php">
        <button class="button-custom focus:outline-none focus:shadow-outline">Logout</button>
    </a>
</div>

</body>
</html>
