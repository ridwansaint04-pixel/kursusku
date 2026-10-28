KursusKu

Deskripsi

KursusKu adalah aplikasi web sederhana berbasis Laravel untuk menampilkan informasi kursus pilihan. Aplikasi ini dibuat untuk praktikum Pemrograman Web III.

Teknologi

- PHP 8.3
- Laravel
- Blade Template
- HTML dan CSS

Fitur

- Menampilkan halaman utama KursusKu.
- Menampilkan daftar kursus pilihan dari Controller.
- Menggunakan Blade untuk menampilkan data kursus.
- Menampilkan gambar dan desain responsif.
- Menampilkan halaman 404 untuk alamat yang tidak terdaftar.

Struktur File Utama

- "routes/web.php": mendefinisikan route halaman utama.
- "app/Http/Controllers/HomeController.php": menyiapkan nama situs dan data kursus.
- "resources/views/home.blade.php": menampilkan halaman menggunakan Blade.
- "public/css/style.css": mengatur tampilan dan responsivitas.
- "public/images/hero-kursus.jpg": gambar utama.

Cara Menjalankan

1. Buka terminal di folder proyek "kursusku".
2. Jalankan "php artisan serve".
3. Buka alamat lokal yang ditampilkan terminal pada browser.

Pengujian

- Route halaman utama berhasil diperiksa menggunakan "php artisan route:list".
- Penambahan data kursus berhasil ditampilkan pada halaman.
- Perubahan judul pada Blade berhasil ditampilkan.
- Tampilan mobile berhasil diuji.
- Alamat "/abc" menampilkan halaman 404.

Catatan

Data kursus disimpan dalam array pada Controller. Aplikasi ini belum menggunakan database.