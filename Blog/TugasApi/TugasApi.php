<?php
// Di bagian atas file
include_once '../../Laprak/pekan-6/config/Database.php';
include_once '../../Laprak/pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 6; // ID artikel yang sesuai
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Membuat API CRUD Sederhana - Rifki Yuliandra</title>
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
          href="../TugasApi/TugasApi.php"
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
              Tugas Pemrograman Web - API CRUD 
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Membuat API CRUD Sederhana
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>17 Juni 2025</span
          >
          <span><i class="fas fa-clock me-1"></i>8 min read</span>
        </div>
      </div>
    </header>

    <!-- Konten Utama -->
    <main class="container py-4 py-lg-5">
      <div class="row g-5 g-lg-5">
        <!-- Artikel -->
        <div class="col-12 col-lg-8">
          <article class="blog-content">

            <!-- Langkah Implementasi -->
            <section class="mb-5">
              <h3 class="section-title">Langkah Implementasi API CRUD</h3>

              <div class="step-card">
                <div class="step-header mb-3">
                  <span class="step-number">1</span>
                  <h5>Persiapan Proyek Laravel</h5>
                </div>
                <div class="step-content">
                  <h6>a. Buat Proyek Laravel Baru</h6>
                  <p>Langkah pertama adalah membuat proyek Laravel baru melalui terminal atau CMD dengan perintah Composer.</p>
                  <div class="code-block">composer create-project laravel/laravel tugas-api-crud</div>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-1.jpg" alt="Screenshot terminal setelah menjalankan 'composer create-project'" class="img-fluid rounded my-3"/>
                  
                  <h6>b. Konfigurasi Database</h6>
                  <p>Buka file <code>.env</code> di root proyek. Buat sebuah database baru (misal: `tugas_api_crud`) di phpMyAdmin, lalu sesuaikan konfigurasi koneksi di file <code>.env</code>.</p>
                  <div class="code-block">
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugas_api_crud
DB_USERNAME=root
DB_PASSWORD=
                  </div>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-4.jpg" alt="Screenshot file .env yang sudah dikonfigurasi" class="img-fluid rounded my-3"/>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-5.jpg" alt="Screenshot file .env yang sudah dikonfigurasi" class="img-fluid rounded my-3"/>
                </div>
              </div>

              <div class="step-card">
                <div class="step-header mb-3">
                  <span class="step-number">2</span>
                  <h5>Model & Migration</h5>
                </div>
                <div class="step-content">
                  <h6>a. Buat Model dan File Migration</h6>
                  <p>Jalankan perintah Artisan ini untuk membuat Model `Product` sekaligus file migration-nya. Flag `-m` sangat membantu untuk efisiensi.</p>
                  <div class="code-block">php artisan make:model Product -m</div>
                  <h6>b. Definisikan Skema Tabel</h6>
                  <p>Buka file migration yang baru dibuat di `database/migrations/`. Definisikan kolom untuk tabel `products` di dalam fungsi `up()`.</p>
                  <div class="code-block">
                    <pre><code>
public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->timestamps();
    });
}
                    </code></pre>
                  </div>
                  
                  <h6>c. Jalankan Migration</h6>
                  <p>Eksekusi migration untuk membuat tabel di database.</p>
                  <div class="code-block">php artisan migrate</div>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-4.jpg" alt="Screenshot terminal setelah 'php artisan migrate' berhasil" class="img-fluid rounded my-3"/>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-5.jpg" alt="Screenshot terminal setelah 'php artisan migrate' berhasil" class="img-fluid rounded my-3"/>
                  
                  <h6>d. Konfigurasi Model</h6>
                  <p>Buka file `app/Models/Product.php` dan tambahkan properti `$fillable`. Ini penting untuk keamanan dan mengizinkan Mass Assignment (membuat data dari array).</p>
                   <div class="code-block">
                    <pre><code>
protected $fillable = [
    'name',
    'description',
    'price',
];
                    </code></pre>
                  </div>
                </div>
              </div>

              <div class="step-card">
                <div class="step-header mb-3">
                  <span class="step-number">3</span>
                  <h5>Membuat Controller</h5>
                </div>
                <div class="step-content">
                  <h6>a. Buat API Controller</h6>
                  <p>Buat controller khusus untuk API dengan flag `--api` yang akan men-generate method-method CRUD secara otomatis.</p>
                  <div class="code-block">php artisan make:controller Api/ProductController --api</div>

                  <h6>b. Implementasi Logika CRUD</h6>
                  <p>Isi setiap method di dalam `app/Http/Controllers/Api/ProductController.php` dengan logika untuk Create, Read, Update, dan Delete.</p>
                  <div class="code-block">
                    <pre><code>
