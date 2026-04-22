<?php
/**
 * Tentang (About) Page - TREADIFY
 */
?>

<style>
    .about-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        color: #ffffff;
        padding: 4rem 2rem;
        text-align: center;
    }

    .about-hero h1 {
        font-size: 2.5rem;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 1rem;
    }

    .about-hero p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .about-content {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .about-section {
        margin-bottom: 3rem;
    }

    .about-section h2 {
        color: var(--primary-color);
        font-size: 2rem;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .about-section p {
        color: var(--gray-text);
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .value-card {
        background: var(--light-bg);
        padding: 2rem;
        border-radius: 12px;
        border-left: 4px solid var(--secondary-color);
    }

    .value-card h3 {
        color: var(--primary-color);
        margin-bottom: 0.8rem;
    }

    .value-card p {
        font-size: 0.95rem;
    }

    .team-section {
        background-color: var(--light-bg);
        padding: 3rem 2rem;
        margin-top: 4rem;
    }

    .team-grid {
        max-width: 1200px;
        margin: 0 auto;
    }

    .team-grid h2 {
        text-align: center;
        color: var(--primary-color);
        font-size: 2rem;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 2rem;
    }

    .team-members {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    .team-member {
        background: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: var(--transition);
    }

    .team-member:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(26, 95, 63, 0.15);
    }

    .team-member-avatar {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        border-radius: 50%;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 2rem;
        font-weight: 700;
    }

    .team-member h3 {
        color: var(--primary-color);
        margin-bottom: 0.3rem;
    }

    .team-member .role {
        color: var(--secondary-color);
        font-size: 0.9rem;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .about-hero h1 {
            font-size: 1.8rem;
        }

        .about-section h2 {
            font-size: 1.5rem;
        }
    }
</style>

<!-- About Hero -->
<section class="about-hero">
    <h1>Tentang TREADIFY</h1>
    <p>Inovasi dalam custom clothing dengan kualitas premium dan desain eksklusif</p>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="about-section">
        <h2>Visi Kami</h2>
        <p>Menjadi brand pilihan utama untuk custom clothing premium di Indonesia dengan menawarkan kualitas terbaik, desain inovatif, dan pelayanan yang luar biasa kepada setiap pelanggan.</p>
    </div>

    <div class="about-section">
        <h2>Misi Kami</h2>
        <p>Kami berkomitmen untuk:</p>
        <ul style="margin-left: 2rem; color: var(--gray-text);">
            <li style="margin-bottom: 0.8rem;">Menyediakan layanan custom clothing dengan kualitas material terbaik</li>
            <li style="margin-bottom: 0.8rem;">Memberikan desain yang sesuai dengan kepribadian dan gaya unik setiap pelanggan</li>
            <li style="margin-bottom: 0.8rem;">Mengutamakan kepuasan dan kenyamanan pelanggan dalam setiap aspek layanan</li>
            <li style="margin-bottom: 0.8rem;">Terus berinovasi dan mengikuti tren fashion terkini</li>
            <li style="margin-bottom: 0.8rem;">Memberikan harga yang kompetitif tanpa mengorbankan kualitas</li>
        </ul>
    </div>

    <div class="about-section">
        <h2>Nilai-Nilai Kami</h2>
        <div class="values-grid">
            <div class="value-card">
                <h3>Kualitas</h3>
                <p>Kami tidak pernah berkompromi dalam hal kualitas material dan pengerjaan.</p>
            </div>
            <div class="value-card">
                <h3>Inovasi</h3>
                <p>Selalu mencari cara baru untuk meningkatkan produk dan layanan kami.</p>
            </div>
            <div class="value-card">
                <h3>Integritas</h3>
                <p>Transparansi dan kejujuran dalam setiap transaksi dengan pelanggan.</p>
            </div>
            <div class="value-card">
                <h3>Kepuasan Pelanggan</h3>
                <p>Kepuasan Anda adalah prioritas utama kami dalam berbisnis.</p>
            </div>
        </div>
    </div>

    <div class="about-section">
        <h2>Perjalanan Kami</h2>
        <p>TREADIFY dimulai dengan visi sederhana namun kuat untuk memberikan akses kepada semua orang untuk memiliki pakaian berkualitas tinggi yang dirancang khusus sesuai dengan kebutuhan dan preferensi mereka. Sejak awal, kami fokus pada:</p>
        <ul style="margin-left: 2rem; color: var(--gray-text);">
            <li style="margin-bottom: 0.8rem;">Pemilihan material berkualitas premium dari supplier terpercaya</li>
            <li style="margin-bottom: 0.8rem;">Pengalaman pelanggan yang luar biasa di setiap tahap proses</li>
            <li style="margin-bottom: 0.8rem;">Craftsmanship yang cermat dan detail dalam setiap produk</li>
            <li style="margin-bottom: 0.8rem;">Harga yang adil dan kompetitif untuk semua kalangan</li>
        </ul>
    </div>
</section>


