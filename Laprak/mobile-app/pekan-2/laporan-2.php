<?php
// Di bagian atas file
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once __DIR__ . '/../../pekan-6/config/Database.php';
include_once __DIR__ . '/../../pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 8; // ID artikel untuk laporan Flutter
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;

?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Praktikum Flutter - Setup Flutter Development, Stateless & Statefull Widget, Basic Widgets</title>
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
      .code-block {
        background: #f5f5f5;
        border-radius: 5px;
        padding: 1rem;
        margin: 1rem 0;
        overflow-x: auto;
      }
      .code-block pre {
        margin: 0;
        font-family: 'Courier New', monospace;
      }
      .image-placeholder {
        background: #f0f0f0;
        border: 2px dashed #ccc;
        border-radius: 5px;
        padding: 2rem;
        text-align: center;
        margin: 1rem 0;
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
              Praktikum 2 - Setup Flutter Development, Stateless & Statefull Widget, Basic Widgets
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Setup Flutter Development, Stateless & Statefull Widget, Basic Widgets
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i><?php echo date('d F Y'); ?></span
          >
          <span><i class="fas fa-clock me-1"></i>20 min read</span>
        </div>
      </div>
    </header>

    <!-- Konten Utama -->
    <main class="container py-4 py-lg-5">
      <div class="row g-5 g-lg-5">
        <!-- Artikel -->
        <div class="col-12 col-lg-8">
          <article class="blog-content">
            <!-- Teori Flutter -->
            <section class="mb-5">
              <h3 class="section-title">Konsep Dasar Flutter</h3>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-mobile-alt fa-2x mb-3"></i>
                    <h5>Flutter</h5>
                    <p>
                      Flutter adalah framework open-source dari Google untuk membuat aplikasi native 
                      yang indah, dikompilasi untuk mobile, web, dan desktop dari satu basis kode.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-cube fa-2x mb-3"></i>
                    <h5>Stateless Widget</h5>
                    <p>
                      Widget yang bersifat statis atau tetap, tidak mengalami perubahan ketika state dijalankan.
                      Contoh: teks statis, logo aplikasi.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-sync-alt fa-2x mb-3"></i>
                    <h5>Statefull Widget</h5>
                    <p>
                      Widget dinamis yang ketika state berubah maka tampilan UI juga berubah.
                      Contoh: tombol yang berubah warna ketika diklik.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-th fa-2x mb-3"></i>
                    <h5>Basic Widgets</h5>
                    <p>
                      Widget dasar Flutter seperti Text, Container, ElevatedButton, Icon, Image, 
                      dan CircleAvatar yang digunakan untuk membangun antarmuka pengguna.
                    </p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Langkah Implementasi -->
            <section class="mb-5">
              <h3 class="section-title">Langkah Implementasi sesuai Modul</h3>

              <!-- A. Setup Lingkungan Flutter Development -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">A</span>
                  <h5>Setup Lingkungan Flutter Development</h5>
                </div>
                <div class="step-content">
                  <h6>Persyaratan Sistem:</h6>
                  <ul class="implementation-list">
                    <li>Windows 10/11 (64-bit)</li>
                    <li>Disk space minimal 1.5 GB (tidak termasuk IDE/tools)</li>
                    <li>Tools: Windows PowerShell 5.0 atau yang lebih baru, Git for Windows</li>
                  </ul>
                  
                  <h6 class="mt-4">Langkah-langkah Setup:</h6>
                  <ol>
                    <li>Install GIT dari https://git-scm.com/</li>
                    <li>Install Visual Studio dengan workload "Desktop development with C++"</li>
                    <li>Install Android Studio untuk Android SDK Manager dan emulator</li>
                    <li>Install Visual Studio Code dan tambahkan extension Flutter</li>
                    <li>Download dan extract SDK Flutter versi stable</li>
                    <li>Tambahkan path SDK Flutter ke Environment Variables</li>
                    <li>Verifikasi setup dengan menjalankan perintah <code>flutter doctor</code></li>
                  </ol>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-1.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-2.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar dokumentasi setup Flutter development environment</p>
                  </div>
                </div>
              </div>

              <!-- B. Membuat Project Flutter -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">B</span>
                  <h5>Membuat Project Flutter Pertama</h5>
                </div>
                <div class="step-content">
                  <h6>Via Terminal/Command Prompt:</h6>
                  <ol>
                    <li>Buka terminal/command prompt</li>
                    <li>Jalankan perintah: <code>flutter create hai</code></li>
                    <li>Masuk ke direktori project: <code>cd hai</code></li>
                    <li>Jalankan project: <code>flutter run</code></li>
                  </ol>
                  
                  <h6>Via Visual Studio Code:</h6>
                  <ol>
                    <li>Buka Visual Studio Code</li>
                    <li>Buka Command Palette (Ctrl+Shift+P)</li>
                    <li>Ketik "Flutter: New Project" dan pilih opsi tersebut</li>
                    <li>Pilih jenis proyek "Application"</li>
                    <li>Pilih direktori dan beri nama proyek "hai"</li>
                  </ol>
                  
                  <h6 class="mt-4">Struktur Project Flutter:</h6>
                  <ul class="implementation-list">
                    <li><strong>lib/</strong> - Berisi seluruh kode Dart, dengan main.dart sebagai class utama</li>
                    <li><strong>android/</strong> - Konfigurasi untuk aplikasi Android (build.gradle)</li>
                    <li><strong>ios/</strong> - Konfigurasi untuk aplikasi iOS (Info.plist)</li>
                    <li><strong>assets/</strong> - Untuk menyimpan aset aplikasi seperti gambar, font (dibuat manual)</li>
                    <li><strong>test/</strong> - Berisi code testing</li>
                    <li><strong>pubspec.yaml</strong> - File konfigurasi utama proyek Flutter</li>
                  </ul>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-3.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-4.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-5.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-6.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-7.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-8.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-9.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-10.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar struktur project Flutter dan tampilan default aplikasi</p>
                  </div>
                </div>
              </div>

              <!-- C. Stateless dan Statefull Widget -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">C</span>
                  <h5>Stateless dan Statefull Widget</h5>
                </div>
                <div class="step-content">
                  <h6>Stateless Widget:</h6>
                  <p>Widget yang bersifat statis, tidak berubah ketika state dijalankan.</p>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() {
    runApp(const MyStateless());
}

class MyStateless extends StatelessWidget {
   const MyStateless({super.key});

   @override
   Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text("Stateless Widget"),
        ),
        body: const Center(
          child: Text("ini body"),
        ),
      ),
    );
   }
}</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-11.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-12.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output Stateless Widget</p>
                  </div>
                  
                  <h6 class="mt-4">Statefull Widget:</h6>
                  <p>Widget dinamis yang berubah ketika state berubah.</p>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() {
    runApp(const MyStateFull());
}

