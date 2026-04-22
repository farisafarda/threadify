<?php
/**
 * Success Page - TREADIFY
 * Halaman konfirmasi setelah pemesanan berhasil
 */

// Get order ID from URL
$pesanan_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch order data
$order = null;
if ($pesanan_id > 0) {
    $result = $koneksi->query("SELECT * FROM pesanan WHERE id = $pesanan_id");
    if ($result && $result->num_rows > 0) {
        $order = $result->fetch_assoc();
    }
}
?>

<style>
    .success-container {
        max-width: 800px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .success-card {
        background: #ffffff;
        padding: 3rem;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        text-align: center;
        border-top: 4px solid var(--success-color);
    }

    .success-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
    }

    .success-card h1 {
        color: var(--success-color);
        font-size: 2rem;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 0.5rem;
    }

    .success-card p {
        color: var(--gray-text);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .order-details {
        background: var(--light-bg);
        padding: 2rem;
        border-radius: 8px;
        margin: 2rem 0;
        text-align: left;
    }

    .order-details h3 {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        font-size: 1.2rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 0;
        border-bottom: 1px solid var(--border-color);
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: var(--gray-text);
        font-weight: 500;
    }

    .detail-value {
        color: var(--dark-text);
        font-weight: 600;
    }

    .next-steps {
        background: rgba(16, 185, 129, 0.1);
        border-left: 4px solid var(--success-color);
        padding: 1.5rem;
        border-radius: 8px;
        margin: 2rem 0;
        text-align: left;
    }

    .next-steps h4 {
        color: var(--success-color);
        margin-bottom: 1rem;
    }

    .next-steps ol {
        margin-left: 1.5rem;
        color: var(--gray-text);
        line-height: 1.8;
    }

    .next-steps li {
        margin-bottom: 0.5rem;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .btn-primary, .btn-secondary {
        padding: 1rem 2rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        color: #ffffff;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(26, 95, 63, 0.3);
    }

    .btn-secondary {
        background-color: var(--light-bg);
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-secondary:hover {
        background-color: var(--primary-color);
        color: #ffffff;
    }

    @media (max-width: 768px) {
        .success-card {
            padding: 1.5rem;
        }

        .success-card h1 {
            font-size: 1.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-primary, .btn-secondary {
            width: 100%;
        }
    }
</style>

<section class="success-container">
    <?php if ($order): ?>
        <div class="success-card">
            <div class="success-icon">✅</div>
            <h1>Pemesanan Berhasil!</h1>
            <p>Terima kasih telah mempercayai TREADIFY. Pesanan Anda telah berhasil kami terima dan akan segera diproses.</p>

            <div class="order-details">
                <h3>Detail Pesanan</h3>
                <div class="detail-row">
                    <span class="detail-label">No. Pesanan:</span>
                    <span class="detail-value">#<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Nama:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($order['nama']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Jenis Kain:</span>
                    <span class="detail-value"><?php echo htmlspecialchars($order['jenis_kain']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Estimasi Harga:</span>
                    <span class="detail-value" style="color: var(--secondary-color);">Rp <?php echo number_format($order['harga_estimasi'], 0, ',', '.'); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status:</span>
                    <span class="detail-value" style="color: var(--success-color);">Pending</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Tanggal Pemesanan:</span>
                    <span class="detail-value"><?php echo date('d/m/Y H:i', strtotime($order['tanggal_pemesanan'])); ?></span>
                </div>
            </div>

            <div class="next-steps">
                <h4>Langkah Selanjutnya:</h4>
                <ol>
                    <li><strong>Konfirmasi:</strong> Tim kami akan menghubungi Anda dalam 24 jam untuk konfirmasi detail pesanan.</li>
                    <li><strong>Konsultasi:</strong> Jika perlu, kami akan melakukan konsultasi desain untuk memastikan hasil sesuai harapan.</li>
                    <li><strong>Produksi:</strong> Setelah konfirmasi, kami akan mulai memproduksi pakaian custom Anda.</li>
                    <li><strong>Pengiriman:</strong> Pakaian siap akan kami kirimkan sesuai jadwal yang telah disepakati.</li>
                </ol>
            </div>

            <div class="action-buttons">
                <a href="index.php?page=beranda" class="btn-primary">Kembali ke Beranda</a>
                <a href="index.php?page=pesan" class="btn-secondary">Pesan Lagi</a>
            </div>
        </div>
    <?php else: ?>
        <div class="success-card">
            <div style="font-size: 2rem; margin-bottom: 1rem;">⚠️</div>
            <h1>Pesanan Tidak Ditemukan</h1>
            <p>Maaf, pesanan yang Anda cari tidak dapat ditemukan. Silakan coba lagi atau hubungi tim customer service kami.</p>
            <div class="action-buttons">
                <a href="index.php?page=beranda" class="btn-primary">Kembali ke Beranda</a>
                <a href="index.php?page=pesan" class="btn-secondary">Buat Pesanan Baru</a>
            </div>
        </div>
    <?php endif; ?>
</section>
