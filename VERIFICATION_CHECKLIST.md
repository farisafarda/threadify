# ✅ TREADIFY - SETUP VERIFICATION CHECKLIST

Gunakan checklist ini untuk memastikan semua setup sudah benar.

---

## 📋 PRE-SETUP CHECKLIST

### System Requirements

- [ ] XAMPP sudah terinstall
- [ ] Apache module sudah enable di XAMPP
- [ ] MySQL service sudah enable di XAMPP
- [ ] PHP version 7.4 atau lebih tinggi
- [ ] Folder `htdocs` sudah accessible

### Files & Folders

- [ ] Folder `threadify2` sudah ada di `C:\xampp\htdocs\`
- [ ] Semua 6 subfolder sudah dibuat (see below)
- [ ] Semua 18 files sudah ada (see below)

---

## 📁 FOLDER STRUCTURE VERIFICATION

Pastikan struktur folder sesuai dengan ini:

```
✅ C:\xampp\htdocs\threadify2\
   ├─ ✅ includes\
   ├─ ✅ pages\
   ├─ ✅ assets\
   │  ├─ ✅ css\
   │  └─ ✅ js\
   ├─ ✅ db\
```

**Verification Steps:**
1. [ ] Buka Windows Explorer
2. [ ] Navigate ke `C:\xampp\htdocs\threadify2\`
3. [ ] Pastikan ada 6 folder: `includes`, `pages`, `assets`, `db`
4. [ ] Buka folder `assets`, pastikan ada 2 subfolder: `css`, `js`

---

## 📄 FILES VERIFICATION

### Root Level Files
```
C:\xampp\htdocs\threadify2\
  ✅ index.php ........................... 5 lines
  ✅ README.md ........................... 800+ lines
  ✅ SETUP_GUIDE.md ...................... 300+ lines
  ✅ PROJECT_SUMMARY.txt ................. 600+ lines
  ✅ ROUTES.md ........................... 400+ lines
  ✅ VERIFICATION_CHECKLIST.md .......... (this file)
```

**Check:**
- [ ] Semua 6 file ada
- [ ] File size reasonable (bukan 0 bytes)

### Includes Folder
```
C:\xampp\htdocs\threadify2\includes\
  ✅ koneksi.php ......................... 28 lines
  ✅ header.php .......................... 140 lines
  ✅ footer.php .......................... 90 lines
```

**Check:**
- [ ] Semua 3 file ada
- [ ] Tidak ada file unwanted (e.g., .bak, .tmp)

### Pages Folder
```
C:\xampp\htdocs\threadify2\pages\
  ✅ beranda.php ......................... 200+ lines
  ✅ tentang.php ......................... 180+ lines
  ✅ layanan.php ......................... 250+ lines
  ✅ pesan.php ........................... 350+ lines (MAIN)
  ✅ process_order.php ................... 90 lines
  ✅ success.php ......................... 130 lines
```

**Check:**
- [ ] Semua 6 file ada
- [ ] File `pesan.php` ada (most important)
- [ ] File `process_order.php` ada (form processor)

### Assets - CSS Folder
```
C:\xampp\htdocs\threadify2\assets\css\
  ✅ style.css ........................... 120+ lines
```

**Check:**
- [ ] File `style.css` ada
- [ ] File bukan kosong

### Assets - JS Folder
```
C:\xampp\htdocs\threadify2\assets\js\
  ✅ main.js ............................ 80+ lines
```

**Check:**
- [ ] File `main.js` ada
- [ ] File bukan kosong

### Database Folder
```
C:\xampp\htdocs\threadify2\db\
  ✅ treadify.sql ....................... 40+ lines
```

**Check:**
- [ ] File `treadify.sql` ada
- [ ] File berisi SQL CREATE TABLE

---

## 🗄️ DATABASE SETUP VERIFICATION

### Step 1: Check Database Existence

1. [ ] Open phpMyAdmin: `http://localhost/phpmyadmin`
2. [ ] Lihat di sidebar kiri
3. [ ] Pastikan ada database bernama `treadify`

