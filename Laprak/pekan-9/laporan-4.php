<?php
// Di bagian atas file
include_once '../../Laprak/pekan-6/config/Database.php';
include_once '../../Laprak/pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 4; // ID artikel yang sesuai
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembuatan Halaman Login, Dashboard Menggunakan Framework Laravel - Part 2 - Rifki Yuliandra</title>
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
              Praktikum Pekan 8 - Framework Laravel - Auth, CRUD - Part 2
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Manajemen User Menggunakan Framework Laravel - Part 2
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>11 Juni 2025</span
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

              <!-- Langkah 1: Membuat Controller Resource -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">1</span>
                  <h5>Membuat <code>controller resource</code></h5>
                </div>
                <div class="step-content">
                  <p>Dalam membuat fitur manajemen users, menggunakan fungsi keseluruhan CRUD maka akan membuat <code>controller resource</code>, buka terminal/CMD lalu masukkan perintah</p>
                  <pre><code>
                    php artisan make:controller UserController --resource
                  </code></pre>
                  <p>selanjutnya tambahkan kode program berikut pada route web</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-1.jpg" alt="Controller Resource 1" width="650px"/>
                  <p>Sehingga jika dilihat pemetaan <code>php artisan route:list</code> menjadi seperti gambar dibawah ini</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-2.jpg" alt="Controller Resource 2" width="650px"/>
                  
                </div>
              </div>

              <!-- Langkah 2: Membuat File UserController Resource -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">2</span>
                  <h5>File <code>UserController resource</code></h5>
                </div>
                <div class="step-content">
                  <pre><code>&lt;?php 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
 
