<div class="container py-4">
    <!-- Progress Steps -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between position-relative">
                <div class="progress-line position-absolute"></div>
                <div class="step active">
                    <div class="step-icon bg-primary"><i class="fas fa-ticket-alt"></i></div>
                    <div class="step-text">Pilih Tiket</div>
                </div>
                <div class="step active">
                    <div class="step-icon bg-primary"><i class="fas fa-user-edit"></i></div>
                    <div class="step-text">Data Diri</div>
                </div>
                <div class="step">
                    <div class="step-icon bg-secondary"><i class="fas fa-credit-card"></i></div>
                    <div class="step-text">Pembayaran</div>
                </div>
            </div>
        </div>
    </div>

    <!-- INFO PERJALANAN -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0 font-weight-600"><i class="fas fa-info-circle mr-2"></i>Info Perjalanan</h5>
        </div>
        <div class="card-body">
            <?php
            $info_items = [
                'Nama Kereta' => $info->nama_kereta,
                'Waktu Berangkat' => date('d M Y H:i', strtotime($info->tgl_berangkat)),
                'Waktu Tiba' => date('d M Y H:i', strtotime($info->tgl_sampai)),
                'Jumlah Penumpang' => $_GET['p'],
                'Harga Per Tiket' => 'Rp. ' . number_format($info->harga, 0, ',', '.')
            ];
            foreach ($info_items as $label => $value): ?>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label font-weight-600 text-primary"><?= $label ?></label>
                    <div class="col-md-9">
                        <div class="form-control-plaintext border-bottom pb-2"><?= $value ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="form-group row">
                <label class="col-md-3 col-form-label font-weight-600 text-primary">Rute</label>
                <div class="col-md-9">
                    <div class="d-flex align-items-center">
                        <div class="text-center mr-3">
                            <div class="badge bg-danger p-2 mb-1"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="small"><?= $info->ASAL ?></div>
                        </div>
                        <div class="flex-grow-1 text-center">
                            <div class="dotted-line my-2"></div>
                            <i class="fas fa-arrow-right text-muted"></i>
                        </div>
                        <div class="text-center ml-3">
                            <div class="badge bg-success p-2 mb-1"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="small"><?= $info->TUJUAN ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM PENUMPANG & PEMESAN -->
    <form action="<?= base_url('pesanTiket') ?>" method="POST">
        <input type="hidden" name="penumpang" value="<?= $_GET['p'] ?>">
        <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">
        <input type="hidden" name="harga" value="<?= $info->harga ?>">

        <!-- DETAIL PENUMPANG -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 font-weight-600"><i class="fas fa-users mr-2"></i>Detail Penumpang</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th style="width:5%" class="text-center">No</th>
                                <th>Nama*</th>
                                <th>>= 17 Tahun Nomor ID (KTP, SIM, PASPORT)*</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $i <= $_GET['p']; $i++): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $i ?></td>
                                    <td>
                                        <input type="text" class="form-control border-primary" name="nama<?= $i ?>" required placeholder="Nama Lengkap">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control border-primary" name="identitas<?= $i ?>" required placeholder="Nomor Identitas">
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DETAIL PEMESANAN -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 font-weight-600"><i class="fas fa-user-tie mr-2"></i>Detail Pemesanan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-600">Nama Pemesan</label>
                            <input class="form-control border-primary" type="text" name="nama_pemesan" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-600">Email</label>
                            <input class="form-control border-primary" type="email" name="email" placeholder="email@contoh.com" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-600">No. Telp</label>
                            <input class="form-control border-primary" type="text" name="no_telp" placeholder="0812-3456-7890" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-600">Alamat</label>
                            <textarea name="alamat" class="form-control border-primary" rows="3" placeholder="Alamat Lengkap" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-4">
                    <button class="btn btn-primary px-4 py-2 font-weight-600">
                        <i class="fas fa-arrow-right mr-2"></i>Simpan & Lanjutkan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --light: #f8f9fa;
    }

    /* Progress Steps */
    .progress-line {
        height: 2px;
        background: #e9ecef;
        top: 20px;
        left: 10%;
        right: 10%;
        z-index: 1;
    }

    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 2;
        width: 30%;
    }

    .step-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 8px;
        transition: all 0.3s;
    }

    .step.active .step-icon {
        transform: scale(1.1);
        box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
    }

    .step-text {
        font-size: 14px;
        color: #6c757d;
        font-weight: 500;
        text-align: center;
    }

    .step.active .step-text {
        color: var(--primary);
        font-weight: 600;
    }

    /* Dotted line for route */
    .dotted-line {
        border-top: 2px dashed #dee2e6;
    }

    /* Form Styles */
    .border-primary {
        border: 1px solid var(--primary) !important;
    }

    .form-control:focus,
    .form-control-border-primary:focus {
        border-color: var(--primary-dark);
        box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
    }

    .font-weight-600 {
        font-weight: 600;
    }

    /* Table Styles */
    .table-hover tbody tr:hover {
        background-color: rgba(67, 97, 238, 0.05);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .step-text {
            font-size: 12px;
        }

        .progress-line {
            left: 15%;
            right: 15%;
        }

        .form-group.row>label {
            margin-bottom: 0.5rem;
        }

        .card-body .row>div {
            margin-bottom: 1rem;
        }

        .card-body .row>div:last-child {
            margin-bottom: 0;
        }
    }
</style>

<script>
    $(document).ready(function() {
        // Add focus effect to form inputs
        $('input, textarea').focus(function() {
            $(this).css('border-color', 'var(--primary-dark)');
        }).blur(function() {
            $(this).css('border-color', 'var(--primary)');
        });
    });
</script>