<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LydiKereta</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4cc9f0;
            --dark: #2b2d42;
            --light: #f8f9fa;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #fd7e14;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            min-height: 100vh;
        }

        /* Navbar */
        .admin-navbar {
            background: linear-gradient(135deg, var(--dark) 0%, #1a1a2e 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .admin-navbar .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .admin-navbar .nav-link {
            font-weight: 500;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            margin: 0 2px;
            transition: all 0.3s ease;
        }

        .admin-navbar .nav-link:hover,
        .admin-navbar .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 1.5rem;
            overflow: hidden;
            border-top: 4px solid var(--primary);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.15);
        }

        .card-header {
            background: white;
            color: var(--dark);
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .card-header i {
            color: var(--primary);
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* Tables */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: #f8f9fa;
            color: var(--dark);
            font-weight: 600;
            border-top: none;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.03);
            transform: translateX(4px);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary);
            border: none;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 0.75rem 1.5rem;
        }

        .btn-primary:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
        }

        .btn-success {
            background-color: var(--success);
            border: none;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        /* Form Elements */
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.15);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Utility Classes */
        .text-primary {
            color: var(--primary) !important;
        }

        .text-danger {
            color: var(--danger) !important;
        }

        .rounded-lg {
            border-radius: 12px !important;
        }

        .shadow-soft {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .admin-navbar .nav-link {
                padding: 0.5rem;
                margin: 2px 0;
            }
        }
    </style>
</head>

<body>
    <!-- Admin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark admin-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">
                <i class="fas fa-train mr-2"></i>LydiKereta Admin
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                            <i class="fas fa-home mr-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/dashboard/kelola-jadwal') ?>">
                            <i class="fas fa-calendar-alt mr-1"></i> Kelola Jadwal
                        </a>
                    </li>
                </ul>
                <div class="navbar-text">
                    <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-outline-light">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row">
            <!-- Daftar Stasiun -->
            <div class="col-lg-8">
                <div class="card animated fadeInUp">
                    <div class="card-header">
                        <i class="fas fa-list"></i> Daftar Stasiun
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="60">No</th>
                                        <th>Nama Stasiun</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($stasiun as $st): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $st->nama_stasiun ?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url('hapusStasiun/' . $st->id) ?>" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/dashboard/edit/' . $st->id) ?>" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Stasiun -->
            <div class="col-lg-4">
                <div class="card animated fadeInUp delay-1">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Tambah Stasiun Baru
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('tambahStasiun') ?>" method="POST">
                            <div class="form-group">
                                <label for="stasiun">Nama Stasiun</label>
                                <input type="text" class="form-control" id="stasiun" name="stasiun" placeholder="Masukkan nama stasiun" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-save mr-1"></i> Tambah Stasiun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script>
        // Animation for cards when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.animation = `fadeInUp 0.5s ease ${index * 0.1}s forwards`;
            });
        });
    </script>
</body>

</html>