<?php 
    include_once './config/Database.php'; 
    include_once './model/Mahasiswa.php'; 
    
    $database = new Database(); 
    $db = $database->getConnection(); 
    $mahasiswa = new Mahasiswa($db); 
    
    if(isset($_GET['id'])) { 
        $result = $mahasiswa->read($_GET['id'])->fetch_assoc(); 
    } 
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Shared styles from create.php */
        .form-card { /* ... same as create.php ... */ }
        @keyframes formEntrance { /* ... same as create.php ... */ }
        .form-label { /* ... same as create.php ... */ }
        .form-control { /* ... same as create.php ... */ }
        .form-control:focus { /* ... same as create.php ... */ }
        
        .data-preview {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="form-card animate__animated animate__fadeInUp">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-primary"><i class="fas fa-user-edit me-2"></i>Edit Data Mahasiswa</h3>
                    <a href="index.php" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <form action="function/Mahasiswa.php?action=update" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($result['id']) ?>">
                    
                    <div class="data-preview">
                        <small class="text-muted">ID Registrasi:</small>
                        <div class="fw-bold"><?= htmlspecialchars($result['id']) ?></div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" required
                               value="<?= htmlspecialchars($result['nim']) ?>">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required
                               value="<?= htmlspecialchars($result['nama']) ?>">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" required
                               value="<?= htmlspecialchars($result['jurusan']) ?>">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success gradient-btn py-2">
                            <i class="fas fa-sync-alt me-2"></i>Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>