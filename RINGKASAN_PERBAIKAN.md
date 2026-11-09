# Ringkasan Evaluasi, Perbaikan, & Optimalisasi Proyek Sertifikat

**Tanggal**: 09 November 2026  
**Repository**: [bagussatoto/Sertifikat](https://github.com/bagussatoto/Sertifikat)  
**Branch**: `main`  
**Release Tag**: [`v1.0.0`](https://github.com/bagussatoto/Sertifikat/releases/tag/v1.0.0) & [`v1.1.0`](https://github.com/bagussatoto/Sertifikat/releases/tag/v1.1.0)

---

## 📌 Latar Belakang
Evaluasi dilakukan untuk memeriksa dan memperbaiki error pada aplikasi cetak piagam/sertifikat berbasis **CodeIgniter 3**, **PHP**, dan **MySQL**, serta merapikan struktur file, keamanan, dokumentasi, dan integrasi repositori GitHub.

---

## 🛠️ Ringkasan Pekerjaan yang Telah Diselesaikan

### 1. Evaluasi & Perbaikan Bug Kode (PHP)
- **Fix Login Header Error (`Cannot modify header information - headers already sent`)**:
  - **Lokasi**: [`application/modules/login/models/M_login.php`](application/modules/login/models/M_login.php)
  - **Penyebab**: Terdapat trailing whitespace liar setelah tag penutup `?>` di akhir file.
  - **Solusi**: Menghapus penutup `?>` dan whitespace (sesuai standar PSR-12 / CodeIgniter).
- **Fix Tanggal Helper Notice (`Undefined offset: 1 / 2` & `Undefined variable: dataBulan`)**:
  - **Lokasi**: [`application/libraries/Tanggal.php`](application/libraries/Tanggal.php)
  - **Penyebab**: Fungsi `tglbulanThn()` langsung memecah string tanggal dengan `explode("-", $id)` tanpa validasi panjang array.
  - **Solusi**: Menambahkan guard condition untuk input kosong/tidak valid dan mapping array bulan dengan fallback aman.
- **Fix Certificate Preview Notice (`Trying to get property of non-object`)**:
  - **Lokasi**:
    - [`application/modules/data_sertifikat/views/priview_sertifikat.php`](application/modules/data_sertifikat/views/priview_sertifikat.php)
    - [`application/modules/data_sertifikat/views/priviewhal1_sertifikat.php`](application/modules/data_sertifikat/views/priviewhal1_sertifikat.php)
    - [`application/modules/data_sertifikat/views/priviewhal2_sertifikat.php`](application/modules/data_sertifikat/views/priviewhal2_sertifikat.php)
  - **Penyebab**: Properti `$data->tanggal_lahir`, `$data->tanggal_mulai`, dan `$data->tanggal_selesai` diakses langsung tanpa pengecekan saat record kosong/null.
  - **Solusi**: Menambahkan validasi `isset()` sebelum nilai dikirim ke fungsi helper tanggal.

---

### 2. Penanganan Masalah Cetak PDF (Opsi B)
- **Fix Permission Denied pada `view.pdf`**:
  - **Lokasi**: 
    - [`application/modules/data_sertifikat/controllers/Data_sertifikat.php`](application/modules/data_sertifikat/controllers/Data_sertifikat.php)
    - [`application/modules/data_template/controllers/Data_template.php`](application/modules/data_template/controllers/Data_template.php)
  - **Penyebab**: Penggunaan `$html2pdf->Output('view.pdf', 'FI')` memaksa pembuatan file statis `view.pdf` di root project, sehingga memicu `fopen(view.pdf): Permission denied` saat file sedang diakses atau terjadi konflik multi-user.
  - **Solusi**: Mengubah mode output menjadi HTTP Inline Streaming langsung ke browser/iframe (`Output($filename, 'I')`) dengan nama file dinamis (`sertifikat_{id}.pdf`), serta menghapus file fisik `view.pdf` dari repositori.

---

### 3. Pembaruan Dokumentasi Instalasi & Penggunaan (Opsi C)
- **Pembaruan [`README.md`](README.md)**:
  - Menyusun panduan lengkap mulai dari prasyarat sistem (rekomendasi **PHP 7.2 - 7.4**, MySQL, ekstensi PHP penting).
  - Langkah instalasi step-by-step: `git clone`, import database [`db_sertifikat/sertifikat.sql`](db_sertifikat/sertifikat.sql) via phpMyAdmin, serta konfigurasi database dan base URL.
  - Penjelasan akun admin default (`admin`) beserta cara reset password via query MySQL.
  - Struktur direktori penting dan template import Excel ([`format.xlsx`](format.xlsx)).

---

### 4. Peningkatan Keamanan & Git Hygiene (Opsi A)
- **Hybrid Password Hashing**:
  - **Lokasi**: [`M_login.php`](application/modules/login/models/M_login.php) dan [`application/modules/profile/models/Model.php`](application/modules/profile/models/Model.php).
  - **Solusi**: Mendukung enkripsi password modern native PHP (`password_hash()` & `password_verify()`) dengan tetap mempertahankan backward compatibility untuk hash `md5()` lama.
- **Konfigurasi Database via Environment Variables**:
  - **Lokasi**: [`application/config/database.php`](application/config/database.php) dan [`.env.example`](.env.example).
  - **Solusi**: Mendukung pembacaan `DB_HOST`, `DB_USER`, `DB_PASS`, dan `DB_NAME` dari environment server, dengan fallback ke konfigurasi lokal default.
- **Git Ignore & Proteksi Folder**:
  - Menyesuaikan [`.gitignore`](.gitignore) agar mengabaikan file temporary PDF, error logs, cache, environment files (`.env`), dan metadata IDE.

---

### 5. Pembersihan File Sisa & Duplikat (Cleanliness)
- Menghapus controller duplikat/tidak terpakai:
  - `application/controllers/Publik - Copy.php`
  - `application/controllers/Portfolio-.php`
- Menghapus 9 file log lama (tahun 2020-2021) yang sebelumnya terlanjur ter-track di Git (~23.700 baris log teks terhapus).
- Menambahkan [`application/logs/index.html`](application/logs/index.html) untuk mencegah *directory listing* web server.

---

## 📈 Riwayat Rilis & Commit Terkait

1. **Tag `v1.0.0`**: Rilis stabil pertama setelah perbaikan error login, parsing tanggal, dan null-safety preview.
2. **Tag `v1.1.0`**: Rilis pembaruan fitur inline streaming PDF, hybrid password authentication, environment database credentials, pembaruan dokumentasi, dan pembersihan file duplikat.

---

## 🏁 Status Akhir
- **Working Tree**: `Clean` (tidak ada uncommitted changes).
- **Remote**: Sinkron 100% dengan branch `main` di GitHub.
- **Kondisi Aplikasi**: Stabil, aman, siap dijalankan di server lokal (XAMPP/Laragon) maupun hosting.
