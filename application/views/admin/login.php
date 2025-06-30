<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Lydikereta</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3a7bd5;
            --secondary-color: #00d2ff;
            --dark-color: #2c3e50;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 25px;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('<?= base_url('assets/img/train-pattern.png') ?>') repeat;
            opacity: 0.1;
            transform: rotate(15deg);
            animation: trainMove 15s linear infinite;
        }

        .card-header h3 {
            position: relative;
            color: white;
            font-weight: 600;
            margin: 0;
        }

        .card-body {
            padding: 30px;
            background-color: white;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
        }

        .input-icon input {
            padding-left: 40px;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            padding: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
            border-radius: 8px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(58, 123, 213, 0.3);
        }

        .btn-login::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
            transition: all 0.3s;
        }

        .btn-login:hover::after {
            left: 100%;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo img {
            height: 60px;
            margin-bottom: 15px;
            animation: bounceIn 1s ease;
        }

        .login-logo h4 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .login-logo p {
            color: #7f8c8d;
            font-size: 14px;
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

        @keyframes trainMove {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 100% 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-container">
                    <div class="login-logo">
                        <h4>Lydikereta Admin Panel</h4>
                        <p>Silakan masuk untuk mengakses sistem</p>
                    </div>

                    <div class="card login-card">
                        <div class="card-header">
                            <h3><i class="fas fa-user-shield mr-2"></i> Login Administrator</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('prosesLogin') ?>" method="POST">
                                <div class="form-group input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                                </div>

                                <div class="form-group input-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-login btn-block text-white">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted small">© <?= date('Y') ?> Lydikereta. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script>
        // Simple animation for the login button
        document.querySelector('.btn-login').addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-2px)';
        });

        document.querySelector('.btn-login').addEventListener('mouseout', function() {
            this.style.transform = 'translateY(0)';
        });

        // Add focus effects for inputs
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('i').style.color = '#3a7bd5';
            });

            input.addEventListener('blur', function() {
                this.parentElement.querySelector('i').style.color = '#3a7bd5';
            });
        });
    </script>
</body>

</html>