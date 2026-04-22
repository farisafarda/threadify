<?php
/**
 * Central Router - TREADIFY
 * Menggunakan index.php sebagai routing utama dengan $_GET['page']
 * Format URL: index.php?page=beranda, index.php?page=layanan, dll
 */

// Koneksi & Helper
require_once 'includes/koneksi.php';

// Dapatkan parameter page dari URL, default ke 'beranda'
$page = isset($_GET['page']) ? strtolower(trim($_GET['page'])) : 'beranda';

// Whitelist halaman yang diizinkan untuk security
$allowed_pages = array(
    'beranda',
    'tentang',
    'layanan',
    'pesan',
    'success'
);

// Validasi page parameter
if (!in_array($page, $allowed_pages)) {
    $page = 'beranda';
}

// Set page title berdasarkan halaman yang diakses
$page_titles = array(
    'beranda' => 'Beranda',
    'tentang' => 'Tentang',
    'layanan' => 'Layanan',
    'pesan' => 'Pesan',
    'success' => 'Pemesanan Berhasil'
);

$page_title = isset($page_titles[$page]) ? $page_titles[$page] : 'TREADIFY';

// Include header
require_once 'includes/header.php';

// Tentukan path file halaman
$page_file = 'pages/' . $page . '.php';

// Cek apakah file page exists, jika tidak tampilkan halaman default
if (file_exists($page_file)) {
    // Hapus include koneksi.php dari dalam file page karena sudah di-include di sini
    include $page_file;
} else {
    // Fallback ke beranda jika file tidak ditemukan
    include 'pages/beranda.php';
}

// Include footer
require_once 'includes/footer.php';
?>