### Step 2: Check Tables

1. [ ] Klik database `treadify`
2. [ ] Lihat tab "Structure"
3. [ ] Pastikan ada 2 tabel:
   - [ ] `pesanan` (Orders table)
   - [ ] `harga_kain` (Fabric prices table)

### Step 3: Verify Table Structure - pesanan

```
Kolom yang harus ada:
- [ ] id (INT, AUTO_INCREMENT, PRIMARY KEY)
- [ ] nama (VARCHAR 100)
- [ ] alamat (TEXT)
- [ ] nomor_hp (VARCHAR 15)
- [ ] jenis_kain (VARCHAR 50)
- [ ] lingkar_dada (INT)
- [ ] lingkar_pinggang (INT)
- [ ] lingkar_bahu (INT)
- [ ] panjang_lengan (INT)
- [ ] lingkar_paha (INT)
- [ ] panjang_celana (INT)
- [ ] panjang_baju (INT)
- [ ] harga_estimasi (DECIMAL 10,2)
- [ ] catatan (TEXT)
- [ ] status (VARCHAR 20)
- [ ] tanggal_pemesanan (TIMESTAMP)
- [ ] created_at (TIMESTAMP)
- [ ] updated_at (TIMESTAMP)
```

### Step 4: Verify Table Structure - harga_kain

```
Kolom yang harus ada:
- [ ] id (INT, AUTO_INCREMENT, PRIMARY KEY)
- [ ] jenis_kain (VARCHAR 50, UNIQUE)
- [ ] harga_dasar (DECIMAL 10,2)
- [ ] deskripsi (TEXT)
- [ ] created_at (TIMESTAMP)
```

### Step 5: Check Sample Data

1. [ ] Tab "Browse" di tabel `harga_kain`
2. [ ] Pastikan ada 5 data:
   - [ ] Katun - Rp 150.000
   - [ ] Linen - Rp 200.000
   - [ ] Suita - Rp 350.000
   - [ ] Drill - Rp 180.000
   - [ ] Denim - Rp 220.000

---

## ⚙️ CONFIGURATION VERIFICATION

### File: includes/koneksi.php

Buka file dan verifikasi konfigurasi:

```php
✅ DB_HOST = 'localhost'
   [ ] Correct for local XAMPP

✅ DB_USER = 'root'
   [ ] Correct for XAMPP default

✅ DB_PASS = ''
   [ ] Empty/blank (XAMPP default)

✅ DB_NAME = 'treadify'
   [ ] Matches your database name
```

**What to do:**
1. [ ] Edit file `includes/koneksi.php`
2. [ ] Check constants defined pada line ~7-10
3. [ ] Jika punya password, update line ~8
4. [ ] Jika nama database berbeda, update line ~10

---

## 🌐 WEBSITE ACCESS VERIFICATION

### Test 1: Website Can Be Accessed

1. [ ] Start XAMPP (Apache + MySQL)
2. [ ] Open browser
3. [ ] Type: `http://localhost/threadify2/`
4. [ ] Expected: Auto-redirect ke `pages/beranda.php`
5. [ ] Should see: Hero section dengan TREADIFY branding

**If it fails:**
- [ ] Check if Apache is running
- [ ] Check if folder path is correct
- [ ] Try: `http://localhost/threadify2/pages/beranda.php`

### Test 2: Navigation Works

1. [ ] Click "Beranda" → Should stay on home
2. [ ] Click "Tentang" → Should go to about page
3. [ ] Click "Layanan" → Should go to services page
4. [ ] Click "Pesan Sekarang" → Should go to order form

**If any fails:**
- [ ] Check console for JavaScript errors (F12)
- [ ] Verify file paths in header
- [ ] Check file existence in `pages/` folder

### Test 3: Assets Load Correctly