&lt;?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()-&gt;json([
            'success' =&gt; true,
            'message' =&gt; 'Daftar data produk',
            'data' =&gt; $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request-&gt;all(), [
            'name' =&gt; 'required',
            'price' =&gt; 'required|numeric',
        ]);

        if ($validator-&gt;fails()) {
            return response()-&gt;json($validator-&gt;errors(), 422);
        }

        $products = Product::create($request-&gt;all());

        return response()-&gt;json([
            'success' =&gt; true,
            'message' =&gt; 'Produk berhasil dibuat',
            'data' =&gt; $products
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);

        if (!$products) {
            return response()-&gt;json(['message' =&gt; 'Produk tidak ditemukan'], 404);
        }

        return response()-&gt;json([
            'success' =&gt; true,
            'message' =&gt; 'Detail data produk',
            'data' =&gt; $products
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()-&gt;json(['message' =&gt; 'Produk tidak ditemukan'], 404);
        }

        $validator = Validator::make($request-&gt;all(), [
            'name'  =&gt; 'required',
            'price' =&gt; 'required|numeric',
        ]);

        if ($validator-&gt;fails()) {
            return response()-&gt;json($validator-&gt;errors(), 422);
        }

        $product-&gt;update($request-&gt;all());

        return response()-&gt;json([
            'success' =&gt; true,
            'message' =&gt; 'Produk berhasil diperbarui',
            'data' =&gt; $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()-&gt;json(['message' =&gt; 'Produk tidak ditemukan'], 404);
        }

        $product-&gt;delete();

        return response()-&gt;json([
            'success' =&gt; true,
            'message' =&gt; 'Produk berhasil dihapus'
        ], 200);
    }
}
                    </code></pre>
                  </div>
                </div>
              </div>

              <div class="step-card">
                <div class="step-header mb-3">
                  <span class="step-number">4</span>
                  <h5>Mendefinisikan Rute API</h5>
                </div>
                <div class="step-content">
                  <p>Buka file `routes/api.php` dan daftarkan controller kita menggunakan `Route::apiResource`. Ini adalah cara cepat untuk membuat semua endpoint CRUD.</p>
                  <div class="code-block">
use App\Http\Controllers\Api\ProductController;

Route::apiResource('products', ProductController::class);
                  </div>
                  <p>Setelah ini, jalankan `php artisan route:list` untuk melihat semua endpoint yang berhasil dibuat.</p>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-9.jpg" alt="Screenshot output 'php artisan route:list' yang menampilkan rute products" class="img-fluid rounded my-3"/>
                </div>
              </div>

              <div class="step-card">
                <div class="step-header mb-3">
                  <span class="step-number">5</span>
                  <h5>Testing API dengan Postman</h5>
                </div>
                <div class="step-content">
                  <p>Jalankan server pengembangan Laravel dengan `php artisan serve`, lalu uji setiap endpoint menggunakan Postman.</p>
                  <h6>a. Create Product (POST)</h6>
                  <ul>
                    <li><strong>Method:</strong> POST</li>
                    <li><strong>URL:</strong> <code>http://127.0.0.1:8000/api/products</code></li>
                    <li><strong>Body:</strong> `form-data` dengan key `name`, `description`, `price`.</li>
                  </ul>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-8.png" alt="Screenshot Postman saat berhasil melakukan request POST" class="img-fluid rounded my-3"/>

                  <h6>b. Get All Products (GET)</h6>
                  <ul>
                    <li><strong>Method:</strong> GET</li>
                    <li><strong>URL:</strong> <code>http://127.0.0.1:8000/api/products</code></li>
                  </ul>
                  <img src="/Assets/images/Tugas/Tugas-Api/Api-10.png" alt="Screenshot Postman saat berhasil melakukan request GET semua produk" class="img-fluid rounded my-3"/>

                  <h6>c. Update Product (PUT)</h6>
                   <ul>
                    <li><strong>Method:</strong> PUT</li>
                    <li><strong>URL:</strong> <code>http://127.0.0.1:8000/api/products/{id}</code></li>
                     <li><strong>Body:</strong> `x-www-form-urlencoded` dengan key yang ingin diubah.</li>
                  </ul>

                  <h6>d. Delete Product (DELETE)</h6>
                   <ul>
                    <li><strong>Method:</strong> DELETE</li>
                    <li><strong>URL:</strong> <code>http://127.0.0.1:8000/api/products/{id}</code></li>
                  </ul>
                </div>
              </div>
            </section>
            
            <section class="mb-5">
              <h3 class="section-title">Kesimpulan</h3>
              <p>Membuat API CRUD dengan Laravel adalah proses yang efisien dan terstruktur berkat fitur-fitur seperti Artisan, Eloquent ORM, dan sistem routing yang simpel. Dengan mengikuti langkah-langkah di atas, kita dapat membangun backend yang fungsional untuk aplikasi modern. Pengujian menggunakan Postman memastikan setiap endpoint bekerja sesuai harapan sebelum diintegrasikan dengan frontend.</p>
              <p>Link Repository: <a href="https://github.com/Alone1011/2311532011-Rifki-TugasPweb-API-CRUD.git">https://github.com/Alone1011/2311532011-Rifki-TugasPweb-API-CRUD.git</a></p>
            </section>
              
            <section class="mb-5">
              <h3 class="section-title">Komentar (<?= $total_komentar ?>)</h3>

              <!-- Form Komentar -->
              <div class="card mb-4">
                  <div class="card-body">
                      <h5 class="card-title">Tinggalkan Komentar</h5>
                      <form action="function/Komentar.php" method="POST">
                          <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                          <input type="hidden" name="id_artikel" value="6"> 
                          
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
                  $komentar->id_artikel = 6; // Ganti dengan ID artikel dinamis
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
                    href="../pekan-7/laporan-2.php"
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
