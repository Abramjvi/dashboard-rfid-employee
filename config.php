<?php
// config.php
$host = 'localhost';
$dbname = 'employee_locating_system';
$username = 'root'; // Ganti dengan username database Anda
$password = 'Digital1ze'; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>