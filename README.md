<<<<<<< HEAD
# TokoLokal

TokoLokal adalah website e-commerce yang dibangun dengan Laravel (backend + Vite) dan React (frontend) dalam satu proyek monolit. Panel admin menggunakan Filament 3 untuk mengelola produk, pesanan, dan data pengguna.
=======
## Nama Project : TokoLokal

TokoLokal adalah website e-commerce yang dibangun menggunakan **React** (frontend) dan **Laravel** (backend).  
Proyek ini dirancang untuk mempermudah proses jual-beli produk lokal dengan tampilan yang modern.
>>>>>>> 6e793777d20ebdb2afb43f6c66945242a5a36eb3

## Fitur Utama
- Autentikasi pengguna (Sanctum)
- Manajemen produk + upload gambar
- Keranjang belanja & checkout
- Voucher, alamat, metode pembayaran
- Dashboard admin (Filament) di `/admin`

<<<<<<< HEAD
## Tech Stack
- Frontend: React, Vite, Tailwind CSS, Axios
- Backend: Laravel 12, Filament 3, MySQL
- Auth: Laravel Sanctum

## Instalasi & Setup (single codebase)
1) Clone dan masuk folder
=======
## Fitur Utama

- **Autentikasi Pengguna**
- **Manajemen Produk**
- **Keranjang Belanja (Cart)** 
- **Checkout & Transaksi**
- **Dashboard Admin (Filament)**
  
---

## Tech Stack

| Bagian | Teknologi |
|--------|------------|
| **Frontend** | React, Vite, Tailwind CSS |
| **Backend** | Laravel 11, Filament, MySQL |
| **Autentikasi** | Laravel Sanctum |

---

## Instalasi & Setup Project

### 1. Clone Repository
>>>>>>> 6e793777d20ebdb2afb43f6c66945242a5a36eb3
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

<<<<<<< HEAD
## Struktur Direktori
=======
Pastikan backend sudah berjalan di `http://127.0.0.1:8000`  
dan frontend di `http://localhost:5173`

---

## Struktur Direktori

>>>>>>> 6e793777d20ebdb2afb43f6c66945242a5a36eb3
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

<<<<<<< HEAD
## Lisensi
MIT License.
=======
## Tim Pengembang

| Nama | Peran | Jobdesk |
|------|--------|----------|
| **Muhammad Arifin Dafa** | Frontend Developer | Mengembangkan antarmuka pengguna menggunakan React, integrasi API, dan implementasi komponen dinamis dengan Tailwind. |
| **Muhammad Luqman** | Backend Developer | Membangun REST API dengan Laravel, mengelola database dan autentikasi, serta integrasi dengan Filament untuk dashboard admin. |
| **Allya Putri Ditya** | UI/UX Designer | Mendesain tampilan website di Figma, membuat wireframe, user flow, serta memastikan konsistensi visual dan kemudahan navigasi. |
| **Muhammad Arsy Al-Fahd** | UI/UX Designer | Mengembangkan sistem warna, layout responsif, dan elemen interaktif berbasis user research untuk pengalaman pengguna yang optimal. |

---

## Preview Desain

*(Tambahkan di sini link ke Figma atau screenshot tampilan utama jika sudah ada)*

---

## Lisensi

Proyek ini berada di bawah lisensi **MIT License** â€” bebas digunakan dan dimodifikasi dengan tetap mencantumkan kredit kepada pengembang asli.
>>>>>>> 6e793777d20ebdb2afb43f6c66945242a5a36eb3
