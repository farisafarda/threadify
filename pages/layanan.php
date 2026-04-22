<?php
/**
 * layanan (service) Page - TREADIFY
 */
?>
<style>
    /* --- Bagian Header/Judul --- */
        .section-heading-premium {
            position: relative;
            z-index: 1;
            margin-bottom: 2.5rem; /* DIKURANGI dari 4rem agar lebih rapat dengan kartu bawahnya */
        }

        .premium-subtitle {
            display: inline-block;
            margin-top: 1.5rem; /* TAMBAHKAN INI: Untuk mendorongnya ke bawah */
            padding: 6px 18px;
            background: rgba(245, 158, 11, 0.1);
            color: var(--secondary-color);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
            border-radius: 50px;
            margin-bottom: 0.5rem; 
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .premium-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 800;
            color: #1F2937; /* FIX: Pakai warna solid gelap agar judul pasti muncul */
            margin-bottom: 1rem; /* DIKURANGI jarak ke deskripsi */
            position: relative;
            padding-bottom: 15px; /* DIKURANGI jarak ke garis bawah */
        }

        .premium-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
        }

        .premium-desc {
            color: var(--text-light);
            max-width: 650px;
            margin: 0 auto;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* --- Bagian Kartu Layanan --- */
        .service-card-modern {
            background: #ffffff;
            border-radius: 24px; /* Sudut lebih membulat */
            padding: 40px 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04); /* Shadow lebih halus */
            border: 1px solid rgba(16, 185, 129, 0.05);
            height: 100%;
            position: relative;
            z-index: 1;
            overflow: hidden;
            /* Efek transisi bouncy (memantul halus) */
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        }

        .service-card-modern:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.12);
            border-color: rgba(16, 185, 129, 0.2);
        }

        /* Efek cahaya di pojok kanan atas */
        .service-card-modern::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            z-index: -1;
            transition: all 0.6s ease;
            opacity: 0;
        }

        .service-card-modern:hover::before {
            transform: scale(2);
            opacity: 1;
        }

        /* --- Gaya Ikon --- */
        .service-icon-wrapper {
            width: 75px;
            height: 75px;
            background: rgba(16, 185, 129, 0.1); /* Background pastel */
            color: var(--primary-color);
            border-radius: 50%; /* Bulat sempurna */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            font-size: 30px;
            transition: all 0.4s ease;
        }

        .service-card-modern:hover .service-icon-wrapper {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #ffffff;
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        /* --- Teks Kartu --- */
        .service-card-modern h4 {
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-dark);
            font-size: 1.35rem;
            transition: color 0.3s ease;
        }

        .service-card-modern:hover h4 {
            color: var(--primary-color);
        }

        .service-card-modern p {
            color: var(--text-light);
            line-height: 1.7;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        /* --- Tombol Link --- */
        .service-link {
            display: inline-flex;
            align-items: center;
            color: var(--text-dark);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .service-link i {
            margin-left: 8px;
            color: var(--primary-color);
            transition: transform 0.3s ease;
        }

        .service-card-modern:hover .service-link {
            color: var(--primary-color);
        }

        .service-card-modern:hover .service-link i {
            transform: translateX(8px);
            color: var(--secondary-color);
        }
    </style>
   <section id="layanan-premium">
        <div class="container">
            <div class="section-heading-premium text-center">
                <span class="premium-subtitle">Solusi Fashion All-in-One</span>
                <h2 class="premium-title">Layanan Premium THREADIFY</h2>
                <p class="premium-desc">
                    Bukan sekadar menjahit, kami menghidupkan ide Anda. Dari sketsa hingga menjadi pakaian kebanggaan dengan standar <i>quality control</i> ala butik profesional.
                </p>
            </div>
            
            <div class="row g-4">
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-modern">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-cut"></i>
                        </div>
                        <h4>Custom Fashion & Brand</h4>
                        <p>
                            Ingin merilis <i>clothing line</i> sendiri atau tampil beda? Kami tangani semuanya dari pemilihan kain premium, pembuatan pola presisi, hingga jahitan detail yang siap bersaing.
                        </p>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card-modern">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h4>Corporate & Team Uniform</h4>
                        <p>
                            Tingkatkan wibawa dan kekompakan tim Anda dengan seragam eksklusif. Sangat cocok untuk kemeja kantor, PDH/PDL, atau jaket komunitas. Bebas kustomisasi 100%.
                        </p>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card-modern">
                        <div class="service-icon-wrapper">
                            <i class="fas fa-fill-drip"></i>
                        </div>
                        <h4>High-Tech Sablon & Bordir</h4>
                        <p>
                            Sentuhan akhir yang bikin desainmu hidup! Kami menggunakan sablon plastisol anti-retak, DTF presisi, dan mesin bordir komputer yang memberikan kesan mewah dan awet.
                        </p>
                    
                    </div>
                </div>

            </div>
        </div>
    </section>