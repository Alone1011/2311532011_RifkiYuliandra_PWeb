<?php
    // Di bagian atas file
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once __DIR__ . '/../../pekan-6/config/Database.php';
    include_once __DIR__ . '/../../pekan-6/model/Komentar.php';

    $database = new Database();
    $db = $database->getConnection(); 

    $komentar = new Komentar($db);
    $komentar->id_artikel = 10; // ID artikel untuk laporan Navigation & Routing
    $result_komentar = $komentar->read();
    $total_komentar = $result_komentar->num_rows;

?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Praktikum 4 - Navigation & Routing Flutter - Rifki Yuliandra</title>
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
      .image-documentation {
        border: 2px solid var(--accent);
        border-radius: 10px;
        margin: 1rem 0;
        max-width: 100%;
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
              Praktikum 4 - Navigation & Routing: Multiple Screen
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Navigation & Routing: Multiple Screen dalam Flutter
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>15 Desember 2024</span
          >
          <span><i class="fas fa-clock me-1"></i>12 min read</span>
        </div>
      </div>
    </header>

    <!-- Konten Utama -->
    <main class="container py-4 py-lg-5">
      <div class="row g-5 g-lg-5">
        <!-- Artikel -->
        <div class="col-12 col-lg-8">
          <article class="blog-content">
            <!-- Teori Navigation & Routing -->
            <section class="mb-5">
              <h3 class="section-title">Konsep Navigation & Routing Flutter</h3>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-sitemap fa-2x mb-3"></i>
                    <h5>Navigation</h5>
                    <p>
                      Proses berpindah dari satu halaman (screen/page) ke halaman lain dalam aplikasi Flutter.
                      Menggunakan konsep tumpukan (stack) dengan widget Navigator.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-route fa-2x mb-3"></i>
                    <h5>Routing</h5>
                    <p>
                      Sistem untuk mendefinisikan dan mengelola routes dalam aplikasi.
                      Mempermudah pengelolaan route tanpa membuat instance baru setiap kali memanggil halaman.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-exchange-alt fa-2x mb-3"></i>
                    <h5>Push & Pop</h5>
                    <p>
                      Push: Menambahkan halaman baru ke tumpukan navigasi.
                      Pop: Mengeluarkan halaman saat ini dari tumpukan dan kembali ke halaman sebelumnya.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-paper-plane fa-2x mb-3"></i>
                    <h5>Data Passing</h5>
                    <p>
                      Mengirim dan menerima data antar halaman menggunakan constructor
                      atau arguments melalui named routes.
                    </p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Langkah Implementasi -->
            <section class="mb-5">
              <h3 class="section-title">Langkah Implementasi sesuai Modul</h3>

              <!-- A. Basic Navigation -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">A</span>
                  <h5>Navigation Dasar dengan Named Routes</h5>
                </div>
                <div class="step-content">
                  <p>Implementasi navigasi sederhana antara halaman Product dan ProductDetail:</p>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() => runApp(const MyNav());

class MyNav extends StatelessWidget {
  const MyNav({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      initialRoute: '/',
      routes: {
        '/': (context) => const Product(),
        '/product_detail': (context) => const ProductDetail(),
      },
    );
  }
}

class Product extends StatelessWidget {
  const Product({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Product')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            Navigator.pushNamed(context, '/product_detail');
          },
          child: const Text('Go to Product Detail'),
        ),
      ),
    );
  }
}

class ProductDetail extends StatelessWidget {
  const ProductDetail({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Product Detail')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            Navigator.pop(context);
          },
          child: const Text('Back to Product'),
        ),
      ),
    );
  }
}</code></pre>
                  </div>
                  
                  <!-- Space untuk Dokumentasi -->
                  <h6 class="mt-4">Dokumentasi Implementasi:</h6>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="text-center"><strong>Halaman Product</strong></p>
                      <!-- Ganti dengan path gambar dokumentasi Anda -->
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-2.jpg" alt="Halaman Product" class="image-documentation">
                    </div>
                    <div class="col-md-6">
                      <p class="text-center"><strong>Halaman Product Detail</strong></p>
                      <!-- Ganti dengan path gambar dokumentasi Anda -->
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-3.jpg" alt="Halaman Product Detail" class="image-documentation">
                    </div>
                  </div>
                </div>
              </div>

              <!-- B. Data Passing -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">B</span>
                  <h5>Mengirim dan Menerima Data antar Halaman</h5>
                </div>
                <div class="step-content">
                  <p>Implementasi pengiriman data menggunakan constructor dan named routes:</p>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() => runApp(MyNav());

