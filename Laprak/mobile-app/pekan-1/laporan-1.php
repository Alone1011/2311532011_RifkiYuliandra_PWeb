<?php
// Di bagian atas file
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once __DIR__ . '/../../pekan-6/config/Database.php';
include_once __DIR__ . '/../../pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 7; // ID artikel untuk laporan Dart
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;

?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Praktikum Dart - Rifki Yuliandra</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="/Assets/laporan-styles.css" />
    <style>
      .blog-header {
        background: linear-gradient(
          135deg,
          var(--primary) 0%,
          var(--secondary) 100%
        );
        padding: 8rem 0 4rem;
        color: #ecfefe;
      }
      .theory-card {
        background: var(--primary);
        padding: 1.5rem;
        border-radius: 10px;
        border: 2px solid var(--accent);
        transition: transform 0.3s;
      }
      .theory-card:hover {
        transform: translateY(-5px);
      }
      .step-card {
        border-left: 4px solid var(--accent);
        margin: 2rem 0;
        padding-left: 1.5rem;
      }
      .step-number {
        display: inline-block;
        width: 35px;
        height: 35px;
        background: var(--accent);
        color: white;
        border-radius: 50%;
        text-align: center;
        line-height: 35px;
        margin-right: 1rem;
      }
      .implementation-list li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 0.5rem;
      }
      .implementation-list li:before {
        content: "▹";
        position: absolute;
        left: 0;
        color: var(--accent);
      }
    </style>
  </head>
  <body class="laporan-page">
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-dark fixed-top"
      style="background-color: var(--secondary)"
    >
      <div class="container">
        <a
          class="navbar-brand"
          href="/portfolio/2011/index.html"
          style="color: #006970; font-weight: 700"
          >PORTFOLIO</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#blogNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="blogNav">
          <ul class="navbar-nav ms-auto" style="font-size: 18px">
            <li class="nav-item">
              <a class="nav-link" href="../../../index.html"
                ><i class="fas fa-home me-1"></i>Beranda</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../index.html#blog"
                ><i class="fas fa-arrow-left me-1"></i>Kembali ke Blog</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header Artikel -->
    <header class="blog-header">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../../index.html">Beranda</a></li>
            <li class="breadcrumb-item"><a href="../../../index.html#Blog">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Praktikum 1 - Setup Environment, Dart Dasar dan OOP Dart
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Setup Environment, Dart Dasar dan OOP Dart
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>20 November 2024</span
          >
          <span><i class="fas fa-clock me-1"></i>15 min read</span>
        </div>
      </div>
    </header>

    <!-- Konten Utama -->
    <main class="container py-4 py-lg-5">
      <div class="row g-5 g-lg-5">
        <!-- Artikel -->
        <div class="col-12 col-lg-8">
          <article class="blog-content">
            <!-- Teori Dart -->
            <section class="mb-5">
              <h3 class="section-title">Konsep Dasar Pemrograman Dart</h3>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-list fa-2x mb-3"></i>
                    <h5>List</h5>
                    <p>
                      Tipe data yang berisi kumpulan data (array) dengan akses berdasarkan index.
                      Dapat dimanipulasi dengan menambah, menghapus, atau mengubah elemen.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-project-diagram fa-2x mb-3"></i>
                    <h5>Set</h5>
                    <p>
                      Kumpulan data unik yang tidak berurutan dan tidak memiliki index.
                      Tidak menerima duplikasi data.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-map fa-2x mb-3"></i>
                    <h5>Map</h5>
                    <p>
                      Tipe data key-value yang menggunakan kurung kurawal {}.
                      Key berperan sebagai index dan value sebagai datanya.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-object-group fa-2x mb-3"></i>
                    <h5>OOP Dart</h5>
                    <p>
                      Pemrograman berorientasi objek dengan Dart mendukung class, inheritance,
                      dan konsep OOP lainnya seperti abstraction dan polymorphism.
                    </p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Langkah Implementasi -->
            <section class="mb-5">
              <h3 class="section-title">Langkah Implementasi sesuai Modul</h3>

              <!-- A. Installasi Environment -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">A</span>
                  <h5>Installasi Environment Dart</h5>
                </div>
                <div class="step-content">
                  <h6>Persyaratan Sistem:</h6>
                  <ul class="implementation-list">
                    <li>Windows 10/11, Linux, atau macOS versi terbaru</li>
                    <li>Arsitektur x64, ARM64, atau sesuai sistem</li>
                    <li>Minimal 2GB RAM, disarankan 4GB atau lebih</li>
                    <li>Ruang disk minimal 1.5GB</li>
                  </ul>
                  
                  <h6 class="mt-4">Cara Install di Windows:</h6>
                  <ol>
                    <li>Download SDK Dart dari https://dart.dev/get-dart</li>
                    <li>Extract file ZIP ke direktori yang diinginkan (contoh: C:\tools\dart-sdk)</li>
                    <li>Tambahkan path SDK ke Environment Variables (C:\tools\dart-sdk\bin)</li>
                    <li>Verifikasi instalasi dengan menjalankan perintah <code>dart --version</code> di Command Prompt</li>
                  </ol>
                  
                  <h6 class="mt-4">Install Visual Studio Code dan Extensions:</h6>
                  <ol>
                    <li>Download dan install Visual Studio Code dari https://code.visualstudio.com</li>
                    <li>Buka Extensions Marketplace (Ctrl+Shift+X)</li>
                    <li>Cari dan install extension "Dart"</li>
                    <li>Restart Visual Studio Code</li>
                  </ol>
                </div>
              </div>

              <!-- B. Membuat Project Dart -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">B</span>
                  <h5>Membuat Project Dart Pertama</h5>
                </div>
                <div class="step-content">
                  <h6>Langkah-langkah:</h6>
                  <ol>
                    <li>Buka Command Prompt atau Terminal</li>
                    <li>Navigasi ke direktori yang diinginkan</li>
                    <li>Jalankan perintah: <code>dart create halo</code></li>
                    <li>Masuk ke direktori project: <code>cd halo</code></li>
                    <li>Jalankan project: <code>dart run</code></li>
                  </ol>
                  
                  <h6 class="mt-4">Struktur Project Dart:</h6>
                  <ul class="implementation-list">
                    <li><strong>bin/</strong> - Berisi file executable</li>
                    <li><strong>lib/</strong> - Berisi source code utama</li>
                    <li><strong>test/</strong> - Berisi file testing</li>
                    <li><strong>pubspec.yaml</strong> - File konfigurasi project dan dependencies</li>
                  </ul>
                </div>
              </div>

              <!-- C. Dasar-dasar Dart -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">C</span>
                  <h5>Dasar-dasar Pemrograman Dart</h5>
                </div>
                <div class="step-content">
                  <h6>List:</h6>
                  <div class="code-block">
                    <pre><code>// Membuat list
