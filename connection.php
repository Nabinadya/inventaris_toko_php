<?php
$host = 'localhost';
$dbname = 'toko_ekonomis'; // Pastikan nama database sesuai yang kamu buat [cite: 113]
$username = 'root';
$password = '';

try {
    // Perhatikan penulisan $dbname di bawah ini harus sesuai dengan variabel di atas [cite: 117]
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Hapus bagian agar tidak error [cite: 118]
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Hapus bagian di sini juga [cite: 119]
    die("Gagal Terhubung: " . $e->getMessage());
}
?>