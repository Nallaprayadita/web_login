<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #fef3f7;
            text-align: center;
            padding-top: 100px;
        }
        .card {
            background: white;
            display: inline-block;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px pink;
        }
        .logout {
            margin-top: 20px;
            display: inline-block;
            background: #d63384;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Selamat Datang, <?= htmlspecialchars($_SESSION["username"]) ?>!</h1>
        <p>Ini adalah halaman dashboard sederhana.</p>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