List<String> fruits = ['Apel', 'Alpukat', 'Nanas', 'Mangga', 'Pisang'];
print(fruits.toString());

// Manipulasi list
fruits.add('Jeruk');
fruits.remove('Alpukat');
fruits[0] = 'Semangka';
fruits.sort();
print(fruits.length);
print(fruits.contains('Mangga'));</code></pre>
                  </div>
                  
                  <h6 class="mt-4">Set:</h6>
                  <div class="code-block">
                    <pre><code>// Membuat set
Set<String> animals = {'Kucing', 'Anjing', 'Kelinci', 'Burung'};
print(animals.toString());

// Manipulasi set
animals.add('Ikan');
animals.remove('Kelinci');
print(animals.length);
print(animals.contains('Anjing'));</code></pre>
                  </div>
                  
                  <h6 class="mt-4">Map:</h6>
                  <div class="code-block">
                    <pre><code>// Membuat map
Map<String, String> productPrices = {
  'Laptop': '10.000.000',
  'Mouse': '200.000',
  'Keyboard': '500.000',
  'Monitor': '2.000.000'
};

// Manipulasi map
productPrices['Printer'] = '1.500.000';
productPrices.remove('Mouse');
productPrices['Laptop'] = '9.500.000';
print(productPrices.length);
print(productPrices.containsKey('Keyboard'));</code></pre>
                  </div>
                  
                  <h6 class="mt-4">Perulangan:</h6>
                  <div class="code-block">
                    <pre><code>// For-in loop
