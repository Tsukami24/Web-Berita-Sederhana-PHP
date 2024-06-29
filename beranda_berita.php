<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php
    include_once "check_login.php";
    include_once "koneksi.php";
    include_once "menu.php";

    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    ?>

    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-6">

            <h1 class="text-4xl font-bold text-gray-800">Berita Terbaru</h1>

            <form method="GET" class="flex">
                <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="px-6 py-2 rounded-l-lg border border-gray-300 focus:outline-none" placeholder="Search...">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-r-lg hover:bg-red-600">Search</button>
            </form>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $user = $_SESSION['user_login'];
            $id_user = $user['id'];
            $sql = "SELECT * FROM post WHERE title LIKE ? ORDER BY date DESC";
            $stmt = $koneksi->prepare($sql);
            $search_param = '%' . $search . '%';
            $stmt->bind_param("s", $search_param);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($data as $v) {
            ?>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($v['title']) ?></h2>
                    <img src="assets/gambar_berita/<?= htmlspecialchars($v['image']) ?>" class="w-full h-48 object-cover rounded mb-4" alt="Gambar Berita">
                    <p class="text-gray-600 text-sm mb-4">author: <?= htmlspecialchars($v['author']) ?></p>
                    <p class="text-gray-700 leading-relaxed mb-4"><?= nl2br(htmlspecialchars($v['description'])) ?></p>
                    <p class="text-gray-600 text-sm mb-4">Tanggal Pembuatan: <?= htmlspecialchars($v['date']) ?></p>
                    <div class="flex justify-end">
                    <a href="detail_berita.php?id=<?= htmlspecialchars($v['id']) ?>" class="bg-red-500 text-white px-4 py-2 rounded mr-2 hover:bg-red-600">Read More</a>
                    
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>

