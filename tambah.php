<?php
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Pastikan nama kolom di (nama, harga, stok) sama persis dengan di database
    $sql = "INSERT INTO produk (nama, harga, stok) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nama, $harga, $stok])) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            padding: 50px;
        }

        .card {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            background: #6c5ce7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #aaa;
            text-decoration: none;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h3>Input Barang</h3>
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama Barang" required>
            <input type="number" name="harga" placeholder="Harga (Rp)" required>
            <input type="number" name="stok" placeholder="Jumlah Stok" required>
            <button type="submit">Simpan ke Gudang</button>
            <a href="index.php" class="back">Batal</a>
        </form>
    </div>
</body>

</html>