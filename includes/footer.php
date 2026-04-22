    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>TREADIFY</h3>
                <p>Penyedia layanan custom clothing premium dengan desain eksklusif sesuai kebutuhan Anda.</p>
            </div>
            <div class="footer-section">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="<?php echo (isset($base_url) ? $base_url : 'index.php'); ?>">Beranda</a></li>
                    <li><a href="<?php echo (isset($base_url) ? $base_url : 'index.php') . 'pages/tentang.php'; ?>">Tentang</a></li>
                    <li><a href="<?php echo (isset($base_url) ? $base_url : 'index.php') . 'pages/layanan.php'; ?>">Layanan</a></li>
                    <li><a href="<?php echo (isset($base_url) ? $base_url : 'index.php') . 'pages/pesan.php'; ?>">Pesan</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Kontak</h4>
                <p>Email: treadifyofficial@gmail.com</p>
                <p>Telepon: +62 812-3456-7890</p>
                <p>Alamat: Kudus, Jawa Tengah, Indonesia</p>
            </div>
            <div class="footer-section">
                <h4>Media Sosial</h4>
                <div class="social-links">
                    <a href="https://facebook.com" target="_blank">Facebook</a>
                    <a href="https://instagram.com" target="_blank">Instagram</a>
                    <a href="https://twitter.com" target="_blank">Twitter</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 TREADIFY. All rights reserved. | Custom Clothing Premium</p>
        </div>
    </footer>

    <style>
        footer {
            background: linear-gradient(135deg, var(--primary-color), #0d3d25);
            color: #ffffff;
            padding: 3rem 2rem 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.5rem;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .footer-section h4 {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .footer-section p {
            font-size: 0.9rem;
            line-height: 1.8;
            opacity: 0.9;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.8rem;
        }

        .footer-section a {
            color: #ffffff;
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .footer-section a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            font-size: 0.85rem;
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            footer {
                padding: 2rem 1rem 1rem;
            }
        }
    </style>
</body>
</html>
