<?php
/**
 * Beranda (Home) Page - TREADIFY
 */
?>

<style>
    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        color: #ffffff;
        padding: 6rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 500px;
        height: 500px;
        background: rgba(212, 165, 116, 0.1);
        border-radius: 50%;
    }

    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        /* Tambahan Flexbox untuk membagi 2 kolom */
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 3rem; 
    }

    /* Kolom Teks di Kiri */
    .hero-text {
        flex: 1;
        max-width: 600px;
    }

    .hero-text h1 {
        font-size: 3.5rem;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 1rem;
        font-weight: 700;
        letter-spacing: -1px;
        line-height: 1.2;
    }

    .hero-text p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.95;
        line-height: 1.8;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    /* Kolom Gambar di Kanan */
    .hero-image {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-image img {
        max-width: 100%;
        height: auto;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        /* Sedikit efek rotasi agar lebih dinamis */
        transform: rotate(3deg);
        transition: transform 0.4s ease;
        border: 4px solid rgba(255, 255, 255, 0.1);
    }

    .hero-image img:hover {
        transform: rotate(0deg) scale(1.02);
    }

    .btn-primary, .btn-secondary {
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: var(--transition);
        border: 2px solid transparent;
        cursor: pointer;
        display: inline-block;
    }

    .btn-primary {
        background-color: var(--secondary-color);
        color: var(--dark-text);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(212, 165, 116, 0.4);
    }

    .btn-secondary {
        background-color: transparent;
        color: #ffffff;
        border-color: #ffffff;
    }

    .btn-secondary:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-3px);
    }

    /* Penyesuaian untuk layar HP (Mobile Responsive) */
    @media (max-width: 768px) {
        .hero {
            padding: 4rem 1rem;
        }

        .hero-content {
            flex-direction: column;
            text-align: center;
            gap: 2rem;
        }

        .hero-text h1 {
            font-size: 2.2rem;
        }

        .hero-text p {
            font-size: 1rem;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-image {
            margin-top: 1rem;
        }

        .hero-image img {
            transform: rotate(0deg);
            max-width: 90%;
        }
    }

    /* Features Section */
    .features {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-family: 'Montserrat', sans-serif;
        color: var(--primary-color);
        margin-bottom: 3rem;
        font-weight: 700;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }

    .feature-card {
        background: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: var(--transition);
        border: 1px solid var(--border-color);
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(26, 95, 63, 0.15);
        border-color: var(--primary-color);
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .feature-card h3 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }

    .feature-card p {
        color: var(--gray-text);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Testimonial Section */
    .testimonials {
        background-color: var(--light-bg);
        padding: 4rem 2rem;
        margin-top: 4rem;
    }

    .testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .testimonial-card {
        background: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border-left: 4px solid var(--secondary-color);
    }

    .testimonial-text {
        color: var(--gray-text);
        margin-bottom: 1rem;
        font-style: italic;
        font-size: 0.95rem;
    }

    .testimonial-author {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* CTA Section */
    .cta {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        color: #ffffff;
        padding: 3rem 2rem;
        text-align: center;
        margin-top: 4rem;
    }

    .cta-content {
        max-width: 600px;
        margin: 0 auto;
    }

    .cta h2 {
        font-size: 2rem;
        margin-bottom: 1rem;
        font-family: 'Montserrat', sans-serif;
    }

    .cta p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        opacity: 0.95;
    }
</style>

<section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Desain Pakaian Impian Anda</h1>
            <p>TREADIFY menghadirkan layanan custom clothing premium dengan kualitas terbaik dan desain eksklusif sesuai kebutuhan Anda.</p>
            <div class="hero-buttons">
                <a href="index.php?page=pesan" class="btn-primary">Mulai Pesan</a>
                <a href="index.php?page=tentang" class="btn-secondary">Pelajari Lebih Lanjut</a>
            </div>
        </div>
        
        <div class="hero-image">
            <img src="img/mesinjahit.png" alt="TREADIFY Custom Clothing">
        </div>
    </div>
</section>

<section class="features">
    <h2 class="section-title">Mengapa Memilih TREADIFY?</h2>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">✨</div>
            <h3>Desain Custom</h3>
            <p>Desain pakaian sesuai keinginan dan preferensi gaya Anda dengan detail yang sempurna.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">👔</div>
            <h3>Kain Berkualitas</h3>
            <p>Menggunakan kain-kain premium pilihan dari supplier terpercaya untuk kenyamanan maksimal.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Pengerjaan Cepat</h3>
            <p>Proses produksi yang efisien tanpa mengorbankan kualitas hasil akhir.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">💰</div>
            <h3>Harga Kompetitif</h3>
            <p>Harga terjangkau dengan kualitas premium yang sepadan dengan budget Anda.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🎯</div>
            <h3>Ukuran Presisi</h3>
            <p>Pengukuran detail yang akurat untuk memastikan pakaian pas dan nyaman digunakan.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🤝</div>
            <h3>Layanan Konsultasi</h3>
            <p>Tim profesional kami siap membantu memberikan saran terbaik untuk pakaian Anda.</p>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="testimonials-container">
        <h2 class="section-title">Kepuasan Pelanggan</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-text">"TREADIFY memberikan layanan terbaik! Pakaian yang saya pesan sangat pas dan kualitasnya luar biasa."</div>
                <div class="testimonial-author">- Budi Santoso</div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-text">"Desain custom yang sempurna sesuai keinginan saya. Sangat puas dengan hasil dan pelayanannya!"</div>
                <div class="testimonial-author">- Siti Nurhaliza</div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-text">"Harga kompetitif dengan kualitas premium. Rekomendasi banget untuk teman-teman saya."</div>
                <div class="testimonial-author">- Ahmad Wijaya</div>
            </div>
        </div>
    </div>
</section>

<section class="cta">
    <div class="cta-content">
        <h2>Siap Membuat Pakaian Impian Anda?</h2>
        <p>Jangan lewatkan kesempatan untuk memiliki pakaian custom dengan kualitas premium. Pesan sekarang dan dapatkan konsultasi gratis dari tim ahli kami!</p>
        <a href="index.php?page=pesan" class="btn-primary">Pesan Sekarang</a>
    </div>
</section>