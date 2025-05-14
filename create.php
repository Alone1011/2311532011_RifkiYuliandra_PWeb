<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            margin: 2rem auto;
            padding: 2.5rem;
            max-width: 600px;
            transform: translateY(50px);
            opacity: 0;
            animation: formEntrance 0.6s forwards;
        }

        @keyframes formEntrance {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 0.8rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="form-card animate__animated animate__fadeInUp">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-primary"><i class="fas fa-user-plus me-2"></i>Tambah Mahasiswa Baru</h3>
                    <a href="index.php" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <form action="function/Mahasiswa.php?action=create" method="post">
                    <div class="mb-4">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" required 
                               placeholder="Masukkan NIM mahasiswa">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required
                               placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" required
                               placeholder="Masukkan nama jurusan">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary gradient-btn py-2">
                            <i class="fas fa-save me-2"></i>Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>