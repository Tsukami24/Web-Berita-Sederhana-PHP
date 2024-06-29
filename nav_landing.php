<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0 !important;
        }

        nav {
            background-color: #C63232;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1em 70px;
        }

        nav h1 {
            margin: 0;
            font-size: 20px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav li {
            margin: 0 1em;
        }

        nav a {
            color: #fff;
            text-decoration: none;
        }

        .grid {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="grid">
        <nav>
            <h1>News</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php" class="bg-red-500 text-white px-4 py-2 rounded mr-2 hover:bg-red-600">Masuk</a></li>
                <li><a href="register.php" class="bg-red-500 text-white px-4 py-2 rounded mr-2 hover:bg-red-600">Daftar</a></li>
                
            </ul>
        </nav>
        <br>
    </div>
</body>
</html>
