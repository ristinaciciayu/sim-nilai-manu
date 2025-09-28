<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Nilai Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f6f8fb;
        }

        /* Sidebar */
        .sidebar {
            width: 300px; /* agak dilebarkan */
            min-height: 100vh;
            background-color: #fff;
            border-right: 1px solid #eaeaea;
            padding: 2.5rem 1rem 1.5rem 1rem;
        }

        .sidebar h4 {
            font-weight: 700;
            color: #445ebf;
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .nav-link {
            color: #333;
            font-weight: 500;
            margin-bottom: 0.5rem;
            border-radius: 0.5rem;
            padding: 0.65rem 1rem;
            transition: all 0.2s ease-in-out;
            display: flex;
            align-items: center;
        }

        .nav-link i {
            margin-right: 0.8rem;
            font-size: 1.1rem;
            color: #445ebf;
        }

        .nav-link:hover {
            background-color: #f0f6ff;
            color: #445ebf !important;
        }

        .nav-link.active {
            background-color: #445ebf;
            color: #fff !important;
            font-weight: 600;
        }

        .nav-link.active i {
            color: #fff !important;
        }

        .collapse .nav-link {
            font-size: 0.9rem;
            padding-left: 2.2rem;
        }

        /* Content + Navbar */
        .content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-custom {
            background: #fff;
            border-bottom: 1px solid #eaeaea;
            padding: 0.8rem 1.5rem;
        }

        .navbar-custom .username {
            font-weight: 600;
            color: #445ebf;
        }

        .content-area {
            flex-grow: 1;
            padding: 2rem;
        }

        .card-dashboard {
            border-radius: 0.75rem;
            box-shadow: 0 0.2rem 0.6rem rgba(0,0,0,0.05);
            transition: transform 0.2s ease-in-out;
        }

        .card-dashboard:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        @auth
        <div class="sidebar">
            <h4>SIM NILAI<br>MA NU YOSOWINANGUN</h4>
            <ul class="nav flex-column">
                @if(Auth::user()->role === 'admin')
                    <li class="nav-item"><a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i>Dashboard</a></li>
                    <li class="nav-item"><a href="{{ route('admin.data_guru.index') }}" class="nav-link {{ request()->is('admin/data_guru*') ? 'active' : '' }}"><i class="bi bi-person-badge"></i>Data Guru</a></li>
                    <li class="nav-item"><a href="{{ route('admin.data_siswa.index') }}" class="nav-link {{ request()->is('admin/data_siswa*') ? 'active' : '' }}"><i class="bi bi-people"></i>Data Siswa</a></li>
                    <li class="nav-item"><a href="{{ route('admin.data_kelas.index') }}" class="nav-link {{ request()->is('admin/data_kelas*') ? 'active' : '' }}"><i class="bi bi-building"></i>Data Kelas</a></li>
                    <li class="nav-item"><a href="{{ route('admin.data_mapel.index') }}" class="nav-link {{ request()->is('admin/data_mapel*') ? 'active' : '' }}"><i class="bi bi-journal-bookmark"></i>Data Mapel</a></li>
                    <li class="nav-item"><a href="{{ route('admin.laporan.nilai.index') }}"class="nav-link {{ request()->is('admin/laporan_nilai*') ? 'active' : '' }}"><i class="bi bi-award"></i> Laporan Nilai</a></li>                    
                    <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"><i class="bi bi-person-plus"></i>Tambah User</a></li>
                @elseif(Auth::user()->role === 'guru')
                    <li class="nav-item"><a href="/guru/dashboard" class="nav-link {{ request()->is('guru/dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i>Dashboard</a></li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('guru/nilai*') ? 'active' : '' }}" 
                        data-bs-toggle="collapse" 
                        href="#nilaiMenu" 
                        role="button" 
                        aria-expanded="{{ request()->is('guru/nilai*') ? 'true' : 'false' }}">
                            <span><i class="bi bi-pencil-square me-2"></i> Input Nilai</span>
                            <i class="bi bi-chevron-down dropdown-icon"></i>
                        </a>
                        <div class="collapse {{ request()->is('guru/nilai*') ? 'show' : '' }} ps-3" id="nilaiMenu">
                            <a class="nav-link {{ request()->is('guru/nilai/X') ? 'active' : '' }}" href="/guru/nilai/X">Kelas X</a>
                            <a class="nav-link {{ request()->is('guru/nilai/XI') ? 'active' : '' }}" href="/guru/nilai/XI">Kelas XI</a>
                            <a class="nav-link {{ request()->is('guru/nilai/XII') ? 'active' : '' }}" href="/guru/nilai/XII">Kelas XII</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ route('guru.data_guru') }}" class="nav-link {{ request()->is('guru/data_guru*') ? 'active' : '' }}"><i class="bi bi-person-badge"></i>Data Guru</a></li>
                    <li class="nav-item"><a href="{{ route('guru.data_siswa.index') }}" class="nav-link {{ request()->is('guru/data_siswa*') ? 'active' : '' }}"><i class="bi bi-people"></i>Data Siswa</a></li>
                    <li class="nav-item"><a href="{{ route('guru.data_kelas') }}" class="nav-link {{ request()->is('guru/data_kelas*') ? 'active' : '' }}"><i class="bi bi-building"></i>Data Kelas</a></li>
                    <li class="nav-item"><a href="{{ route('guru.data_mapel') }}" class="nav-link {{ request()->is('guru/data_mapel*') ? 'active' : '' }}"><i class="bi bi-journal-bookmark"></i>Data Mapel</a></li>
                @endif
                <li class="nav-item mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth

        {{-- Content wrapper --}}
        <div class="content-wrapper">
            {{-- Navbar atas --}}
            @auth
            <nav class="navbar navbar-custom d-flex justify-content-end align-items-center">
                <span class="username">Halo ! {{ Auth::user()->name }}</span>
            </nav>
            @endauth

            {{-- Content area --}}
            <div class="@auth content-area @else w-100 d-flex justify-content-center align-items-center @endauth">
                @yield('content')
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
