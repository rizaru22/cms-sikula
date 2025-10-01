# 📚 CMS-Sikula

CMS-Sikula adalah **Content Management System** berbasis **Laravel + Livewire 3** yang dirancang khusus untuk kebutuhan **website sekolah**.  
Dengan CMS ini, sekolah dapat mengelola berita, profil, tautan, hingga konten halaman dengan mudah, cepat, dan responsif.

---

## ✨ Fitur Utama
- 📰 **Manajemen Berita**  
  Tambah, edit, hapus, dan tampilkan berita dengan pagination dan pencarian real-time.
- 🏫 **Profil Sekolah**  
  Atur visi, misi, alamat, kontak, dan logo sekolah.
- 🔗 **Manajemen Tautan**  
  Tambahkan tautan penting seperti PPDB Online, E-Learning, atau link eksternal.
- 🖼️ **Carousel/Galeri**  
  Upload gambar carousel untuk mempercantik halaman depan.
- 🎨 **Tampilan Responsif**  
  Dibangun dengan **Bootstrap 5** dan **Bootstrap Icons**.
- ⚡ **Realtime dengan Livewire**  
  Interaksi lebih dinamis tanpa perlu reload halaman.
- 🔐 **Autentikasi**  
  Login admin untuk mengelola konten (Laravel default authentication).
  
---

## 🚀 Teknologi yang Digunakan
- [Laravel 11](https://laravel.com) - PHP Framework
- [Livewire 3](https://livewire.laravel.com/) - Full-stack framework untuk Laravel
- [Bootstrap 5.3](https://getbootstrap.com) - Frontend CSS Framework
- [Bootstrap Icons](https://icons.getbootstrap.com) - Icon library
- [MySQL/MariaDB](https://www.mysql.com) - Database

---

## 📦 Instalasi

1. Clone repository:
   ```bash
   git clone https://github.com/username/cms-sikula.git
   cd cms-sikula
2. Install depedencies:
   ```bash
   composer install
3. Buat file .env
   ```bash
   cp .env.example .env
4. Generate app key:
    ```bash
    php artisan key:generate
5. Migrasi database & seed:
    ```bash
    php artisan migrate --seed
6. Jalankan Server
    ```bash
    php artisan serve

## 📝 Penggunaan

    Admin Panel → Kelola berita, profil sekolah, carousel, dan tautan.

    Halaman Publik → Pengunjung dapat melihat daftar berita, profil, dan konten sekolah.

    Pencarian Berita → Cari berita dengan fitur pencarian real-time.

## 📄 Lisensi

    CMS-Sikula dirilis di bawah lisensi MIT. Silakan gunakan, modifikasi, dan kembangkan sesuai kebutuhan.