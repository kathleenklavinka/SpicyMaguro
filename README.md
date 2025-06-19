# SpicyMaguro

*SpicyMaguro* merupakan sebuah aplikasi berbasis Laravel yang dikembangkan untuk mendukung proses pengelolaan stok dan penjualan dalam sebuah sistem informasi. Aplikasi ini ditujukan untuk membantu pelaku usaha kecil dan menengah dalam memonitor serta mengatur aktivitas operasional seperti manajemen barang, pengguna, supplier, serta pencatatan transaksi penjualan secara efektif dan efisien. Aplikasi ini dibangun menggunakan framework Laravel dengan Blade sebagai template engine, Bootstrap untuk desain antarmuka responsif, dan MySQL sebagai sistem manajemen basis data. Untuk menjalankan aplikasi ini, pengguna perlu mengkloning repositori terlebih dahulu menggunakan perintah git clone https://github.com/kathleenklavinka/SpicyMaguro.git, kemudian masuk ke direktori proyek, melakukan instalasi dependensi dengan composer install, menyalin file konfigurasi menggunakan cp .env.example .env, menjalankan php artisan key:generate, menyesuaikan pengaturan database pada file .env, melakukan migrasi database dengan php artisan migrate, dan akhirnya menjalankan aplikasi secara lokal menggunakan perintah php artisan serve.

---

## Fitur Utama

- Autentikasi pengguna (Register, Login, Logout)
- Dashboard informasi stok dan penjualan
- Manajemen data stok barang
- Manajemen transaksi penjualan
- Pengelolaan data pengguna (Admin dan User)
- Pengelolaan data supplier
- Fitur tambahan: pencarian, filter, sort, dan pagination untuk mempermudah navigasi data

---
