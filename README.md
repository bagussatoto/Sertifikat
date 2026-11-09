# Aplikasi Cetak Piagam / Sertifikat Digital

Aplikasi Cetak Piagam / Sertifikat berbasis web menggunakan framework **CodeIgniter 3**, **PHP**, dan **MySQL**. Aplikasi ini memudahkan instansi atau penyelenggara kegiatan dalam membuat, mengelola, serta mencetak piagam atau sertifikat secara massal.

---

## 🚀 Fitur Utama
1. **Manajemen Peserta & Nilai**: Input manual satu per satu atau import data massal via file Excel format `.xlsx`.
2. **Cetak Fleksibel**: Cetak sertifikat perorangan, banyak sekaligus (bulk print), atau seleksi khusus via checkbox.
3. **Export Dokumen**: Unduh data dalam format file Excel dan PDF.
4. **Kustomisasi Desain**: Background sertifikat (halaman depan & belakang) dapat diubah sesuai kebutuhan template.
5. **Dashboard Statistik**: Pemantauan jumlah data sertifikat, kelas, dan jurusan/kompetensi keahlian.
6. **Responsif**: Tampilan antarmuka mendukung akses melalui PC/Desktop, laptop, maupun perangkat smartphone/tablet.

---

## 📋 Prasyarat Sistem (System Requirements)
- **Web Server**: Apache / Nginx (XAMPP / Laragon / WampServer)
- **PHP**: Versi **7.2 - 7.4** (disarankan) dengan ekstensi aktif:
  - `php-mysqli`
  - `php-mbstring`
  - `php-gd`
  - `php-zip`
- **Database**: MySQL 5.7+ atau MariaDB 10.3+
- **Mod Rewrite**: Aktif (`mod_rewrite` di Apache)

---

## ⚙️ Panduan Instalasi & Menjalankan Aplikasi

### 1. Clone Repositori
Clone proyek ke dalam direktori root server lokal Anda (`htdocs` untuk XAMPP atau `www` untuk Laragon):

```bash
# Untuk XAMPP
cd C:/xampp/htdocs

# Clone repositori
git clone https://github.com/bagussatoto/Sertifikat.git sertifikat
```

### 2. Setup Database
1. Buka browser dan akses **phpMyAdmin** (`http://localhost/phpmyadmin`).
2. Buat database baru dengan nama `sertifikat`.
3. Pilih database `sertifikat`, lalu buka tab **Import**.
4. Pilih file database yang sudah disediakan di:
   ```
   db_sertifikat/sertifikat.sql
   ```
5. Klik **Go** / **Kirim** dan tunggu hingga proses import tabel selesai.

### 3. Konfigurasi Koneksi Database
Buka file `application/config/database.php` menggunakan text editor (VS Code, Sublime, dll), lalu sesuaikan koneksi database Anda:

```php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',      // Sesuaikan username database Anda
	'password' => '',          // Sesuaikan password database Anda (kosongkan jika default XAMPP)
	'database' => 'sertifikat',  // Nama database
	'dbdriver' => 'mysqli',
	...
);
```

### 4. Konfigurasi Base URL (Opsional)
Buka file `application/config/config.php`:
Aplikasi ini sudah mendukung *auto-detect base_url*. Jika ingin diatur secara manual atau ketika di-deploy ke hosting/server, atur:
```php
$config['base_url'] = 'http://localhost/sertifikat/';
```

### 5. Menjalankan Aplikasi
1. Nyalakan layanan **Apache** dan **MySQL** di panel XAMPP / Laragon.
2. Buka web browser pilihan Anda, lalu akses:
   ```
   http://localhost/sertifikat/
   ```
3. Halaman login admin dapat diakses di:
   ```
   http://localhost/sertifikat/login
   ```
   * **Username Default**: `admin`
   * **Catatan**: Jika ingin mereset password admin ke nilai baru (misalnya `admin123`), Anda dapat mengupdate field `password` pada tabel `admin` di database menggunakan fungsi MD5 MySQL:
     ```sql
     UPDATE `admin` SET `password` = MD5('admin123') WHERE `username` = 'admin';
     ```

---

## 📁 Struktur Direktori Penting
```text
├── application/
│   ├── config/             # Konfigurasi aplikasi, routes, dan database
│   ├── controllers/        # Controller utama
│   ├── libraries/          # Library bantuan (Tanggal, Excel, PDF)
│   └── modules/            # Modul aplikasi (login, data_sertifikat, dashboard, dll)
├── db_sertifikat/          # Source file skrip database (sertifikat.sql)
├── static/                 # Aset pihak ketiga (HTML2PDF, vendor scripts)
├── theme/                  # Template UI & tema CSS/JS/Images
└── format.xlsx             # Template format data excel untuk import data peserta
```

---

## 👨‍💻 Pengembang
- **Nama**: Bagus Budi Satoto
- **Program Studi**: S1 Informatika
- **Institusi**: Universitas Amikom Yogyakarta
- **Kontak / Saran**: `Bagusbudi1308@gmail.com`

---

## 🤝 Kontribusi & Laporan Kendala
Jika Anda menemukan bug, kendala teknis, atau memiliki saran penambahan fitur baru, silakan buka tiket pada menu **[Issues](https://github.com/bagussatoto/Sertifikat/issues)** di repositori GitHub ini.
