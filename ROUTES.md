# 🌐 TREADIFY - ROUTES & NAVIGATION MAP

Panduan lengkap semua URL dan navigasi di website TREADIFY.

---

## 📍 BASE URL

```
Local Development: http://localhost/threadify2/
Production:        https://treadify.com/ (atau domain Anda)
```

---

## 🔗 ALL ROUTES

### Main Pages

| Route | File | Purpose | Status |
|-------|------|---------|--------|
| `/` | `index.php` | Entry point (auto-redirect) | 🔴 Redirect |
| `/pages/beranda.php` | `pages/beranda.php` | **Home Page** | ✅ Active |
| `/pages/tentang.php` | `pages/tentang.php` | **About Page** | ✅ Active |
| `/pages/layanan.php` | `pages/layanan.php` | **Services Page** | ✅ Active |
| `/pages/pesan.php` | `pages/pesan.php` | **Order Form** | ✅ Active |
| `/pages/process_order.php` | `pages/process_order.php` | Form processor (POST) | ✅ Active |
| `/pages/success.php` | `pages/success.php` | Success page | ✅ Active |

### Assets (Static Files)

| Route | File | Type | Purpose |
|-------|------|------|---------|
| `/assets/css/style.css` | `assets/css/style.css` | CSS | Main stylesheet |
| `/assets/js/main.js` | `assets/js/main.js` | JavaScript | Main script |

### Database

| Route | File | Purpose |
|-------|------|---------|
| `/db/treadify.sql` | `db/treadify.sql` | Database schema |

---

## 📌 NAVIGATION STRUCTURE

### From Any Page

```
TREADIFY Logo
    ├─ Beranda        → pages/beranda.php
    ├─ Tentang        → pages/tentang.php
    ├─ Layanan        → pages/layanan.php
    └─ Pesan Sekarang → pages/pesan.php (CTA Button)
```

### Homepage (Beranda)

```
pages/beranda.php
├─ Hero Section
│  ├─ "Mulai Pesan" button       → pages/pesan.php
│  └─ "Pelajari Lebih Lanjut"    → pages/tentang.php
│
├─ Why Choose TREADIFY Section
│  └─ Feature cards (no links)
│
├─ Testimonials Section
│  └─ Customer reviews
│
└─ CTA Section
   └─ "Pesan Sekarang" button    → pages/pesan.php
```

### About Page (Tentang)

```
pages/tentang.php
├─ Visi Section
├─ Misi Section
├─ Values Section
└─ Team Section
    └─ Team member cards
```

### Services Page (Layanan)

```
pages/layanan.php
├─ Service Cards (6 services)
│  ├─ Custom Shirts
│  ├─ Custom Pants
│  ├─ Formal Wear
│  ├─ Casual Wear
│  ├─ Konsultasi Desain
│  └─ Alterasi & Modifikasi
│
└─ Process Section
   ├─ Step 1: Konsultasi
   ├─ Step 2: Desain & Ukuran
   ├─ Step 3: Produksi
   ├─ Step 4: Kualitas Check
   └─ Step 5: Pengiriman
```

### Order Form (Pesan)

```
pages/pesan.php
├─ Form Section 1: Data Pribadi
│  ├─ Nama Lengkap (required)
│  ├─ Alamat (required)
│  ├─ Nomor HP (required)
│  └─ Email (optional)
│
├─ Form Section 2: Pilihan Kain
│  ├─ Jenis Kain dropdown (required)
│  └─ Dynamic price update (JavaScript)
│
├─ Form Section 3: Detail Ukuran (required, all)
│  ├─ Lingkar Dada
│  ├─ Lingkar Pinggang
│  ├─ Lingkar Bahu
│  ├─ Panjang Lengan
│  ├─ Lingkar Paha
│  ├─ Panjang Celana
│  └─ Panjang Baju
│
├─ Form Section 4: Catatan Tambahan
│  └─ Additional notes (optional)
│
├─ Price Summary
│  ├─ Harga Dasar Kain
│  ├─ Biaya Jahit (Rp 100.000)
│  └─ Estimasi Total (auto-calculated)
│
└─ Form Actions
   ├─ "Kirim Pemesanan" button → POST to process_order.php
   └─ "Reset Form" button
```

### Form Processing (Process Order)

```
pages/process_order.php [POST REQUEST]
├─ Validate input
├─ Sanitize data
├─ Insert to database (pesanan table)
└─ Redirect to success.php?id=xxx
```

### Success Page (Success)

```
pages/success.php?id=xxxxx
├─ Success message
├─ Order details summary
├─ Next steps information
└─ Buttons:
   ├─ "Kembali ke Beranda" → pages/beranda.php
   └─ "Pesan Lagi" → pages/pesan.php
```

### Footer (Appears on All Pages)

```
Footer Content
├─ Company info
├─ Navigation links (same as header)
├─ Contact information
├─ Social media links
└─ Copyright notice
```

---

## 🎯 DYNAMIC PRICING FLOW

```
User opens pages/pesan.php
         ↓
Page loads → JavaScript initializes price to Rp 100.000
         ↓
User selects Jenis Kain dropdown
         ↓
JavaScript change event triggered
         ↓
Price calculated: 
  Harga Kain + Biaya Jahit (Rp 100.000)
         ↓
Display updates in real-time
         ↓
Price stored in hidden field #harga_estimasi
         ↓
User submits form
         ↓
process_order.php receives harga_estimasi
         ↓
Data saved to database pesanan table
```

---

## 🔄 FORM SUBMISSION FLOW

