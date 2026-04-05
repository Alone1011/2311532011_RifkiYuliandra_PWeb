<?php
// Di bagian atas file
include_once '../../Laprak/pekan-6/config/Database.php';
include_once '../../Laprak/pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 2; // ID artikel yang sesuai
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Instalasi Laravel - Rifki Yuliandra</title>
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
    <link rel="stylesheet" href="../../Assets/laporan-styles.css" />
    <style>
      .blog-header {
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
          href="../pekan-7/laporan-2.php"
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
              <a class="nav-link" href="../../index.html#home"
                ><i class="fas fa-home me-1"></i>Beranda</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.html#blog"
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
            <li class="breadcrumb-item"><a href="../../index.html">Beranda</a></li>
            <li class="breadcrumb-item"><a href="../../index.html#blog">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Praktikum Pekan 7 - INSTALASI LARAVEL
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Instalasi dan Konfigurasi Laravel
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>19 Mei 2025</span
          >
          <span><i class="fas fa-clock me-1"></i>10 min read</span>
        </div>
      </div>
    </header>

    <!-- Konten Utama -->
    <main class="container py-5">
      <div class="row g-5">
        <!-- Artikel -->
        <div class="col-lg-8">
          <article class="blog-content">
             <!-- Tujuan -->
            <section class="mb-5">
              <h3 class="section-title">1.1 Tujuan Praktikum</h3>
              <div class="theory-card">
                <p>Mahasiswa mampu melakukan:</p>
                <ul class="implementation-list">
                  <li>Instalasi lingkungan development Laravel</li>
                  <li>Membuat project baru Laravel</li>
                  <li>Memahami struktur direktori Laravel</li>
                  <li>Mengimplementasikan konsep MVC</li>
                </ul>
              </div>
            </section>

            <!-- Alat dan Bahan -->
            <section class="mb-5">
              <h3 class="section-title">1.2 Alat dan Bahan</h3>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-laptop-code fa-2x mb-3"></i>
                    <h5>Software</h5>
                    <ul>
                      <li>XAMPP</li>
                      <li>Visual Studio Code</li>
                      <li>Composer</li>
                      <li>Git</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-cogs fa-2x mb-3"></i>
                    <h5>Teknologi</h5>
                    <ul>
                      <li>PHP ≥8.2</li>
                      <li>Node.js</li>
                      <li>MySQL</li>
                    </ul>
                  </div>
                </div>
              </div>
            </section>

            <!-- Langkah Instalasi -->
            <section class="mb-5">
              <h3 class="section-title">1.4 Langkah Instalasi</h3>

              <!-- Langkah 1: Install XAMPP -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">1</span>
                  <h5>Install XAMPP</h5>
                </div>
                <div class="step-content">
                  <ol>
                    <li>Download XAMPP dari <a href="https://www.apachefriends.org">apachefriends.org</a></li>
                    <li>Jalankan installer dan pilih komponen:
                      <pre><code>√ Apache
√ MySQL
√ PHP
√ phpMyAdmin</code></pre>
                    </li>
                    <li>Verifikasi instalasi dengan buka <code>localhost</code></li>
                    <img src="../../Assets/images/laprak/Pekan_7/pekan7-17.png" alt="XAMPP" width="650px"/>
                  </ol>
                  <h6>VERSI PHP</h6>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-18.png" alt="XAMPP" width="650px"/>
                  
                </div>
              </div>

              <!-- Langkah 2: Install Composer -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">2</span>
                  <h5>Install Composer</h5>
                </div>
                <div class="step-content">
                  <p>Composer merupakan package manager untuk PHP, composer akan digunakan untuk 
menambahkan package-package yang dibutuhkan pada saat development. Download compose pada link <a href="https://getcomposer.org/Composer-Setup.exe">https://getcomposer.org/Composer-Setup.exe</a>, selanjutnya install sesuai 
dengan Langkah-langkah wizard. </p>
                  <pre><code># Download installer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Jalankan installer
php composer-setup.php

# Pindahkan ke PATH global
mv composer.phar /usr/local/bin/composer</code></pre>
                </div>
                <img src="../../Assets/images/laprak/Pekan_7/pekan7-2.png" alt="Composer1" width="650px"/>
                <img src="../../Assets/images/laprak/Pekan_7/pekan7-3.png" alt="Composer2" width="650px"/>
              </div>
              
              <!-- Langkah 3: Install GIT -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">3</span>
                  <h5>Install GIT</h5>
                </div>
                <div class="step-content">
                  <p>Silahkan download dan install GIT pada link berikut <a href="https://git-scm.com/downloads/win">https://git-scm.com/downloads/win</a></p>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-3.png" alt="Composer2" width="650px"/>
                </div>
              </div>

              <!-- Langkah 4: Install Node JS dan NPM  -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">4</span>
                  <h5>Install Node JS dan NPM </h5>
                </div>
                <div class="step-content">
                  <p>Node JS pada Laravel berfungsi untuk menangani masalah frontedn dan build asset UI 
(Library UI). Buka situs resmi node js <a href="https://nodejs.org/">https://nodejs.org/</a> kemudian download dan install 
sesuai dengan Langkah-langkah wizard. NPM (Node Package Manager) yang berfungsi 
mengelola paket untuk ekosistem Javascript, NPM biasanya secara otomatis terinstall Ketika 
menginstall node js. </p>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-5.png" alt="Composer2" width="650px"/>
                </div>
              </div>

              <!-- Langkah 5: Membuat Project -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">5</span>
                  <h5>Buat Project Laravel</h5>
                </div>
                <div class="step-content">
                  <p>Via Composer:</p>
                  <pre><code>composer create-project laravel/laravel nama-project</code></pre>
                  
                  <p>Atau menggunakan Laravel Installer:</p>
                  <pre><code>composer global require laravel/installer
                    laravel new nama-project</code></pre>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-7.png" alt="Composer2" width="650px"/>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-6.png" alt="Composer2" width="650px"/>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-9.png" alt="Composer2" width="650px"/>
                  <p>Selanjutnya pilih database yang akan digunakan pada projek laravel</p>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-8.png" alt="Composer2" width="650px"/>
                  <p>Untuk menjalankan project laravel dapat membuat dengan npm install && npm run build</p>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-13.png" alt="Composer2" width="650px"/>
                  <p>Setelah itu untuk mendapatkan localhost dari laravel dapat memasukkan php artisan serve di cmder nya</p>
                  <img src="../../Assets/images/laprak/Pekan_7/pekan7-14.png" alt="Composer2" width="650px"/>
                </div>
              </div>

              <!-- Langkah 6: Konfigurasi Environment -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">6</span>
                  <h5>Konfigurasi .env</h5>
                </div>
                <div class="step-content">
                  <pre><code>APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=</code></pre>
                </div>
              </div>
            </section>

            <!-- Struktur MVC -->
            <section class="mb-5">
              <h3 class="section-title">Implementasi MVC</h3>
              
              <!-- Model -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">M</span>
                  <h5>Membuat Model</h5>
                </div>
                <div class="step-content">
                  <pre><code>php artisan make:model Post</code></pre>
                  <img src="Assets/images/laprak/laravel-model.png" width="650">
                </div>
              </div>

              <!-- View -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">V</span>
                  <h5>Membuat View</h5>
                </div>
                <div class="step-content">
                  <p>File <code>resources/views/welcome.blade.php</code>:</p>
                  <pre><code>@extends('layouts.app')

@section('content')
    &lt;h1&gt;Hello World&lt;/h1&gt;
@endsection</code></pre>
                </div>
              </div>

              <!-- Controller -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">C</span>
                  <h5>Membuat Controller</h5>
                </div>
                <div class="step-content">
                  <pre><code>php artisan make:controller PostController</code></pre>
                  <p>Contoh isi controller:</p>
                  <pre><code>public function index()
{
    return view('welcome');
}</code></pre>
                </div>
              </div>
            </section>

            <section class="mb-5">
              <h3 class="section-title">Komentar (<?= $total_komentar ?>)</h3>

              <!-- Form Komentar -->
              <div class="card mb-4">
                  <div class="card-body">
                      <h5 class="card-title">Tinggalkan Komentar</h5>
                      <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error'] ?>
                            <?php unset($_SESSION['error']) ?>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'] ?>
                            <?php unset($_SESSION['success']) ?>
                        </div>
                      <?php endif; ?>
                      <form action="../pekan-6/function/Komentar.php" method="POST">
                          <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                          <input type="hidden" name="id_artikel" value="2"> 
                          
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
                  $komentar->id_artikel = 2; // Ganti dengan ID artikel dinamis
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
        <aside class="col-lg-4">
          <div class="sticky-top" style="top: 100px">
            <!-- Penulis -->
            <div class="card mb-4 border-0 shadow-sm">
              <div class="card-body text-center">
                <img
                  src="../../Assets/images/profil.png"
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
                    href="../pekan-6/laporan-1.php"
                    class="list-group-item list-group-item-action related-article"
                  >
                    <div class="d-flex justify-content-between">
                      <span>Membangun Aplikasi CRUD Sederhana dengan PHP OOP</span>
                      <i class="fas fa-chevron-right"></i>
                    </div>
                    <small class="text-muted">14 Mei 2025</small>
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
