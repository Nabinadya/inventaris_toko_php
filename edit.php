<?php
require 'connection.php';

// 1. Tangkap ID dari URL (metode GET) [cite: 46, 47]
$id = $_GET['id'];

// 2. Ambil data lama berdasarkan ID agar muncul di form [cite: 46, 47]
$stmt = $pdo->prepare("SELECT * FROM produk WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Jika data tidak ditemukan, kembali ke index
if (!$data) {
    header("Location: index.php");
    exit;
}

// 3. Logika Update jika tombol simpan ditekan (metode POST) [cite: 46, 47]
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE produk SET nama = ?, harga = ?, stok = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nama, $harga, $stok, $id])) {
        header("Location: index.php"); // Kembali ke halaman utama jika sukses 
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            padding: 50px;
            color: #444;
        }

        .card {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        h3 {
            color: #6c5ce7;
            margin-top: 0;
        }

        label {
            font-size: 13px;
            color: #999;
            font-weight: bold;
            text-transform: uppercase;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            outline: none;
        }

        input:focus {
            border-color: #6c5ce7;
        }

        button {
            background: #6c5ce7;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        button:hover {
            background: #5b4cc4;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #aaa;
            text-decoration: none;
            font-size: 13px;
        }

        .back:hover {
            color: #6c5ce7;
        }
    </style>
</head>

<body>

    <div class="card">
        <h3>Edit Data Barang</h3>
        <form method="POST">
            <label>Nama Barang</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>

            <label>Harga (Rp)</label>
            <input type="number" name="harga" value="<?= htmlspecialchars($data['harga']); ?>" required>

            <label>Stok Tersisa</label>
            <input type="number" name="stok" value="<?= htmlspecialchars($data['stok']); ?>" required>

            <button type="submit">Update Perubahan</button>
            <a href="index.php" class="back">← Kembali ke Daftar</a>
        </form>
    </div>

</body>

</html>