<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal - LydiKereta Admin</title>
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

        select.form-control {
            height: calc(2.75rem + 2px);
        }

        /* Buttons */
        .btn-success {
            background-color: var(--success);
            border: none;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-2px);
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

        .alert {
            border-radius: 8px;
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
                            <i class="fas fa-home mr-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item active">
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
            <div class="col-md-8">
                <div class="card animated fadeInUp">
                    <div class="card-header">
                        <i class="fas fa-edit"></i> Edit Jadwal Kereta
                    </div>
                    <div class="card-body">
                        <?php if (!isset($data_edit) || empty($data_edit)): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle mr-2"></i> Data jadwal tidak ditemukan!
                            </div>
                            <a href="<?= base_url('admin/dashboard/kelola-jadwal') ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Jadwal
                            </a>
                        <?php else: ?>
                            <form action="<?= base_url('editJadwal') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $data_edit->id ?>">

                                <div class="form-group">
                                    <label>Nama Kereta</label>
                                    <input type="text" name="nama_kereta" class="form-control" required
                                        value="<?= $data_edit->nama_kereta ?>">
                                </div>

                                <div class="form-group">
                                    <label>Stasiun Asal</label>
                                    <select name="asal" class="form-control" required>
                                        <?php if (isset($data_edit->asal) && isset($data_edit->ASAL)): ?>
                                            <optgroup label="Terpilih">
                                                <option selected value="<?= $data_edit->asal ?>"><?= $data_edit->ASAL ?></option>
                                            </optgroup>
                                        <?php endif; ?>
                                        <optgroup label="Pilihan">
                                            <?php foreach ($stasiun as $st): ?>
                                                <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Stasiun Tujuan</label>
                                    <select name="tujuan" class="form-control" required>
                                        <?php if (isset($data_edit->tujuan) && isset($data_edit->TUJUAN)): ?>
                                            <optgroup label="Terpilih">
                                                <option selected value="<?= $data_edit->tujuan ?>"><?= $data_edit->TUJUAN ?></option>
                                            </optgroup>
                                        <?php endif; ?>
                                        <optgroup label="Pilihan">
                                            <?php foreach ($stasiun as $st): ?>
                                                <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Berangkat</label>
                                            <?php $date = date_create($data_edit->tgl_berangkat) ?>
                                            <input type="datetime-local" name="tgl_berangkat" class="form-control" value="<?= date_format($date, 'Y-m-d\TH:i') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Sampai</label>
                                            <?php $date = date_create($data_edit->tgl_sampai) ?>
                                            <input type="datetime-local" name="tgl_sampai" class="form-control" value="<?= date_format($date, 'Y-m-d\TH:i') ?>" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control" required>
                                        <?php if (isset($data_edit->kelas)): ?>
                                            <optgroup label="Terpilih">
                                                <option selected value="<?= $data_edit->kelas ?>"><?= $data_edit->kelas ?></option>
                                            </optgroup>
                                        <?php endif; ?>
                                        <optgroup label="Pilihan">
                                            <option value="Ekonomi">Ekonomi</option>
                                            <option value="Eksekutif">Eksekutif</option>
                                            <option value="Bisnis">Bisnis</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" class="form-control"
                                        value="<?= isset($data_edit->harga) ? $data_edit->harga : '' ?>" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-block mt-4">
                                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
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