<?php if ($this->session->flashdata('nomor') === null): ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="alert alert-danger text-center rounded-lg shadow-sm py-4 animate__animated animate__fadeIn">
                    <div class="alert-icon mb-3">
                        <i class="fas fa-exclamation-triangle fa-3x"></i>
                    </div>
                    <h4 class="font-weight-600 mb-2">Anda telah me-refresh halaman</h4>
                    <p class="mb-3">Silakan lakukan pemesanan kembali jika belum mendapatkan kode pembayaran.</p>
                    <a href="<?= base_url() ?>" class="btn btn-outline-danger px-4 animate__animated animate__pulse animate__infinite">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container py-4">
        <!-- Progress Steps -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between position-relative">
                    <div class="progress-line position-absolute"></div>
                    <div class="step completed">
                        <div class="step-icon bg-success"><i class="fas fa-ticket-alt"></i></div>
                        <div class="step-text">Pilih Tiket</div>
                    </div>
                    <div class="step completed">
                        <div class="step-icon bg-success"><i class="fas fa-user-edit"></i></div>
                        <div class="step-text">Data Diri</div>
                    </div>
                    <div class="step active">
                        <div class="step-icon bg-primary"><i class="fas fa-credit-card"></i></div>
                        <div class="step-text">Pembayaran</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Warning Alert -->
                <div class="alert alert-warning text-center rounded-lg shadow-sm mb-4 animate__animated animate__fadeInDown">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <strong>Peringatan!</strong> Jangan refresh halaman ini untuk menghindari kegagalan sistem.
                </div>

                <!-- Payment Card -->
                <div class="card border-0 shadow-lg rounded-lg overflow-hidden animate__animated animate__fadeIn">
                    <!-- Card Header -->
                    <div class="card-header bg-primary-gradient text-white py-4">
                        <div class="text-center">
                            <div class="success-icon animate__animated animate__bounceIn">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h2 class="font-weight-600 mb-1 animate__animated animate__fadeInUp">PEMESANAN BERHASIL</h2>
                            <p class="mb-0 animate__animated animate__fadeInUp" style="animation-delay: 0.2s">Silakan lakukan pembayaran sebelum waktu habis</p>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4 p-md-5">
                        <!-- Payment Info -->
                        <div class="payment-info bg-light-blue p-4 rounded-lg mb-4 border-primary animate__animated animate__fadeIn" style="animation-delay: 0.3s">
                            <div class="text-center mb-3">
                                <h5 class="font-weight-600 text-primary">Transfer ke Rekening Bank</h5>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center mb-3 mb-md-0">
                                    <div class="bank-logo bg-white p-3 rounded-lg shadow-sm d-inline-block animate__animated animate__zoomIn">
                                        <i class="fas fa-university fa-3x text-primary"></i>
                                        <h5 class="mt-2 mb-0">BCA</h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="bank-details">
                                        <div class="d-flex align-items-center mb-3 animate__animated animate__fadeInRight" style="animation-delay: 0.4s">
                                            <div class="icon-circle bg-primary text-white mr-3">
                                                <i class="fas fa-wallet"></i>
                                            </div>
                                            <div>
                                                <h4 class="font-weight-600 mb-0">7285744008</h4>
                                                <small class="text-muted">Nomor Rekening</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center animate__animated animate__fadeInRight" style="animation-delay: 0.5s">
                                            <div class="icon-circle bg-primary text-white mr-3">
                                                <i class="fas fa-building"></i>
                                            </div>
                                            <div>
                                                <h5 class="font-weight-600 mb-0">PT. LydiKereta</h5>
                                                <small class="text-muted">Atas Nama</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Details -->
                        <div class="row justify-content-center animate__animated animate__fadeIn" style="animation-delay: 0.6s">
                            <div class="col-md-6 mb-4">
                                <div class="total-payment bg-light-blue p-3 rounded-lg border-primary text-center h-100">
                                    <p class="mb-1 text-muted">Total Pembayaran</p>
                                    <h2 class="text-success font-weight-600">Rp <?= number_format($this->session->flashdata('total'), 0, ',', '.') ?></h2>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="payment-code bg-light-blue p-3 rounded-lg border-primary text-center h-100">
                                    <p class="mb-1 text-muted">Kode Pembayaran</p>
                                    <h3 class="font-weight-600 text-primary copy-target"><?= $this->session->flashdata('nomor') ?></h3>
                                    <small class="text-muted">Klik untuk menyalin</small>
                                </div>
                            </div>
                        </div>

                        <!-- Countdown Timer -->
                        <div class="text-center mb-4 animate__animated animate__pulse animate__infinite" style="animation-duration: 1.5s">
                            <p class="text-muted mb-2">Selesaikan pembayaran dalam:</p>
                            <div id="countdown" class="countdown-timer">
                                <span class="hours">00</span>:<span class="minutes">10</span>:<span class="seconds">00</span>
                            </div>
                        </div>

                        <!-- Payment Instructions -->
                        <div class="payment-instructions text-center animate__animated animate__fadeIn" style="animation-delay: 0.8s">
                            <div class="alert alert-info rounded-lg py-3 mb-4">
                                <i class="fas fa-info-circle mr-2"></i>
                                <strong>Penting!</strong> Setelah transfer, segera lakukan konfirmasi pembayaran
                            </div>
                            <a href="<?= base_url('konfirmasi') ?>" class="btn btn-primary btn-lg px-5 py-3 font-weight-600 mt-2 animate__animated animate__pulse">
                                <i class="fas fa-check-circle mr-2"></i>Konfirmasi Pembayaran
                            </a>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer bg-light-blue text-center py-4 animate__animated animate__fadeIn" style="animation-delay: 1s">
                        <h5 class="text-primary font-weight-600 mb-0">
                            <i class="fas fa-heart mr-2"></i>TERIMA KASIH TELAH MEMESAN DI LydiKereta
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --light-blue: #f0f5ff;
            --success: #28a745;
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
            flex: 1;
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

        .step-text {
            font-size: 14px;
            color: #6c757d;
            font-weight: 500;
            text-align: center;
        }

        .step.active .step-icon {
            transform: scale(1.1);
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
        }

        .step.completed .step-icon {
            background-color: var(--success);
            color: white;
        }

        .step.completed .step-text {
            color: var(--success);
            font-weight: 600;
        }

        /* Payment Card */
        .card {
            border: none;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .success-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .bg-light-blue {
            background-color: var(--light-blue);
        }

        .border-primary {
            border: 1px solid rgba(67, 97, 238, 0.3) !important;
        }

        /* Bank Info */
        .bank-logo {
            transition: all 0.3s;
            width: 120px;
        }

        .bank-logo:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Countdown Timer */
        .countdown-timer {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
        }

        /* Copy Target */
        .copy-target {
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            display: inline-block;
        }

        .copy-target:hover {
            color: var(--primary-dark);
        }

        .copy-target::after {
            content: 'Klik untuk menyalin';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            color: #6c757d;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .copy-target:hover::after {
            opacity: 1;
        }

        /* Alert Icon */
        .alert-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .step-text {
                font-size: 12px;
            }

            .progress-line {
                left: 15%;
                right: 15%;
            }

            .card-body {
                padding: 1.5rem;
            }

            .bank-details {
                text-align: center;
            }

            .d-flex.align-items-center {
                justify-content: center;
            }
        }
    </style>

    <!-- Countdown Timer Script -->
    <script>
        function startCountdown() {
            let timeLeft = 600; // 10 minutes in seconds
            const countdownEl = document.getElementById("countdown");

            function updateCountdown() {
                const hours = Math.floor(timeLeft / 3600);
                const minutes = Math.floor((timeLeft % 3600) / 60);
                const seconds = timeLeft % 60;

                document.querySelector('.hours').textContent = hours.toString().padStart(2, '0');
                document.querySelector('.minutes').textContent = minutes.toString().padStart(2, '0');
                document.querySelector('.seconds').textContent = seconds.toString().padStart(2, '0');

                if (timeLeft > 0) {
                    timeLeft--;
                    setTimeout(updateCountdown, 1000);
                } else {
                    countdownEl.innerHTML = '<span class="text-danger">WAKTU PEMBAYARAN HABIS</span>';
                    // Show timeout modal
                    $('#timeoutModal').modal('show');
                }
            }
            updateCountdown();
        }

        document.addEventListener('DOMContentLoaded', function() {
            startCountdown();

            // Copy payment code to clipboard
            const paymentCode = document.querySelector('.copy-target');
            paymentCode.addEventListener('click', function() {
                const text = this.textContent;
                navigator.clipboard.writeText(text).then(() => {
                    const originalText = this.textContent;
                    this.innerHTML = '<i class="fas fa-check mr-1"></i> Kode Disalin!';
                    setTimeout(() => {
                        this.textContent = originalText;
                    }, 2000);
                });
            });

            // Add animation class on scroll
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.animate-on-scroll');
                elements.forEach(el => {
                    if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                        el.classList.add('animate__animated', 'animate__fadeInUp');
                    }
                });
            };

            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Run once on load
        });
    </script>

    <!-- Timeout Modal -->
    <div class="modal fade" id="timeoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title font-weight-600">Waktu Pembayaran Habis</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-clock fa-4x text-danger mb-3"></i>
                    <h4 class="font-weight-600 mb-3">Waktu pembayaran telah habis</h4>
                    <p>Silakan lakukan pemesanan ulang untuk mendapatkan kode pembayaran baru.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="<?= base_url() ?>" class="btn btn-primary px-4">
                        <i class="fas fa-home mr-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Add this before closing body tag in footer.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />