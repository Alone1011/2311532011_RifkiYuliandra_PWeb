<?php
// Di bagian atas file
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once __DIR__ . '/../../pekan-6/config/Database.php';
include_once __DIR__ . '/../../pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 9; // ID artikel untuk laporan Flutter/Praktikum 3
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;

?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Praktikum 3 - Input Widgets dan Basic Form</title>
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
        background: #f8f9fa;
        border-radius: 5px;
        padding: 1rem;
        overflow-x: auto;
        margin: 1rem 0;
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
              Praktikum 3 - Input Widgets dan Basic Form
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Input Widgets dan Basic Form
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>27 November 2024</span
          >
          <span><i class="fas fa-clock me-1"></i>10 min read</span>
        </div>
      </div>
    </header>

    <!-- Konten Utama -->
    <main class="container py-4 py-lg-5">
      <div class="row g-5 g-lg-5">
        <!-- Artikel -->
        <div class="col-12 col-lg-8">
          <article class="blog-content">
            <!-- Teori -->
            <section class="mb-5">
              <h3 class="section-title">Konsep Dasar Input Widgets dan Form</h3>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-keyboard fa-2x mb-3"></i>
                    <h5>Basic Form</h5>
                    <p>
                      Widget yang berfungsi sebagai inputan nilai seperti TextField, TextFormField,
                      CheckBox, Switch, Dropdown, Radio, Dialog, DatePicker, BottomSheet, Snackbar.
                      Digunakan untuk validasi dan mengelola inputan dari berbagai field.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-font fa-2x mb-3"></i>
                    <h5>TextField</h5>
                    <p>
                      Widget untuk memasukkan teks oleh pengguna, biasanya digunakan untuk form
                      inputan seperti login, pencarian, dll. Menerima input dari keyboard dengan
                      property lengkap untuk style, decoration, dan jenis inputan.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-check-circle fa-2x mb-3"></i>
                    <h5>TextFormField</h5>
                    <p>
                      Versi lengkap dari TextField yang terintegrasi dengan logika validasi dan
                      manajemen state dari sebuah form. Memiliki properti validator untuk memeriksa
                      input sesuai aturan yang ditentukan.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-key fa-2x mb-3"></i>
                    <h5>GlobalKey & FormState</h5>
                    <p>
                      GlobalKey digunakan untuk mengidentifikasi dan mengakses state secara global.
                      FormState mengelola status dari Form, seperti status validasi setiap inputan.
                      Memungkinkan pemanggilan metode validate() atau save() dari luar widget.
                    </p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Langkah Implementasi -->
            <section class="mb-5">
              <h3 class="section-title">Langkah Implementasi sesuai Modul</h3>

              <!-- A. Basic Form TextField -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">A</span>
                  <h5>Basic Form dengan TextField</h5>
                </div>
                <div class="step-content">
                  <h6>Langkah-langkah:</h6>
                  <ol>
                    <li>Membuat file baru dengan nama form-textfield.dart</li>
                    <li>Membuat tampilan basic form dengan Widget TextField dan ElevatedButton</li>
                    <li>Menambahkan TextEditingController untuk mengelola inputan</li>
                    <li>Menambahkan event listener pada TextField</li>
                    <li>Menampilkan hasil input menggunakan SnackBar</li>
                  </ol>
                  
                  <h6 class="mt-4">Kode Implementasi:</h6>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() => runApp(const MyApp());

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(title: const Text('Basic Form')),
        body: const MyForm(),
      ),
    );
  }
}

class MyForm extends StatefulWidget {
  const MyForm({super.key});

  @override
  State<MyForm> createState() => _MyFormState();
}

