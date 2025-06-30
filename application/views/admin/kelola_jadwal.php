<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal - LydiKereta Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #4cc9f0;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
            --success-color: #28a745;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
        }

        .admin-navbar {
            background: linear-gradient(135deg, var(--dark-color), #1a1a2e);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .admin-navbar .navbar-brand,
        .admin-navbar .nav-link,
        .admin-navbar .navbar-text a {
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .admin-navbar .navbar-brand {
            font-weight: 600;
        }

        .admin-navbar .nav-link:hover,
        .admin-navbar .nav-link.active,
        .admin-navbar .navbar-text a:hover {
            color: white;
            text-decoration: none;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        .table thead th {
            background-color: var(--light-color);
            color: var(--dark-color);
            font-weight: 600;
            border-bottom: 1px solid #e0e0e0;
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }

        .btn-group-sm .btn {
            font-size: 0.875rem;
            border-radius: 4px;
        }

        .btn-success {
            background-color: var(--success-color);
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .form-control {
            border-radius: 6px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            height: auto;
            /* Ensure sufficient height */
            min-height: 48px;
            /* Default minimum height for select elements */
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.15);
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('admin/dashboard/kelola-jadwal') ?>">
                            <i class="fas fa-calendar-alt mr-1"></i> Kelola Jadwal
                        </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="<?= base_url('logout') ?>">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                </span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row">
            <!-- Jadwal List -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-list mr-2"></i> Daftar Jadwal Kereta
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kereta</th>
                                        <th>Asal</th>
                                        <th>Tujuan</th>
                                        <th>Berangkat</th>
                                        <th>Sampai</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($jadwal as $jd): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $jd->nama_kereta ?></td>
                                            <td><?= $jd->ASAL ?></td>
                                            <td><?= $jd->TUJUAN ?></td>
                                            <td><?= date('d M Y H:i', strtotime($jd->tgl_berangkat)) ?></td>
                                            <td><?= date('d M Y H:i', strtotime($jd->tgl_sampai)) ?></td>
                                            <td><?= $jd->kelas ?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-danger" href="<?= base_url('hapusJadwal/' . $jd->id) ?>" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a class="btn btn-primary" href="<?= base_url('admin/dashboard/edit-jadwal/' . $jd->id) ?>" title="Edit">
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

            <!-- Tambah Jadwal -->
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-plus-circle mr-2"></i> Form Tambah Jadwal
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('tambahJadwal') ?>" method="POST">
                            <div class="form-group">
                                <label for="nama_kereta">Nama Kereta</label>
                                <input type="text" name="nama_kereta" id="nama_kereta" class="form-control" placeholder="Nama Kereta" required>
                            </div>

                            <div class="form-group">
                                <label for="asal">Stasiun Asal</label>
                                <select name="asal" id="asal" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Stasiun Asal --</option>
                                    <?php foreach ($stasiun as $st): ?>
                                        <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tujuan">Stasiun Tujuan</label>
                                <select name="tujuan" id="tujuan" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Stasiun Tujuan --</option>
                                    <?php foreach ($stasiun as $st): ?>
                                        <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl_berangkat">Tanggal Berangkat</label>
                                <input type="datetime-local" name="tgl_berangkat" id="tgl_berangkat" class="form-control" min="<?= date('Y-m-d\TH:i') ?>" value="<?= date('Y-m-d\TH:i') ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="tgl_sampai">Tanggal Sampai</label>
                                <input type="datetime-local" name="tgl_sampai" id="tgl_sampai" class="form-control" min="<?= date('Y-m-d\TH:i') ?>" value="<?= date('Y-m-d\TH:i') ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Kelas --</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Eksekutif">Eksekutif</option>
                                    <option value="Bisnis">Bisnis</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" required>
                            </div>

                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-save mr-1"></i> Tambah Jadwal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `all 0.5s ease ${index * 0.1}s`;
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script>
</body>

</html>