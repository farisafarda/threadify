# ✅ ROUTING FIX - QUICK TEST GUIDE

Panduan cepat untuk test routing system yang sudah diperbaiki.

---

## 🚀 QUICK START TEST (5 menit)

### 1. Restart Server
```
1. Stop Apache & MySQL di XAMPP
2. Start Apache & MySQL kembali
3. Pastikan no errors
```

### 2. Test Home Page
```
1. Buka: http://localhost/threadify2/
2. Seharusnya: Auto-load halaman beranda
3. Check: Hero section visible dengan TREADIFY branding
```

### 3. Test Navigation Links
```
Klik setiap link di navbar:

✓ "Beranda" link
  - URL berubah ke: ?page=beranda
  - Link highlight (active state)
  
✓ "Tentang" link
  - URL berubah ke: ?page=tentang
  - Tentang page load dengan content
  - Link highlight di navbar
  
✓ "Layanan" link
  - URL berubah ke: ?page=layanan
  - Layanan page load dengan content
  - Link highlight di navbar
  
✓ "Pesan Sekarang" button
  - URL berubah ke: ?page=pesan
  - Order form load
  - Button highlight di navbar
```

### 4. Test Direct URLs
```
Type these URLs directly in browser address bar:

✓ http://localhost/threadify2/
  Expected: Beranda page load

✓ http://localhost/threadify2/index.php
  Expected: Beranda page load

✓ http://localhost/threadify2/index.php?page=beranda
  Expected: Beranda page load with active state

✓ http://localhost/threadify2/index.php?page=tentang
  Expected: Tentang page load with active state

✓ http://localhost/threadify2/index.php?page=layanan
  Expected: Layanan page load with active state

✓ http://localhost/threadify2/index.php?page=pesan
  Expected: Order form page load with active state
```

### 5. Test Button Links Inside Pages
```
✓ On Beranda page:
  - "Mulai Pesan" button → ?page=pesan
  - "Pelajari Lebih Lanjut" button → ?page=tentang
  - "Pesan Sekarang" CTA button → ?page=pesan

✓ On Success page (after form submit):
  - "Kembali ke Beranda" button → ?page=beranda
  - "Pesan Lagi" button → ?page=pesan
```

### 6. Test Form Submission
```
1. Go to: ?page=pesan
2. Fill form completely
3. Click "Kirim Pemesanan"
4. Should redirect to: ?page=success&id=xxxxx
5. Success page shows order details
6. Click "Pesan Lagi" → go to ?page=pesan
7. Click "Kembali ke Beranda" → go to ?page=beranda
```

### 7. Test Mobile Responsiveness
```
1. Press F12 (Developer Tools)
2. Click "Toggle Device Toolbar" (Ctrl+Shift+M)
3. Test on mobile sizes (375px width)

✓ Hamburger menu appears
✓ Menu toggle works
✓ Links work on mobile
✓ Form layout responsive
✓ Navigation responsive
```

---

## 🔍 DETAILED TESTING

### Header & Navigation
```
Visual Check:
☐ Logo visible (TREADIFY text with gold subtitle)
☐ Navigation bar with 4 menu items
☐ "Pesan Sekarang" button has green gradient
☐ Hamburger menu visible on mobile

Functionality Check:
☐ Logo click → ?page=beranda
☐ Beranda link → ?page=beranda
☐ Tentang link → ?page=tentang
☐ Layanan link → ?page=layanan
☐ Pesan link → ?page=pesan
☐ Active link highlighted (darker green + underline)
☐ Hover effect working (gold underline appears)
```

### Page Content
```
Beranda Page:
☐ Hero section displays
☐ Features section shows 6 cards
☐ Testimonials section shows 3 reviews
☐ CTA section at bottom

Tentang Page:
☐ About content loads
☐ Vision & Mission sections visible
☐ Team member cards visible

Layanan Page:
☐ Service cards load (6 services)
☐ Process steps section visible

Pesan Page:
☐ Form sections load (Data, Kain, Ukuran, Catatan)
☐ Price summary visible
☐ Submit button accessible

Success Page:
☐ Success message displays
☐ Order details show
☐ Next steps information visible
☐ Navigation buttons work
```