1. [ ] Right-click → Inspect (F12)
2. [ ] Go to "Sources" tab
3. [ ] Check if files listed:
   - [ ] `assets/css/style.css` (no 404 errors)
   - [ ] `assets/js/main.js` (no 404 errors)

**If missing:**
- [ ] Check file paths in `includes/header.php`
- [ ] Verify files exist in `assets/css/` dan `assets/js/`
- [ ] Check console for 404 errors

---

## 📝 FORM VERIFICATION

### Test 1: Form Loads

1. [ ] Click "Pesan Sekarang"
2. [ ] Should see form with sections:
   - [ ] Data Pribadi
   - [ ] Pilihan Kain
   - [ ] Detail Ukuran (7 fields)
   - [ ] Catatan Tambahan
   - [ ] Price Summary
   - [ ] Submit button

### Test 2: Dynamic Pricing Works

1. [ ] On form page
2. [ ] Look at "Pilihan Kain" dropdown
3. [ ] Select "Katun" → Price should update to Rp 250.000
4. [ ] Select "Linen" → Price should update to Rp 300.000
5. [ ] Select "Suita" → Price should update to Rp 450.000
6. [ ] Select "Drill" → Price should update to Rp 280.000
7. [ ] Select "Denim" → Price should update to Rp 320.000

**Price Formula:** Fabric Price + Rp 100.000 (Sewing Fee)

**If price doesn't update:**
- [ ] Open browser console (F12)
- [ ] Check for JavaScript errors
- [ ] Verify `select` ID is `#jenis_kain`
- [ ] Verify `form` ID is `#orderForm`

### Test 3: Form Validation

1. [ ] Try submit form kosong
2. [ ] Should see error/alert
3. [ ] Try submit dengan nama saja
4. [ ] Should see error
5. [ ] Fill all required fields (nama, alamat, HP, kain, ukuran)
6. [ ] Submit should work

### Test 4: Form Submission

1. [ ] Fill form lengkap dengan data sample:
   ```
   Nama: John Doe
   Alamat: Jakarta, Indonesia
   HP: 081234567890
   Email: john@example.com
   Kain: Katun
   Ukuran: 100, 85, 40, 65, 55, 80, 70
   Catatan: Extra margin di dada
   ```

2. [ ] Click "Kirim Pemesanan"
3. [ ] Should redirect to success page
4. [ ] Should show order confirmation
5. [ ] Should display Order ID like #000001

**If fails:**
- [ ] Check browser console for errors
- [ ] Verify `process_order.php` exists
- [ ] Check if MySQL is running
- [ ] Verify database can be accessed

### Test 5: Data Saved to Database

1. [ ] After successful submission
2. [ ] Open phpMyAdmin
3. [ ] Go to `treadify` database
4. [ ] Tab "Browse" table `pesanan`
5. [ ] Should see your test data

---

## 🎨 DESIGN VERIFICATION

### Color Scheme

