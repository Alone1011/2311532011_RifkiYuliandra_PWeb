<?php
// Di bagian atas file
include_once '../../Laprak/pekan-6/config/Database.php';
include_once '../../Laprak/pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 3; // ID artikel yang sesuai
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembuatan Halaman Login, Dashboard Menggunakan Framework Laravel - Part 1 - Rifki Yuliandra</title>
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
          href="../pekan-8/laporan-3.php"
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
              Praktikum Pekan 8 - Framework Laravel - Auth, CRUD - Part 1
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Pembuatan Halaman Login, Dashboard Menggunakan Framework Laravel - Part 1
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>27 Mei 2025</span
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

              <!-- Langkah 1: Buat Project Baru -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">1</span>
                  <h5>Membuat project Laravel dengan nama Laravel-sisfo-A</h5>
                </div>
                <div class="step-content">
                  <p>Ada beberapa cara yang dapat digunakan untuk membuat project baru Laravel yaitu dengan <b>Global Installer Laravel</b> dan <b>Composer</b>. Pada praktikum ini saya menggunakan metode composer</p>
                  <ol>
                    <li>
                      Buat folder / workspace didalam folder htdocs, disini saya membuat dengan nama  Laravel
                    </li>
                    <li>
                      masuk kedalam cmder, lalu masuk ke dalam folder Laravel tadi. Selanjutnya ketikkan perintah
                      <pre><code>composer create-project laravel/laravel=^12.0 laravel-sisfo-A --prefer-dist</code></pre>
                    </li>
                    <li>
                      untuk menjalankan project dapat menggunakan perintah
                      <code>php artisan serve</code>
                    </li>
                    <img src="../../Assets/images/laprak/Pekan_8/pekan8-1.png" alt="Buat Project" width="650px"/>
                  </ol>
                  
                </div>
              </div>

              <!-- Langkah 2: Konfigurasi Database -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">2</span>
                  <h5>Konfigurasi Database</h5>
                </div>
                <div class="step-content">
                  <p>Buka file .env kemudian isikan konfigurasi database berikut ini.</p>
                  <img src="../../Assets/images/laprak/Pekan_8/pekan8-2.png" alt="Konfigurasi Database" width="650px"/>
                </div>
              </div>
              
              
              <!-- Langkah 3: User Authentication -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">3</span>
                  <h5>User Authentication</h5>
                </div>
                <div class="step-content">
                  <p>User authentication pada studi kasus ini menggunakan fitur authentication bawaan Laravel</p>
                  <!-- Install package laravel/ui -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#installpackageCollapse"
                      >
                        Install package laravel/ui
                      </button>
                    </h2>
                    <div
                      id="installpackageCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Buka terminal/cmd kemudian ketikkan perintah berikut</p>
                        <code> composer require laravel/ui</code>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-3.png" alt="User Authentication" width="650px"/>
                        <br>        
                      </div>
                    </div>
                  </div>

                  <!-- Authentication fitur -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#authenticationfiturCollapse"
                        >
                        Authentication fitur
                      </button>
                    </h2>
                    <div
                      id="authenticationfiturCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Ketikkan perintah berikut di terminal/cmd<code>php artisan ui bootstrap --auth</code>, jika berhasil maka akan tampil</p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-4.png" alt="User Authentication" width="650px"/>
                      </div>
                    </div>
                  </div>

                  <!-- Install dan Compile -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#installandcompileCollapse"
                        >
                        Install dan Compile
                      </button>
                    </h2>
                    <div
                      id="installandcompileCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Ketikkan perintah <code>npm install && npm run dev</code> untuk menginstall dan compile file-file asset bawaan, dengan perintah tersebut maka file-file yang dibutuhkan untuk authentication akan digenerate secara otomatis, seperti halaman login, register dan forgot password.</p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-5.png" alt="User Authentication" width="650px"/>
                      </div>
                    </div>
                  </div>
                
                  <!-- Migration -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#migrationCollapse"
                        >
                        Migration
                      </button>
                    </h2>
                    <div
                      id="migrationCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Ketikkan perintah <code>php artisan migrate</code> maka Laravel akan membuat migration table authentication, jika sebelumnya belum terdapat database maka akan di konfirmasi dari laravel apakah akan dibuatkan databasenya atau tidak.</p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-6.png" alt="Migration" width="650px"/>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-7.png" alt="Migration" width="650px"/>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-8.png" alt="Migration" width="650px"/>
                      </div>
                    </div>
                  </div>
                
                  <!-- Halaman login -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#loginCollapse"
                        >
                        Halaman Login
                      </button>
                    </h2>
                    <div
                      id="loginCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Akses url <a href="http://127.0.0.1:8000/login">http://127.0.0.1:8000/login</a> pada browser maka akan tampil halaman login</p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-9.png" alt="Login" width="650px"/>
                      </div>
                    </div>
                  </div>
                
                  <!-- Halaman Register -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#registerCollapse"
                        >
                        Halaman Register
                      </button>
                    </h2>
                    <div
                      id="registerCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Akses url <a href="http://127.0.0.1:8000/register">http://127.0.0.1:8000/register</a> pada browser maka akan tampil halaman register</p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-10.png" alt="Register" width="650px"/>
                      </div>
                    </div>
                  </div>
                
                  <!-- Costum Table Users -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#costumtableCollapse"
                        >
                        Costum Table
                      </button>
                    </h2>
                    <div
                      id="costumtableCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Authentication Laravel secara otomatis akan mengenerate table Users  yang berisi tentang informasi data user, berikut struktur table users.</p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-11.png" alt="Costum Table" width="650px"/>
                        <br>
                        <p>Dari struktur table user tersebut maka perlu ditambahkan beberapa field seperti username, level dan status, maka perlu membuat sebuah migration  untuk menambahkan field-field tersebut. maka ketikkan <code>php artisan make:migration costum_table_users</code> maka folder database menjadi</p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-12.png" alt="Costum Table" width="650px"/>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-14.png" alt="Costum Table" width="650px"/>
                        
                      </div>
                    </div>
                  </div>
                
                  <!-- Seeding User -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#seedingCollapse"
                        >
                        Seeding User
                      </button>
                    </h2>
                    <div
                      id="seedingCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Setelah berhasil melakukan costum table users selanjutnya membuat user menggunakan fitur seeding pada Laravel, buat seeder dengan nama AdminSeeder dengan perintah</p>
                        <code>php artisan make:seeder AdminSeeder</code>
                        <p>Maka secara otomatis file AdminSeeder.php akan dibuat pada folder database/Seeder. Kemudian buka file tersebut dan buat akun admin seperti pada kode program berikut.</p>
                        <pre><code>
                          &lt;?php 
                            namespace Database\Seeders; 
                            use Illuminate\Database\Console\Seeds\WithoutModelEvents; 
                            use Illuminate\Database\Seeder; 
                            class AdminSeeder extends Seeder 
                            { 
                            /** 
                            * Run the database seeds. 
                            * 
                            * @return void 
                            */ 
                            public function run() 
                            { 
                            $admin = new \App\Models\User; 
                            $admin->username = "admin"; 
                            $admin->name = "Admin Aplikasi"; 
                            $admin->email = "admin@sisfo.com"; 
                            $admin->level = json_encode(["ADMIN"]); 
                            $admin->password = \Hash::make("12345678"); 
                            $admin->save(); 
                            $this->command->info("User Admin berhasil ditambahkan"); 
                            } 
                            } 
                        </code></pre>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-16.png" alt="seeding" width="650px"/>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-15.png" alt="seeding" width="650px"/>
                        <p>
                          Selanjutnya untuk menjalankan seeding dengan cara menjalankan perintah berikut <code>php artisan db:seed --class=AdminSeeder</code> jika berhasil maka akan muncul
                        </p>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-24.png" alt="seeding" width="650px"/>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Langkah 4: Templating atau Layouting  -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">4</span>
                  <h5>Templating atau Layouting </h5>
                </div>
                <div class="step-content">
                  <p>Authentication Laravel secara otomatis mengenerate tampilan dashboard aplikasi, langkah selanjutnya lakukakan konfigurasi tampilan aplikasi sesuai dengan template yang dipilih. Pada studi kasus ini menggunakan templalte SB Admin 2 dengan framework bootstrap</p>
                  <p>Link Unduh: <br><a href="https://startbootstrap.com/theme/sb-admin-2">https://startbootstrap.com/theme/sb-admin-2</a></p>
                  <p>Setelah didownload, ekstrak dan buat folder <code>public</code> project Laravel dengan nama <code>sbadmin</code> dan salin seluruh asset template sbadmin kedalam folder tersebut.</p>
                  <img src="../../Assets/images/laprak/Pekan_8/pekan8-2.png" alt="Konfigurasi Database" width="650px"/>

                  <!-- Halaman login aplikasi -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#loginpageCollapse"
                        >
                        Halaman login aplikasi
                      </button>
                    </h2>
                    <div
                      id="loginpageCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Buka file <code>app.blade.php</code> pada folder view / layout kemudian ganti dengan kode program dibawah ini.</p>
                        <pre><code>