for (var fruit in fruits) {
  print(fruit);
}

// For loop tradisional
for (var i = 0; i < fruits.length; i++) {
  print(fruits[i]);
}

// ForEach untuk map
productPrices.forEach((key, value) {
  print('$key: $value');
});</code></pre>
                  </div>
                </div>
              </div>

              <!-- D. OOP Dart -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">D</span>
                  <h5>Pemrograman Berorientasi Objek (OOP) dalam Dart</h5>
                </div>
                <div class="step-content">
                  <h6>Membuat Class dan Object:</h6>
                  <div class="code-block">
                    <pre><code>class Car {
  // Property
  String color = "";
  String brand = "";
  int year = 0;

  // Method
  void drive() {
    print('The $color $brand is driving.');
  }

  void honk() {
    print('The $color $brand is honking.');
  }
}

// Membuat object
void main() {
  var car1 = Car();
  car1.color = 'Red';
  car1.brand = 'Toyota';
  car1.year = 2020;
  car1.drive();
  car1.honk();
}</code></pre>
                  </div>
                  
                  <h6 class="mt-4">Inheritance (Pewarisan):</h6>
                  <div class="code-block">
                    <pre><code>class Animal {
  void eat() {
    print('The animal is eating.');
  }
}

class Cat extends Animal {
  void meow() {
    print('The cat is meowing.');
  }
}

void main() {
  Cat cat1 = Cat();
  cat1.eat();  // Method dari parent class
  cat1.meow(); // Method dari child class
}</code></pre>
                  </div>
                </div>
              </div>
            </section>

            <!-- Tugas -->
            <section class="mb-5">
              <h3 class="section-title">Tugas: Aplikasi Penghitung Luas dan Volume</h3>
              
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">1</span>
                  <h5>Versi Procedural</h5>
                </div>
                <div class="step-content">
                  <p>Berikut adalah implementasi aplikasi penghitung luas dan volume dengan pendekatan procedural:</p>
                  <div class="code-block">
                    <pre><code>import 'dart:io';
import 'dart:math';

/* Fungsi Bangun Datar */

// luas Persegi
void hitungLuasPersegi() {
  stdout.write("Masukkan sisi persegi: ");
  double sisi = double.parse(stdin.readLineSync()!);
  double luas = sisi * sisi;
  print("Luas Persegi : $luas");
}

// Luas Persegi Panjang
void hitungLuasPersegiPanjang() {
  stdout.write("Masukkan panjang persegi panjang: ");
  double panjang = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan lebar persegi panjang: ");
  double lebar = double.parse(stdin.readLineSync()!);
  double luas = panjang * lebar;
  print("Luas Persegi Panjang : $luas");
}

// Luas Segitiga
void hitungLuasSegitiga() {
  stdout.write("Masukkan alas segitiga: ");
  double alas = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan tinggi segitiga: ");
  double tinggi = double.parse(stdin.readLineSync()!);
  double luas = 0.5 * alas * tinggi;
  print("Luas Segitiga : $luas");
}

// Luas Lingkaran
void hitungLuasLingkaran() {
  stdout.write("Masukkan jari2 lingkaran: ");
  double r = double.parse(stdin.readLineSync()!);
  double luas = pi * r * r;
  print("Luas Lingkaran : $luas");
}

/*Fungsi Bangun Ruang */