class _MyFormState extends State<MyForm> {
  TextEditingController _textEditingController = TextEditingController();
  String inputText = '';
  @override
  void dispose() {
    _textEditingController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.all(20.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          const Text('Masukkan nama anda:'),
          const SizedBox(height: 10),
          TextField(
            decoration: InputDecoration(
              labelText: 'Nama lengkap',
              hintText: 'John Doe',
              border: OutlineInputBorder(),
              prefixIcon: Icon(Icons.person),
            ),
            controller: _textEditingController,
            keyboardType: TextInputType.text,
            onChanged: (text) {
              print('Sedang mengetik teks : ,$text');
            },
          ),
          const SizedBox(height: 20),
          ElevatedButton(
            onPressed: () {
              inputText = _textEditingController.text;
              ScaffoldMessenger.of(context).showSnackBar(
                SnackBar(content: Text('Nama anda adalah, $inputText')),
              );
              setState(() {
                inputText = _textEditingController.text;
              });
            },
            style: ElevatedButton.styleFrom(
              backgroundColor: Colors.amber,
              foregroundColor: Colors.black,
            ),
            child: const Text('Tampilkan nama'),
          ),
          SizedBox(height: 20),
          Text('Nama Anda : $inputText', style: const TextStyle(fontSize: 20)),
        ],
      ),
    );
  }
}
</code></pre>
                  </div>
                  
                  <h6 class="mt-4">Dokumentasi:</h6>
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-3/pekan3-1.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-3/pekan3-2.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-3/pekan3-3.jpg"
                        alt="PraktikumMobileApp2"
                        loading="lazy"
                    />
                    <p>Gambar 1: Tampilan Basic Form dengan TextField</p>
                  </div>
                </div>
              </div>

              <!-- B. Basic Form TextFormField -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">B</span>
                  <h5>Basic Form dengan TextFormField</h5>
                </div>
                <div class="step-content">
                  <h6>Langkah-langkah:</h6>
                  <ol>
                    <li>Membuat file baru dengan nama form-textformfield.dart</li>
                    <li>Membuat form dengan 2 TextFormField dan ElevatedButton</li>
                    <li>Menggunakan GlobalKey untuk mengelola state form</li>
                    <li>Menambahkan validator untuk validasi input</li>
                    <li>Menampilkan pesan error jika validasi gagal</li>
                  </ol>
                  
                  <h6 class="mt-4">Kode Implementasi:</h6>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() => runApp(const MyApp());

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(title: const Text("Basic Form TextFormField")),
        body: const MyFormText(),
      ),
    );
  }
}

class MyFormText extends StatefulWidget {
  const MyFormText({super.key});

  @override
  State<MyFormText> createState() => _MyFormTextState();
}

class _MyFormTextState extends State<MyFormText> {
  final _formKey = GlobalKey<FormState>();
  final _nameController = TextEditingController();
  final _emailController = TextEditingController();

  @override
  void dispose() {
    _nameController.dispose();
    _emailController.dispose();
    super.dispose();
  }

  void _submitForm() {
    if (_formKey.currentState!.validate()) {
      String name = _nameController.text;
      String email = _emailController.text;

      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Validasi $name, $email Berhasil')),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Form(
      key: _formKey,
      child: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          children: [
            const SizedBox(height: 10),
            TextFormField(
              controller: _nameController,
              decoration: const InputDecoration(
                labelText: "Nama : ",
                border: OutlineInputBorder(),
              ),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Masukkan nama anda';
                }
                return null;
              },
            ),
            const SizedBox(height: 10),
            TextFormField(
              controller: _emailController,
              decoration: const InputDecoration(
                labelText: "Email : ",
                border: OutlineInputBorder(),
              ),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Masukkan email anda';
                }
                if (!value.contains('@')) {
                  return 'Email tidak valid';
                }
                return null;
              },
            ),
            const SizedBox(height: 10),
            SizedBox(
              width: double.infinity,
              child: ElevatedButton(
                onPressed: _submitForm,
                child: const Text('Submit'),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
</code></pre>
                  </div>
                  <h6 class="mt-4">Dokumentasi:</h6>
                  <div class="image-placeholder">
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-3/pekan3-5.jpg"
                        alt="PraktikumMobileApp3"
                        loading="lazy"
                    />
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-3/pekan3-6.jpg"
                        alt="PraktikumMobileApp3"
                        loading="lazy"
                    />
                    <p>Gambar 2: Tampilan Basic Form dengan TextFormField</p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Tugas -->
            <section class="mb-5">
              <h3 class="section-title">Tugas: Aplikasi Kalkulator Kabataku</h3>
              
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">1</span>
                  <h5>Implementasi Kalkulator Kabataku</h5>
                </div>
                <div class="step-content">
                  <p>Berdasarkan tugas pada modul, saya telah membuat aplikasi kalkulator yang dapat melakukan operasi kabataku (kali, bagi, tambah, kurang) menggunakan Flutter.</p>
                  
                  <h6 class="mt-4">Fitur yang Diimplementasikan:</h6>
                  <ul class="implementation-list">
                    <li>2 buah TextField untuk menerima input angka dari pengguna</li>
                    <li>4 buah ElevatedButton untuk operasi matematika (+, -, ×, ÷)</li>
                    <li>Validasi input untuk memastikan angka yang dimasukkan valid</li>
                    <li>Penanganan error untuk pembagian dengan nol</li>
                    <li>Widget Text untuk menampilkan hasil perhitungan</li>
                  </ul>
                  
                  <h6 class="mt-4">Kode Implementasi:</h6>
                  <div class="code-block">
                    <pre><code>import 'package:flutter/material.dart';

void main() => runApp(const MyApp());

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(title: const Text('Kabataku Kalkulator')),
        body: const KabatakuCalculator(),
      ),
    );
  }
}

class KabatakuCalculator extends StatefulWidget {
  const KabatakuCalculator({super.key});

  @override
  State<KabatakuCalculator> createState() => _KabatakuCalculatorState();
}

class _KabatakuCalculatorState extends State<KabatakuCalculator> {
  final TextEditingController _controller1 = TextEditingController();
  final TextEditingController _controller2 = TextEditingController();
  String _result = '';

  void _calculate(String operator) {
    final num1 = double.tryParse(_controller1.text);
    final num2 = double.tryParse(_controller2.text);

    if (num1 == null || num2 == null) {
      setState(() {
        _result = 'Input tidak valid!';
      });
      return;
    }

    double hasil;
    switch (operator) {
      case '+':
        hasil = num1 + num2;
        break;
      case '-':
        hasil = num1 - num2;
        break;
      case '×':
        hasil = num1 * num2;
        break;
      case '÷':
        if (num2 == 0) {
          _result = 'Tidak bisa dibagi 0!';
          setState(() {});
          return;
        }
        hasil = num1 / num2;
        break;
      default:
        hasil = 0;
    }
    setState(() {
      _result = 'Hasil: $hasil';
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Padding(
        padding: const EdgeInsets.all(24.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            TextField(
              controller: _controller1,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: 'Angka pertama',
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 16),
            TextField(
              controller: _controller2,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: 'Angka kedua',
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 24),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                ElevatedButton(
                  onPressed: () => _calculate('+'),
                  child: const Text('+'),
                ),
                ElevatedButton(
                  onPressed: () => _calculate('-'),
                  child: const Text('-'),
                ),
                ElevatedButton(
                  onPressed: () => _calculate('×'),
                  child: const Text('×'),
                ),
                ElevatedButton(
                  onPressed: () => _calculate('÷'),
                  child: const Text('÷'),
                ),
              ],
            ),
            const SizedBox(height: 24),
            Text(
              _result,
              style: const TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
          ],
        ),
      ),
    );
  }
}
</code></pre>
                  </div>
                  
                  <h6 class="mt-4">Penjelasan Kode:</h6>
                  <ul class="implementation-list">
                    <li><strong>TextEditingController</strong>: Digunakan untuk mengambil nilai dari TextField</li>
                    <li><strong>_calculate()</strong>: Fungsi yang menangani logika perhitungan berdasarkan operator</li>
                    <li><strong>setState()</strong>: Memperbarui UI ketika hasil perhitungan berubah</li>
                    <li><strong>tryParse()</strong>: Mengonversi input string menjadi angka dengan penanganan error</li>
                    <li><strong>Validasi pembagian dengan nol</strong>: Mencegah error ketika pengguna mencoba membagi dengan nol</li>
                  </ul>
                  
                  <h6 class="mt-4">Dokumentasi:</h6>
                  <div class="image-placeholder">\
                    <img
                        class="img-fluid mb-3"
                        src="/Assets/images/laprak/mobile-app/Pekan-3/pekan3-7.jpg"
                        alt="PraktikumMobileApp3"
                        loading="lazy"
                    />
                    <p>Gambar 3: Tampilan Aplikasi Kalkulator Kabataku</p>
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
                    <li>Perbedaan antara TextField dan TextFormField dalam Flutter</li>
                    <li>Cara menggunakan TextEditingController untuk mengelola input dari pengguna</li>
                    <li>Implementasi validasi form menggunakan GlobalKey dan FormState</li>
                    <li>Pembuatan form yang interaktif dengan feedback menggunakan SnackBar</li>
                    <li>Penerapan konsep-konsep tersebut dalam aplikasi kalkulator kabataku</li>
                  </ol>
                  <p>Pemahaman tentang input widgets dan form management sangat penting dalam pengembangan aplikasi Flutter karena hampir setiap aplikasi memerlukan interaksi dengan pengguna melalui form input. Dengan menguasai konsep-konsep ini, kita dapat membuat aplikasi yang lebih interaktif dan user-friendly.</p>
                  <p>Untuk kode lengkap praktikum dan tugas dapat diakses pada repository GitHub: <a href="https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git">https://github.com/Alone1011/2311532011-RifkiY-MobileApp.git</a></p>
                </div>
              </div>
            </section>

            <!-- Komentar Section -->
            <section class="mb-5">
              <h3 class="section-title">Komentar (<?= $total_komentar ?>)</h3>

              <!-- Form Komentar -->
              <div class="card mb-4">
                  <div class="card-body">
                      <h5 class="card-title">Tinggalkan Komentar</h5>
                      <form action="function/Komentar.php" method="POST">
                          <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                          <input type="hidden" name="id_artikel" value="9"> 
                          
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
                  $komentar->id_artikel = 9; // ID artikel untuk laporan Flutter
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