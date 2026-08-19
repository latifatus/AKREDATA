# AKREDATA

## Tentang Sistem

AKREDATA merupakan sistem informasi berbasis web yang dikembangkan sebagai media pendukung dalam pengelolaan data pendukung akreditasi pada Program Studi Teknik Informatika, Universitas Malikussaleh.

Sistem ini dikembangkan dalam rangka pelaksanaan Kerja Praktik (KP). Sebelum adanya AKREDATA, pengelolaan data pendukung akreditasi dilakukan menggunakan Google Spreadsheet. AKREDATA dikembangkan sebagai alternatif untuk membantu proses pengelolaan, penyimpanan, pencarian, dan rekapitulasi data secara lebih terstruktur dan terpusat.

AKREDATA tidak dimaksudkan untuk menggantikan sistem informasi akademik maupun sistem lain yang telah digunakan oleh Program Studi Teknik Informatika Universitas Malikussaleh. Sistem ini berfungsi sebagai media pendukung yang membantu pengarsipan dan pengelolaan data pendukung akreditasi, sehingga proses pencarian, pembaruan, dan rekapitulasi data dapat dilakukan dengan lebih mudah dan efisien.

## Fitur Utama

- Pengelolaan Data Alumni
- Pengelolaan Publikasi Dosen
- Pengelolaan Dokumen Pendukung Akreditasi
- Rekap Tempat Kerja
- Rekap Sumber Pengakuan/Rekognisi
- Pengelolaan Data Profesi Dosen
- Pencarian Data
- Pratinjau Dokumen
- Unduh Dokumen
- Dashboard
- Autentikasi Administrator

## Teknologi yang Digunakan

- Laravel
- PHP
- MySQL
- Tailwind CSS
- Vite
- JavaScript
- LibreOffice

## Instalasi dan Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/latifatus/AKREDATA.git
```

### 2. Masuk ke Direktori Project

```bash
cd AKREDATA
```

### 3. Install Dependency

```bash
composer install
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Sesuaikan konfigurasi database pada file `.env`, kemudian jalankan migrasi:

```bash
php artisan migrate
```

### 7. Jalankan Server Laravel

```bash
php artisan serve
```

### 8. Jalankan Vite

```bash
npm run dev
```

## Pengembangan

**Nama:** Latifatus Zahro  
**NIM:** 230170107  
**Kegiatan:** Kerja Praktik  
**Program Studi:** Teknik Informatika  
**Fakultas:** Teknik  
**Universitas:** Universitas Malikussaleh  
**Tahun:** 2026

---

© 2026 Latifatus Zahro