// Volume Kubus
void hitungVolumeKubus() {
  stdout.write("Masukkan sisi kubus: ");
  double sisi = double.parse(stdin.readLineSync()!);
  double volume = pow(sisi, 3).toDouble();
  print("Volume Kubus = $volume");
}

// Volume Balok
void hitungVolumeBalok() {
  stdout.write("Masukkan panjang balok: ");
  double panjang = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan lebar balok: ");
  double lebar = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan tinggi balok: ");
  double tinggi = double.parse(stdin.readLineSync()!);
  double volume = panjang * lebar * tinggi;
  print("Volume Balok = $volume");
}

// Volume Prisma Segitiga
void hitungVolumePrismaSegitiga() {
  stdout.write("Masukkan alas segitiga: ");
  double a = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan tinggi segitiga: ");
  double tA = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan tinggi prisma: ");
  double tP = double.parse(stdin.readLineSync()!);
  double luasAlas = 0.5 * a * tA;
  double volume = luasAlas * tP;
  print("Volume Prisma Segitiga = $volume");
}

// Volume Limas
void hitungVolumeLimas() {
  stdout.write("Masukkan panjang alas: ");
  double p = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan lebar alas: ");
  double l = double.parse(stdin.readLineSync()!);
  stdout.write("Masukkan tinggi limas: ");
  double t = double.parse(stdin.readLineSync()!);
  double luasAlas = p * l;
  double volume = (luasAlas * t) / 3;
  print("Volume Limas = $volume");
}

/* Dashboard Menu Utama */
void main() {
  while (true) {
    print("\n=== Aplikasi Hitung Bangun ===");
    print("1. Bangun Datar");
    print("2. Bangun Ruang");
    print("3. Keluar");
    stdout.write("Pilih menu: ");
    String? pilihan = stdin.readLineSync();

    switch (pilihan) {
      case '1':
        menuBangunDatar();
        break;
      case '2':
        menuBangunRuang();
        break;
      case '3':
        print("Terimakasih sudah menggunakan aplikasi ini!");
        exit(0);
      default:
        print("Pilihan tidak valid!");
    }
  }
}

// Sub Menu Bangun Datar
void menuBangunDatar() {
  while (true) {
    print("\n=== Menu Bangun Datar ===");
    print("1. Luas Persegi");
    print("2. Luas Persegi Panjang");
    print("3. Luas Segitiga");
    print("4. Luas Lingkaran");
    print("0. Kembali");
    stdout.write("Pilih menu: ");
    String? pilihan = stdin.readLineSync();

    switch (pilihan) {
      case '1':
        hitungLuasPersegi();
        break;
      case '2':
        hitungLuasPersegiPanjang();
        break;
      case '3':
        hitungLuasSegitiga();
        break;
      case '4':
        hitungLuasLingkaran();
        break;
      case '0':
        return;
      default:
        print("Pilihan tidak valid!");
    }
  }
}

// Sub Menu Bangun Ruang
void menuBangunRuang() {
  while (true) {
    print("\n=== Menu Bangun Ruang ===");
    print("1. Volume Kubus");
    print("2. Volume Balok");
    print("3. Volume Prisma Segitiga");
    print("4. Volume Limas");
    print("0. Kembali");
    stdout.write("Pilih menu: ");
    String? pilihan = stdin.readLineSync();

    switch (pilihan) {
      case '1':
        hitungVolumeKubus();
        break;
      case '2':
        hitungVolumeBalok();
        break;
      case '3':
        hitungVolumePrismaSegitiga();
        break;
      case '4':
        hitungVolumeLimas();
        break;
      case '0':
        return;
      default:
        print("Pilihan tidak valid!");
    }
  }
}</code></pre>
                  </div>
                </div>
              </div>

              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">2</span>
                  <h5>Versi OOP</h5>
                </div>
                <div class="step-content">
                  <p>Berikut adalah implementasi aplikasi penghitung luas dan volume dengan pendekatan OOP:</p>
                  <p>Untuk link githubnya yaitu:  </p>
                  <div class="code-block">
                    <pre><code>import 'dart:io';