- [ ] Primary Green (#1a5f3f) visible in:
  - [ ] Logo
  - [ ] Buttons
  - [ ] Headings
  - [ ] Links

- [ ] Secondary Gold (#d4a574) visible in:
  - [ ] CTA buttons
  - [ ] Accent elements
  - [ ] Price display

### Typography

- [ ] Font "Montserrat" used in:
  - [ ] Logo
  - [ ] Section headings (h1, h2, h3)

- [ ] Font "Inter" used in:
  - [ ] Body text
  - [ ] Form labels
  - [ ] Descriptions

### Responsive Design

1. [ ] Open DevTools (F12)
2. [ ] Click "Toggle Device Toolbar" (Ctrl+Shift+M)
3. [ ] Test different screen sizes:
   - [ ] Desktop (1024px) → Should show normal layout
   - [ ] Tablet (768px) → Should show medium layout
   - [ ] Mobile (375px) → Should show mobile layout
   - [ ] Menu should hamburger on mobile
   - [ ] Form should stack vertically on mobile

---

## 🔒 SECURITY VERIFICATION

### Input Validation

1. [ ] Try submit form with special characters: `<script>alert('test')</script>`
2. [ ] Should NOT execute script
3. [ ] Data should be saved sanitized to database

### SQL Security

1. [ ] Try submit form with SQL injection: `' OR '1'='1`
2. [ ] Should NOT affect database query
3. [ ] Data should be saved as-is

---

## 📱 CROSS-BROWSER TESTING

Test website di berbagai browser:

- [ ] Chrome (Latest)
- [ ] Firefox (Latest)
- [ ] Safari (Latest)
- [ ] Edge (Latest)

**Check in each browser:**
- [ ] Website loads correctly
- [ ] Colors display properly
- [ ] Form works
- [ ] Dynamic pricing works
- [ ] Responsive design works

---

## ⚠️ COMMON ISSUES & FIXES

### Issue: "Database Connection Failed"
```
✅ Solution:
  1. Verify MySQL is running in XAMPP
  2. Check credentials in koneksi.php
  3. Verify database exists with name 'treadify'
  4. Try: mysql -u root (from command line)
```

### Issue: "404 Not Found" for CSS/JS
```
✅ Solution:
  1. Check file paths in header.php
  2. Verify files exist in assets/css/ and assets/js/
  3. Check case sensitivity (Linux is case-sensitive)
  4. Refresh browser cache (Ctrl+Shift+Delete)
```

### Issue: "Form Not Submitting"
```
✅ Solution:
  1. Check browser console for errors (F12)
  2. Verify process_order.php exists
  3. Check all required fields filled
  4. Verify form ID is 'orderForm'
  5. Verify input names match PHP variables
```

### Issue: "Dynamic Price Not Updating"
```
✅ Solution:
  1. Open console (F12) → check for errors
  2. Verify select element ID is 'jenis_kain'
  3. Verify data-harga attribute in options
  4. Refresh page and try again
  5. Check that JavaScript file is loaded
```

---

## ✅ FINAL CHECKLIST

### Before Going Live

- [ ] All files created & in correct locations
- [ ] Database setup completed
- [ ] Configuration verified (koneksi.php)
- [ ] Website accessible at localhost
- [ ] All pages load correctly
- [ ] Navigation works
- [ ] Form validation works
- [ ] Dynamic pricing works
- [ ] Form submission works
- [ ] Data saves to database
- [ ] Success page displays
- [ ] Mobile responsive works
- [ ] Cross-browser tested
- [ ] No console errors
- [ ] Database can be accessed
- [ ] Security features verified
- [ ] Documentation read
- [ ] Customization planned

---

## 🎯 NEXT STEPS

### If All Tests Pass ✅
1. [ ] Customize content (replace sample text)
2. [ ] Add company logo
3. [ ] Update contact information
4. [ ] Modify prices if needed
5. [ ] Deploy to production
6. [ ] Setup domain
7. [ ] Configure SSL
8. [ ] Monitor performance

### If Any Test Fails ❌
1. [ ] Check error message carefully
2. [ ] Consult troubleshooting section
3. [ ] Check file paths
4. [ ] Verify configurations
5. [ ] Check browser console (F12)
6. [ ] Review README.md
7. [ ] Contact support if needed

---

## 📞 VERIFICATION SUPPORT

If you encounter issues during verification:

1. **Check Documentation**
   - README.md (Comprehensive guide)
   - SETUP_GUIDE.md (Quick start)
   - ROUTES.md (Navigation map)

2. **Browser Console**
   - Press F12 to open DevTools
   - Check Console tab for errors
   - Check Network tab for missing files

3. **Database Check**
   - Open phpMyAdmin
   - Verify tables exist
   - Check data is saving

4. **File Check**
   - Verify all files exist
   - Check file paths
   - Check file permissions

---

**✅ Setup Verification Complete!**

Once all checks are complete, your TREADIFY website is ready to use.

Good luck with your e-commerce platform! 🚀
