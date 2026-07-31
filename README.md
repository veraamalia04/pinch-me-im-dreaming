# 🍪 Pinch Me, I'm Dreaming!

## 📖 Deskripsi Aplikasi

**Pinch Me, I'm Dreaming!** merupakan aplikasi berbasis web yang digunakan untuk membantu proses pemesanan dan pengelolaan toko kue. Aplikasi ini dibangun menggunakan **Laravel 13**, dengan tujuan mempermudah pelanggan dalam melakukan pemesanan secara online sekaligus membantu pengelolaan produk, pesanan, dan laporan penjualan.

Aplikasi memiliki empat jenis pengguna (role), yaitu:

- **Customer** → melakukan registrasi, melihat produk, memasukkan produk ke dalam box (keranjang), melakukan pemesanan, melihat riwayat pesanan, dan mengelola alamat.
- **Cashier** → mengelola pesanan pelanggan dan memproses status pesanan.
- **Stocker** → mengelola data produk, mulai dari menambah, mengubah, menghapus produk, hingga memperbarui harga produk.
- **Owner** → melihat laporan penjualan berdasarkan periode harian, mingguan, maupun bulanan.

---

# Informasi akun Demo 

### Semua privilages
- username = vera
- password = vera

### User Biasa
- username = adam
- password = adam

---

# ✨ Fitur Aplikasi

## Customer

- Registrasi akun
- Login
- Melihat daftar produk
- Menambahkan produk ke Box (Keranjang)
- Mengubah jumlah produk
- Checkout pesanan
- Mengelola alamat
- Melihat riwayat pesanan
- Melihat detail pesanan

## Stocker

- Menambah produk
- Mengubah data produk
- Menghapus produk
- Memperbarui harga produk

## Cashier

- Melihat seluruh pesanan
- Memproses pesanan
- Mengubah status pesanan menjadi diproses
- Mengubah status pesanan menjadi dikirim

## Owner

- Dashboard laporan
- Total penjualan
- Jumlah pelanggan
- Jumlah produk terjual
- Filter laporan:
  - Harian
  - Mingguan
  - Bulanan

---

# ⚙️ Teknologi yang Digunakan

- Laravel 13
- PHP 8.3
- SQLite
- Blade Template
- Tailwind CSS
- Vite
- Alpine.js

---

# 💻 Cara Instalasi

## 1. Clone Repository

```bash
git clone https://github.com/username/repository.git
```

Masuk ke folder project

```bash
cd repository
```

---

## 2. Install Dependency PHP

```bash
composer install
```

---

## 3. Install Dependency Frontend

```bash
npm install
```

---

## 4. Copy File Environment

```bash
cp .env.example .env
```

atau Windows

```bash
copy .env.example .env
```

---

## 5. Generate Application Key

```bash
php artisan key:generate
```

---

## 6. Jalankan Migration

```bash
php artisan migrate
```

---

## 7. Membuat Symbolic Link Storage

```bash
php artisan storage:link
```

---

## 8. Menjalankan Vite

```bash
npm run dev
```

---

## 9. Menjalankan Laravel

```bash
php artisan serve
```

Aplikasi dapat diakses melalui

```
http://127.0.0.1:8000
```

---

# 📚 Panduan Penggunaan

## Sebagai Customer

### 1. Registrasi

- Membuat akun baru.
- Login menggunakan username dan password.

### 2. Menambahkan Alamat

Setelah login pertama kali, pengguna diwajibkan mengisi alamat utama yang akan digunakan untuk pengiriman.

### 3. Melihat Produk

Pilih menu produk untuk melihat daftar kue yang tersedia.

### 4. Menambahkan Produk ke Box

Tekan tombol **Tambah ke Box** pada produk yang diinginkan.

### 5. Mengubah Jumlah Produk

Pada halaman Box, jumlah produk dapat ditambah atau dikurangi.

### 6. Checkout

Tekan tombol checkout untuk membuat pesanan.

### 7. Melihat Riwayat Pesanan

Customer dapat melihat seluruh riwayat pesanan beserta statusnya.

