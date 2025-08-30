# DISHUB Padang Panjang
## Aplikasi Web Dinas Perhubungan Padang Panjang

![DISHUB Padang Panjang](https://github.com/user-attachments/assets/19d97998-bb44-4af4-89cb-91d11a3aa8c4)

Aplikasi web-based yang menggunakan Laravel untuk Dinas Perhubungan Padang Panjang. Sistem informasi terintegrasi untuk pelayanan transportasi dan perhubungan yang mudah, cepat, dan terpercaya.

## 🚀 Fitur Utama

* **📧 Sistem Aduan** - Laporkan keluhan atau masalah transportasi langsung kepada pihak berwenang
* **🚐 List Angkot** - Informasi lengkap rute, jadwal, dan tarif angkot di Padang Panjang
* **🚗 Pesan Derek** - Layanan derek 24 jam dengan sistem pemesanan online
* **🅿️ Pesan Parkir** - Reservasi tempat parkir dengan sistem pembayaran terintegrasi
* **📰 News & Info** - Berita terbaru seputar transportasi dan perhubungan
* **👥 Multi-Level Auth** - Sistem otentikasi berlapis untuk admin, petugas, dan pengguna umum

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 5.8
- **Frontend**: Bootstrap 4 (DashForge Template)
- **Database**: MySQL/SQLite
- **Icons**: Font Awesome, Ionicons
- **PHP**: 7.1.3+ (Compatible with PHP 8.x)

## ⚡ Quick Start

### Persyaratan Sistem
- PHP 7.1.3 atau lebih tinggi
- Composer
- MySQL atau SQLite
- Web Server (Apache/Nginx/Built-in PHP Server)

### Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/ChaostixZix/DISHUB-Padang.git
   cd DISHUB-Padang
   ```

2. **Install Dependencies**
   ```bash
   cd laravel
   composer install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   
   Edit file `.env` untuk konfigurasi database:
   ```env
   # Untuk MySQL
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=web-dishub
   DB_USERNAME=root
   DB_PASSWORD=
   
   # Atau untuk SQLite (development)
   DB_CONNECTION=sqlite
   DB_DATABASE=/path/to/database.sqlite
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   php artisan db:seed  # Optional: seed with sample data
   ```

6. **Start Development Server**
   ```bash
   php artisan serve
   ```
   
   Aplikasi akan berjalan di `http://localhost:8000`

## 📱 Demo & Screenshots

### Landing Page
Halaman utama dengan informasi lengkap tentang layanan DISHUB Padang Panjang.

![Landing Page](https://github.com/user-attachments/assets/19d97998-bb44-4af4-89cb-91d11a3aa8c4)

### Fitur-Fitur Utama
- Interface yang responsif dan mudah digunakan
- Desain modern dengan branding DISHUB Padang Panjang
- Navigasi yang intuitif dengan smooth scrolling
- Sistem informasi yang komprehensif

## 🏗️ Struktur Aplikasi

```
DISHUB-Padang/
├── laravel/                 # Laravel application core
│   ├── app/                # Application logic
│   ├── resources/views/    # Blade templates
│   ├── routes/             # Application routes
│   └── database/           # Migrations & seeders
├── public/                 # Public assets & entry point
│   ├── dashforge/          # Frontend template assets
│   ├── css/               # Custom stylesheets
│   ├── js/                # Custom JavaScript
│   └── index.php          # Application entry point
└── screenshots/           # Application screenshots
```

## 🔐 User Roles & Permissions

### 1. **Admin**
- Manajemen pengguna dan verifikasi akun
- Kelola data angkot dan jurusan
- Monitor semua pesanan (derek, parkir)
- Kelola konten berita dan pengumuman

### 2. **Petugas**
- Akses terbatas sesuai divisi
- Update status pesanan
- Kelola data operasional

### 3. **User/Masyarakat**
- Buat aduan transportasi
- Pesan layanan derek dan parkir
- Lihat informasi angkot dan berita
- Kelola profil personal

## 📋 Fitur Lengkap

### Sistem Aduan
- Form pengaduan online
- Upload gambar pendukung
- Tracking status aduan
- Notifikasi progress

### Manajemen Angkot
- Database rute dan supir
- Penjadwalan operasional
- Monitoring real-time

### Layanan Derek
- Pemesanan online 24/7
- Kalkulasi jarak dan biaya
- Tracking lokasi
- Invoice digital

### Sistem Parkir
- Reservasi tempat parkir
- Pembayaran terintegrasi
- Pencarian berdasarkan plat nomor
- Riwayat transaksi

## 🌐 API Endpoints

Aplikasi menyediakan berbagai endpoint untuk integrasi:

- `/api/angkot` - Data angkot dan rute
- `/api/derek` - Layanan derek
- `/api/parkir` - Sistem parkir
- `/api/aduan` - Sistem pengaduan

## 🤝 Kontribusi

Kami menerima kontribusi untuk pengembangan aplikasi ini. Silakan:

1. Fork repository
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📞 Kontak & Support

**Dinas Perhubungan Padang Panjang**

- 📍 **Alamat**: Jl. Sudirman No. 123, Padang Panjang, Sumatera Barat
- 📞 **Telepon**: (0752) 123456
- 📱 **Mobile**: 0812-3456-7890
- 📧 **Email**: dishub@padangpanjang.go.id
- 🌐 **Website**: info@dishubpadangpanjang.id

## 📄 Lisensi

© 2024 DINAS PERHUBUNGAN PADANG PANJANG. Semua hak cipta dilindungi.

---

**Dibuat dengan ❤️ untuk melayani masyarakat Padang Panjang**