class MyNav extends StatelessWidget {
  const MyNav({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      initialRoute: '/',
      routes: {
        '/': (context) => const HomePage(),
        '/product': (context) => const MyProduct(),
      },
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Home Page')),
      body: Center(
        child: Row(
          children: [
            // Mengirim data dengan constructor
            ElevatedButton(
              onPressed: () {
                Navigator.push(
                  context, 
                  MaterialPageRoute(
                    builder: (context) => const MyProfile(id: 1, name: 'Rifki'),
                  ),
                );
              }, 
              child: const Text('Profile'),
            ), 
            // Mengirim data dengan named routes
            ElevatedButton(
              onPressed: () {
                Navigator.pushNamed(
                  context, 
                  '/product',
                  arguments: {'id': 101, 'name': 'Laptop'},
                );
              }, 
              child: const Text('Product'),
            ),
          ],
        ),
      ),
    );
  }
}

class MyProfile extends StatelessWidget {
  final int id;
  final String name;
  const MyProfile({super.key, required this.id, required this.name});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Profile')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text('ID: $id'),
            Text('Name: $name'),
          ],
        ),
      ),
    );
  }
}

class MyProduct extends StatelessWidget {
  const MyProduct({super.key});

  @override
  Widget build(BuildContext context) {
    final args = ModalRoute.of(context)!.settings.arguments as Map<String, dynamic>?;
    final int id = args?['id'] ?? 0;
    final String name = args?['name'] ?? 'Unknown';

    return Scaffold(
      appBar: AppBar(title: const Text('Product')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text('Product ID: $id'),
            Text('Product Name: $name'),
          ],
        ),
      ),
    );
  }
}</code></pre>
                  </div>
                  
                  <!-- Space untuk Dokumentasi -->
                  <h6 class="mt-4">Dokumentasi Data Passing:</h6>
                  <div class="row">
                    <div class="col-md-4">
                      <p class="text-center"><strong>Halaman Home</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-4.jpg" alt="Halaman Home" class="image-documentation">
                    </div>
                    <div class="col-md-4">
                      <p class="text-center"><strong>Profile (Constructor)</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-5.jpg" alt="Halaman Profile" class="image-documentation">
                    </div>
                    <div class="col-md-4">
                      <p class="text-center"><strong>Product (Named Routes)</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-6.jpg" alt="Halaman Product dengan Data" class="image-documentation">
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Tugas -->
            <section class="mb-5">
              <h3 class="section-title">Tugas: Aplikasi Login dengan Navigation dan Drawer</h3>
              
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">1</span>
                  <h5>Implementasi Halaman Login dan Navigation</h5>
                </div>
                <div class="step-content">
                  <p>Berikut adalah implementasi aplikasi login dengan navigation dan drawer:</p>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() => runApp(const MyApp());

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      initialRoute: '/',
      routes: {
        '/': (context) => const LoginPage(),
        '/home': (context) => const HomePage(),
      },
    );
  }
}

class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final TextEditingController _usernameController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  void _login() {
    String username = _usernameController.text;
    String password = _passwordController.text;

