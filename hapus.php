<?php
require 'connection.php'; // Mengambil koneksi database 

// Mengambil ID barang yang akan dihapus dari URL 
$id = $_GET['id'];

// Menyiapkan perintah hapus 
$sql = "DELETE FROM produk WHERE id = ?";
$stmt = $pdo->prepare($sql);

// Menjalankan perintah hapus 
if ($stmt->execute([$id])) {
    // Jika berhasil, otomatis kembali ke halaman utama 
    header("Location: index.php");
    exit;
}
?>