class MyStatefull extends StatefulWidget {
    const MyStatefull({super.key});
    
    @override
    State&lt;MyStatefull&gt; createState() => _MyStatefullState();
}

class _MyStatefullState extends State&lt;MyStatefull&gt; {
    int _kelipatan = 0;
    
    void _kelipatanDua() {
      setState(() {
        _kelipatan += 2;
      });
    }

    @override
    Widget build(BuildContext context) {
      return MaterialApp(
        home: Scaffold(
          appBar: AppBar(
            title: const Text("StateFull Widget"),
          ),
          body: Center(
            child: Container(
              width: 100,
              height: 100,
              color: Colors.amber,
              child: Column(
                children: [
                  const Text("Kelipatan 2 : "),
                  Text(
                    '$_kelipatan',
                    style: Theme.of(context).textTheme.headlineMedium,
                  )
                ],
              ),
            ),
          ),
          floatingActionButton: FloatingActionButton(
            onPressed: _kelipatanDua,
            tooltip: "Kelipatan 2",
            child: const Icon(Icons.add),
          ),
        ),
      );
    }
}</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-13.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-14.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output Statefull Widget sebelum dan sesudah tombol ditekan</p>
                  </div>
                </div>
              </div>

              <!-- D. Basic Widgets -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">D</span>
                  <h5>Basic Widgets Flutter</h5>
                </div>
                <div class="step-content">
                  <h6>Text Widget:</h6>
                  <p>Widget untuk menampilkan teks dengan berbagai properti styling.</p>
                  <div class="code-block">
                    <pre><code>return Text(
  "Hai i am Text Widget",
  style: TextStyle(
    fontSize: 14.0,
    color: Colors.red,
    fontWeight: FontWeight.bold,
    fontStyle: FontStyle.italic),
  textAlign: TextAlign.center,
);</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-15.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output Text Widget</p>
                  </div>
                  
                  <h6 class="mt-4">Container Widget:</h6>
                  <p>Widget sebagai kotak yang dapat menampung satu widget child dengan dekorasi.</p>
                  <div class="code-block">
                    <pre><code>return Container(
  width: 200,
  height: 200,
  margin: const EdgeInsets.all(20),
  padding: const EdgeInsets.all(20),
  decoration: BoxDecoration(
    color: Colors.blueAccent,
    border: Border.all(color: Colors.white, width: 2),
    borderRadius: BorderRadius.circular(10)),
  child: Text("Container Widget"),
);</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-16.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output Container Widget</p>
                  </div>
                  
                  <h6 class="mt-4">ElevatedButton Widget:</h6>
                  <p>Widget tombol dengan shadow yang memiliki callback ketika ditekan.</p>
                  <div class="code-block">
                    <pre><code>ElevatedButton(
  onPressed: () {
    // Aksi ketika tombol ditekan
  },
  child: Text("Tombol"),
  style: ElevatedButton.styleFrom(
    backgroundColor: Colors.blue,
    foregroundColor: Colors.white,
  ),
),</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-17.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output ElevatedButton Widget</p>
                  </div>
                  
                  <h6 class="mt-4">Icon Widget:</h6>
                  <p>Widget untuk menampilkan ikon dari Material Icons atau CupertinoIcons.</p>
                  <div class="code-block">
                    <pre><code>Icon(
  Icons.add,
  color: Colors.amber,
  size: 50.0,
),

