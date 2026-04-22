<?php
/**
 * Database Connection File - TREADIFY
 * Koneksi ke MySQL menggunakan mysqli
 */

// Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'treadify');

// Membuat koneksi
$koneksi = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Set charset
$koneksi->set_charset("utf8mb4");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Untuk development, uncomment baris dibawah untuk melihat error
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Helper function untuk sanitasi input
function sanitize($data, $koneksi) {
    return $koneksi->real_escape_string(htmlspecialchars(trim($data)));
}

// Helper function untuk format currency
function formatRupiah($nominal) {
    return 'Rp ' . number_format($nominal, 0, ',', '.');
}
?>
