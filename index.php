<?php
require 'connection.php';
$stmt = $pdo->query("SELECT * FROM produk ORDER BY id DESC");
$produk = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventaris Toko</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f9f9f9; color: #444; padding: 40px; background-image: url('https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJueW94bmZ3bmZ3bmZ3bmZ3bmZ3bmZ3bmZ3bmZ3bmZ3bmZ3JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/3o7TKSjPqcKGRZaT9S/giphy.gif');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;}
        .container { max-width: 800px; margin: auto; background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h2 { color: #6c5ce7; font-weight: 600; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { text-align: left; padding: 12px; border-bottom: 2px solid #eee; color: #999; text-transform: uppercase; font-size: 12px; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        .btn-tambah { background: #6c5ce7; color: white; text-decoration: none; padding: 8px 18px; border-radius: 8px; font-size: 14px; }
        .stok-low { color: #eb4d4b; font-weight: bold; background: #ffeaa7; padding: 2px 6px; border-radius: 4px; }
        .aksi a { text-decoration: none; font-size: 13px; color: #636e72; margin-right: 10px; }
        .aksi a:hover { color: #6c5ce7; }
    </style>
</head>
<body
    <div class="container">
        <h2>📦 Stok Barang</h2>
        <a href="tambah.php" class="btn-tambah">+ Tambah Barang</a>
        <br><br>
        <table>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Opsi</th>
            </tr>
            <?php foreach($produk as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td>
                    <span class="<?= $row['stok'] < 5 ? 'stok-low' : ''; ?>">
                        <?= $row['stok']; ?>
                    </span>
                </td>
               <td class="aksi">
    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"
                    style="color: red; text-decoration: none;">Hapus</a>
            </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>