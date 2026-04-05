<?php
// Di bagian atas file
include_once '../../Laprak/pekan-6/config/Database.php';
include_once '../../Laprak/pekan-6/model/Komentar.php';

$database = new Database();
$db = $database->getConnection(); 

$komentar = new Komentar($db);
$komentar->id_artikel = 5; // ID artikel yang sesuai
$result_komentar = $komentar->read();
$total_komentar = $result_komentar->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Laravel Relationship - Rifki Yuliandra</title>
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
      .erd-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
      }
      .erd-table th, .erd-table td {
        border: 1px solid #ddd;
        padding: 8px;
      }
      .erd-table th {
        background-color: #f2f2f2;
        text-align: left;
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
          href="../pekan-10/laporan-5.php"
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
              Praktikum Pekan 10 - Laravel Relationship
            </li>
          </ol>
        </nav>
        <h1 class="display-4 fw-bold" style="color: #006970">
          Implementasi Relationship di Laravel: One-to-Many dan Many-to-Many
        </h1>
        <div class="article-meta mt-3">
          <span class="me-3"
            ><i class="fas fa-calendar-alt me-1"></i>19 Mei 2025</span
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
            <!-- Teori Relationship -->
            <section class="mb-5">
              <h3 class="section-title">Konsep Relationship dalam Laravel</h3>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-link fa-2x mb-3"></i>
                    <h5>One-to-Many</h5>
                    <p>
                      Relasi dimana satu model memiliki banyak model lain. Contoh: 
                      Satu jurusan memiliki banyak mahasiswa
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-project-diagram fa-2x mb-3"></i>
                    <h5>Many-to-Many</h5>
                    <p>
                      Relasi dimana banyak model terhubung dengan banyak model lain. 
                      Contoh: Mahasiswa mengambil banyak mata kuliah
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-database fa-2x mb-3"></i>
                    <h5>Eloquent ORM</h5>
                    <p>
                      Sistem ORM di Laravel yang memudahkan interaksi dengan database 
                      termasuk relationship
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="theory-card">
                    <i class="fas fa-table fa-2x mb-3"></i>
                    <h5>Pivot Table</h5>
                    <p>
                      Tabel perantara untuk menghubungkan relasi many-to-many, 
                      menyimpan foreign key dari kedua model
                    </p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Langkah Implementasi -->
            <section class="mb-5">
              <h3 class="section-title">Langkah Implementasi sesuai Modul</h3>

              <!-- A. Persiapan Awal  -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">A</span>
                  <h5>Persiapan Awal</h5>
                </div>
                <div class="step-content">
                  <h6>Struktur Database dan Relationship:</h6>
                  <ul class="implementation-list">
                    <li><strong>Student</strong> belongs to <strong>Major</strong> (Many-to-One)</li>
                    <li><strong>Student</strong> belongs to many <strong>Subject</strong> (Many-to-Many)</li>
                    <li><strong>Major</strong> has many <strong>Student</strong> (One-to-Many)</li>
                    <li><strong>Subject</strong> belongs to many <strong>Student</strong> (Many-to-Many)</li>
                  </ul>
                  
                  <h6 class="mt-4">ERD (Entity Relationship Diagram):</h6>
                  <table class="erd-table">
                    <tr>
                      <th colspan="3" class="text-center">MAJOR</th>
                    </tr>
                    <tr>
                      <th>Type</th>
                      <th>Column</th>
                      <th>Constraint</th>
                    </tr>
                    <tr>
                      <td>bigint</td>
                      <td>id</td>
                      <td>PK</td>
                    </tr>
                    <tr>
                      <td>string</td>
                      <td>name</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>timestamp</td>
                      <td>created_at</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>timestamp</td>
                      <td>updated_at</td>
                      <td></td>
                    </tr>
                  </table>
                  
                  <p class="text-center">has many &emsp; | &emsp; belongs to</p>
                  
                  <table class="erd-table">
                    <tr>
                      <th colspan="3" class="text-center">STUDENT</th>
                    </tr>
                    <tr>
                      <th>Type</th>
                      <th>Column</th>
                      <th>Constraint</th>
                    </tr>
                    <tr>
                      <td>bigint</td>
                      <td>id</td>
                      <td>PK</td>
                    </tr>
                    <tr>
                      <td>string</td>
                      <td>nim</td>
                      <td>UK</td>
                    </tr>
                    <tr>
                      <td>string</td>
                      <td>name</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>text</td>
                      <td>address</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>bigint</td>
                      <td>major_id</td>
                      <td>FK</td>
                    </tr>
                    <tr>
                      <td>timestamp</td>
                      <td>created_at</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>timestamp</td>
                      <td>updated_at</td>
                      <td></td>
                    </tr>
                  </table>
                </div>
              </div>

              <!-- B. Migration -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">B</span>
                  <h5>Membuat Migration</h5>
                </div>
                <div class="step-content">
                  <h6>A. Migration untuk tabel majors</h6>
                  <pre><code>php artisan make:migration create_majors_table</code></pre>
                  <pre><code>&lt;?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('majors');
    }
};</code></pre>
                  
                  <h6 class="mt-4">B. Migration untuk tabel students</h6>
                  <pre><code>php artisan make:migration create_students_table</code></pre>
                  <pre><code>&lt;?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('name');
            $table->text('address');
            $table->foreignId('major_id')->constrained('majors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};</code></pre>
                  
                  <h6 class="mt-4">C. Migration untuk tabel subjects</h6>
                  <pre><code>php artisan make:migration create_subjects_table</code></pre>
                  <pre><code>&lt;?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};</code></pre>
                  
                  <h6 class="mt-4">D. Migration untuk tabel pivot student_subject</h6>
                  <pre><code>php artisan make:migration create_student_subject_table</code></pre>
                  <pre><code>&lt;?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->timestamps();
            // Mencegah duplikasi kombinasi student_id dan subject_id
            $table->unique(['student_id', 'subject_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('student_subject');
    }
};</code></pre>
                  
                  <h6 class="mt-4">Jalankan Migration</h6>
                  <pre><code>php artisan migrate</code></pre>
                </div>
              </div>

              <!-- C. Model dengan Relationship -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">C</span>
                  <h5>Membuat Model dengan Relationship</h5>
                </div>
                <div class="step-content">
                  <h6>A. Model Major</h6>
                  <pre><code>php artisan make:model Major</code></pre>
                  <pre><code>&lt;?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship: One Major has many Students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}</code></pre>
                  
                  <h6 class="mt-4">B. Model Student</h6>
                  <pre><code>php artisan make:model Student</code></pre>
                  <pre><code>&lt;?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nim', 'name', 'address', 'major_id'];
    
    // Relationship: Many Students belong to one Major
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    // Relationship: Many Students belong to many Subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}</code></pre>
                  
                  <h6 class="mt-4">C. Model Subject</h6>
                  <pre><code>php artisan make:model Subject</code></pre>
                  <pre><code>&lt;?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sks'];
    
    // Relationship: Many Subjects belong to many Students
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}</code></pre>
                </div>
              </div>

              <!-- D. Seeder Data Sample -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">D</span>
                  <h5>Seeder untuk Data Sample</h5>
                </div>
                <div class="step-content">
                  <h6>A. Seeder untuk Major</h6>
                  <pre><code>php artisan make:seeder MajorSeeder</code></pre>
                  <pre><code>&lt;?php
namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run()
    {
        $majors = [
            ['name' => 'Teknik Informatika'], 
            ['name' => 'Sistem Informasi'], 
            ['name' => 'Teknik Komputer'], 
            ['name' => 'Manajemen Informatika']
        ];
        
        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}</code></pre>
                  
                  <h6 class="mt-4">B. Seeder untuk Subject</h6>
                  <pre><code>php artisan make:seeder SubjectSeeder</code></pre>
                  <pre><code>&lt;?php
namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['name' => 'Pemrograman Web', 'sks' => 3],
            ['name' => 'Database', 'sks' => 3],
            ['name' => 'Algoritma', 'sks' => 2],
            ['name' => 'Jaringan Komputer', 'sks' => 3],
            ['name' => 'Sistem Operasi', 'sks' => 2]
        ];
        
        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}</code></pre>
                  
                  <h6 class="mt-4">C. Seeder untuk Student</h6>
                  <pre><code>php artisan make:seeder StudentSeeder</code></pre>
                  <pre><code>&lt;?php
namespace Database\Seeders;

use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $students = [
            ['nim' => '20210001', 'name' => 'Ahmad Rizki', 'address' => 'Jl. Merdeka No. 1', 'major_id' => 1],
            ['nim' => '20210002', 'name' => 'Siti Nurhaliza', 'address' => 'Jl. Sudirman No. 15', 'major_id' => 1],
            ['nim' => '20210003', 'name' => 'Budi Santoso', 'address' => 'Jl. Pahlawan No. 8', 'major_id' => 2],
            ['nim' => '20210004', 'name' => 'Devi Kartika', 'address' => 'Jl. Diponegoro No. 22', 'major_id' => 2],
            ['nim' => '20210005', 'name' => 'Eko Prasetyo', 'address' => 'Jl. Gatot Subroto No. 11', 'major_id' => 3],
        ];
        
        foreach ($students as $studentData) {
            $student = Student::create($studentData);
            // Assign random subjects to each student
            $subjects = Subject::inRandomOrder()->take(rand(2, 4))->pluck('id');
            $student->subjects()->attach($subjects);
        }
    }
}</code></pre>
                  
                  <h6 class="mt-4">D. Update DatabaseSeeder</h6>
                  <pre><code>&lt;?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MajorSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
        ]);
    }
}</code></pre>
                  
                  <h6 class="mt-4">Jalankan Seeder</h6>
                  <pre><code>php artisan db:seed</code></pre>
                </div>
              </div>

              <!-- E. Controller -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">E</span>
                  <h5>Membuat Controller</h5>
                </div>
                <div class="step-content">
                  <h6>StudentController</h6>
                  <pre><code>php artisan make:controller StudentController</code></pre>
                  <pre><code>&lt;?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Eager loading untuk menghindari N+1 problem
        $students = Student::with(['major', 'subjects'])->get();
        return view('students.index', compact('students'));
    }

    public function show($id)
    {
        $student = Student::with(['major', 'subjects'])->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function create()
    {
        $majors = Major::all();
        $subjects = Subject::all();
        return view('students.create', compact('majors', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:students',
            'name' => 'required',
            'address' => 'required',
            'major_id' => 'required|exists:majors,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);
        
        $student = Student::create($request->only(['nim', 'name', 'address', 'major_id']));
        $student->subjects()->attach($request->subjects);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $student = Student::with('subjects')->findOrFail($id);
        $majors = Major::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'majors', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:students,nim,' . $student->id,
            'name' => 'required',
            'address' => 'required',
            'major_id' => 'required|exists:majors,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);
        
        $student->update($request->only(['nim', 'name', 'address', 'major_id']));
        $student->subjects()->sync($request->subjects);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->subjects()->detach(); // Remove all subject relationships
        $student->delete();
        
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}</code></pre>
                </div>
              </div>

              <!-- F. Routes -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">F</span>
                  <h5>Membuat Routes</h5>
                </div>
                <div class="step-content">
                  <pre><code>&lt;?php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);</code></pre>
                </div>
              </div>

              <!-- G. Views -->
              <div class="step-card">
                <div class="step-header">
                  <span class="step-number">G</span>
                  <h5>Membuat Views</h5>
                </div>
                <div class="step-content">
                  <h6>A. Layout Utama (app.blade.php)</h6>
                  <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Student Management System&lt;/title&gt;
    &lt;link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;nav class="navbar navbar-expand-lg navbar-dark bg-primary"&gt;
        &lt;div class="container"&gt;
            &lt;a class="navbar-brand" href="{{ route('students.index') }}"&gt;Student Management&lt;/a&gt;
        &lt;/div&gt;
    &lt;/nav&gt;

    &lt;div class="container mt-4"&gt;
        @if(session('success'))
        &lt;div class="alert alert-success"&gt;
            {{ session('success') }}
        &lt;/div&gt;
        @endif
        @yield('content')
    &lt;/div&gt;
    
    &lt;script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                  
                  <h6 class="mt-4">B. Index Students (index.blade.php)</h6>
                  <pre><code>@extends('layouts.app')

@section('content')
&lt;div class="d-flex justify-content-between align-items-center mb-4"&gt;
    &lt;h2&gt;Daftar Mahasiswa&lt;/h2&gt;
    &lt;a href="{{ route('students.create') }}" class="btn btn-primary"&gt;Tambah Mahasiswa&lt;/a&gt;
&lt;/div&gt;

&lt;div class="table-responsive"&gt;
    &lt;table class="table table-striped"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th&gt;NIM&lt;/th&gt;
                &lt;th&gt;Nama&lt;/th&gt;
                &lt;th&gt;Jurusan&lt;/th&gt;
                &lt;th&gt;Mata Kuliah&lt;/th&gt;
                &lt;th&gt;Total SKS&lt;/th&gt;
                &lt;th&gt;Aksi&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            @foreach($students as $student)
            &lt;tr&gt;
                &lt;td&gt;{{ $student->nim }}&lt;/td&gt;
                &lt;td&gt;{{ $student->name }}&lt;/td&gt;
                &lt;td&gt;{{ $student->major->name }}&lt;/td&gt;
                &lt;td&gt;
                    @foreach($student->subjects as $subject)
                    &lt;span class="badge bg-secondary me-1"&gt;{{ $subject->name }}&lt;/span&gt;
                    @endforeach
                &lt;/td&gt;
                &lt;td&gt;{{ $student->subjects->sum('sks') }}&lt;/td&gt;
                &lt;td&gt;
                    &lt;a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm"&gt;Detail&lt;/a&gt;
                    &lt;a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm"&gt;Edit&lt;/a&gt;
                    &lt;form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"&gt;
                        @csrf
                        @method('DELETE')
                        &lt;button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus')"&gt;Hapus&lt;/button&gt;
                    &lt;/form&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            @endforeach
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
@endsection</code></pre>
                  
                  <h6 class="mt-4">C. Create Student (create.blade.php)</h6>
                  <pre><code>@extends('layouts.app')

@section('content')
&lt;h2&gt;Tambah Mahasiswa&lt;/h2&gt;

&lt;div class="card"&gt;
    &lt;div class="card-body"&gt;
        &lt;form action="{{ route('students.store') }}" method="POST"&gt;
            @csrf

            &lt;div class="mb-3"&gt;
                &lt;label for="nim" class="form-label"&gt;NIM&lt;/label&gt;
                &lt;input type="text" class="form-control @error('nim') is-invalid @enderror"
                    id="nim" name="nim" value="{{ old('nim') }}"&gt;
                @error('nim')
                &lt;div class="invalid-feedback"&gt;{{ $message }}&lt;/div&gt;
                @enderror
            &lt;/div&gt;

            &lt;div class="mb-3"&gt;
                &lt;label for="name" class="form-label"&gt;Nama&lt;/label&gt;
                &lt;input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="name" name="name" value="{{ old('name') }}"&gt;
                @error('name')
                &lt;div class="invalid-feedback"&gt;{{ $message }}&lt;/div&gt;
                @enderror
            &lt;/div&gt;

            &lt;div class="mb-3"&gt;
                &lt;label for="address" class="form-label"&gt;Alamat&lt;/label&gt;
                &lt;textarea class="form-control @error('address') is-invalid @enderror"
                    id="address" name="address" rows="3"&gt;{{ old('address') }}&lt;/textarea&gt;
                @error('address')
                &lt;div class="invalid-feedback"&gt;{{ $message }}&lt;/div&gt;
                @enderror
            &lt;/div&gt;

            &lt;div class="mb-3"&gt;
                &lt;label for="major_id" class="form-label"&gt;Jurusan&lt;/label&gt;
                &lt;select class="form-control @error('major_id') is-invalid @enderror"
                    id="major_id" name="major_id"&gt;
                    &lt;option value=""&gt;Pilih Jurusan&lt;/option&gt;
                    @foreach($majors as $major)
                    &lt;option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}&gt;
                        {{ $major->name }}
                    &lt;/option&gt;
                    @endforeach
                &lt;/select&gt;
                @error('major_id')
                &lt;div class="invalid-feedback"&gt;{{ $message }}&lt;/div&gt;
                @enderror
            &lt;/div&gt;

            &lt;div class="mb-3"&gt;
                &lt;label class="form-label"&gt;Mata Kuliah&lt;/label&gt;
                @error('subjects')
                &lt;div class="text-danger"&gt;{{ $message }}&lt;/div&gt;
                @enderror
                @foreach($subjects as $subject)
                &lt;div class="form-check"&gt;
                    &lt;input class="form-check-input" type="checkbox" name="subjects[]"
                        value="{{ $subject->id }}" id="subject{{ $subject->id }}"
                        {{ in_array($subject->id, old('subjects', [])) ? 'checked' : '' }}&gt;
                    &lt;label class="form-check-label" for="subject{{ $subject->id }}"&gt;
                        {{ $subject->name }} ({{ $subject->sks }} SKS)
                    &lt;/label&gt;
                &lt;/div&gt;
                @endforeach
            &lt;/div&gt;
            
            &lt;button type="submit" class="btn btn-primary"&gt;Simpan&lt;/button&gt;
            &lt;a href="{{ route('students.index') }}" class="btn btn-secondary"&gt;Kembali&lt;/a&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/div&gt;
@endsection</code></pre>
                </div>
              </div>
            </section>

            <!-- Latihan dan Tugas -->
            <section class="mb-5">
              <h3 class="section-title">Latihan dan Tugas</h3>
              <div class="card">
                <div class="card-body">
                  <h5>Latihan 1: Query dengan Relationship</h5>
                  <p>Buat query untuk menampilkan:</p>
                  <ol>
                    <li>Semua mahasiswa beserta jurusan dan mata kuliahnya</li>
                    <li>Jurusan yang memiliki mahasiswa terbanyak</li>
                    <li>Mata kuliah yang diambil oleh mahasiswa tertentu</li>
                    <li>Total SKS yang diambil setiap mahasiswa</li>
                  </ol>
                  
                  <h5 class="mt-4">Kesimpulan</h5>
                  <p>Dalam modul ini, mahasiswa telah mempelajari:</p>
                  <ol>
                    <li>Cara membuat relationship One-to-Many dan Many-to-Many di Laravel</li>
                    <li>Implementasi foreign key dan pivot table</li>
                    <li>Penggunaan Eloquent relationship untuk query data</li>
                    <li>Best practices dalam menggunakan eager loading</li>
                    <li>Cara menampilkan data relationship di view</li>
                  </ol>
                  <p>Relationship adalah konsep fundamental dalam pengembangan aplikasi web dengan database. Pemahaman yang baik tentang relationship akan membantu dalam membangun aplikasi yang efisien dan mudah di-maintain.</p>
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
                          <input type="hidden" name="id_artikel" value="5"> 
                          
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
                  $komentar->id_artikel = 5; // Ganti dengan ID artikel dinamis
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