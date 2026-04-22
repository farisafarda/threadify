# 🚀 QUICK START GUIDE - TREADIFY

Panduan cepat untuk menjalankan website TREADIFY.

## ⚡ Setup dalam 3 Langkah

### Langkah 1: Import Database (2 menit)

1. **Buka phpMyAdmin**
   ```
   http://localhost/phpmyadmin
   ```

2. **Buat Database Baru**
   - Klik "New" di sidebar
   - Masukkan nama: `treadify`
   - Klik "Create"

3. **Import SQL File**
   - Pilih database `treadify`
   - Klik tab "Import"
   - Browse file: `db/treadify.sql`
   - Klik tombol "Import"

**Atau dengan Command Line:**
```bash
mysql -u root < db/treadify.sql
```

### Langkah 2: Verifikasi Konfigurasi Database

File: `includes/koneksi.php`

Pastikan sesuai dengan setup XAMPP:
```php
define('DB_HOST', 'localhost');    // ✅ Default: localhost
define('DB_USER', 'root');         // ✅ Default: root
define('DB_PASS', '');             // ✅ Default: kosong
define('DB_NAME', 'treadify');     // ✅ Nama database
```

### Langkah 3: Jalankan Website

1. **Start XAMPP**
   - Buka XAMPP Control Panel
   - Klik "Start" untuk Apache & MySQL

2. **Akses Website**
   ```
   http://localhost/threadify2/
   ```

3. **Selesai!** 🎉
   - Website akan auto-redirect ke halaman beranda
   - Coba navigasi ke halaman berbeda
   - Test form pemesanan

---

## 📂 Struktur File Penting

```
threadify2/
├── index.php ........................ Entry point
├── includes/
│   ├── koneksi.php ................. Database connection (PASTIKAN DIKONFIGURASI!)
│   ├── header.php .................. Header & Navigation
│   └── footer.php .................. Footer
├── pages/
│   ├── beranda.php ................. Home page
│   ├── tentang.php ................. About page
│   ├── layanan.php ................. Services page
│   ├── pesan.php ................... Order form (MAIN FEATURE)
│   ├── process_order.php ........... Form processing
│   └── success.php ................. Success page
├── assets/
│   ├── css/style.css ............... Styling
│   └── js/main.js .................. JavaScript
└── db/
    └── treadify.sql ................ Database schema
```

---

## ✨ Testing Fitur

### 1. Test Navigation
- ✅ Klik semua menu di header
- ✅ Cek link "Pesan Sekarang"
- ✅ Test hamburger menu di mobile

### 2. Test Form Pemesanan
1. Buka halaman "Pesan Sekarang"
2. Pilih jenis kain → lihat harga update otomatis
3. Isi semua field yang required
4. Klik tombol "Kirim Pemesanan"
5. Seharusnya redirect ke halaman success

### 3. Cek Database
1. Buka phpMyAdmin
2. Buka database `treadify`
3. Tab "Browse" tabel `pesanan`
4. Lihat data yang baru diinput dari form

---

## 🎨 Customization

### Ubah Warna

File: `includes/header.php` (line ~33)
```css
:root {
    --primary-color: #1a5f3f;        /* Forest Green */
    --secondary-color: #d4a574;      /* Muted Gold */
    --accent-color: #22854a;         /* Darker Green */
}
```

### Ubah Font

Sudah menggunakan Google Fonts:
```html
<!-- Di header.php line ~13 -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
```

### Update Harga Kain

Di phpMyAdmin:
1. Buka database `treadify`
2. Tab "Browse" tabel `harga_kain`
3. Edit harga sesuai kebutuhan

---

## 🔧 Common Issues & Solutions

### ❌ Database Connection Error
```
"Koneksi database gagal: Access denied for user 'root'@'localhost'"
```
**Solusi:**
- Pastikan MySQL sudah running di XAMPP
- Check username/password di `koneksi.php`
- Default XAMPP: user=`root`, password=kosong

### ❌ File Not Found (404)
```
"The requested URL /threadify2/pages/beranda.php was not found"
```
**Solusi:**
- Pastikan folder `threadify2` di `C:\xampp\htdocs\`
- Check file paths di navigation
- Reload halaman browser

### ❌ Form Tidak Submit
**Solusi:**
- Open browser console (F12)
- Check untuk JavaScript errors
- Pastikan semua field required diisi
- Verify `process_order.php` accessible

### ❌ Dynamic Price Tidak Update
**Solusi:**
- Check browser console
- Verify form ID `#orderForm` ada
- Verify select ID `#jenis_kain` ada
- Clear cache browser (Ctrl+Shift+Delete)

---

## 📋 Checklist Setup

- [ ] XAMPP Apache & MySQL running
- [ ] Database `treadify` dibuat
- [ ] File SQL di-import
- [ ] File `koneksi.php` sudah dikonfigurasi
- [ ] Folder `threadify2` ada di `htdocs`
- [ ] Bisa akses `http://localhost/threadify2/`
- [ ] Halaman beranda muncul dengan benar
- [ ] Menu navigasi berfungsi
- [ ] Form pemesanan bisa diakses
- [ ] Dynamic pricing bekerja
- [ ] Form bisa di-submit
- [ ] Data muncul di database

---

## 📱 Testing di Mobile

Untuk testing responsiveness:
1. Buka website di browser
2. Tekan `F12` untuk Developer Tools
3. Klik icon "Responsive Design Mode" (Ctrl+Shift+M)
4. Test berbagai ukuran layar

---

## 🔐 Security Tips

1. **Production Deployment:**
   - Ubah `DB_PASS` ke password yang kuat
   - Disable `mysqli_report(MYSQLI_REPORT_ERROR)`
   - Set proper file permissions

2. **Input Validation:**
   - Semua input sudah di-sanitasi
   - Gunakan prepared statements
   - Validate email format

3. **Database:**
   - Regular backup
   - Use SSL untuk koneksi
   - Restrict user privileges

---

## 📞 Next Steps

1. **Customize Content:**
   - Edit teks di setiap halaman
   - Update logo & branding
   - Ubah warna sesuai brand identity

2. **Add More Features:**
   - Admin panel untuk manage pesanan
   - Email notification
   - Payment gateway integration
   - Customer account system

3. **Go Live:**
   - Deploy ke hosting
   - Setup domain name
   - Configure SSL certificate
   - Optimize performance

---

## 📖 Dokumentasi Lengkap

Baca file `README.md` untuk dokumentasi detail tentang:
- Struktur folder
- Database schema
- Tech stack
- Best practices
- Troubleshooting

---

**Selamat menggunakan TREADIFY! 🎉**

Untuk bantuan lebih lanjut, hubungi: info@treadify.com