import 'dart:math';

// Abstract class
abstract class BangunDatar {
  double hitungLuas();
}

abstract class BangunRuang {
  double hitungVolume();
}

/* Kelas Bangun Datar */

// Kelas persegi
class Persegi extends BangunDatar {
  double sisi;
  Persegi(this.sisi);

  @override
  double hitungLuas() => sisi * sisi;
}

// Kelas persegi panjang
class PersegiPanjang extends BangunDatar {
  double panjang, lebar;
  PersegiPanjang(this.panjang, this.lebar);

  @override
  double hitungLuas() => panjang * lebar;
}

// Kelas segitiga
class Segitiga extends BangunDatar {
  double alas, tinggi;
  Segitiga(this.alas, this.tinggi);

  @override
  double hitungLuas() => 0.5 * alas * tinggi;
}

// Kelas lingkaran
class Lingkaran extends BangunDatar {
  double r;
  Lingkaran(this.r);

  @override
  double hitungLuas() => pi * r * r;
}

/* Kelas Bangun Ruang */

// Kelas Kubus
class Kubus extends BangunRuang {
  double sisi;
  Kubus(this.sisi);

  @override
  double hitungVolume() => pow(sisi, 3).toDouble();
}

// Kelas Balok
class Balok extends BangunRuang {
  double panjang, lebar, tinggi;
  Balok(this.panjang, this.lebar, this.tinggi);

  @override
  double hitungVolume() => panjang * lebar * tinggi;
}

// Kelas Prisma Segitiga
class PrismaSegitiga extends BangunRuang {
  double alas, tA, tP;
  PrismaSegitiga(this.alas, this.tA, this.tP);

  @override
  double hitungVolume() => (0.5 * alas * tA) * tP;
}

// Kelas Limas
class Limas extends BangunRuang {
  double panjangAlas, lebarAlas, tinggi;
  Limas(this.panjangAlas, this.lebarAlas, this.tinggi);

  @override
  double hitungVolume() => (panjangAlas * lebarAlas * tinggi) / 3;
}

/* Dashboard Menu Utama */
void main() {
  while (true) {
    print("\n=== Aplikasi Hitung Bangun ===");
    print("1. Bangun Datar");
    print("2. Bangun Ruang");
    print("3. Keluar");
    stdout.write("Pilih menu: ");
    String? pilihan = stdin.readLineSync();

    switch (pilihan) {
      case '1':
        menuBangunDatar();
        break;
      case '2':
        menuBangunRuang();
        break;
      case '3':
        print("Terimakasih sudah menggunakan aplikasi ini!");
        exit(0);
      default:
        print("Pilihan tidak valid!");
    }
  }
}

// Menu Bangun Datar
void menuBangunDatar() {
  while (true) {
    print("\n=== Menu Bangun Datar ===");
    print("1. Luas Persegi");
    print("2. Luas Persegi Panjang");
    print("3. Luas Segitiga");
    print("4. Luas Lingkaran");
    print("0. Kembali");
    stdout.write("Pilih menu: ");
    String? pilihan = stdin.readLineSync();

    switch (pilihan) {
      case '1':
        stdout.write("Masukkan sisi: ");
        double sisi = double.parse(stdin.readLineSync()!);
        var persegi = Persegi(sisi);
        print("Luas Persegi = ${persegi.hitungLuas()}");
        break;
      case '2':
        stdout.write("Masukkan panjang: ");
        double p = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan lebar: ");
        double l = double.parse(stdin.readLineSync()!);
        var persegiPanjang = PersegiPanjang(p, l);
        print("Luas Persegi Panjang = ${persegiPanjang.hitungLuas()}");
        break;
      case '3':
        stdout.write("Masukkan alas: ");
        double a = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan tinggi: ");
        double t = double.parse(stdin.readLineSync()!);
        var segitiga = Segitiga(a, t);
        print("Luas Segitiga = ${segitiga.hitungLuas()}");
        break;
      case '4':
        stdout.write("Masukkan jari-jari: ");
        double r = double.parse(stdin.readLineSync()!);
        var lingkaran = Lingkaran(r);
        print("Luas Lingkaran = ${lingkaran.hitungLuas()}");
        break;
      case '0':
        return;
      default:
        print("Pilihan tidak valid!");
    }
  }
}

