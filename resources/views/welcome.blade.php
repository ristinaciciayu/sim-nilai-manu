<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Pengolahan Nilai MA NU YOSOWINANGUN</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        .navbar {
            background: linear-gradient(135deg, #445ebf, #6610f2);
        }
        .navbar .nav-link {
            font-weight: 500;
            transition: 0.3s;
            color:#ffff;
        }
        .navbar .nav-link:hover {
            color: #ffe082 !important;
        }
        /* Home Section */
        #home {
            background: url('{{ asset('image/foto_sekolah.jpg') }}') no-repeat center center/cover;
            position: relative;
            height: 100vh; /* full viewport height */
        }
        #home::before {
            content: "";
            position: absolute;
            top:0; left:0;
            width:100%; height:100%;
            background: rgba(0,0,0,0.55); /* overlay untuk teks */
        }
        #home .content {
            position: relative;
            z-index: 2;
        }
        #about {
            background: #f8f9fc;
        }
        footer {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Sekolah"
                style="height: 65px; width: 40px; padding-top:5px; object-fit: cover;" class="me-2">
            MA NU YOSOWINANGUN
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-light px-3 ms-lg-3 fw-semibold shadow-sm rounded-pill" href="{{ url('/login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Home) -->
    <section id="home" class="d-flex align-items-center justify-content-center text-center text-white">
        <div class="content">
            <h1 class="display-4 fw-bold">Selamat Datang</h1>
            <p class="lead">Sistem Informasi Pengolahan Nilai Sekolah <br> MA NU Yosowinangun</p>
            <a href="{{ url('/login') }}" class="btn btn-lg fw-semibold mt-3 rounded-pill shadow-sm"
               style="background: linear-gradient(135deg,#0d6efd,#6610f2); color:white;">
                <i class="bi bi-box-arrow-in-right"></i> Masuk ke Sistem
            </a>
        </div>
    </section>

    <!-- About Me Section -->
    <section id="about" class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold mb-4 text-gradient">Tentang </h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">
                SIM Pengolahan Nilai adalah platform digital untuk membantu sekolah mengelola data nilai siswa.
                Dengan fitur lengkap seperti input data siswa, pengolahan nilai otomatis, laporan cetak, dan manajemen user,
                sistem ini dirancang untuk mempermudah administrasi akademik.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <p class="mb-0">&copy; {{ date('Y') }} SIM Pengolahan Nilai - PTI universitas nurul huda</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