    Navigator.pushNamed(
      context,
      '/home',
      arguments: {'username': username, 'password': password},
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Login')),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            TextField(
              controller: _usernameController,
              decoration: const InputDecoration(labelText: 'Username'),
            ),
            TextField(
              controller: _passwordController,
              decoration: const InputDecoration(labelText: 'Password'),
              obscureText: true,
            ),
            const SizedBox(height: 20),
            ElevatedButton(onPressed: _login, child: const Text('Login')),
          ],
        ),
      ),
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    final args = ModalRoute.of(context)!.settings.arguments as Map<String, dynamic>?;
    final username = args?['username'] ?? '';
    final password = args?['password'] ?? '';

    return Scaffold(
      appBar: AppBar(title: const Text('Halaman Utama')),
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: [
            DrawerHeader(
              decoration: const BoxDecoration(color: Colors.blue),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  const Text(
                    'Menu',
                    style: TextStyle(color: Colors.white, fontSize: 24),
                  ),
                  const SizedBox(height: 10),
                  Text(
                    'Username: $username',
                    style: const TextStyle(color: Colors.white),
                  ),
                ],
              ),
            ),
            ListTile(
              leading: const Icon(Icons.person),
              title: const Text('Profile'),
              onTap: () {
                Navigator.pop(context);
                showDialog(
                  context: context,
                  builder: (context) => AlertDialog(
                    title: const Text('Profile'),
                    content: Text('Username: $username\nPassword: $password'),
                    actions: [
                      TextButton(
                        onPressed: () => Navigator.pop(context),
                        child: const Text('Close'),
                      ),
                    ],
                  ),
                );
              },
            ),
            ListTile(
              leading: const Icon(Icons.info),
              title: const Text('About'),
              onTap: () {
                Navigator.pop(context);
                showAboutDialog(
                  context: context,
                  applicationName: 'Aplikasi Praktikum',
                  applicationVersion: '1.0.0',
                  applicationLegalese: '© 2025 MyApp',
                  children: [
                    const Padding(
                      padding: EdgeInsets.only(top: 16.0),
                      child: Text(
                        'Aplikasi ini dibuat untuk praktikum Navigation & Routing Flutter.',
                      ),
                    ),
                  ],
                );
              },
            ),
            ListTile(
              leading: const Icon(Icons.logout),
              title: const Text('Logout'),
              onTap: () {
                Navigator.pop(context);
                Navigator.popUntil(context, ModalRoute.withName('/'));
              },
            ),
          ],
        ),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text('Username: $username'), 
            Text('Password: $password')
          ],
        ),
      ),
    );
  }
}</code></pre>
                  </div>
                  
                  <!-- Space untuk Dokumentasi Tugas -->
                  <h6 class="mt-4">Dokumentasi Tugas:</h6>
                  <div class="row">
                    <div class="col-md-4">
                      <p class="text-center"><strong>Halaman Login</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-7.jpg" alt="Halaman Login" class="image-documentation">
                    </div>
                    <div class="col-md-4">
                      <p class="text-center"><strong>Halaman Utama</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-8.jpg" alt="Halaman Utama" class="image-documentation">
                    </div>
                    <div class="col-md-4">
                      <p class="text-center"><strong>Halaman Utama dengan Drawer</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-9.jpg" alt="Halaman Utama dengan Drawer" class="image-documentation">
                    </div>
                    <div class="col-md-4">
                      <p class="text-center"><strong>Dialog Profile</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-10.jpg" alt="Dialog Profile" class="image-documentation">
                    </div>
                    <div class="col-md-4">
                      <p class="text-center"><strong>Dialog About</strong></p>
                      <img src="/Assets/images/laprak/mobile-app/Pekan-4/pekan4-11.jpg" alt="Dialog About" class="image-documentation">
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Kesimpulan -->
            <section class="mb-5">
              <h3 class="section-title">Kesimpulan</h3>
              <div class="card">
                <div class="card-body">
                  <p>Dalam praktikum Navigation & Routing Flutter ini, kita telah mempelajari:</p>
                  <ol>
                    <li>Konsep dasar navigation dan routing dalam Flutter menggunakan stack</li>
                    <li>Implementasi navigasi sederhana dengan named routes antara halaman</li>
                    <li>Teknik mengirim dan menerima data antar halaman menggunakan constructor dan arguments</li>
                    <li>Pembuatan aplikasi login dengan mekanisme navigasi yang kompleks</li>
                    <li>Implementasi drawer navigation dengan berbagai menu dan dialog</li>
                    <li>Penggunaan widget-widget navigation seperti AlertDialog dan AboutDialog</li>
                  </ol>
                  <p>Pemahaman tentang navigation dan routing sangat penting dalam pengembangan aplikasi Flutter karena memungkinkan kita membuat aplikasi dengan multiple screen yang terstruktur dan mudah dikelola. Dengan menguasai konsep ini, kita dapat membuat user experience yang lebih baik dengan transisi yang smooth antar halaman.</p>
                  <p>Untuk kode lengkap praktikum dapat diakses pada repository GitHub: <a href="https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git">https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git</a></p>
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
                          <input type="hidden" name="id_artikel" value="10"> 
                          
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
                  $komentar->id_artikel = 10; 
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
                    href="../pekan-7/laporan-2.php"
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
                      <span>Instalasi dan Konfigurasi Laravel</span>
                      <i class="fas fa-chevron-right"></i>
                    </div>
                    <small class="text-muted">19 Mei 2025</small>
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