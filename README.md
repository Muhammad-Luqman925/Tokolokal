# TokoLokal

TokoLokal adalah website e-commerce yang dibangun dengan Laravel (backend + Vite) dan React (frontend) dalam satu proyek monolit. Panel admin menggunakan Filament 3 untuk mengelola produk, pesanan, dan data pengguna.

## Fitur Utama
- Autentikasi pengguna (Sanctum)
- Manajemen produk + upload gambar
- Keranjang belanja & checkout
- Voucher, alamat, metode pembayaran
- Dashboard admin (Filament) di `/admin`

## Tech Stack
- Frontend: React, Vite, Tailwind CSS, Axios
- Backend: Laravel 12, Filament 3, MySQL
- Auth: Laravel Sanctum

## Instalasi & Setup (single codebase)
1) Clone dan masuk folder
```bash
git clone <repo-url> Tokolokal
cd Tokolokal
```
2) Instal dependency
```bash
composer install
npm install
```
3) Konfigurasi env + key
```bash
copy .env.example .env   # Windows (atau: cp .env.example .env)
php artisan key:generate
```
4) Atur database di `.env`, lalu migrasi + seed + storage link
```bash
php artisan migrate --seed
php artisan storage:link
```
5) Jalankan aplikasi (dua terminal)
```bash
php artisan serve        # http://127.0.0.1:8000
npm run dev              # Vite dev server
```

## Struktur Direktori
```
.
+- app/                      # Code aplikasi (Controllers, Models, Filament, dll)
¦  +- Filament/              # Halaman/Resources/Widgets admin
¦  +- Http/Controllers/Api   # Endpoint REST API
+- bootstrap/
+- config/
+- database/
¦  +- migrations/            # Skema tabel
¦  +- seeders/               # UserSeeder, Product/Voucher/Order, dll
+- public/
¦  +- storage -> ../storage/app/public  # symlink hasil `storage:link`
+- resources/
¦  +- js/                    # React app (routes, features, components)
¦  +- assets/                # CSS/ikon/gambar statis
+- routes/
¦  +- api.php                # Endpoint API publik
¦  +- web.php                # Route web & login Filament override
+- storage/
+- vendor/
+- artisan
+- composer.json
+- package.json
+- vite.config.js
```

## Catatan
- Gambar produk/avatars disimpan pada disk `public`. Pastikan `php artisan storage:link` sudah dijalankan.
- Filament path panel diset di `app/Providers/Filament/AdminPanelProvider.php` (default `/admin`).
- Base URL API untuk frontend diatur oleh axios instance `resources/js/core/api/axios.js` (default `http://127.0.0.1:8000/api`).

## Lisensi
MIT License.
