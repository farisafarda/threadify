<?php
/**
 * Header Component - TREADIFY
 * Header yang konsisten untuk semua halaman
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - TREADIFY' : 'TREADIFY - Custom Clothing'; ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo (isset($base_url) ? $base_url : '') . 'assets/css/style.css'; ?>">
    
    <style>
        :root {
            --primary-color: #1a5f3f;
            --secondary-color: #d4a574;
            --accent-color: #22854a;
            --light-bg: #f8f7f4;
            --dark-text: #2c2c2c;
            --gray-text: #666666;
            --border-color: #e0ddd8;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark-text);
            background-color: #ffffff;
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* ----- STYLING LOGO UTAMA (BERLAKU UNTUK DESKTOP & MOBILE) ----- */
        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.5px;
            transition: var(--transition);
            display: flex; /* Memastikan logo sejajar vertikal */
            align-items: center;
        }

        .logo:hover {
            color: var(--secondary-color);
        }

        /* Ini akan mengatur ukuran logo di semua layar */
        .logo img {
            max-height: 100px; /* Coba naikkan sedikit jadi 50px untuk desktop */
            width: auto;
            object-fit: contain;
            display: block;
            border-radius: 8px;
        }

        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            color: var(--dark-text);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
            position: relative;
        }

        nav a:hover,
        nav a.active {
            color: var(--primary-color);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--secondary-color);
            transition: width 0.3s ease;
        }

        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }

        .btn-pesan {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: #ffffff;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn-pesan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(64, 173, 122, 0.3);
            /* Menjaga teks tetap putih saat di-hover */
            color: #ffffff !important; 
        }

        /* --- TAMBAHKAN INI UNTUK MEMPERCERAH TEKS SAAT AKTIF --- */
        nav a.btn-pesan.active {
            color: #ffffff !important; /* Memaksa teks jadi putih bersih */
            background: linear-gradient(135deg, #22854a, #2eb365); /* Membuat gradien sedikit lebih terang dari tombol biasa */
            box-shadow: inset 0 0 10px rgba(0,0,0,0.1); /* Memberi sedikit efek 'ditekan' agar terlihat aktif */
        }

        /* Mobile Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 6px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background-color: var(--dark-text);
            border-radius: 2px;
            transition: var(--transition);
        }

        /* ----- ATURAN KHUSUS UNTUK LAYAR HP (MOBILE) ----- */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            nav {
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                flex-direction: column;
                background-color: #ffffff;
                padding: 2rem;
                gap: 1rem;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                display: none;
            }

            nav.active {
                display: flex;
            }

            .header-container {
                padding: 1rem;
            }

            /* Jika logo dirasa masih kebesaran khusus di HP, atur di sini */
            .logo img {
                max-height: 80px; /* Ukuran logo saat dibuka di HP */
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <!-- Logo - Link ke Beranda -->
            <a href="index.php?page=beranda" class="logo">
                <img src="img/imglogo.jpeg" alt="Logo TREADIFY">
            </a>            
            
            <!-- Navigation Menu -->
            <nav id="nav-menu">
                <a href="index.php?page=beranda" 
                   class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'beranda' || !isset($_GET['page'])) ? 'active' : ''; ?>">
                    Beranda
                </a>
                <a href="index.php?page=tentang" 
                   class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'tentang') ? 'active' : ''; ?>">
                    Tentang
                </a>
                <a href="index.php?page=layanan" 
                   class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'layanan') ? 'active' : ''; ?>">
                    Layanan
                </a>
                <a href="index.php?page=pesan" 
                   class="btn-pesan <?php echo (isset($_GET['page']) && $_GET['page'] == 'pesan') ? 'active' : ''; ?>">
                    Pesan Sekarang
                </a>
            </nav>
            
            <!-- Hamburger Menu (Mobile) -->
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <script>
        // Mobile Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');

        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });

        // Close menu when link is clicked
        document.querySelectorAll('#nav-menu a').forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
            });
        });
    </script>
