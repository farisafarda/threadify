<?php
/**
 * Process Order - TREADIFY
 * Handle form submission dan simpan ke database
 */
include '../includes/koneksi.php';

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: pesan.php');
    exit;
}

// Collect dan sanitasi input
$nama = sanitize($_POST['nama'] ?? '', $koneksi);
$alamat = sanitize($_POST['alamat'] ?? '', $koneksi);
$nomor_hp = sanitize($_POST['nomor_hp'] ?? '', $koneksi);
$jenis_kain = sanitize($_POST['jenis_kain'] ?? '', $koneksi);
$lingkar_dada = intval($_POST['lingkar_dada'] ?? 0);
$lingkar_pinggang = intval($_POST['lingkar_pinggang'] ?? 0);
$lingkar_bahu = intval($_POST['lingkar_bahu'] ?? 0);
$panjang_lengan = intval($_POST['panjang_lengan'] ?? 0);
$lingkar_paha = intval($_POST['lingkar_paha'] ?? 0);
$panjang_celana = intval($_POST['panjang_celana'] ?? 0);
$panjang_baju = intval($_POST['panjang_baju'] ?? 0);
$harga_estimasi = floatval($_POST['harga_estimasi'] ?? 0);
$catatan = sanitize($_POST['catatan'] ?? '', $koneksi);

// Validasi data
$errors = [];

if (empty($nama)) {
    $errors[] = 'Nama harus diisi';
}

if (empty($alamat)) {
    $errors[] = 'Alamat harus diisi';
}

if (empty($nomor_hp)) {
    $errors[] = 'Nomor HP harus diisi';
}

if (empty($jenis_kain)) {
    $errors[] = 'Jenis kain harus dipilih';
}

if ($lingkar_dada <= 0 || $lingkar_pinggang <= 0 || $lingkar_bahu <= 0 || 
    $panjang_lengan <= 0 || $lingkar_paha <= 0 || $panjang_celana <= 0 || $panjang_baju <= 0) {
    $errors[] = 'Semua ukuran harus diisi dengan nilai yang valid';
}

// Jika ada error, redirect kembali dengan pesan
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
    header('Location: pesan.php');
    exit;
}

// Prepare statement untuk insert data
$query = "INSERT INTO pesanan (
    nama, alamat, nomor_hp, jenis_kain,
    lingkar_dada, lingkar_pinggang, lingkar_bahu, panjang_lengan,
    lingkar_paha, panjang_celana, panjang_baju,
    harga_estimasi, catatan, status
) VALUES (
    ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?,
    ?, ?, ?
)";

$stmt = $koneksi->prepare($query);

if (!$stmt) {
    die("Prepare failed: " . $koneksi->error);
}

$status = 'pending';

$stmt->bind_param(
    'sssiiiiiiidss',
    $nama, $alamat, $nomor_hp, $jenis_kain,
    $lingkar_dada, $lingkar_pinggang, $lingkar_bahu, $panjang_lengan,
    $lingkar_paha, $panjang_celana, $panjang_baju,
    $harga_estimasi, $catatan, $status
);

if ($stmt->execute()) {
    $pesanan_id = $stmt->insert_id;
    $stmt->close();
    
    // Redirect ke halaman success
    header('Location: success.php?id=' . $pesanan_id);
    exit;
} else {
    // Tangani error
    $error_msg = "Database error: " . $stmt->error;
    $stmt->close();
}

$koneksi->close();
?>