```
User fills form on pages/pesan.php
         ↓
Client-side validation (JavaScript)
         ↓
Click "Kirim Pemesanan" button
         ↓
Form POSTs to pages/process_order.php
         ↓
Server-side validation
         ↓
Prepare & sanitize data
         ↓
Execute MySQL query (prepared statement)
         ↓
Insert record to pesanan table
         ↓
Get inserted ID (pesanan_id)
         ↓
Redirect to success.php?id=pesanan_id
         ↓
User sees confirmation page
```

---

## 📊 DATABASE QUERY FLOW

```
pages/pesan.php (Initial Load)
         ↓
Include includes/koneksi.php
         ↓
Query: SELECT * FROM harga_kain
         ↓
Generate dropdown options with prices
         ↓
Pass data to JavaScript as JSON


pages/process_order.php (Form Submission)
         ↓
Validate & sanitize POST data
         ↓
Prepare INSERT statement
         ↓
Bind parameters securely
         ↓
Execute: INSERT INTO pesanan (...)
         ↓
Get last inserted ID
         ↓
Redirect with ID in URL


pages/success.php (Confirmation)
         ↓
Get ID from URL parameter
         ↓
Query: SELECT * FROM pesanan WHERE id = ?
         ↓
Display order details
```

---

## 🎨 COMPONENT INCLUDES

### Included on Every Page

```
pages/beranda.php:
  ├─ includes/header.php       (inline styles + HTML)
  └─ includes/footer.php       (inline styles + HTML)

pages/tentang.php:
  ├─ includes/header.php
  └─ includes/footer.php

pages/layanan.php:
  ├─ includes/header.php
  └─ includes/footer.php

pages/pesan.php:
  ├─ includes/koneksi.php      (for database queries)
  ├─ includes/header.php
  └─ includes/footer.php

pages/success.php:
  ├─ includes/koneksi.php      (for order details)
  ├─ includes/header.php
  └─ includes/footer.php
```

---

## 🚀 URL EXAMPLES

### Complete URLs

**Local Development:**
```
Homepage:     http://localhost/threadify2/
About:        http://localhost/threadify2/pages/tentang.php
Services:     http://localhost/threadify2/pages/layanan.php
Order Form:   http://localhost/threadify2/pages/pesan.php
Success:      http://localhost/threadify2/pages/success.php?id=12345
CSS:          http://localhost/threadify2/assets/css/style.css
JavaScript:   http://localhost/threadify2/assets/js/main.js
```

**Production (example.com):**
```
Homepage:     https://example.com/
About:        https://example.com/pages/tentang.php
Services:     https://example.com/pages/layanan.php
Order Form:   https://example.com/pages/pesan.php
Success:      https://example.com/pages/success.php?id=12345
```

---

## 📝 LINK USAGE IN CODE

### In Header Navigation
```php
<!-- pages/beranda.php -->
<a href="pages/tentang.php">Tentang</a>

<!-- pages/tentang.php, pages/layanan.php, pages/pesan.php -->
<a href="pesan.php">Pesan Sekarang</a>
```

### In Buttons
```html
<a href="pesan.php" class="btn-primary">Mulai Pesan</a>
<a href="tentang.php" class="btn-secondary">Pelajari Lebih Lanjut</a>
```

### In Forms
```html
<form method="POST" action="process_order.php">
    <!-- form fields -->
</form>
```

### In Footer
```php
<a href="pages/beranda.php">Beranda</a>
<a href="pages/tentang.php">Tentang</a>
<a href="pages/layanan.php">Layanan</a>
<a href="pages/pesan.php">Pesan</a>
```

---

## 🔐 URL SECURITY CONSIDERATIONS

### Safe URLs
```
✅ Relative paths: pages/pesan.php
✅ Absolute paths: /threadify2/pages/pesan.php
✅ Query strings: success.php?id=12345
```

### Dangerous Patterns (AVOID)
```
❌ No shell injection: pages/pesan.php?cmd=
❌ No path traversal: pages/../../../
❌ No PHP execution: pages/pesan.php?code=phpinfo()
```

---

## 📱 MOBILE URL HANDLING

Mobile devices use the same URLs as desktop. The responsive design handles display:

```
Same URL on Mobile: pages/pesan.php
                    ↓
                    Rendered with mobile CSS
                    ↓
                    Touch-friendly interface
```

---

## 🔍 SEO-FRIENDLY URLs

Current structure is SEO-friendly:
```
✅ Descriptive: /pages/pesan.php (not /p.php?id=2)
✅ Readable: tentang.php (not t.php)
✅ Logical: Hierarchical structure /pages/
✅ Static: Not session-dependent
```

---

## 📋 REFERENCE TABLE

### All Accessible Pages

| Page Name | URL | Type | Access |
|-----------|-----|------|--------|
| Home | `pages/beranda.php` | GET | Public ✅ |
| About | `pages/tentang.php` | GET | Public ✅ |
| Services | `pages/layanan.php` | GET | Public ✅ |
| Order Form | `pages/pesan.php` | GET | Public ✅ |
| Form Submit | `pages/process_order.php` | POST | Protected ⚠️ |
| Success | `pages/success.php` | GET | Public ✅ |

---

## 🔗 QUICK LINKS

**Navigation Menu:**
```
Beranda    → pages/beranda.php
Tentang    → pages/tentang.php
Layanan    → pages/layanan.php
Pesan      → pages/pesan.php
```

**CTA Buttons:**
```
"Mulai Pesan"           → pages/pesan.php
"Pelajari Lebih Lanjut" → pages/tentang.php
"Pesan Sekarang"        → pages/pesan.php
"Kembali ke Beranda"    → pages/beranda.php
```

---

## 💡 TIPS

1. **Always use relative paths** inside pages folder
2. **Include header.php at top** of every page
3. **Include footer.php at bottom** of every page
4. **Use GET for viewing**, POST for submitting
5. **Validate all URLs** in development
6. **Test all links** after any changes

---

**Last Updated: 18 April 2026**
