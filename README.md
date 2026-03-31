# Ruang Dokumentasi & Catatan - Muhammad Anjas Zakaria
## Tentang Proyek
Proyek ini adalah website yang berfungsi ganda sebagai portofolio dan dokumentasi pribadi. Website ini dibangun untuk menampilkan hasil karya, studi kasus pengembangan web, serta mencatat eksperimen kode dan pemecahan masalah selama mempelajari teknologi baru.
## Fitur Utama
- **Catatan Kode:** Sistem artikel dengan fitur syntax highlighter menggunakan Prism.js untuk menampilkan potongan kode secara rapi, dilengkapi fitur salin kode.
- **Portofolio:** Halaman untuk mendokumentasikan proyek yang pernah dikerjakan secara individu maupun kelompok, beserta rincian peran masing-masing kolaborator.
- **Panel Admin:** Sistem manajemen konten dinamis menggunakan Filament PHP untuk mengelola artikel, portofolio, dan gambar.
## Teknologi yang Digunakan
- **Backend:** Laravel
- **Admin Panel:** Filament PHP
- **Frontend:** Blade Templating & Tailwind CSS
- **Syntax Highlighter:** Prism.js
## Cara Menjalankan Proyek (Lokal)
Untuk menjalankan proyek ini di komputer lokal, ikuti langkah-langkah berikut:
1. Clone repository:
   ```bash
   git clone [https://github.com/USERNAME_GITHUB/NAMA_REPO.git](https://github.com/USERNAME_GITHUB/NAMA_REPO.git)
   
2. Masuk ke direktori proyek:
   cd NAMA_REPO
   
3. Install dependency(jika belum):
   composer install
   npm install && npm run build
   
4. Konfigurasi environtment:
   cp .env.example .env
   php artisan key:generate
   
5. Jalankan migrasi Database:
   php artisan migrate

6. Jalankan Server Lokal
   php artisan serve
   Akses http://localhost:8000 di browser.
   
