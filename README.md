## Nama Project : TokoLokal

TokoLokal adalah website e-commerce yang dibangun menggunakan **React** (frontend) dan **Laravel** (backend).  
Proyek ini dirancang untuk mempermudah proses jual-beli produk lokal dengan tampilan yang modern.

---

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
```bash
git clone https://github.com/username/TokoLokal.git
cd TokoLokal
```

### 2. Setup Backend (Laravel)
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

### 3. Setup Frontend (React)
```bash
cd frontend
npm install
npm run dev
```

Pastikan backend sudah berjalan di `http://127.0.0.1:8000`  
dan frontend di `http://localhost:5173`

---

## Struktur Direktori

```
TokoLokal/
├── backend/               # Laravel API (server)
│   ├── app/
│   ├── routes/
│   ├── database/
│   └── ...
├── frontend/              # React client
│   ├── src/
│   ├── public/
│   └── ...
└── README.md
```

---

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

Proyek ini berada di bawah lisensi **MIT License** — bebas digunakan dan dimodifikasi dengan tetap mencantumkan kredit kepada pengembang asli.
