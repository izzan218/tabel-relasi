<!DOCTYPE html>
<html>
<head>
    <title>Data Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar di atas tabel -->
    <nav class="navbar navbar-expand-lg" style="background-color: #0d6efd;"> 
        <div class="container">
            <a class="navbar-brand text-white font-semibold" href="#">Aplikasi Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white font-semibold" href="{{ route('siswa.index') }}">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-semibold" href="{{ route('kas.index') }}">Kas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-semibold" href="{{ route('bulankas.index') }}">Kas Bulanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
