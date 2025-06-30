<div class="container-fluid confirmation-page">
    <div class="row justify-content-center my-5">
        <div class="col-md-8 col-lg-6">
            <?php echo $error; ?>
            <?php if ($this->session->flashdata('pesan') !== null): ?>
                <div class="alert alert-success animated fadeIn">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?= $this->session->flashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <!-- Animated Train Header -->
            <div class="text-center mb-4">
                <img src="<?= base_url('assets/img/train-icon.png') ?>" alt="Train Icon" class="train-icon animated bounceIn">
                <h2 class="mt-3 text-primary font-weight-bold">Konfirmasi Pembayaran Tiket</h2>
                <p class="text-muted">Lydikereta - Perjalanan Nyaman Bersama Kami</p>
            </div>

            <!-- Main Card with Animation -->
            <div class="card shadow-lg border-0 animated fadeInUp">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-ticket-alt mr-2"></i>Konfirmasi Pembayaran</h5>
                        <i class="fas fa-train"></i>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('cekKonfirmasi') ?>" method="POST" autocomplete="off" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label class="font-weight-bold"><i class="fas fa-barcode mr-2"></i>Kode Booking</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                                </div>
                                <input name="kode" type="text" class="form-control form-control-lg" placeholder="Masukkan Kode Booking Anda" required>
                            </div>
                            <small class="form-text text-muted">Contoh: FA000X</small>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg py-3 mt-3">
                            <i class="fas fa-search mr-2"></i>Cek Kode Booking
                        </button>
                    </form>
                </div>
            </div>

            <hr class="my-5">

            <?php if (isset($_GET['kode'])): ?>
                <!-- Payment Details Card -->
                 <h4 class="font-weight-bold text-center text-primary">Kode Booking : <?= $_GET['kode'] ?></h4>
                <div class="card shadow-lg border-0 animated fadeInUp delay-1s">
                    <div class="card-header bg-gradient-info text-white py-3 text-center">
                        <h5 class="mb-0"><i class="fas fa-receipt mr-2"></i>Detail Pembayaran Anda</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <?php if ($no_tiket->status === '0'): ?>
                                <div class="status-badge badge-danger animated pulse infinite">
                                    <i class="fas fa-times fa-3x mb-2"></i>
                                    <h3 class="mb-0">Belum Dibayar</h3>
                                </div>
                            <?php else: ?>
                                <div class="status-badge badge-success">
                                    <i class="fas fa-check-circle fa-3x mb-2"></i>
                                    <h3 class="mb-0">Sudah Dibayar</h3>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th><i class="fas fa-user mr-2"></i>Nama Penumpang</th>
                                        <th><i class="fas fa-id-card mr-2"></i>No. Identitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $dt): ?>
                                        <tr class="animated fadeIn">
                                            <td><?= $dt->nama ?></td>
                                            <td><?= $dt->no_identitas ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="total-payment bg-light p-3 rounded text-center mb-4">
                                <h4 class="font-weight-bold mb-0">
                                    <i class="fas fa-money-bill-wave mr-2"></i>
                                    Total Pembayaran: <span class="text-primary">Rp. <?= number_format($no_tiket->total_pembayaran, 0, ',', '.') ?></span>
                                </h4>
                            </div>

                            <?php if ($no_tiket->status === '0'): ?>
                                <div class="alert alert-warning animated pulse">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    <strong>Silahkan Kirim Bukti Pembayaran</strong>
                                </div>

                                <?= form_open_multipart('kirimKonfirmasi'); ?>
                                <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran ?>">

                                <!-- Seat Selection Section -->
                                <div class="seat-selection mb-4">
                                    <h5 class="font-weight-bold mb-3"><i class="fas fa-chair mr-2"></i>Pilih Tempat Duduk</h5>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label>Gerbong</label>
                                            <select class="form-control selectpicker" name="gerbong" id="select_gerbong" onchange="cekGerbong()" required>
                                                <option value="0" disabled selected>Pilih Gerbong</option>
                                                <option value="1">Gerbong 1</option>
                                                <option value="2">Gerbong 2</option>
                                                <option value="3">Gerbong 3</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Bagian</label>
                                            <select class="form-control selectpicker" name="bagian" id="bagian" required onchange="cekBagian()">
                                                <option value="0" disabled selected>Pilih Bagian</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Nomor Kursi</label>
                                            <select class="form-control selectpicker" name="kursi" id="bagian_a" required>
                                                <?php for ($i = 1; $i <= 29; $i++): ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <select class="form-control selectpicker" name="kursi" id="bagian_b" required>
                                                <?php for ($i = 1; $i <= 20; $i++): ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="train-visualization text-center mb-4">
                                        <img id="img_gerbong" class="img-fluid train-image" src="<?= base_url('assets/gerbong/gerbong1.png') ?>" alt="Gerbong Kereta">
                                    </div>
                                </div>

                                <!-- File Upload Section -->
                                <div class="file-upload mb-4">
                                    <h5 class="font-weight-bold mb-3"><i class="fas fa-file-upload mr-2"></i>Upload Bukti Pembayaran</h5>
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input" id="customFile" required>
                                        <label class="custom-file-label" for="customFile">Pilih file bukti pembayaran</label>
                                    </div>
                                    <small class="form-text text-muted">Format: JPG, PNG (Maks. 2MB)</small>
                                </div>

                                <button type="submit" class="btn btn-success btn-block btn-lg py-3">
                                    <i class="fas fa-paper-plane mr-2"></i>Kirim Bukti Pembayaran
                                </button>
                                <?= form_close(); ?>
                            <?php else: ?>
                                <div class="text-center py-4">
                                    <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                                    <h4 class="font-weight-bold">Pembayaran Anda telah dikonfirmasi</h4>
                                    <p class="text-muted">Terima kasih telah menggunakan Lydikereta</p>
                                    <a href="<?= base_url() ?>" class="btn btn-outline-primary mt-3">
                                        <i class="fas fa-home mr-2"></i>Kembali ke Beranda
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Add this CSS in your stylesheet or style tag -->
<style>
    .confirmation-page {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .train-icon {
        height: 80px;
        animation: trainMove 2s infinite alternate;
    }

    @keyframes trainMove {
        0% {
            transform: translateX(-5px);
        }

        100% {
            transform: translateX(5px);
        }
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .status-badge {
        display: inline-block;
        padding: 20px 30px;
        border-radius: 50px;
        color: white;
    }

    .badge-danger {
        background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    }

    .badge-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .total-payment {
        border-left: 5px solid #3a7bd5;
    }

    .train-image {
        max-height: 200px;
        transition: all 0.3s ease;
    }

    .train-image:hover {
        transform: scale(1.05);
    }

    .animated {
        animation-duration: 1s;
        animation-fill-mode: both;
    }

    .fadeIn {
        animation-name: fadeIn;
    }

    .fadeInUp {
        animation-name: fadeInUp;
    }

    .bounceIn {
        animation-name: bounceIn;
    }

    .delay-1s {
        animation-delay: 0.5s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

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

    @keyframes bounceIn {

        from,
        20%,
        40%,
        60%,
        80%,
        to {
            animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
        }

        0% {
            opacity: 0;
            transform: scale3d(.3, .3, .3);
        }

        20% {
            transform: scale3d(1.1, 1.1, 1.1);
        }

        40% {
            transform: scale3d(.9, .9, .9);
        }

        60% {
            opacity: 1;
            transform: scale3d(1.03, 1.03, 1.03);
        }

        80% {
            transform: scale3d(.97, .97, .97);
        }

        to {
            opacity: 1;
            transform: scale3d(1, 1, 1);
        }
    }

    .pulse {
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .custom-file-label::after {
        content: "Browse";
    }
</style>

<!-- Add these scripts at the end of your file -->
<script>
    // Initialize animations and form validation
    document.addEventListener('DOMContentLoaded', function() {
        // Form validation
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        // File input label update
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });

    // Your existing functions
    function cekGerbong() {
        var gerbong = document.getElementById('select_gerbong').value;
        document.getElementById('img_gerbong').src = "<?= base_url('assets/gerbong/gerbong') ?>" + gerbong + ".png";
    }

    function cekBagian() {
        var bagian = document.getElementById('bagian').value;
        if (bagian === 'a') {
            document.getElementById('bagian_a').style.display = 'block';
            document.getElementById('bagian_b').style.display = 'none';
        } else {
            document.getElementById('bagian_a').style.display = 'none';
            document.getElementById('bagian_b').style.display = 'block';
        }
    }

    // Initialize hidden section B
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('bagian_b').style.display = 'none';
    });
</script>