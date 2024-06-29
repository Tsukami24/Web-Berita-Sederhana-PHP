<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .post {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .post p {
            color: #4b5563;
            margin-bottom: 20px;
        }

        .post img {
            border-radius: 12px;
            margin-bottom: 20px;
            max-height: 600px;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-gray-100">
    <?php
    include_once "check_login.php";
    include_once "koneksi.php";
    include_once "menu.php";

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $sqlSelect = "SELECT * FROM post WHERE id=$id";
    $result = mysqli_query($koneksi, $sqlSelect);
    while ($data = mysqli_fetch_array($result)) {
    ?>
        <div class="max-w-4xl mx-auto bg-white p-8 mt-8 post">
            <h1 class="text-xl font-semibold text-gray-800">By: <?php echo htmlspecialchars($data['author']); ?></h1>
            <h1 class="text-4xl font-bold text-gray-900 mb-4"><?php echo htmlspecialchars($data['title']); ?></h1>
            <p class="text-gray-500 mb-4"><?php echo date("F j, Y", strtotime($data['date'])); ?></p>
            <img src="assets/gambar_berita/<?php echo htmlspecialchars($data['image']); ?>" alt="<?php echo htmlspecialchars($data['title']); ?>" class="mb-4">
            <div class="text-gray-700 text-lg leading-relaxed">
                <p><?php echo nl2br(htmlspecialchars($data['description'])); ?></p>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="max-w-4xl mx-auto mt-6 text-center">
        <a href="beranda_berita.php" class="inline-block bg-red-500 text-white px-6 py-3 rounded-full shadow-lg hover:bg-red-600 transition duration-300">Kembali ke Beranda</a>
    </div>
</body>

</html>
