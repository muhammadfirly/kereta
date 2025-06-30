<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stasiun - LydiKereta Admin</title>
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
            color: white !important;
        }

        .admin-navbar .nav-link {
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
            padding: 0.5rem 1.25rem;
            transition: all 0.3s ease;
        }

        .admin-navbar .nav-link:hover,
        .admin-navbar .nav-link.active {
            color: white !important;
        }

        .admin-navbar .navbar-text a {
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .admin-navbar .navbar-text a:hover {
            color: white;
            text-decoration: none;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 1.5rem;
            overflow: hidden;
            border-top: 4px solid var(--primary);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            text-align: center;
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

        .btn-primary {
            background-color: var(--primary);
            border: none;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
        }

        /* Error Message */
        .alert-danger {
            border-radius: 8px;
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

        .animated {
            animation-duration: 0.5s;
            animation-fill-mode: both;
        }

        .fadeInUp {
            animation-name: fadeInUp;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark admin-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">
                <i class="fas fa-train mr-2"></i>LydiKereta Admin
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card animated fadeInUp">
                    <div class="card-header">
                        <i class="fas fa-edit mr-2"></i> Edit Stasiun
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('editStasiun') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $data_stasiun->id ?>">
                            <div class="form-group">
                                <label>Nama Stasiun</label>
                                <input type="text" class="form-control" name="nama_stasiun" value="<?=$data_stasiun->nama_stasiun ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for card
            const card = document.querySelector('.card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.animation = 'fadeInUp 0.5s ease 0.1s forwards';
        });
    </script>
</body>

</html>