// Apple Icons
Icon(
  CupertinoIcons.add,
  color: Colors.red,
  size: 50.0,
),</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-18.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output Icon Widget</p>
                  </div>
                  
                  <h6 class="mt-4">Image Widget:</h6>
                  <p>Widget untuk menampilkan gambar dari berbagai sumber (network, asset, dll).</p>
                  <div class="code-block">
                    <pre><code>// Network Image
Image.network(
  "https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Logo_Unand.svg/600px-Logo_Unand.svg.png",
  width: 100,
  height: 150,
),

// Asset Image
Image.asset(
  'assets/images/logo.png',
  width: 100,
  height: 150,
),</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-19.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output Image Widget dari network dan asset</p>
                  </div>
                  
                  <h6 class="mt-4">CircleAvatar Widget:</h6>
                  <p>Widget untuk menampilkan gambar profil atau inisial dalam bentuk lingkaran.</p>
                  <div class="code-block">
                    <pre><code>CircleAvatar(
  radius: 30,
  backgroundColor: Colors.green,
  child: Text(
    "I",
    style: TextStyle(fontSize: 20, color: Colors.white),
  ),
),

CircleAvatar(
  radius: 30,
  backgroundColor: Colors.blue,
  child: Icon(
    Icons.person,
    color: Colors.white,
    size: 30,
  ),
),</code></pre>
                  </div>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-20.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar output CircleAvatar Widget</p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Tugas -->
            <section class="mb-5">
              <h3 class="section-title">Tugas Praktikum</h3>
              
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">1</span>
                  <h5>Tugas 1: Tampilan Widget Vertikal dan Horizontal</h5>
                </div>
                <div class="step-content">
                  <p>Buatlah tampilan widget secara vertical dan horizontal dengan menggunakan minimal 3 buah basic widget dalam 1 tampilan.</p>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-21.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar dokumentasi tampilan widget vertikal dan horizontal</p>
                  </div>
                  
                  <div class="code-block">
                    <pre><code>
import 'package:flutter/material.dart';
import 'package:flutter/cupertino.dart';

void main() {
  runApp(const MaterialApp(home: PraktikumWidget()));
}