&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;

    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;
    &lt;meta name=&quot;description&quot; content=&quot;&quot;&gt;
    &lt;meta name=&quot;author&quot; content=&quot;&quot;&gt;

    &lt;title&gt;Sisfo - Login&lt;/title&gt;

    &lt;link href=&quot;{{asset('sbadmin/vendor/fontawesomefree/css/all.min.css')}}&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito:200,200i,300, 300i,400,400i,600,600i,700,700i,800,800i,900,900i&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;link href=&quot;{{asset('sbadmin/css/sb-admin-2.min.css')}}&quot; rel=&quot;stylesheet&quot;&gt;

&lt;/head&gt;

&lt;body class=&quot;bg-gradient-primary&quot;&gt;

    &lt;div class=&quot;container&quot;&gt;

        &lt;div class=&quot;row justify-content-center&quot;&gt;

            &lt;div class=&quot;col-xl-6 col-lg-6 col-md-9&quot;&gt;

                &lt;div class=&quot;card o-hidden border-0 shadow-lg my-5&quot;&gt;
                    &lt;div class=&quot;card-body p-0&quot;&gt;

                        &lt;div class=&quot;row&quot;&gt;
                            &lt;div class=&quot;col-lg-12 text-center&quot;&gt;
                                &lt;div class=&quot;p-5&quot;&gt;
                                    &lt;div class=&quot;text-center&quot;&gt;
                                        &lt;h1 class=&quot;h4 text-gray-900 mb-4&quot;&gt;Halaman Login&lt;/h1&gt;
                                    &lt;/div&gt;
                                    &lt;form class=&quot;user&quot; method=&quot;POST&quot; action=&quot;{{ route('login') }}&quot;&gt;
                                    @csrf
                                        &lt;div class=&quot;form-group&quot;&gt;
                                            &lt;input id=&quot;email&quot; type=&quot;email&quot; class=&quot;form-control form-control-user @error('email') is-invalid @enderror&quot;
                                            name=&quot;email&quot; value=&quot;{{ old('email') }}&quot; required autocomplete=&quot;email&quot; autofocus/&gt;

                                            @error('email')
                                                &lt;span class=&quot;invalidfeedback&quot; role=&quot;alert&quot;&gt;
                                                    &lt;strong&gt;{{ $message }}&lt;/strong&gt;
                                                &lt;/span&gt;
                                            @enderror
                                        &lt;/div&gt;
                                        &lt;div class=&quot;form-group&quot;&gt;
                                            &lt;input id=&quot;password&quot; type=&quot;password&quot; class=&quot;form-control form-control-user @error('password') is-invalid @enderror&quot;
                                            name=&quot;password&quot; value=&quot;{{ old('password') }}&quot; required  /&gt;

                                            @error('password')
                                                &lt;span class=&quot;invalidfeedback&quot; role=&quot;alert&quot;&gt;
                                                    &lt;strong&gt;{{ $message }}&lt;/strong&gt;
                                                &lt;/span&gt;
                                            @enderror
                                        &lt;/div&gt;

                                        &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary btn-user btn-block&quot;&gt;
                                            login
                                        &lt;/button&gt;
                                    &lt;/form&gt;

                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;

            &lt;/div&gt;
        &lt;/div&gt;

    &lt;/div&gt;

    &lt;script src=&quot;{{asset('sbadmin/vendor/jquery/jquery.min.js')}}&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;vendor/bootstrap/js/bootstrap.bundle.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;{{asset('sbadmin/vendor/jquery
    easing/jquery.easing.min.js')}}&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;{{asset('sbadmin/js/sb-admin-2.min.js')}}&quot;&gt;&lt;/script&gt;

&lt;/body&gt;
&lt;/html&gt;
                        </code></pre>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-20.png" alt="Konfigurasi Database" width="650px"/>
                        <p><i>Gambar Halaman Login Aplikasi</i></p>
                      </div>
                    </div>
                  </div>

                  <!-- Layout Global -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#layoutglobalCollapse"
                        >
                        Layout Global
                      </button>
                    </h2>
                    <div
                      id="layoutglobalCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Layout ini akan digunakan sebagai layout utama aplikasi dan view-view lain akan mengambil resource disini, karena <code>app.blade.php</code> sudah digunakan untuk view login, maka diperlukan sebuah layout baru. Buat file dengan nama <code>main.blade.php</code> pada folder view/layout dan isikan kode program berikut.</p>
                        <pre><code>
&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;

        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;
        &lt;meta name=&quot;description&quot; content=&quot;&quot;&gt;
        &lt;meta name=&quot;author&quot; content=&quot;&quot;&gt;

        &lt;title&gt;Sisfo - @yield('judul')&lt;/title&gt;

        &lt;!-- Custom fonts for this template--&gt;
        &lt;link href=&quot;{{asset('sbadmin/vendor/fontawesomefree/css/all.min.css')}}&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;&gt;
        &lt;link href=&quot;https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&quot; rel=&quot;stylesheet&quot;&gt;

        &lt;!-- Custom styles for this template--&gt;
        &lt;link href=&quot;{{asset('sbadmin/css/sb-admin-2.min.css')}}&quot; rel=&quot;stylesheet&quot;&gt;

    &lt;/head&gt;
    &lt;body id=&quot;page-top&quot;&gt;

        &lt;!-- Page Wrapper --&gt;
        &lt;div id=&quot;wrapper&quot;&gt;

            &lt;!-- Sidebar --&gt;
            @include(&quot;layouts.sidebar&quot;)
            &lt;!-- End of Sidebar --&gt;

            &lt;!-- Content Wrapper --&gt;
            &lt;div id=&quot;content-wrapper&quot; class=&quot;d-flex flex-column&quot;&gt;

                &lt;!-- Main Content --&gt;
                &lt;div id=&quot;content&quot;&gt;

                    &lt;!-- Topbar --&gt;
                    @include('layouts.topbar')
                    &lt;!-- End of Topbar --&gt;

                    &lt;!-- Begin Page Content --&gt;
                    &lt;div class=&quot;container-fluid&quot;&gt;

                        &lt;!-- Page Heading --&gt;
                        &lt;h1 class=&quot;h3 mb-4 text-gray-800&quot;&gt;@yield(&quot;judul&quot;)&lt;/h1&gt;
                        @yield(&quot;konten&quot;)

                    &lt;/div&gt;
                    &lt;!-- /.container-fluid --&gt;

                &lt;/div&gt;
                &lt;!-- End of Main Content --&gt;

                &lt;!-- Footer --&gt;
                &lt;footer class=&quot;sticky-footer bg-white&quot;&gt;
                    &lt;div class=&quot;container my-auto&quot;&gt;
                        &lt;div class=&quot;copyright text-center my-auto&quot;&gt;
                            &lt;span&gt;Copyright &amp;copy; Sisfo&lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/footer&gt;
                &lt;!-- End of Footer --&gt;

            &lt;/div&gt;
            &lt;!-- End of Content Wrapper --&gt;

        &lt;/div&gt;
        &lt;!-- End of Page Wrapper --&gt;

        &lt;!-- Scroll to Top Button--&gt;
        &lt;a class=&quot;scroll-to-top rounded&quot; href=&quot;#page-top&quot;&gt;
            &lt;i class=&quot;fas fa-angle-up&quot;&gt;&lt;/i&gt;
        &lt;/a&gt;

        &lt;!-- Logout Modal--&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;logoutModal&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot; aria-labelledby=&quot;exampleModalLabel&quot; aria-hidden=&quot;true&quot;&gt;
            &lt;div class=&quot;modal-dialog&quot; role=&quot;document&quot;&gt;
                &lt;div class=&quot;modal-content&quot;&gt;
                    &lt;div class=&quot;modal-header&quot;&gt;
                        &lt;h5 class=&quot;modal-title&quot; id=&quot;exampleModalLabel&quot;&gt;Yakin akan keluar aplikasi ?&lt;/h5&gt;
                        &lt;button class=&quot;close&quot; type=&quot;button&quot; datadismiss=&quot;modal&quot; aria-label=&quot;Close&quot;&gt;
                            &lt;span aria-hidden=&quot;true&quot;&gt;&times;&lt;/span&gt;
                        &lt;/button&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;modal-body&quot;&gt;Silahkan klik tombol logout untuk keluar aplikasi&lt;/div&gt;
                    &lt;div class=&quot;modal-footer&quot;&gt;
                        &lt;button class=&quot;btn btn-secondary&quot; type=&quot;button&quot; datadismiss=&quot;modal&quot;&gt;Cancel&lt;/button&gt;
                        &lt;form action=&quot;{{route(&quot;logout&quot;)}}&quot; method=&quot;POST&quot;&gt;
                            @csrf
                            &lt;button class=&quot;btn btn-primary&quot; style=&quot;cursor:pointer&quot;&gt;Logout&lt;/button&gt;
                        &lt;/form&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Bootstrap core JavaScript--&gt;
        &lt;script src=&quot;{{asset('sbadmin/vendor/jquery/jquery.min.js')}}&quot;&gt;&lt;/script&gt;
        &lt;script src=&quot;{{asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}&quot;&gt;&lt;/script&gt;

        &lt;!-- Core plugin JavaScript--&gt;
        &lt;script src=&quot;{{asset('sbadmin/vendor/jqueryeasing/jquery.easing.min.js')}}&quot;&gt;&lt;/script&gt;

        &lt;!-- Custom scripts for all pages--&gt;
        &lt;script src=&quot;{{asset('sbadmin/js/sb-admin-2.min.js')}}&quot;&gt;&lt;/script&gt;

    &lt;/body&gt;
&lt;/html&gt;
                        </code></pre>
                        <p>Pada layout <code>main.blade.php</code> akan memanggil <code>view sidebar.blade.php</code> dan view <code>topbar.blade.php</code> kedalam layout <code>main.blade.php</code> dengan menggunakan perintah <code>@include</code> sehingga tampilan kedua view tersebut akan tampil pada layout main. Selanjutnya juga akan menampilkan data judul dan konten dari view yang akan menggunakan layout <code>main.blade.php</code> dengan perintah <code>@yeild('judul')</code> dan <code>@yeild('konten')</code>.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Sidebar -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#sidebarCollapse"
                        >
                        Sidebar
                      </button>
                    </h2>
                    <div
                      id="sidebarCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Buat file pada folder layout dengan nama <code>sidebar.blade.php</code> dan isi dengan kode program berikut.</p>
                        <pre><code>
&lt;ul class=&quot;navbar-nav bg-gradient-primary sidebar sidebar-dark accordion&quot; id=&quot;accordionSidebar&quot;&gt;

    &lt;!-- Sidebar - Brand --&gt;
    &lt;a class=&quot;sidebar-brand d-flex align-items-center justify-content-center&quot; href=&quot;#&quot;&gt;
        &lt;div class=&quot;sidebar-brand-icon rotate-n-15&quot;&gt;
            &lt;i class=&quot;fas fa-laugh-wink&quot;&gt;&lt;/i&gt;
        &lt;/div&gt;
        &lt;div class=&quot;sidebar-brand-text mx-3&quot;&gt;Sisfo&lt;/div&gt;
    &lt;/a&gt;

    &lt;!-- Divider --&gt;
    &lt;hr class=&quot;sidebar-divider my-0&quot;&gt;

    &lt;!-- Nav Item - Dashboard --&gt;
    &lt;li class=&quot;nav-item&quot;&gt;
        &lt;a class=&quot;nav-link&quot; href=&quot;index.html&quot;&gt;
            &lt;i class=&quot;fas fa-fw fa-tachometer-alt&quot;&gt;&lt;/i&gt;
            &lt;span&gt;Dashboard&lt;/span&gt;
        &lt;/a&gt;
    &lt;/li&gt;

    &lt;!-- Divider --&gt;
    &lt;hr class=&quot;sidebar-divider d-none d-md-block&quot;&gt;

    &lt;!-- Sidebar Toggler (Sidebar) --&gt;
    &lt;div class=&quot;text-center d-none d-md-inline&quot;&gt;
        &lt;button class=&quot;rounded-circle border-0&quot; id=&quot;sidebarToggle&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;

&lt;/ul&gt;
                        </code></pre>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-21.png" alt="Konfigurasi Database" width="650px"/>
                        <p><i>Gambar Sidebar</i></p>
                      </div>
                    </div>
                  </div>

                  <!-- Topbar -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#topbarCollapse"
                        >
                        Topbar
                      </button>
                    </h2>
                    <div
                      id="topbarCollapse"
                      class="accordion-collapse collapse"
                    >
                      <div class="accordion-body">
                        <p>Buat file pada folder layout dengan nama <code>topbar.blade.php</code> dan isi dengan kode program berikut.</p>
                        <pre><code>
&lt;nav class=&quot;navbar navbar-expand navbar-light bg-white topbar mb-4 static
top shadow&quot;&gt;

    &lt;!-- Sidebar Toggle (Topbar) --&gt;
    &lt;button id=&quot;sidebarToggleTop&quot; class=&quot;btn btn-link d-md-none rounded-circle mr-3&quot;&gt;
        &lt;i class=&quot;fa fa-bars&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;

    &lt;!-- Topbar Navbar --&gt;
    &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
        &lt;div class=&quot;topbar-divider d-none d-sm-block&quot;&gt;&lt;/div&gt;

        &lt;!-- Nav Item - User Information --&gt;
        &lt;li class=&quot;nav-item dropdown no-arrow&quot;&gt;
            @if (\Auth::user())
                &lt;a class=&quot;nav-link dropdown-toggle&quot; href=&quot;#&quot; id=&quot;userDropdown&quot; role=&quot;button&quot;
                    data-toggle=&quot;dropdown&quot; aria-haspopup=&quot;true&quot; ariaexpanded=&quot;false&quot;&gt;
                    &lt;span class=&quot;mr-2 d-none d-lg-inline text-gray-600 small&quot;&gt;{{ Auth::user()-&gt;name }}&lt;/span&gt;
                    &lt;img class=&quot;img-profile rounded-circle&quot;
                        src=&quot;{{ asset('sbadmin/img/undraw_profile.svg')}}&quot;&gt;
                &lt;/a&gt;
            @endif

            &lt;!-- Dropdown - User Information --&gt;
            &lt;div class=&quot;dropdown-menu dropdown-menu-right shadow animated--grow-in&quot;
                aria-labelledby=&quot;userDropdown&quot;&gt;
                &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;
                    &lt;i class=&quot;fas fa-user fa-sm fa-fw mr-2 text-gray 400&quot;&gt;&lt;/i&gt;
                    Profile
                &lt;/a&gt;
                &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;
                    &lt;i class=&quot;fas fa-cogs fa-sm fa-fw mr-2 text-gray 400&quot;&gt;&lt;/i&gt;
                    Settings
                &lt;/a&gt;
                &lt;div class=&quot;dropdown-divider&quot;&gt;&lt;/div&gt;
                &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot; data-toggle=&quot;modal&quot; data-target=&quot;#logoutModal&quot;&gt;
                    &lt;i class=&quot;fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400&quot;&gt;&lt;/i&gt;
                    Logout
                &lt;/a&gt;
            &lt;/div&gt;
        &lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;
                        </code></pre>
                        <img src="../../Assets/images/laprak/Pekan_8/pekan8-22.png" alt="Konfigurasi Database" width="650px"/>
                        <p><i>Gambar Sidebar</i></p>
                      </div>
                    </div>
                  </div>
                  <h3>Cara penggunaan layout <code>main.blade.php</code></h3>
                  <p>Sebagai contoh menggunakan view <code>home.blade.php</code>, buka file tersebut dan isikan kode program berikut.</p>
                  <pre><code>
                      @extends('layouts.main') 
                      @section("judul") Dasboard @endsection 
                      @section('konten') 
                      &lt;P&gt;dashboard&lt;/P&gt; 
                      @endsection
                  </code></pre>
                  <p>Jika konfigurasi layout berhasil makan akan tampil seperti pada gambar</p>
                  <img src="../../Assets/images/laprak/Pekan_8/pekan8-23.png" alt="Konfigurasi Database" width="650px"/>
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
                          <input type="hidden" name="id_artikel" value="3"> 
                          
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
                  $komentar->id_artikel = 3; // Ganti dengan ID artikel dinamis
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
                    href="../pekan-7/laporan-2.php"
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
