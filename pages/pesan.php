<?php
/**
 * Pesan (Order) Page - TREADIFY
 * Form pemesanan lengkap dengan dynamic pricing
 */

// Ambil data harga kain dari database
$result = $koneksi->query("SELECT * FROM harga_kain ORDER BY jenis_kain ASC");
$harga_kain = [];
while ($row = $result->fetch_assoc()) {
    $harga_kain[$row['jenis_kain']] = $row['harga_dasar'];
}
?>

<style>
    .order-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        color: #ffffff;
        padding: 4rem 2rem;
    }

    /* Membuat layout 2 kolom berdampingan */
    .order-hero-content {
        max-width: 700px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
    }

    .hero-text {
        flex: 1;
        text-align: left; /* Teks rata kiri di desktop */
    }

    .order-hero h1 {
        font-size: 2.5rem;
        font-family: 'Montserrat', sans-serif;
        padding: 0.2rem 0.5rem;
    }

    .order-hero p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .hero-image {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    /* Mengatur ukuran gambar agar tidak terlalu raksasa */
    .hero-image img {
        max-width: 100%;
        max-height: 250px; /* Batasi tinggi gambar */
        object-fit: contain;
        border-radius: 12px;
    }

    .order-container {
        max-width: 1000px;
        margin: 3rem auto;
        padding: 0 2rem;
    }

    .form-wrapper {
        background: #ffffff;
        padding: 3rem;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-color);
    }

    .form-section {
        margin-bottom: 2.5rem;
    }

    .form-section h3 {
        color: var(--primary-color);
        font-size: 1.3rem;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--secondary-color);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        color: var(--dark-text);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-group label .required {
        color: var(--danger-color);
        margin-left: 0.3rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        padding: 0.8rem;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        font-family: 'Inter', sans-serif;
        font-size: 0.95rem;
        transition: var(--transition);
        background-color: #ffffff;
        color: var(--dark-text);
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(26, 95, 63, 0.1);
        background-color: rgba(26, 95, 63, 0.02);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    .price-summary {
        background: linear-gradient(135deg, var(--light-bg), rgba(212, 165, 116, 0.1));
        padding: 1.5rem;
        border-radius: 8px;
        border-left: 4px solid var(--secondary-color);
        margin-bottom: 2rem;
    }

    .price-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.8rem;
        font-size: 0.95rem;
    }

    .price-item label {
        color: var(--gray-text);
        font-weight: 500;
    }

    .price-item .value {
        color: var(--primary-color);
        font-weight: 600;
    }

    .price-total {
        display: flex;
        justify-content: space-between;
        padding-top: 1rem;
        border-top: 2px solid var(--border-color);
        font-size: 1.2rem;
        font-weight: 700;
    }

    .price-total .label {
        color: var(--primary-color);
    }

    .price-total .value {
        color: var(--secondary-color);
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        color: #ffffff;
        padding: 1rem 2rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition);
        flex: 1;
        min-width: 200px;
    }

    .btn-pesan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(26, 95, 63, 0.3);
            color: #ffffff; /* Memastikan teks tetap putih saat di-hover */
        }

        /* --- TAMBAHKAN KODE INI --- */
        nav a.btn-pesan.active {
            color: #ffffff !important; /* Memaksa teks tetap putih saat tombol sedang aktif diklik */
        }

    .btn-reset {
        background-color: #e0ddd8;
        color: var(--dark-text);
        padding: 1rem 2rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition);
        min-width: 200px;
    }

    .btn-reset:hover {
        background-color: #d0cdc2;
    }

    .form-note {
        background-color: rgba(212, 165, 116, 0.15);
        border-left: 3px solid var(--secondary-color);
        padding: 1rem;
        border-radius: 4px;
        margin-bottom: 2rem;
        color: var(--gray-text);
        font-size: 0.9rem;
    }

    .fabric-info {
        background-color: var(--light-bg);
        padding: 1rem;
        border-radius: 6px;
        margin-top: 0.5rem;
        font-size: 0.85rem;
        color: var(--gray-text);
    }

    .measurements-info {
        background-color: rgba(16, 185, 129, 0.1);
        border-left: 3px solid var(--success-color);
        padding: 1rem;
        border-radius: 4px;
        margin-top: 1rem;
        color: var(--gray-text);
        font-size: 0.9rem;
    }

    .measurements-info strong {
        color: var(--primary-color);
    }

    .input-help {
        font-size: 0.8rem;
        color: var(--gray-text);
        margin-top: 0.3rem;
    }

    @media (max-width: 768px) {
        .order-hero h1 {
            font-size: 1.8rem;
        }

        .form-wrapper {
            padding: 1.5rem;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-submit,
        .btn-reset {
            min-width: 100%;
        }
    }
</style>

<!-- Order Hero -->
<section class="order-hero">
    <div class="order-hero-content">
        <div class="hero-text">
            <h1>Form Pemesanan</h1>
            <p>Isi form dibawah untuk memulai pemesanan custom clothing Anda</p>
        </div>
        
        <div class="hero-image">
            <img src="img/pesan.png" alt="TREADIFY Custom Clothing">
        </div>
    </div>
</section>

<!-- Order Form -->
<section class="order-container">
    <div class="form-wrapper">
        <div class="form-note">
            ℹ️ Semua field dengan tanda (<span style="color: var(--danger-color);">*</span>) wajib diisi. Estimasi harga akan berubah otomatis sesuai jenis kain yang Anda pilih.
        </div>

        <form id="orderForm" method="POST" action="process_order.php">
            <!-- Data Pribadi Section -->
            <div class="form-section">
                <h3>Data Pribadi</h3>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="nama">Nama Lengkap <span class="required">*</span></label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="alamat">Alamat <span class="required">*</span></label>
                        <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap Anda" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nomor_hp">Nomor HP <span class="required">*</span></label>
                        <input type="tel" id="nomor_hp" name="nomor_hp" placeholder="08xx-xxxx-xxxx" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email (Opsional)</label>
                        <input type="email" id="email" name="email" placeholder="nama@email.com">
                    </div>
                </div>
            </div>

            <!-- Jenis Kain Section -->
            <div class="form-section">
                <h3>Pilihan Kain</h3>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="jenis_kain">Jenis Kain <span class="required">*</span></label>
                        <select id="jenis_kain" name="jenis_kain" required>
                            <option value="">-- Pilih Jenis Kain --</option>
                            <?php foreach ($harga_kain as $kain => $harga) { ?>
                                <option value="<?php echo $kain; ?>" data-harga="<?php echo $harga; ?>">
                                    <?php echo $kain; ?> - Rp <?php echo formatRupiah($harga); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="fabricInfo" class="fabric-info" style="display: none;"></div>
                    </div>
                </div>
            </div>

            <!-- Ukuran Section -->
           <div class="form-section">
                <h3>Detail Ukuran (dalam cm)</h3>
                
                <div class="form-grid" style="margin-bottom: 1rem;">
                    <div class="form-group full-width">
                        <label for="jenis_pakaian">Pesan Untuk <span class="required">*</span></label>
                        <select id="jenis_pakaian" name="jenis_pakaian" required>
                            <option value="">-- Pilih Jenis Pakaian --</option>
                            <option value="baju">Hanya Baju / Atasan</option>
                            <option value="celana">Hanya Celana / Bawahan</option>
                            <option value="setelan">Setelan (Baju & Celana)</option>
                        </select>
                    </div>
                </div>

                <div class="measurements-info">
                    <strong>Cara Mengukur:</strong> Gunakan pita pengukur yang fleksibel. Ukur dalam keadaan pakaian normal Anda (tidak terlalu ketat atau longgar).
                </div>
                
                <div id="grup_baju" style="display: none; margin-top: 1.5rem;">
                    <h4 style="margin-bottom: 1rem; color: var(--accent-color);">📏 Ukuran Atasan</h4>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="lingkar_dada">Lingkar Dada</label>
                            <input type="number" id="lingkar_dada" name="lingkar_dada" min="50" max="150" placeholder="cm">
                        </div>
                        <div class="form-group">
                            <label for="lingkar_bahu">Lingkar Bahu</label>
                            <input type="number" id="lingkar_bahu" name="lingkar_bahu" min="30" max="100" placeholder="cm">
                        </div>
                        <div class="form-group">
                            <label for="panjang_lengan">Panjang Lengan</label>
                            <input type="number" id="panjang_lengan" name="panjang_lengan" min="40" max="90" placeholder="cm">
                        </div>
                        <div class="form-group">
                            <label for="panjang_baju">Panjang Baju</label>
                            <input type="number" id="panjang_baju" name="panjang_baju" min="50" max="100" placeholder="cm">
                        </div>
                    </div>
                </div>

                <div id="grup_celana" style="display: none; margin-top: 1.5rem;">
                    <h4 style="margin-bottom: 1rem; color: var(--accent-color);">👖 Ukuran Bawahan</h4>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="lingkar_pinggang">Lingkar Pinggang</label>
                            <input type="number" id="lingkar_pinggang" name="lingkar_pinggang" min="50" max="150" placeholder="cm">
                        </div>
                        <div class="form-group">
                            <label for="lingkar_paha">Lingkar Paha</label>
                            <input type="number" id="lingkar_paha" name="lingkar_paha" min="40" max="120" placeholder="cm">
                        </div>
                        <div class="form-group">
                            <label for="panjang_celana">Panjang Celana</label>
                            <input type="number" id="panjang_celana" name="panjang_celana" min="70" max="110" placeholder="cm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Catatan Section -->
            <div class="form-section">
                <h3>Catatan Tambahan</h3>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="catatan">Catatan & Permintaan Khusus</label>
                        <textarea id="catatan" name="catatan" placeholder="Masukkan catatan tambahan, warna pilihan, desain khusus, atau permintaan lainnya..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Price Summary -->
            <div class="price-summary">
                <div class="price-item">
                    <label>Harga Dasar Kain:</label>
                    <div class="value" id="priceBase">Rp 0</div>
                </div>
                <div class="price-item">
                    <label>Biaya Jahit & Finishing:</label>
                    <div class="value" id="priceSewing">Rp 50.000</div>
                </div>
                <div class="price-item">
                    <label>Admin Fee:</label>
                    <div class="value" id="priceAdmin">Rp 5.000</div>
                </div>
                <div class="price-total">
                    <span class="label">Estimasi Total Harga:</span>
                    <span class="value" id="priceTotal">Rp 50.000</span>
                </div>
            </div>

            <!-- Hidden field untuk harga -->
            <input type="hidden" id="harga_estimasi" name="harga_estimasi" value="0">

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-submit">Kirim Pemesanan</button>
                <button type="reset" class="btn-reset" onclick="resetForm()">Reset Form</button>
            </div>
        </form>
    </div>
</section>

<script>
    // Harga dasar, biaya jahit, dan BIAYA ADMIN
    const BIAYA_JAHIT = 50000;
    const BIAYA_ADMIN = 5000; // <--- TAMBAHAN BIAYA ADMIN
    const hargaKainData = <?php echo json_encode($harga_kain); ?>;

    // Get form elements
    const jeniKainSelect = document.getElementById('jenis_kain');
    const hargaEstimasiInput = document.getElementById('harga_estimasi');

    // Update price when fabric is selected
    jeniKainSelect.addEventListener('change', function() {
        updatePrice();
        updateFabricInfo();
    });

    function updatePrice() {
        const selectedFabric = jeniKainSelect.value;
        let hargaBase = 0;

        if (selectedFabric && hargaKainData[selectedFabric]) {
            hargaBase = parseFloat(hargaKainData[selectedFabric]);
        }

        // TAMBAHKAN BIAYA_ADMIN DI RUMUS INI
        const hargaTotal = hargaBase + BIAYA_JAHIT + BIAYA_ADMIN;

        // Update display
        document.getElementById('priceBase').textContent = formatRupiah(hargaBase);
        document.getElementById('priceSewing').textContent = formatRupiah(BIAYA_JAHIT);
        document.getElementById('priceAdmin').textContent = formatRupiah(BIAYA_ADMIN); // Tampilkan biaya admin
        document.getElementById('priceTotal').textContent = formatRupiah(hargaTotal);

        // Update hidden field
        hargaEstimasiInput.value = hargaTotal;
    }
    // Get form elements untuk Jenis Pakaian
    const jenisPakaianSelect = document.getElementById('jenis_pakaian');
    const grupBaju = document.getElementById('grup_baju');
    const grupCelana = document.getElementById('grup_celana');

    // Event Listener untuk memunculkan input ukuran yang sesuai
    jenisPakaianSelect.addEventListener('change', function() {
        const pilihan = this.value;
        
        // Sembunyikan semuanya dulu
        grupBaju.style.display = 'none';
        grupCelana.style.display = 'none';

        // Tampilkan sesuai pilihan
        if (pilihan === 'baju') {
            grupBaju.style.display = 'block';
        } else if (pilihan === 'celana') {
            grupCelana.style.display = 'block';
        } else if (pilihan === 'setelan') {
            grupBaju.style.display = 'block';
            grupCelana.style.display = 'block';
        }
    });

    // ... (Fungsi updateFabricInfo() dan formatRupiah() biarkan sama seperti aslinya) ...
    // Di bawah ini hanya saya sertakan lagi agar rapi jika ingin di-copy semua

    function updateFabricInfo() {
        const selectedFabric = jeniKainSelect.value;
        const fabricInfo = document.getElementById('fabricInfo');

        if (selectedFabric) {
            let description = '';
            switch(selectedFabric) {
                case 'Katun':
                    description = 'Kain katun berkualitas premium, nyaman dan breathable. Cocok untuk pakaian casual dan formal.';
                    break;
                case 'Linen':
                    description = 'Kain linen alami, elegan dan tahan lama. Sangat cocok untuk pakaian musim panas.';
                    break;
                case 'Sutra':
                    description = 'Kain sutra murni, mewah dan berkilau. Ideal untuk pakaian formal dan acara istimewa.';
                    break;
                case 'Drill':
                    description = 'Kain drill tebal dan kuat. Sangat cocok untuk celana dan pakaian outdoor.';
                    break;
                case 'Denim':
                    description = 'Denim berkualitas tinggi, trendy dan durable. Sempurna untuk gaya casual dan urban.';
                    break;
            }
            fabricInfo.textContent = '📋 ' + description;
            fabricInfo.style.display = 'block';
        } else {
            fabricInfo.style.display = 'none';
        }
    }

    function formatRupiah(nominal) {
        // Menggunakan Math.floor untuk membulatkan koma
        return 'Rp ' + Math.floor(nominal).toLocaleString('id-ID');
    }

    function resetForm() {
        document.getElementById('orderForm').reset();
        document.getElementById('priceBase').textContent = 'Rp 0';
        document.getElementById('priceTotal').textContent = 'Rp 50.000'; // Sesuaikan jika total reset-mu 55rb atau 50rb
        document.getElementById('harga_estimasi').value = '0';
        document.getElementById('fabricInfo').style.display = 'none';
        
        // TAMBAHKAN DUA BARIS INI:
        document.getElementById('grup_baju').style.display = 'none';
        document.getElementById('grup_celana').style.display = 'none';
    }
    
    // Form validation
    document.getElementById('orderForm').addEventListener('submit', function(e) {
        const jeniKain = document.getElementById('jenis_kain').value;
        if (!jeniKain) {
            e.preventDefault();
            alert('Silakan pilih jenis kain terlebih dahulu!');
            jeniKainSelect.focus();
            return false;
        }

        // Check if at least one measurement is filled
        const measurements = [
            document.getElementById('lingkar_dada').value,
            document.getElementById('lingkar_pinggang').value,
            document.getElementById('lingkar_bahu').value,
            document.getElementById('panjang_lengan').value,
            document.getElementById('lingkar_paha').value,
            document.getElementById('panjang_celana').value,
            document.getElementById('panjang_baju').value
        ];

        if (measurements.every(m => !m)) {
            e.preventDefault();
            alert('Silakan isi minimal satu ukuran!');
            return false;
        }
    });

    // Initialize price on page load
    window.addEventListener('load', function() {
        updatePrice();
    });
</script>
