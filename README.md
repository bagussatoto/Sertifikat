<div align="center">

# 🎓 E-Certificate Management System
### Sistem Informasi Pengelolaan & Cetak Piagam/Sertifikat Digital Massal

[![Release](https://img.shields.io/github/v/release/bagussatoto/Sertifikat?style=for-the-badge&color=blue)](https://github.com/bagussatoto/Sertifikat/releases)
[![PHP Version](https://img.shields.io/badge/PHP-7.2%20--%207.4-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/Framework-CodeIgniter%203-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)](https://codeigniter.com/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

<p align="center">
  Aplikasi berbasis web modular (HMVC) yang dirancang untuk membantu sekolah, universitas, maupun lembaga pelatihan dalam mengelola data peserta, nilai kompetensi, serta melakukan pencetakan sertifikat fisik/digital secara otomatis, efisien, dan massal.
</p>

[Fitur Utama](#-fitur-utama) •
[Teknologi](#-teknologi-yang-digunakan) •
[Diagram ERD](#-diagram-erd-entity-relationship-diagram) •
[Prasyarat](#-prasyarat-sistem) •
[Instalasi](#-panduan-instalasi) •
[Konfigurasi](#-konfigurasi) •
[Kontribusi](#-kontribusi--dukungan)

---

</div>

## 📌 Sekilas Aplikasi

**E-Certificate Management System** menyederhanakan siklus pembuatan sertifikat mulai dari pengumpulan data peserta, penilaian teknis/non-teknis, hingga pencetakan dokumen PDF beresolusi tinggi. Dilengkapi dengan dukungan kustomisasi template gambar latar (depan & belakang), sistem ini fleksibel untuk berbagai format kegiatan seperti Praktik Kerja Lapangan (PKL), seminar, workshop, maupun pelatihan kejuruan.

---

## ✨ Fitur Utama

| Modul / Fitur | Deskripsi |
| :--- | :--- |
| 📊 **Dashboard Analitik** | Ringkasan statistik data sertifikat terdaftar, distribusi kelas, dan kompetensi keahlian secara *real-time*. |
| 📥 **Import & Export Massal** | Mendukung import data peserta beserta nilai langsung dari berkas Excel (`.xlsx`) dan export rekap data. |
| 🖨️ **Cetak Fleksibel & Cepat** | Cetak perorangan, seleksi khusus via checkbox, atau cetak massal (*bulk print*) dengan pratinjau instan (*Inline PDF Stream*). |
| 🎨 **Template Kustom** | Kelola desain border/background depan dan belakang sertifikat sesuai identitas visual instansi. |
| 🛡️ **Autentikasi Modern** | Sistem login dengan verifikasi password hybrid (`password_hash` & `password_verify` standar PHP) serta proteksi sesi terisolasi. |
| 📱 **Antarmuka Responsif** | Desain UI adaptif berbasis AdminLTE & Bootstrap yang optimal diakses melalui desktop, tablet, maupun smartphone. |

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: [PHP 7.4](https://www.php.net/)
- **Framework**: [CodeIgniter 3 (HMVC Pattern)](https://codeigniter.com/)
- **Database**: [MySQL 5.7+ / MariaDB 10.3+](https://mariadb.org/)
- **PDF Engine**: [HTML2PDF / TCPDF](https://github.com/spipu/html2pdf)
- **Spreadsheet Parser**: [PHPExcel](https://github.com/PHPOffice/PHPExcel)
- **Frontend & UI**: Bootstrap, AdminLTE, jQuery, DataTables, FontAwesome

---

## 📊 Diagram ERD (Entity Relationship Diagram)

Struktur skema relasional basis data yang menghubungkan data peserta sertifikat, penilaian kompetensi, master jurusan, serta manajemen template sertifikat:

```mermaid
erDiagram
    %% Core Certificate & Student Data
    DATA_SERTIFIKAT ||--o{ DATA_NILAITEKNIK : "has (ids)"
    DATA_SERTIFIKAT ||--o| DATA_NILAINONTEKNIK : "has (ids)"
    DATA_SERTIFIKAT }o--|| TM_KELAS : "references (kelas = kode)"
    DATA_SERTIFIKAT }o--|| TM_PROGRAM_KEAHLIAN : "references (program_keahlian = kode)"
    DATA_SERTIFIKAT }o--|| TM_KOMPETENSI_KEAHLIAN : "references (kompetensi_keahlian = kode)"

    %% Master Data Relationships
    TM_PROGRAM_KEAHLIAN ||--o{ TM_KOMPETENSI_KEAHLIAN : "contains (kd_pk)"
    TM_KOMPETENSI_KEAHLIAN ||--o{ TM_ASPEK : "contains (kode_kk)"
    TM_ASPEK ||--o{ DATA_NILAITEKNIK : "evaluated by (kode_aspek)"

    %% Template Management
    TEMP_ELEMENT ||--o{ TEMP_SERTIFIKAT : "defines elements (id_element)"

    %% User & RBAC Management
    MAIN_LEVEL ||--o{ ADMIN : "assigned to (level)"
    ADMIN ||--o{ MAIN_LOG : "generates (id_admin)"
    MAIN_LEVEL ||--o{ MAIN_MENU : "access control (hak_akses)"

    DATA_SERTIFIKAT {
        int id PK
        varchar nis
        varchar nama
        varchar tempat_lahir
        date tanggal_lahir
        varchar kelas FK
        varchar program_keahlian FK
        varchar kompetensi_keahlian FK
        varchar sekolah_asal
        text nama_dudi
        text alamat_dudi
        date tanggal_mulai
        date tanggal_selesai
        varchar lama_pkl
        varchar rt_nilaiteknik
        varchar rt_katteknik
        varchar rt_nilainonteknik
        varchar rt_katnonteknik
    }

    DATA_NILAITEKNIK {
        int id PK
        varchar ids FK "Ref: data_sertifikat.id"
        varchar kode_aspek FK "Ref: tm_aspek.kode"
        varchar angka
        varchar kategori
    }

    DATA_NILAINONTEKNIK {
        int id PK
        varchar ids FK "Ref: data_sertifikat.id"
        varchar nilai_disiplin
        varchar kat_disiplin
        varchar nilai_kerjasama
        varchar kat_kerjasama
        varchar nilai_inisiatif
        varchar kat_inisiatif
        varchar nilai_kerajinan
        varchar kat_kerajinan
        varchar nilai_tanggungjawab
        varchar kat_tanggungjawab
        varchar nilai_sikap
        varchar kat_sikap
    }

    TM_KELAS {
        int id PK
        varchar kode UK
        varchar kelas
    }

    TM_PROGRAM_KEAHLIAN {
        int id PK
        varchar kode UK
        varchar program_keahlian
    }

    TM_KOMPETENSI_KEAHLIAN {
        int id PK
        varchar kode UK
        varchar kompetensi_keahlian
        varchar kd_pk FK "Ref: tm_program_keahlian.kode"
    }

    TM_ASPEK {
        int id PK
        varchar kode UK
        varchar aspek
        int kode_kk FK "Ref: tm_kompetensi_keahlian.kode"
    }

    TEMP_SERTIFIKAT {
        int id_temp PK
        int id_element FK
        varchar nama_temp
        text img_temp "Gambar Depan"
        text img_back "Gambar Belakang"
        enum default_temp "yes / not"
    }

    TEMP_ELEMENT {
        int id_element PK
        varchar name_element
        text element
        varchar el_1
        varchar el_2
        varchar el_5
    }

    ADMIN {
        int id_admin PK
        varchar username
        varchar password
        int level FK
        varchar profilename
        varchar email
        tinyint sts_aktif
    }

    MAIN_LEVEL {
        int id_level PK
        varchar levelname
        text direct
    }

    MAIN_MENU {
        int id_menu PK
        varchar nama
        varchar link
        int hak_akses FK
    }

    MAIN_LOG {
        bigint id_log PK
        int id_admin FK
        varchar nama_user
        varchar table_updated
        text aksi
        datetime tgl
    }
```

---

## 📋 Prasyarat Sistem

Sebelum memasang aplikasi, pastikan environment web server Anda memenuhi kriteria berikut:

- **Web Server**: Apache / Nginx (XAMPP, Laragon, atau Linux Server)
- **Versi PHP**: **PHP 7.2 - 7.4** *(Sangat direkomendasikan PHP 7.4)*
- **Ekstensi PHP Aktif**:
  - `mysqli`
  - `mbstring`
  - `gd` *(untuk manipulasi aset gambar sertifikat)*
  - `zip` & `xml` *(untuk pengolahan file Excel)*
- **Apache Modules**: `mod_rewrite` aktif

---

## 🚀 Panduan Instalasi

### 1. Clone Repositori
Buka terminal dan arahkan ke direktori web server lokal Anda (`htdocs` pada XAMPP atau `www` pada Laragon):

```bash
# Contoh untuk XAMPP di Windows
cd C:/xampp/htdocs

# Clone repositori
git clone https://github.com/bagussatoto/Sertifikat.git sertifikat
cd sertifikat
```

### 2. Setup Database
1. Buka antarmuka pengelola basis data Anda (misal: **phpMyAdmin** di `http://localhost/phpmyadmin`).
2. Buat basis data baru bernama:
   ```sql
   CREATE DATABASE sertifikat CHARACTER SET utf8 COLLATE utf8_general_ci;
   ```
3. Import berkas skrip SQL yang telah disediakan:
   ```text
   db_sertifikat/sertifikat.sql
   ```

---

## ⚙️ Konfigurasi

### 1. Koneksi Database
Buka file `application/config/database.php`. Konfigurasi database sudah mendukung fleksibilitas environment variables dan konfigurasi lokal:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',      // Sesuaikan username database Anda
    'password' => '',          // Sesuaikan password database Anda
    'database' => 'sertifikat',  // Nama database
    'dbdriver' => 'mysqli',
    ...
);
```

> **Tips:** Anda juga dapat menyalin `.env.example` menjadi `.env` jika web server Anda mendukung pembacaan environment variables sistem (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`).

### 2. Base URL
Secara bawaan, aplikasi sudah mendukung *auto-detect base URL*. Jika Anda menempatkan proyek di subdomain atau subdirektori spesifik, sesuaikan pada `application/config/config.php`:

```php
$config['base_url'] = 'http://localhost/sertifikat/';
```

---

## 🖥️ Menjalankan Aplikasi & Kredensial

1. Pastikan modul **Apache** dan **MySQL** pada XAMPP/Laragon sudah berjalan (*running*).
2. Buka browser dan akses alamat aplikasi:
   ```text
   http://localhost/sertifikat/
   ```
3. Masuk ke panel administratif melalui:
   ```text
   http://localhost/sertifikat/login
   ```
   - **Username**: `admin`
   - **Password Default**: `admin123` *(atau sesuaikan dengan database Anda)*

> **Catatan Reset Password:**  
> Jika Anda lupa atau ingin menyetel ulang kata sandi admin secara cepat melalui phpMyAdmin/SQL:
> ```sql
> UPDATE `admin` SET `password` = MD5('admin123') WHERE `username` = 'admin';
> ```
> *(Sistem otomatis memverifikasi hash MD5 maupun password_hash modern saat login).*

---

## 📁 Struktur Direktori

```text
Sertifikat/
├── application/
│   ├── config/          # Konfigurasi sistem, routes, dan database
│   ├── controllers/     # Controller utama
│   ├── core/            # Ekstensi core loader & router HMVC
│   ├── helpers/         # Helper kustom (tanggal, slug, xss)
│   ├── libraries/       # Pustaka utilitas (Tanggal, Excel, Upload)
│   ├── modules/         # Arsitektur modular (login, data_sertifikat, dll)
│   └── views/           # Layout master & template view
├── db_sertifikat/       # Berkas database SQL dump
├── static/              # Third-party library (HTML2PDF engine)
├── theme/               # Asset frontend (CSS, JS, ikon, background template)
├── .env.example         # Template konfigurasi environment
├── format.xlsx          # Format standar berkas Excel untuk import data
└── README.md            # Dokumentasi proyek
```

---

## 👥 Pengembang & Pembuat

Aplikasi ini dikembangkan dengan dedikasi untuk mendukung digitalisasi administrasi pendidikan dan sertifikasi keahlian.

- **Developer**: [Bagus Budi Satoto](https://github.com/bagussatoto)
- **Institusi**: Universitas Amikom Yogyakarta (Teknik Informatika)
- **Surel**: `Bagusbudi1308@gmail.com`

---

## 🤝 Kontribusi & Dukungan

Kontribusi selalu terbuka untuk perbaikan fitur, optimasi performa, maupun pembaruan sistem!

1. **Fork** repositori ini.
2. Buat *feature branch* baru (`git checkout -b fitur/fitur-baru`).
3. Lakukan *commit* perubahan (`git commit -m 'feat: menambahkan fitur cetak barcode'`).
4. *Push* ke branch Anda (`git push origin fitur/fitur-baru`).
5. Buat **Pull Request**.

Jika Anda menemukan kendala atau memiliki ide pengembangan, silakan laporkan melalui halaman **[GitHub Issues](https://github.com/bagussatoto/Sertifikat/issues)**.

---

<div align="center">
  <sub>Dikelola dengan ❤️ oleh <a href="https://github.com/bagussatoto">Bagus Budi Satoto</a>. Hak cipta dilindungi undang-undang.</sub>
</div>
