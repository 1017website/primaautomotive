# Prima Automotive - Laravel 12 Company Profile

Website company profile bengkel cat & body mobil Prima Automotive, Surabaya.

---

## Tech Stack
- Laravel 12
- PHP 8.2
- Blade Templates
- Tailwind CSS (CDN)
- Lucide Icons (CDN)
- Vanilla JS (animasi, scroll reveal, counter)

---

## Struktur File

```
app/
  Http/
    Controllers/
      HomeController.php

resources/
  views/
    layouts/
      app.blade.php              ← Master layout (CSS, JS global)
    home/
      index.blade.php            ← Halaman utama
      partials/
        navbar.blade.php         ← Navbar fixed
        mobile-menu.blade.php    ← Mobile menu
        hero.blade.php           ← Hero + tracking form
        reviews.blade.php        ← Ulasan Google
        services.blade.php       ← Layanan
        process.blade.php        ← Alur kerja (6 steps)
        about.blade.php          ← Tentang kami + JATIDIRI
        location-footer.blade.php← Lokasi + footer

routes/
  web.php
```

---

## Cara Pakai di Fresh Laravel 12

### Step 1 — Copy file
Copy semua file di atas ke project Laravel sesuai path masing-masing.

### Step 2 — Route sudah siap
`routes/web.php` sudah berisi:
```php
Route::get('/', [HomeController::class, 'index'])->name('home');
```

### Step 3 — Tidak perlu npm/vite
Website ini menggunakan Tailwind CDN dan Lucide CDN.
Tidak perlu `npm install` atau `npm run dev`.

### Step 4 — Jalankan
```bash
php artisan serve
```
Buka http://localhost:8000

---

## Fitur Animasi
- Scroll Reveal (fade up, fade left, fade right, scale in)
- Hero particles floating
- Counter animasi (2K+, 95%)
- Shimmer text effect
- Floating WhatsApp button
- Scroll progress bar
- Navbar scroll effect
- Card hover animations (lift, glow)
- Process step hover bounce
- Service card expand on hover

---

## Kustomisasi

### Ganti Logo
Di `navbar.blade.php`, uncomment bagian `<img>` dan ganti URL logo:
```blade
<img src="{{ asset('images/logo.png') }}" alt="Prima Automotive" class="h-16 w-auto object-contain">
```
Taruh file logo di `public/images/logo.png`

### Ganti Nomor WhatsApp
Cari `6287853722011` di semua file, ganti dengan nomor WA aktif.

### Ganti Map Embed
Di `location-footer.blade.php`, update `src` pada `<iframe>` dengan embed URL Google Maps yang benar.

### Warna Utama
Di `layouts/app.blade.php` section `tailwind.config`:
```js
primary: '#e67e22',        // warna utama (orange)
'primary-dark': '#d35400', // warna hover
navy: '#0a1628',           // warna dark background
```

---

## Catatan
- Halaman ini single-page (semua section dalam 1 view).
- Untuk CMS, tambahkan model/controller terpisah dan tambahkan `@yield` di layout.
- Tracking form saat ini redirect ke WhatsApp. Untuk tracking real, hubungkan ke database booking.