### Form Functionality
```
Dynamic Pricing:
☐ Open Pesan page
☐ Select Katun → Price = Rp 250.000
☐ Select Linen → Price = Rp 300.000
☐ Select Suita → Price = Rp 450.000
☐ Select Drill → Price = Rp 280.000
☐ Select Denim → Price = Rp 320.000

Form Submission:
☐ Fill all required fields
☐ Submit form
☐ Redirect to success page
☐ Order ID displayed
☐ Data saved to database
```

### Security
```
Try these "attacks" - they should be safe:

☐ ?page=../../etc/passwd
  Expected: Redirect to beranda (safe)

☐ ?page=<script>alert('xss')</script>
  Expected: Redirect to beranda (safe)

☐ ?page=nonexistent
  Expected: Redirect to beranda (safe)

☐ ?page=sql_injection
  Expected: Redirect to beranda (safe)
```

### Database
```
After form submission:

☐ Open phpMyAdmin
☐ Database: treadify
☐ Table: pesanan
☐ Browse table
☐ New order record visible
☐ All fields filled correctly
  ✓ nama
  ✓ alamat
  ✓ nomor_hp
  ✓ jenis_kain
  ✓ 7 measurements
  ✓ harga_estimasi
  ✓ catatan (if filled)
  ✓ status = 'pending'
  ✓ timestamps set
```

### Browser Console
```
Press F12 and check Console tab:

✓ No 404 errors
✓ No red error messages
✓ No PHP notices/warnings
✓ No JavaScript errors
✓ CSS files loaded successfully
✓ No missing assets warnings
```

---

## ❌ TROUBLESHOOTING

### Issue: Links not working
**Check:**
1. Browser address bar shows correct URL
2. No 404 errors in console
3. File exists: includes/header.php
4. Verify link href format: `index.php?page=xxx`

### Issue: Active state not highlighting
**Check:**
1. Open browser console
2. Check if $_GET['page'] is set
3. Verify CSS active class styling
4. Clear browser cache (Ctrl+Shift+Delete)

### Issue: Form not submitting
**Check:**
1. Console for JavaScript errors
2. All required fields filled
3. Form ID = 'orderForm'
4. process_order.php exists
5. MySQL is running

### Issue: Page shows twice (duplicate header/footer)
**Check:**
1. Page file NOT including header.php
2. Page file NOT including footer.php
3. index.php is including both
4. Restart server and refresh

### Issue: Dynamic pricing not updating
**Check:**
1. Console for JavaScript errors
2. Select element ID = 'jenis_kain'
3. Form ID = 'orderForm'
4. data-harga attribute on options
5. Clear cache and refresh

---

## 📋 COMPLETE TEST CHECKLIST

### Routing System
- [ ] Home page loads (beranda default)
- [ ] Navbar links work
- [ ] Direct URLs work
- [ ] Logo links to beranda
- [ ] Active states highlight correctly

### All Pages
- [ ] Beranda page loads
- [ ] Tentang page loads
- [ ] Layanan page loads
- [ ] Pesan page loads
- [ ] Success page loads

### Navigation
- [ ] No duplicate headers/footers
- [ ] All links clickable
- [ ] No 404 errors
- [ ] Page transitions smooth

### Form & Submission
- [ ] Form loads on pesan page
- [ ] Dynamic pricing works
- [ ] Form validates
- [ ] Form submits
- [ ] Success page shows

### Database
- [ ] Data saves correctly
- [ ] All fields populated
- [ ] Timestamps set
- [ ] Order ID generated

### Mobile
- [ ] Responsive design
- [ ] Hamburger menu works
- [ ] Touch-friendly
- [ ] No overflow/broken layout

### Security
- [ ] No injection attacks work
- [ ] Invalid pages redirect safe
- [ ] No console errors
- [ ] Form data sanitized

### Performance
- [ ] Page loads fast
- [ ] No unnecessary requests
- [ ] CSS loaded
- [ ] JavaScript works

### Browsers
- [ ] Works in Chrome
- [ ] Works in Firefox
- [ ] Works in Safari
- [ ] Works in Edge
- [ ] Works on mobile browsers

---

## ✅ ALL TESTS PASS?

Jika semua test pass, routing system sudah working perfectly! 🎉

Navigasi ke halaman berikutnya:
```
1. Customize content
2. Deploy to production
3. Setup domain & SSL
4. Monitor performance
```

---

**Good luck! Happy testing! 🚀**