class UserController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index() 
    { 
        $users = \App\Models\User::all();
        return view('user.index', ['users' => $users]);   
    } 
 
    /** 
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create() 
    { 
        return view('user.create');
    } 
 
    /** 
     * Store a newly created resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request) 
    { 
        $user = new \App\Models\User;
        $user->name = $request-&gt;get('nama');
        $user->username = $request-&gt;get('username'); 
        $user->email = $request-&gt;get('email'); 
        $user->password = \Hash::make($request-&gt;get('password')); 
        $user->level = json_encode($request-&gt;get('level')); 
         
        $user->save(); 
 
        return redirect()-&gt;route('users.index')-&gt;with('status','user baru berhasil ditambahkan');
    } 
 
    /** 
     * Display the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function show($id) 
    { 
        // 
    } 
 
    /** 
     * Show the form for editing the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function edit($id) 
    { 
        $user = \App\Models\User::findOrFail($id); 
        return view('user.edit', ['user' =&gt; $user]); 
    } 
 
    /** 
     * Update the specified resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function update(Request $request, $id) 
    { 
        $user = \App\Models\User::findOrFail($id); 
        $user->name = $request-&gt;get('nama'); 
        $user->level = json_encode($request-&gt;get('level')); 
        $user->save(); 
        return redirect()-&gt;route('users.index', [$id])-&gt;with('status', 'User berhasil diubah');
    } 
 
    /** 
     * Remove the specified resource from storage. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function destroy($id) 
    { 
        $user = \App\Models\User::findOrFail($id); 
        $user->delete(); 
        return redirect()-&gt;route('users.index')-&gt;with('status', 'User berhasil dihapus');
    } 
}
                  </code></pre>
                </div>
              </div>

              <!-- Langkah 3: Membuat Create Users -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">3</span>
                  <h5>Membuat Create Users</h5>
                </div>
                <div class="step-content">
                  <p>Route untuk menampilkan view form tambah data users adalah users/create. Silahkan buka file <code>UserController</code> kemudian pada action create edit kode program menjadi seperti berikut. </p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-3.jpg" alt="Create Users" width="650px"/>
                  <p>Perintah <code>return view(‘user.create’)</code> artinya menampilkan view create pada folder user, selanjutnya buat folder user didalam folder view, kemudian tambahkan file <code>create.blade.php</code> dan isikan dengan kode program berikut ini.</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-4.jpg" alt="Menampilkan Create" width="650px"/>
                  <p>Selanjutnya tambahkan file css dan javascript select2 kedalam layout <code>main.blade.php</code></p>
                  <pre><code>
&lt;link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /&gt;
&lt;script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"&gt;&lt;/script&gt;

&lt;script&gt;
    $(document).ready(function() {
        $('.select2-multiple').select2({
            placeholder: "Pilih",
            allowClear: true
        });
    });
&lt;/script&gt;
                  </code></pre>
                  <p>Selanjutnya membuat form inputan create user, pada file <code>user/create.blade.php</code> menjadi seperti kode program berikut ini:</p>
                  <pre><code>
@extends('layouts.main') 
@section("judul") Create User @endsection 
@section('konten') 
&lt;div class="card shadow mb-4"&gt; 
    &lt;div class="card-header py-3"&gt; 
    &lt;/div&gt; 
    &lt;div class="card-body"&gt; 
        &lt;div class="row"&gt; 
            &lt;div class="col-lg-9"&gt; 
                &lt;form method="POST" action="{{ route('users.store') }}"&gt; 
                  @csrf 
                    &lt;div class="form-group row"&gt; 
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Nama&lt;/label&gt; 
                        &lt;div class="col-sm-9"&gt; 
                          &lt;input type="text" class="form-control" id="nama" name="nama"&gt; 
                        &lt;/div&gt; 
                    &lt;/div&gt; 
                    &lt;div class="form-group row"&gt; 
                      &lt;label class="col-sm-3 col-form-label text-center"&gt;Email&lt;/label&gt; 
                      &lt;div class="col-sm-9"&gt; 
                        &lt;input type="email" class="form-control" id="email" name="email"&gt; 
                      &lt;/div&gt; 
                    &lt;/div&gt; 
                    &lt;div class="form-group row"&gt; 
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Username&lt;/label&gt; 
                        &lt;div class="col-sm-9"&gt; 
                          &lt;input type="text" class="form-control" id="username" name="username"&gt; 
                        &lt;/div&gt; 
                    &lt;/div&gt; 
                    &lt;div class="form-group row"&gt; 
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Password&lt;/label&gt; 
                        &lt;div class="col-sm-2"&gt; 
                          &lt;input type="password" class="form-control" id="password" name="password"&gt; 
                        &lt;/div&gt; 
                    &lt;/div&gt; 
                    &lt;div class="form-group row"&gt; 
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Level&lt;/label&gt; 
                        &lt;div class="col-sm-4 mr-2"&gt; 
                          &lt;select class="form-control select2-multiple" name="level[]" multiple="multiple"&gt; 
                            &lt;option value="ADMIN"&gt;ADMIN&lt;/option&gt; 
                            &lt;option value="GURU"&gt;GURU&lt;/option&gt; 
                            &lt;option value="STAFF"&gt;STAFF&lt;/option&gt; 
                          &lt;/select&gt; 
                        &lt;/div&gt; 
                    &lt;/div&gt; 
                    &lt;div class="form-group row"&gt; 
                      &lt;div class="col-sm-10 text-center"&gt; 
                        &lt;button type="reset" class="btn btn-warning btn-sm"&gt;Batal&lt;/button&gt; 
                        &lt;button type="submit" class="btn btn-primary btn-sm"&gt;Simpan&lt;/button&gt; 
                      &lt;/div&gt; 
                    &lt;/div&gt; 
                &lt;/form&gt; 
            &lt;/div&gt; 
        &lt;/div&gt; 
    &lt;/div&gt; 
&lt;/div&gt; 
@endsection 
                  </code></pre>
                  <p>Sehingga tampilan form inputan user menjadi seperti pada gambar</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-5.jpg" alt="Create Users" width="650px"/>
                </div>
                <p>Selanjutnya buka action store pada <code>UserController</code> kemudian isikan kode program berikut</p>
                <pre><code>
public function store(Request $request) 
{ 
    $user = new \App\Models\User; 
    $user-&gt;name = $request-&gt;get('nama'); 
    $user-&gt;username = $request-&gt;get('username'); 
    $user-&gt;email = $request-&gt;get('email'); 
    $user-&gt;password = \Hash::make($request-&gt;get('password')); 
    $user-&gt;level = json_encode($request-&gt;get('level')); 

    $user-&gt;save(); 

    return redirect()-&gt;route('users.index')-&gt;with('status','user baru berhasil ditambahkan'); 
}
                </code></pre>
                <h5>Penjelasan:</h5>
                <p>
                  Form create user menggunakan method POST yang akan dikirimkan ke action store dengan route users.store, selanjutnya pada action store akan ditangkap isi form create user dengan cara $request->get(‘nama input’) kemudian disimpan pada table user dengan cara instance model User dengan cara $user = new \App\Models\User setelah itu assign sesuai dengan nama field. Untuk menyimpan kedalam database User menggunakan perintah $user->save, jika data berhasil disimpan akan di redirect ke route users.index dengan mebawa session status. 
                </p>
              </div>

              <!-- Langkah 4: Membuat Read/:ist Users -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">4</span>
                  <h5>Membuat Read/List Users</h5>
                </div>
                <div class="step-content">
                  <p>Selanjutnya setelah fungsi create selesai, maka akan ditampilkan data user. Untuk menampilkan data user menggunakan method GET yaitu http://localhost/users yang mana route ini merupakan action index pada UserController, buka action index kemudian edit menjadi seperti pada program berikut.</p>
                  <pre><code>
public function index() 
{ 
    $user = \App\Models\User::all(); 
    return view('users.index', ['user' =&gt; $user]); 
}
                  </code></pre>
                  <p>Selanjutnya buat file dengan nama <code>index.blade.php</code> pada folder <code>views/user</code>dan isi dengan kode program berikut</p>
                  <pre><code>
@extends('layouts.main') 
@section("judul") Users @endsection 
@section('konten') 
@if(session('status')) 
    &lt;div class="alert alert-success"&gt; 
        {{ session('status') }} 
    &lt;/div&gt; 
@endif  
&lt;div class="card shadow mb-4"&gt; 
    &lt;div class="card-header py-3"&gt; 
    &lt;/div&gt; 
    &lt;div class="card-body"&gt; 
        &lt;div class="table-responsive"&gt; 
        &lt;table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"&gt; 
            &lt;thead&gt; 
              &lt;tr&gt; 
                &lt;th&gt;&lt;b&gt;Name&lt;/b&gt;&lt;/th&gt; 
                &lt;th&gt;&lt;b&gt;Username&lt;/b&gt;&lt;/th&gt; 
                &lt;th&gt;&lt;b&gt;Email&lt;/b&gt;&lt;/th&gt; 
                &lt;th&gt;&lt;b&gt;Action&lt;/b&gt;&lt;/th&gt; 
              &lt;/tr&gt; 
            &lt;/thead&gt; 
            &lt;tbody&gt; 
              @foreach($users as $user) 
                &lt;tr&gt; 
                  &lt;td&gt;{{ $user-&gt;name }}&lt;/td&gt; 
                  &lt;td&gt;{{ $user-&gt;username }}&lt;/td&gt; 
                  &lt;td&gt;{{ $user-&gt;email }}&lt;/td&gt; 
                  &lt;td&gt; 
                    [action] 
                  &lt;/td&gt; 
                &lt;/tr&gt; 
              @endforeach  
            &lt;/tbody&gt; 
          &lt;/table&gt; 
        &lt;/div&gt; 
    &lt;/div&gt; 
&lt;/div&gt; 
@endsection
                  </code></pre>
                  <p>Karena menggunakan datatables tambahkan file css datatable pada bagian head <code>main.blade.php</code> dan file js datatable pada bagian bawah <code>main.blade.php</code></p>
                  <pre><code>
&lt;link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"&gt; 
&lt;script src="{{ asset('sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"&gt;&lt;/script&gt; 
&lt;script src="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"&gt;&lt;/script&gt; 
&lt;script src="{{ asset('sbadmin/js/demo/datatables-demo.js') }}"&gt;&lt;/script&gt;
                  </code></pre>
                  <p>Selanjutnya menambahkan button untuk membuka form tambah user seperti pada kode program berikut ini:</p>
                  <pre><code>
&lt;p&gt; 
    &lt;a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"&gt;Tambah User&lt;/a&gt; 
&lt;/p&gt;
                  </code></pre>
                  <p>Sehingga tampilan list user menjadi seperti pada gambar dibawah ini.</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-6.jpg" alt="Controller Resource 2" width="650px"/>
                </div>
              </div>

              <!-- Langkah 5: Membuat Update Users -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">5</span>
                  <h5>Membuat Update Users</h5>
                </div>
                <div class="step-content">
                  <p>
                    Selanjutnya untuk melakukan proses update data user terlebih dahulu buatkan tombol action yang mengarahkan pada route users/edit/{user}/edit atau action edit pada UserController untuk menampilkan form dan menggunakan form dan menggunakan route users/edit/{user} untuk method PUT. Pertama, ketika akan membuat tombol edit pada tampilan list user, buka file <code>user/index.blade.php</code> pada kolom [action] ganti dengan program berikut ini:
                  </p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-7.jpg" alt="Controller Resource 2" width="650px"/>
                  <p>Jika salah satu tombol ini diklik maka akan menghasilkan string url <code>http://localhost/users/%7buser%7d/edit</code> yang mana {user} merupakan id dari user yang diklik. Selanjutnya buka action edit pada UserController dan isikan program berikut:</p>
                  <pre><code>
public function edit($id) 
{ 
    $user = \App\Models\User::findOrFail($id); 
    return view('user.edit', ['user' =&gt; $user]); 
}
                  </code></pre>
                  <p>Dari kode tersebut akan mengambil data user berdasarkan id user yang didapatkan dan ditampung pada variabel <code>$user</code> dan dikirimkan ke view user.edit, selanjutnya buat view didalam folder <code>user/edit.blade.php</code> dan isikan dengan kode program berikut</p>
                  <pre><code>
&lt;@extends('layouts.main')&gt;

&lt;@section("judul")&gt;
    Edit User
&lt;@endsection&gt;

&lt;@section('konten')&gt;
&lt;div class="card shadow mb-4"&gt;
    &lt;div class="card-header py-3"&gt;
        &lt;h6 class="m-0 font-weight-bold text-primary"&gt;Form Edit User&lt;/h6&gt;
    &lt;/div&gt;
    &lt;div class="card-body"&gt;
        &lt;div class="row"&gt;
            &lt;div class="col-lg-9"&gt;
                &lt;form method="POST" action="{{ route('users.update', $user-&gt;id) }}"&gt;
                    @csrf
                    @method('PUT')
                    
                    &lt;div class="form-group row"&gt;
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Nama&lt;/label&gt;
                        &lt;div class="col-sm-9"&gt;
                            &lt;input type="text" class="form-control" id="nama" name="nama" value="{{ $user-&gt;name }}"&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                    &lt;div class="form-group row"&gt;
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Email&lt;/label&gt;
                        &lt;div class="col-sm-9"&gt;
                            &lt;input type="email" class="form-control" id="email" name="email" value="{{ $user-&gt;email }}"&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                    &lt;div class="form-group row"&gt;
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Username&lt;/label&gt;
                        &lt;div class="col-sm-9"&gt;
                            &lt;input type="text" class="form-control" id="username" name="username" value="{{ $user-&gt;username }}"&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                    &lt;div class="form-group row"&gt;
                        &lt;label class="col-sm-3 col-form-label text-center"&gt;Level&lt;/label&gt;
                        &lt;div class="col-sm-9"&gt;
                            &lt;select class="form-control select2-multiple" name="level[]" multiple="multiple"&gt;
                                &lt;option value="ADMIN" {{ in_array("ADMIN", json_decode($user-&gt;level)) ? "selected" : "" }}&gt;ADMIN&lt;/option&gt;
                                &lt;option value="GURU" {{ in_array("GURU", json_decode($user-&gt;level)) ? "selected" : "" }}&gt;GURU&lt;/option&gt;
                                &lt;option value="STAFF" {{ in_array("STAFF", json_decode($user-&gt;level)) ? "selected" : "" }}&gt;STAFF&lt;/option&gt;
                            &lt;/select&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;

                    &lt;div class="form-group row"&gt;
                        &lt;div class="col-sm-12 text-center"&gt;
                            &lt;a href="{{ route('users.index') }}" class="btn btn-warning btn-sm"&gt;Batal&lt;/a&gt;
                            &lt;button type="submit" class="btn btn-primary btn-sm"&gt;Simpan&lt;/button&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;@endsection&gt;
                  </code></pre>
                  <p>Sehingga tampilan form edit user menjadi seperti pada gambar berikut:</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-8.jpg" alt="Controller Resource 2" width="650px"/>
                  <p>Selanjutnya buka action update pada UserController kemudian isikan dengan kode program berikut</p>
                  <pre><code>
public function update(Request $request, $id) 
{ 
    $user = \App\Models\User::findOrFail($id); 
    $user->name = $request->get('nama'); 
    $user->level = json_encode($request->get('level')); 
    $user->save(); 
    return redirect()->route('users.index', [$id])->with('status', 
    'User berhasil diubah'); 
}
                  </code></pre>
                  <p>Setelah dilakukan edit pada nama user, jika berhasil maka akan didirect ke halaman users dengan menampilkan <code>alert success</code> seperti pada gambar</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-9.jpg" alt="Controller Resource 2" width="650px"/>
                </div>
              </div>

              <!-- Langkah 6: Membuat Delete Users -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">6</span>
                  <h5>Membuat <code>Delete Users</code></h5>
                </div>
                <div class="step-content">
                  <p>Untuk membuat fitur hapus pada tabel user, tambahkan tombol atau link pada list user. Silahkan buka view <code>user/index.blade.php</code> dan tambahkan program berikut</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-10.jpg" alt="Delete User" width="650px"/>
                  <p>Selanjutnya buka action destroy pada UserController dan isikan dengan kode program berikut</p>
                  <pre><code>
public function destroy($id) 
{ 
    $user = \App\Models\User::findOrFail($id); 
    $user->delete(); 
    return redirect()->route('users.index')->with('status', 'User berhasil dihapus');
} 
                  </code></pre>
                  <p>Ketika diklik salah satu tombol hapus maka akan muncul poop up dialog peringatan apakah data akan dihapus seperti pada gambar berikut</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-11.png" alt="Delete Users 1" width="650px"/>
                  <p>Jika kita tekan oke maka data akan terhapus, jika data berhasil dihapus maka akan muncul pesan seperti pada gambar berikut</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-12.png" alt="Delete Users 2" width="650px"/>
                </div>
              </div>

              <!-- Langkah 7: Menambahkan Menu User -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">7</span>
                  <h5>Menambahkan Menu Users</h5>
                </div>
                <div class="step-content">
                  <p>Buka view <code>Layout/sidebar.blade.php</code> kemudian tambahkan kode berikut</p>
                  <pre><code>
&lt;li class="nav-item"&gt; 
    &lt;a class="nav-link" href="{{ route('users.index') }}"&gt; 
        &lt;i class="fas fa-fw fa-users"&gt;&lt;/i&gt; 
        &lt;span&gt;Users&lt;/span&gt;
    &lt;/a&gt; 
&lt;/li&gt;
                  </code></pre>
                  <p>Sehingga pada aplikasi akan muncul menu users seperti pada gambar ini</p>
                  <img src="../../Assets/images/laprak/Pekan_9/pekan9-13.jpg" alt="Manajemen user" width="650px"/>
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
                          <input type="hidden" name="id_artikel" value="4"> 
                          
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
                  $komentar->id_artikel = 4; // Ganti dengan ID artikel dinamis
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