// Menu Bangun Ruang
void menuBangunRuang() {
  while (true) {
    print("\n=== Menu Bangun Ruang ===");
    print("1. Volume Kubus");
    print("2. Volume Balok");
    print("3. Volume Prisma Segitiga");
    print("4. Volume Limas");
    print("0. Kembali");
    stdout.write("Pilih menu: ");
    String? pilihan = stdin.readLineSync();

    switch (pilihan) {
      case '1':
        stdout.write("Masukkan sisi: ");
        double sisi = double.parse(stdin.readLineSync()!);
        var kubus = Kubus(sisi);
        print("Volume Kubus = ${kubus.hitungVolume()}");
        break;
      case '2':
        stdout.write("Masukkan panjang: ");
        double p = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan lebar: ");
        double l = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan tinggi: ");
        double t = double.parse(stdin.readLineSync()!);
        var balok = Balok(p, l, t);
        print("Volume Balok = ${balok.hitungVolume()}");
        break;
      case '3':
        stdout.write("Masukkan alas: ");
        double a = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan tinggi alas: ");
        double tA = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan tinggi prisma: ");
        double tP = double.parse(stdin.readLineSync()!);
        var prismaSegitiga = PrismaSegitiga(a, tA, tP);
        print("Volume Prisma Segitiga = ${prismaSegitiga.hitungVolume()}");
        break;
      case '4':
        stdout.write("Masukkan panjang alas: ");
        double pa = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan lebar alas: ">
        double la = double.parse(stdin.readLineSync()!);
        stdout.write("Masukkan tinggi: ");
        double t = double.parse(stdin.readLineSync()!);
        var limas = Limas(pa, la, t);
        print("Volume Limas = ${limas.hitungVolume()}");
        break;
      case '0':
        return;
      default:
        print("Pilihan tidak valid!");
    }
  }
}</code></pre>
                  </div>
                </div>
              </div>
            </section>

            <!-- Kesimpulan -->
            <section class="mb-5">
              <h3 class="section-title">Kesimpulan</h3>
              <div class="card">
                <div class="card-body">
                  <p>Dalam praktikum ini, kita telah mempelajari:</p>
                  <ol>
                    <li>Cara menginstall environment Dart dan Visual Studio Code</li>
                    <li>Dasar-dasar pemrograman Dart termasuk List, Set, Map, dan perulangan</li>
                    <li>Konsep OOP dalam Dart dengan membuat class, object, dan inheritance</li>
                    <li>Membuat aplikasi sederhana untuk menghitung luas bangun datar dan volume bangun ruang</li>
                    <li>Implementasi aplikasi dengan pendekatan procedural dan OOP</li>
                  </ol>
                  <p>Pemahaman tentang dasar-dasar Dart sangat penting sebelum melanjutkan ke framework Flutter untuk pengembangan aplikasi mobile. Dengan menguasai konsep-konsep ini, kita akan lebih mudah dalam mempelajari Flutter dan membuat aplikasi mobile yang lebih kompleks.</p>
                  <p>Untuk link Praktikum dan Tugas dapat diakses pada link : <a href="https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git">https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git</a></p>
                </div>
              </div>
            </section>

            <section class="mb-5">
              <h3 class="section-title">Komentar (<?= $total_komentar ?>)</h3>

              <!-- Form Komentar -->
              <div class="card mb-4">
                  <div class="card-body">
                      <h5 class="card-title">Tinggalkan Komentar</h5>
                      <form action="function/Komentar.php" method="POST">
                          <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                          <input type="hidden" name="id_artikel" value="7"> 
                          
                          <div class="mb-3">
                              <label class="form-label">Nama</label>
                              <input type="text" name="nama" class="form-control" required>
                          </div>

                          <div class="mb-3">
                              <label class="form-label">Komentar</label>
                              <textarea name="isi_komentar" class="form-control" rows="3" required></textarea>
                          </div>

                          <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                      </form>
                  </div>
              </div>

              <!-- Daftar Komentar -->
              <div class="komentar-list">
                  <?php
                  $komentar->id_artikel = 7; // Ganti dengan ID artikel untuk laporan Dart
                  $result = $komentar->read();
                  
                  while($row = $result->fetch_assoc()):
                  ?>
                  <div class="card mb-3">
                      <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center mb-2">
                              <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($row['nama']) ?></h6>
                              <small class="text-muted"><?= date('d M Y H:i', strtotime($row['tanggal'])) ?></small>
                          </div>
                          <p class="card-text"><?= nl2br(htmlspecialchars($row['isi_komentar'])) ?></p>
                      </div>
                  </div>
                  <?php endwhile; ?>
              </div>
            </section>
          </article>
        </div>

        <!-- Sidebar -->
        <aside class="col-12 col-lg-4">
          <div class="sticky-top" style="top: 100px">
            <!-- Penulis -->
            <div class="card mb-4 border-0 shadow-sm">
              <div class="card-body text-center">
                <img
                  src="/Assets/images/profil.png"
                  alt="Rifki Yuliandra"
                  class="rounded-circle mb-3"
                  width="120"
                />
                <h5 class="mb-2">Rifki Yuliandra</h5>
                <p class="text-muted small">
                  Mahasiswa Informatika - Universitas Andalas
                </p>
                <div class="social-links">
                  <a
                    href="https://github.com/Alone1011"
                    class="text-decoration-none me-2"
                    ><i class="fab fa-github"></i
                  ></a>
                  <a
                    href="https://www.linkedin.com/in/rifki-yuliandra-957774287/"
                    class="text-decoration-none me-2"
                    ><i class="fab fa-linkedin"></i
                  ></a>
                  <a
                    href="https://www.instagram.com/r_kiylndr_/"
                    class="text-decoration-none"
                    ><i class="fab fa-instagram"></i
                  ></a>
                </div>
              </div>
            </div>

            <!-- Artikel Terkait -->
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <h5 class="mb-3">
                  <i class="fas fa-book-open me-2"></i>Artikel Lainnya
                </h5>
                <div class="list-group">
                  <a
                    href="/portfolio/2011/Laprak/pekan-7/laporan-2.php"
                    class="list-group-item list-group-item-action related-article"
                  >
                    <div class="d-flex justify-content-between">
                      <span>Instalasi dan Konfigurasi Laravel</span>
                      <i class="fas fa-chevron-right"></i>
                    </div>
                    <small class="text-muted">19 Mei 2025</small>
                  </a>
                  <a
                    href="../pekan-8/laporan-3.php"
                    class="list-group-item list-group-item-action related-article"
                  >
                    <div class="d-flex justify-content-between">
                      <span>Pembuatan Halaman Login, Dashboard Menggunakan Framework Laravel - Part 1</span>
                      <i class="fas fa-chevron-right"></i>
                    </div>
                    <small class="text-muted">27 Mei 2025</small>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
      <div class="container text-center">
        <div class="mb-4">
          <a href="https://github.com/Alone1011" class="text-light me-3"
            ><i class="fab fa-github fa-lg"></i
          ></a>
          <a
            href="https://www.linkedin.com/in/rifki-yuliandra-957774287/"
            class="text-light me-3"
            ><i class="fab fa-linkedin fa-lg"></i
          ></a>
          <a href="https://www.instagram.com/r_kiylndr_/" class="text-light"
            ><i class="fab fa-instagram fa-lg"></i
          ></a>
        </div>
        <p>&copy; 2024 Rifki Yuliandra. All rights reserved</p>
      </div>
    </footer>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>