---

## Sebagai Stocker

Masuk menggunakan akun Stocker.

Fitur yang tersedia:

- Menambah produk
- Mengedit produk
- Menghapus produk
- Memperbarui harga produk

---

## Sebagai Cashier

Masuk menggunakan akun Cashier.

Fitur:

- Melihat daftar pesanan
- Menandai pesanan menjadi **Diproses**
- Menandai pesanan menjadi **Dikirim**

---

## Sebagai Owner

Masuk menggunakan akun Owner.

Owner dapat melihat:

- Total penjualan
- Jumlah pelanggan
- Produk terjual
- Laporan harian
- Laporan mingguan
- Laporan bulanan

---

# 🔄 Alur Kerja Aplikasi

#  Alur Kerja Sistem

## Pelanggan

```text
Register
    │
    ▼
Login
    │
    ▼
Tambah Alamat
    │
    ▼
Pilih Produk
    │
    ▼
Masukkan ke Cup
    │
    ▼
Checkout
    │
    ▼
Order Dibuat
    │
    ▼
Kasir Memproses
    │
    ▼
Kasir Mengirim
    │
    ▼
Pesanan Diterima
    │
    ▼
Selesai
```

---

## Stocker

```text
Login
   │
   ▼
Dashboard
   │
   ├── Tambah Produk
   ├── Edit Produk
   ├── Update Harga
   └── Hapus Produk
```

---

## Kasir

```text
Login
   │
   ▼
Dashboard
   │
   ▼
Melihat Order
   │
   ▼
Diproses
   │
   ▼
Dikirim
   │
   ▼
Menunggu Konfirmasi Pelanggan
```

---

## Owner

```text
Login
   │
   ▼
Dashboard
   │
   ▼
Laporan Penjualan
   │
   ├── Harian
   ├── Mingguan
   ├── Bulanan
   ├── Total Penjualan
   ├── Total Pembeli
   └── Total Produk Terjual
```

---

1. Customer melakukan registrasi.
2. Customer login ke aplikasi.
3. Customer mengisi alamat utama.
4. Customer memilih produk.
5. Produk dimasukkan ke dalam Box.
6. Customer melakukan checkout.
7. Pesanan masuk ke dashboard Cashier.
8. Cashier memproses pesanan.
9. Cashier mengirim pesanan.
10. Setelah pesanan diterima, Customer menandai pesanan selesai.
11. Data penjualan otomatis masuk ke dashboard Owner.

---

---

# 👥 Anggota Kelompok

| Nama | Kontribusi |
| :--- | :--- |
| **Vera Amalia** | **Lead Back-End & Logic:**<br>• Membangun keseluruhan sistem back-end aplikasi.<br>• Mengerjakan sistem autentikasi pengguna dan middleware.<br>• Membuat tampilan antarmuka (UI) untuk Login, Register, dan halaman Menu.<br>• Membangun fitur manajemen Alamat (Logika back-end sekaligus UI).<br>• Bertanggung jawab atas pembuatan migrasi database dan pengujian aplikasi (Testing). <br>• Membuat dokumentasi. |
| **Andri Yanto Wijaya** | **Front-End (Dashboard) & Assets:**<br>• Mendesain dan membangun antarmuka pengguna (UI) khusus untuk fitur dashboard Kasir, Stocker, dan Owner.<br>• Menambahkan dan mengonfigurasi aset foto produk ke dalam direktori `public/images`.<br>• Membantu pembuatan dan penyusunan UI pada tampilan awal (landing page). |
| **Deseri Lahagu** | **Research & Planning:**<br>• Bertanggung jawab mencari, menyeleksi, dan menyiapkan seluruh foto produk yang digunakan dalam aplikasi.<br>• Menyusun dan merancang User Flow (alur kerja) agar aplikasi logis, terstruktur, dan mudah digunakan oleh tiap peran. |

---

# 📝 Lisensi

Project ini dibuat untuk memenuhi tugas mata kuliah Pengembangan Aplikasi Web dan hanya digunakan untuk keperluan akademik.