class PraktikumWidget extends StatelessWidget {
  const PraktikumWidget({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Praktikum Widget')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Icon(Icons.star, color: Colors.amber, size: 40),
                const SizedBox(width: 20),
                const Icon(
                  CupertinoIcons.heart_fill,
                  color: Colors.red,
                  size: 40,
                ),
                const SizedBox(width: 20),
                ElevatedButton(
                  onPressed: () {},
                  child: const Text('Klik Saya'),
                ),
              ],
            ),
            const SizedBox(height: 20),
            const Text(
              'Ini tampilan vertikal',
              style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 20),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Icon(Icons.star, color: Colors.amber, size: 40),
                const SizedBox(width: 20),
                const Icon(
                  CupertinoIcons.heart_fill,
                  color: Colors.red,
                  size: 40,
                ),
                const SizedBox(width: 20),
                ElevatedButton(
                  onPressed: () {},
                  child: const Text('Klik Saya'),
                ),
              ],
            ),
            const SizedBox(height: 20),
            const Text(
              'Ini tampilan horizontal (Row di atas)',
              style: TextStyle(fontSize: 16),
            ),
          ],
        ),
      ),
    );
  }
}
</code></pre>

                  </div>
                </div>
              </div>

              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">2</span>
                  <h5>Tugas 2: Tampilan Profile dengan Basic Widgets</h5>
                </div>
                <div class="step-content">
                  <p>Buatlah tampilan yang berisi informasi profile (foto, nama, nim, alamat, nomor handphone, jurusan) dengan mengimplementasikan seluruh basic widget yang ada pada modul praktikum ini.</p>
                  
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-2/Pekan2-22.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar dokumentasi tampilan profile dengan basic widgets</p>
                  </div>
                  
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() {
  runApp(const MaterialApp(home: ProfilePage()));
}

class ProfilePage extends StatelessWidget {
  const ProfilePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Profil Saya')),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Center(
          child: Column(
            children: [
              // Foto profil
              const CircleAvatar(
                radius: 50,
                backgroundImage: AssetImage(
                  'assets/profil.png',
                ), // ganti dengan path foto Anda
              ),
              const SizedBox(height: 20),
              // Nama
              const Text(
                'Nama: Rifki Yuliandra',
                style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
              ),
              const SizedBox(height: 10),
              // NIM
              const Text('NIM: 2311532011', style: TextStyle(fontSize: 16)),
              const SizedBox(height: 10),
              // Alamat
              Row(
                children: const [
                  Icon(Icons.home, color: Colors.blue),
                  SizedBox(width: 10),
                  Expanded(child: Text('Alamat: Jl. Pal Merah No. 5, Air Tawar Timur, Kota Padang')),
                ],
              ),
              const SizedBox(height: 10),
              // Nomor handphone
              Row(
                children: const [
                  Icon(Icons.phone, color: Colors.green),
                  SizedBox(width: 10),
                  Text('HP: 085805138605'),
                ],
              ),
              const SizedBox(height: 10),
              // Jurusan
              Row(
                children: const [
                  Icon(Icons.school, color: Colors.orange),
                  SizedBox(width: 10),
                  Text('Jurusan: Informatika'),
                ],
              ),
              const SizedBox(height: 20),
              // Tombol
              ElevatedButton(
                onPressed: () {},
                child: const Text('Edit Profil'),
              ),
            ],
          ),
        ),
      ),
    );
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
                    <li>Cara menyiapkan lingkungan development Flutter (install SDK, Git, Android Studio, VS Code)</li>
                    <li>Perbedaan antara Stateless Widget (statis) dan Statefull Widget (dinamis)</li>
                    <li>Penggunaan basic widgets Flutter seperti Text, Container, ElevatedButton, Icon, Image, dan CircleAvatar</li>
                    <li>Membuat project Flutter pertama dan memahami struktur project Flutter</li>
                    <li>Implementasi widget-widget dasar untuk membangun antarmuka pengguna</li>
                  </ol>
                  <p>Pemahaman tentang widget dasar Flutter sangat penting sebagai fondasi untuk mengembangkan aplikasi mobile yang lebih kompleks. Dengan menguasai konsep Stateless dan Statefull Widget serta berbagai basic widget, kita dapat mulai membangun UI yang interaktif dan responsif.</p>
                  <p>Untuk kode lengkap praktikum dan tugas dapat diakses pada repository GitHub: <a href="https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git">https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git</a></p>
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
                          <input type="hidden" name="id_artikel" value="8"> 
                          
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
                  $komentar->id_artikel = 8; // ID artikel untuk laporan Flutter
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
                    href="/portfolio/2011/Laprak/pekan-6/laporan-1.php"
                    class="list-group-item list-group-item-action related-article"
                  >
                    <div class="d-flex justify-content-between">
                      <span>Setup Environment, Dart Dasar dan OOP Dart</span>
                      <i class="fas fa-chevron-right"></i>
                    </div>
                    <small class="text-muted">20 November 2024</small>
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