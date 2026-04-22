# TREADIFY - Custom Clothing E-Commerce

Website e-commerce custom clothing premium dengan teknologi PHP Native, MySQL, HTML5, CSS3, dan Vanilla JavaScript.

## 📁 Struktur Folder

```
threadify2/
├── index.php                 # File utama (redirect ke beranda)
├── assets/
│   ├── css/
│   │   └── style.css         # File CSS utama
│   └── js/
│       └── main.js           # File JavaScript utama
├── includes/
│   ├── koneksi.php           # File koneksi database
│   ├── header.php            # Komponen header
│   └── footer.php            # Komponen footer
├── pages/
│   ├── beranda.php           # Halaman beranda (home)
│   ├── tentang.php           # Halaman tentang (about)
│   ├── layanan.php           # Halaman layanan (services)
│   ├── pesan.php             # Form pemesanan (order)
│   ├── process_order.php     # Proses pemesanan (backend)
│   └── success.php           # Halaman konfirmasi sukses
└── db/
    └── treadify.sql          # File database SQL
```

## 🎨 Tema & Desain

- **Warna Utama**: Forest Green (#1a5f3f) & Muted Gold (#d4a574)
- **Font**: Inter & Montserrat (Google Fonts)
- **Design**: Modern, Luxury, Professional
- **Responsive**: Mobile-friendly dengan media queries

## 🚀 Instalasi & Setup

### 1. Persiapan Database

1. Buka **phpMyAdmin** di `http://localhost/phpmyadmin`
2. Buat database baru bernama `treadify`
3. Import file SQL:
   - Buka database `treadify` yang baru dibuat
   - Klik tab "Import"
   - Pilih file `db/treadify.sql`
   - Klik tombol "Import"

Atau dengan command line:
```bash
mysql -u root < db/treadify.sql
```

### 2. Konfigurasi Database

File: `includes/koneksi.php`

Pastikan konfigurasi sesuai dengan setup XAMPP Anda:
```php
define('DB_HOST', 'localhost');   // Host database
define('DB_USER', 'root');        // Username database
define('DB_PASS', '');            // Password database (kosong untuk XAMPP default)
define('DB_NAME', 'treadify');    // Nama database
```

### 3. Menjalankan Website

1. Letakkan folder `threadify2` di `C:\xampp\htdocs\`
2. Buka browser dan akses: `http://localhost/threadify2/`
3. Website akan redirect ke halaman beranda (`pages/beranda.php`)

## 📄 Deskripsi File

### Core Files

| File | Fungsi |
|------|--------|
| `index.php` | Entry point utama, redirect ke beranda |
| `includes/koneksi.php` | Koneksi MySQL dengan helper functions |
| `includes/header.php` | Header dengan navigasi (sticky) |
| `includes/footer.php` | Footer dengan informasi perusahaan |

### Pages (Halaman)

| File | Fungsi |
|------|--------|
| `pages/beranda.php` | Halaman utama dengan hero section & features |
| `pages/tentang.php` | Halaman tentang brand, visi, misi, tim |
| `pages/layanan.php` | Halaman layanan dengan daftar jasa custom |
| `pages/pesan.php` | Form pemesanan dengan dynamic pricing |
| `pages/process_order.php` | Backend: validasi & simpan ke database |
| `pages/success.php` | Halaman konfirmasi pesanan berhasil |

### Assets

| File | Fungsi |
|------|--------|
| `assets/css/style.css` | CSS utama (design system) |
| `assets/js/main.js` | JavaScript untuk interaksi & animasi |

### Database

| File | Fungsi |
|------|--------|
| `db/treadify.sql` | SQL schema untuk tabel pesanan & harga_kain |

## 💡 Fitur Utama

### 1. Form Pemesanan Lengkap
- Input data pribadi (nama, alamat, nomor HP)
- Dropdown pemilihan jenis kain dengan harga
- Input 7 ukuran (detail measurements)
- Catatan tambahan untuk permintaan khusus

### 2. Dynamic Pricing System
- Harga berubah otomatis saat memilih jenis kain
- Kalkulasi: Harga Kain + Biaya Jahit (Rp 100.000)
- Real-time update di halaman form

### 3. Validasi Data
- Validasi client-side (JavaScript)
- Validasi server-side (PHP)
- Error feedback yang jelas

### 4. Database Integration
- Menyimpan semua data pesanan ke MySQL
- Tabel `pesanan` dengan 17 kolom
- Tabel `harga_kain` untuk manage harga

### 5. Responsive Design
- Mobile-first approach
- Media queries untuk berbagai ukuran layar
- Touch-friendly elements

## 🔧 Jenis Kain & Harga

Tabel `harga_kain`:

| Jenis Kain | Harga Dasar | Deskripsi |
|-----------|------------|-----------|
| Katun | Rp 150.000 | Nyaman, breathable |
| Linen | Rp 200.000 | Elegan, tahan lama |
| Sutra | Rp 350.000 | Mewah, berkilau |
| Drill | Rp 180.000 | Tebal, tahan lama |
| Denim | Rp 220.000 | Trendy, durable |

**Estimasi Harga Total = Harga Kain + Biaya Jahit (Rp 100.000)**

## 📐 Detail Ukuran

Form pemesanan meminta 7 ukuran:

1. **Lingkar Dada** (cm) - Sekeliling dada bagian terlebar
2. **Lingkar Pinggang** (cm) - Bagian pinggang terkecil
3. **Lingkar Bahu** (cm) - Dari ujung bahu ke ujung bahu
4. **Panjang Lengan** (cm) - Dari bahu sampai pergelangan tangan
5. **Lingkar Paha** (cm) - Bagian paha terlebar
6. **Panjang Celana** (cm) - Dari pinggang sampai pergelangan kaki
7. **Panjang Baju** (cm) - Dari pundak sampai pinggul atau sesuai keinginan

## 🎯 Navigasi

Navigation tanpa hash (#), menggunakan direct links:

```
- Beranda          → pages/beranda.php
- Tentang          → pages/tentang.php
- Layanan          → pages/layanan.php
- Pesan Sekarang    → pages/pesan.php
```

## 🗄️ Schema Database

### Tabel: pesanan

```sql
CREATE TABLE pesanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    nomor_hp VARCHAR(15) NOT NULL,
    jenis_kain VARCHAR(50) NOT NULL,
    lingkar_dada INT,
    lingkar_pinggang INT,
    lingkar_bahu INT,
    panjang_lengan INT,
    lingkar_paha INT,
    panjang_celana INT,
    panjang_baju INT,
    harga_estimasi DECIMAL(10, 2),
    catatan TEXT,
    status VARCHAR(20) DEFAULT 'pending',
    tanggal_pemesanan TIMESTAMP,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
)
```

### Tabel: harga_kain

```sql
CREATE TABLE harga_kain (
    id INT PRIMARY KEY AUTO_INCREMENT,
    jenis_kain VARCHAR(50) UNIQUE,
    harga_dasar DECIMAL(10, 2),
    deskripsi TEXT,
    created_at TIMESTAMP
)
```

## 💻 Tech Stack

- **Backend**: PHP 7.4+ (Native, tanpa framework)
- **Database**: MySQL dengan MySQLi extension
- **Frontend**: HTML5, CSS3, Vanilla JavaScript (ES6+)
- **Responsive**: Mobile-first dengan media queries
- **Fonts**: Google Fonts (Inter, Montserrat)

## 🔒 Keamanan

- Input sanitasi dengan `real_escape_string()`
- Prepared statements untuk query database
- Input validation di client-side & server-side
- HTML encoding untuk mencegah XSS

## 📱 Responsive Breakpoints

```css
- Desktop: 1024px+
- Tablet: 768px - 1023px
- Mobile: < 768px
```

## 🎨 Color Palette

```
Primary Green:    #1a5f3f (Forest Green)
Accent Green:     #22854a (Darker Shade)
Secondary Gold:   #d4a574 (Muted Gold)
Light Background: #f8f7f4 (Cream)
Dark Text:        #2c2c2c (Charcoal)
Gray Text:        #666666 (Medium Gray)
Border:           #e0ddd8 (Light Gray)
Success:          #10b981 (Green)
Danger:           #ef4444 (Red)
```

## 🚀 Optimisasi & Best Practices

✅ Clean code dengan dokumentasi lengkap
✅ Separation of concerns (HTML, CSS, JS)
✅ DRY principle (Don't Repeat Yourself)
✅ Semantic HTML5
✅ Mobile-first responsive design
✅ CSS custom properties untuk maintainability
✅ Smooth transitions & animations
✅ Form validation & error handling
✅ Accessibility considerations
✅ Performance optimization

## 🐛 Troubleshooting

### Database Connection Failed
- Pastikan XAMPP Apache & MySQL sudah running
- Cek konfigurasi di `includes/koneksi.php`
- Verify database name di phpmyadmin

### Form Tidak Ter-submit
- Check browser console untuk error
- Verify semua field required sudah diisi
- Pastikan file `process_order.php` dapat diakses

### Dynamic Price Tidak Update
- Check browser console untuk JavaScript error
- Verify form ID adalah `#orderForm`
- Pastikan select ID adalah `#jenis_kain`

## 📞 Support

Untuk pertanyaan atau masalah teknis:
- Email: info@treadify.com
- Phone: +62 812-3456-7890
- Alamat: Jakarta, Indonesia

## 📄 Lisensi

© 2026 TREADIFY. All rights reserved.

---

**Version**: 1.0
**Last Updated**: 18 April 2026
**Author**: TREADIFY Development Team
