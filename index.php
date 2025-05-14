<?php
    include 'function/Alert.php';
    include_once './config/Database.php';
    include_once './model/Mahasiswa.php';
    
    $database = new Database();
    $db = $database->getConnection();
    $mahasiswa = new Mahasiswa($db);
    $result = $mahasiswa->read();
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --card-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        
        body {
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        
        .main-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            margin-top: 2rem;
            padding: 2rem;
            transform: translateY(-50px);
            opacity: 0;
            animation: slideUp 0.8s forwards;
        }
        
        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .table-hover-effect tbody tr {
            transition: all 0.3s ease;
        }
        
        .table-hover-effect tbody tr:hover {
            transform: translateX(10px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .gradient-btn {
            background-image: var(--primary-gradient);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        
        .gradient-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118,75,162,0.4);
        }
        
        .action-btn {
            padding: 0.3rem 0.8rem;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid py-5">
        <div class="col-lg-10 mx-auto">
            <div class="main-card animate__animated animate__fadeInUp">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary fw-bold"><i class="fas fa-user-graduate me-2"></i>Student Management</h2>
                    <a href="create.php" class="gradient-btn btn btn-sm">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Mahasiswa
                    </a>
                </div>

                <!-- Alert Section -->
                <?php if(isset($_SESSION['flash_message'])): ?>
                <div class="alert alert-dismissible fade show animate__animated animate__slideInDown 
                    <?= ($_GET['msg'] == '1') ? 'alert-success' : 'alert-danger' ?>" 
                    role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
                    <?= $_SESSION['flash_message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['flash_message']); endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover table-hover-effect align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Jurusan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; while ($row = $result->fetch_assoc()): ?>
                            <tr class="animate__animated animate__fadeIn">
                                <td class="fw-bold"><?= $no++ ?></td>
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td>
                                    <span class="badge bg-primary bg-gradient">
                                        <?= $row['jurusan'] ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?= $row['id'] ?>" 
                                       class="btn btn-success btn-sm action-btn me-1">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <a href="function/Mahasiswa.php?action=delete&&id=<?= $row['id'] ?>" 
                                       class="btn btn-danger btn-sm action-btn" 
                                       onclick="return confirm('Hapus data <?= $row['nama'] ?>?')">
                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-hide alert after 3 seconds
        window.setTimeout(function() {
            document.querySelector('.alert').classList.add('animate__fadeOutUp');
            setTimeout(function() {
                document.querySelector('.alert').remove();
            }, 500);
        }, 3000);
    </script>
</body>
</html>