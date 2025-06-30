<!-- halaman_depan.php -->
<div class="hero-section bg-primary">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 text-white">
                <h1 class="hero-title mb-3">Selamat Datang di <span class="text-light">LydiKereta</span></h1>
                <p class="hero-subtitle mb-4">
                    Nikmati kemudahan dalam memesan tiket kereta secara online.
                    Temukan perjalanan terbaik dengan harga terjangkau.
                </p>

                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="feature-text">
                            <h5>Mudah dan Cepat</h5>
                            <p class="small text-light">Pesan tiket hanya dalam beberapa langkah</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="feature-text">
                            <h5>Jadwal Terupdate</h5>
                            <p class="small text-light">Informasi jadwal kereta yang akurat</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-card bg-white rounded-lg shadow">
                    <div class="search-card-header bg-dark-blue py-3">
                        <h5 class="mb-0 text-center text-white">
                            <i class="fas fa-search mr-2"></i>Cari Tiket Kereta
                        </h5>
                    </div>
                    <div class="search-card-body p-4">
                        <form id="searchForm" action="<?= base_url('cariTiket') ?>" method="POST">
                            <input type="hidden" name="scrollToResults" value="true">
                            <div class="form-group mb-3">
                                <label class="font-weight-500">Stasiun Asal</label>
                                <select name="asal" class="form-control custom-select" required>
                                    <?php foreach ($stasiun as $st): ?>
                                        <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-500">Stasiun Tujuan</label>
                                <select name="tujuan" class="form-control custom-select" required>
                                    <?php foreach ($stasiun as $st): ?>
                                        <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-500">Tanggal Keberangkatan</label>
                                <input type="date" class="form-control custom-input" name="tanggal" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label class="font-weight-500">Jumlah Penumpang</label>
                                <select name="jumlah" class="form-control custom-select" required>
                                    <?php for ($i = 1; $i <= 4; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?> Penumpang</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark-blue btn-block py-2">
                                <i class="fas fa-search mr-2"></i>Cari Tiket
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($tiket)): ?>
    <div id="searchResults" class="py-4 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 font-weight-600">Daftar Tiket Tersedia</h4>
                <span class="badge bg-primary"><?= count($tiket) ?> hasil ditemukan</span>
            </div>

            <div class="ticket-list">
                <?php if (empty($tiket)): ?>
                    <div class="no-results text-center py-5">
                        <i class="fas fa-train fa-3x text-muted mb-3"></i>
                        <h5 class="font-weight-600">Tidak ada tiket yang tersedia</h5>
                        <p class="text-muted">Silakan coba dengan rute atau tanggal yang berbeda</p>
                    </div>
                <?php else: ?>
                    <?php $no = 1;
                    foreach ($tiket as $tk): ?>
                        <div class="ticket-card bg-white rounded shadow-sm mb-3 p-3">
                            <div class="row align-items-center">
                                <div class="col-md-1 text-center text-primary font-weight-600">
                                    <?= $no++ ?>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="font-weight-600 mb-1"><?= $tk->nama_kereta ?></h6>
                                    <span class="badge bg-blue-light text-primary small">Eksekutif</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <div class="text-center">
                                            <div class="font-weight-600"><?= date('H:i', strtotime($tk->tgl_berangkat)) ?></div>
                                            <small class="text-muted"><?= date('d M Y', strtotime($tk->tgl_berangkat)) ?></small>
                                        </div>
                                        <div class="px-2 text-primary">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                        <div class="text-center">
                                            <div class="font-weight-600"><?= date('H:i', strtotime($tk->tgl_sampai)) ?></div>
                                            <small class="text-muted"><?= date('d M Y', strtotime($tk->tgl_sampai)) ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a class="btn btn-primary btn-sm" href="<?= base_url('pesan/' . $tk->id . '?p=' . $penumpang) ?>">
                                        <i class="fas fa-ticket-alt mr-2"></i>Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<style>
    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --dark-blue: #2a3a8a;
        --blue-light: #e6f0ff;
        --light: #f8f9fa;
    }

    .hero-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--dark-blue) 100%);
        padding: 2.5rem 0;
    }

    .hero-title {
        font-size: 1.8rem;
        font-weight: 700;
        line-height: 1.3;
    }

    .hero-subtitle {
        font-size: 1rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .features-list {
        margin-top: 1.5rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .feature-icon {
        width: 36px;
        height: 36px;
        background-color: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: white;
        font-size: 1rem;
    }

    .feature-text h5 {
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 2px;
        color: white;
    }

    .feature-text p {
        font-size: 0.8rem;
        opacity: 0.8;
        margin-bottom: 0;
    }

    .search-card {
        border-radius: 8px;
        overflow: hidden;
    }

    .search-card-header {
        background-color: var(--dark-blue);
        padding: 12px;
    }

    .search-card-body {
        padding: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .custom-select,
    .custom-input {
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 10px 12px;
        font-size: 0.9rem;
    }

    .btn-dark-blue {
        background-color: var(--dark-blue);
        color: white;
        border: none;
        font-weight: 500;
    }

    .btn-dark-blue:hover {
        background-color: #1f2d6e;
        color: white;
    }

    .ticket-card {
        transition: all 0.2s;
        border-left: 3px solid var(--primary);
    }

    .ticket-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .badge {
        font-weight: 500;
        padding: 5px 10px;
    }

    .bg-blue-light {
        background-color: var(--blue-light);
    }

    .font-weight-500 {
        font-weight: 500;
    }

    .font-weight-600 {
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 1.5rem 0;
        }

        .hero-title {
            font-size: 1.5rem;
        }

        .ticket-card .col-md-4.text-right {
            text-align: left !important;
            margin-top: 1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($_POST['scrollToResults']) && $_POST['scrollToResults'] == 'true'): ?>
            setTimeout(function() {
                const resultsSection = document.getElementById('searchResults');
                if (resultsSection) {
                    resultsSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 300);
        <?php endif; ?>
    });
</script>