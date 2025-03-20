```markdown
# Sistem Manajemen Perpustakaan

## Tujuan Proyek

Proyek ini dikembangkan sebagai bagian dari Ujian Kompetensi Kejuruan (UKK) untuk membuktikan kemampuan dalam membangun sistem berbasis web menggunakan Laravel 11. Sistem ini bertujuan untuk mempermudah pengelolaan perpustakaan, termasuk manajemen pengguna, peminjaman buku, serta penerapan denda bagi keterlambatan pengembalian buku.

## Fitur Utama

- Manajemen pengguna dengan peran **admin, petugas, dan peminjam**
- Registrasi peminjam dengan sistem persetujuan oleh admin
- Manajemen buku dan kategori
- Peminjaman dan pengembalian buku
- Penerapan denda untuk peminjam yang terlambat mengembalikan buku
- Sistem notifikasi untuk status peminjaman
- Pembuatan laporan terkait peminjaman dan pengembalian
- Implementasi trigger dalam database sebagai syarat UKK

## Teknologi yang Digunakan

- **Laravel 11** - Framework PHP untuk pengembangan backend
- **MySQL** - Database untuk menyimpan data perpustakaan
- **Bootstrap/Tailwind** - Framework CSS untuk tampilan yang responsif
- **JavaScript & Vue.js** - Untuk meningkatkan interaktivitas halaman

## Instalasi

```bash
# Clone repositori
 git clone https://github.com/username/repo-perpustakaan.git

# Masuk ke direktori proyek
 cd repo-perpustakaan

# Install dependensi Laravel
 composer install

# Buat file .env dari .env.example dan atur konfigurasi database

# Generate application key
 php artisan key:generate

# Jalankan migrasi database
 php artisan migrate

# Jalankan server lokal
 php artisan serve
```

## Penggunaan

1. **Admin** dapat mengelola pengguna, buku, dan melihat laporan.
2. **Petugas** dapat memproses peminjaman dan pengembalian buku.
3. **Peminjam** dapat melakukan registrasi, meminjam buku, serta melihat status peminjaman dan denda.

## Lisensi

Proyek ini dikembangkan sebagai bagian dari Ujian Kompetensi Kejuruan dan bebas digunakan untuk keperluan pendidikan.
```

