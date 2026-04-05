# 🌐 Proyek Website Portofolio — Pemrograman Web

![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

---

## 📋 Informasi Mahasiswa

| Keterangan | Detail |
|-----------|--------|
| **Nama** | Rifki Yuliandra |
| **NIM** | 2311532011 |
| **Mata Kuliah** | Pemrograman Web (PWeb) |
| **Program Studi** | Sistem Informasi |

---

## 📁 Struktur Direktori

```
2311532011_RifkiYuliandra_PWeb/
│
├── 📄 index.html              # Halaman utama portofolio
├── 📄 sendmail.php            # Script pengiriman email kontak
│
├── 📂 Assets/                 # Aset global (gambar, CSS)
│   ├── images/
│   │   └── laprak/            # Dokumentasi screenshot laporan
│   │       ├── Pekan_7/
│   │       ├── Pekan_8/
│   │       ├── Pekan_9/
│   │       ├── Pekan_10/
│   │       └── mobile-app/
│   └── laporan-styles.css     # Stylesheet untuk halaman laporan
│
├── 📂 Blog/
│   └── TugasApi/              # Tugas integrasi REST API
│       └── TugasApi.php
│
├── 📂 Laprak/                 # Laporan Praktikum
│   ├── pekan-6/               # CRUD Mahasiswa + OOP PHP
│   │   ├── config/
│   │   ├── function/
│   │   ├── model/
│   │   └── laporan-1.php
│   ├── pekan-7/               # Laporan Pekan 7
│   │   └── laporan-2.php
│   ├── pekan-8/               # Laporan Pekan 8
│   │   └── laporan-3.php
│   ├── pekan-9/               # Laporan Pekan 9
│   │   └── laporan-4.php
│   ├── pekan-10/              # Laporan Pekan 10
│   │   └── laporan-5.php
│   └── mobile-app/            # Laporan Praktikum Mobile App
│       ├── pekan-1/
│       ├── pekan-2/
│       ├── pekan-3/
│       └── pekan-4/
│
└── 📂 pweb_6/                 # Aplikasi CRUD Mahasiswa (Pekan 6)
    ├── assets/
    │   ├── css/bootstrap.min.css
    │   └── js/bootstrap.bundle.min.js
    ├── config/
    │   ├── Config.php
    │   └── Database.php
    ├── function/
    │   ├── Alert.php
    │   └── Mahasiswa.php
    ├── model/
    │   └── Mahasiswa.php
    ├── index.php              # Halaman daftar mahasiswa
    ├── create.php             # Halaman tambah mahasiswa
    └── edit.php               # Halaman edit mahasiswa
```

---

## ✨ Fitur Utama

### 🏠 Halaman Portofolio (`index.html`)
- Tampilan profil pribadi
- Daftar skill dan teknologi
- Galeri proyek
- Formulir kontak dengan integrasi email

### 📚 Laporan Praktikum (`Laprak/`)
Berisi dokumentasi dan laporan dari setiap pekan praktikum mata kuliah Pemrograman Web dan Mobile App, meliputi:
- **Pekan 6** — CRUD dengan PHP OOP & MySQL
- **Pekan 7** — Pengembangan lanjutan
- **Pekan 8** — Integrasi fitur tambahan
- **Pekan 9** — Pengujian dan validasi
- **Pekan 10** — Finalisasi dan dokumentasi
- **Mobile App (Pekan 1–4)** — Praktikum pengembangan aplikasi mobile

### 🗄️ Aplikasi CRUD Mahasiswa (`pweb_6/`)
Aplikasi manajemen data mahasiswa berbasis PHP dengan fitur:
- ✅ **Create** — Tambah data mahasiswa baru
- ✅ **Read** — Tampilkan daftar mahasiswa
- ✅ **Update** — Edit data mahasiswa
- ✅ **Delete** — Hapus data mahasiswa
- Menggunakan Bootstrap 5 untuk tampilan responsif

### 🔌 Tugas API (`Blog/TugasApi/`)
- Integrasi dengan REST API menggunakan PHP

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Kegunaan |
|-----------|---------|
| HTML5 | Struktur halaman web |
| CSS3 | Styling dan layout |
| PHP | Backend & logika server |
| MySQL | Database management |
| Bootstrap 5 | Framework CSS responsif |
| JavaScript | Interaktivitas halaman |

---

## ⚙️ Cara Menjalankan

### Prasyarat
- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP)
- Browser modern (Chrome, Firefox, Edge)

### Langkah-langkah

1. **Clone repository ini:**
   ```bash
   git clone https://github.com/Alone1011/2311532011_RifkiYuliandra_PWeb.git
   ```

2. **Pindahkan ke folder htdocs XAMPP:**
   ```
   C:\xampp\htdocs\portfolio\2011\
   ```

3. **Jalankan XAMPP** dan aktifkan **Apache** & **MySQL**

4. **Buat database** di phpMyAdmin (jika diperlukan) sesuai konfigurasi di `pweb_6/config/Config.php`

5. **Akses di browser:**
   ```
   http://localhost/portfolio/2011/index.html         ← Halaman Portofolio
   http://localhost/portfolio/2011/pweb_6/            ← Aplikasi CRUD
   http://localhost/portfolio/2011/Laprak/pekan-6/laporan-1.php  ← Laporan
   ```

---

## 📸 Preview

> Halaman portofolio utama menampilkan profil, skill, dan daftar proyek yang telah dikerjakan selama perkuliahan.

---

## 📝 Lisensi

Proyek ini dibuat untuk keperluan akademik dalam mata kuliah **Pemrograman Web** di Universitas Andalas.

---

<div align="center">
  <p>Dibuat dengan ❤️ oleh <strong>Rifki Yuliandra</strong> — 2311532011</p>
</div>
