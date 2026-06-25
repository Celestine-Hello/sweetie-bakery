<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sweetie Bakery | Sweetie Artisan Premium</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #444;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
        }
        .hero {
            background: linear-gradient(rgba(90,74,66,0.45), rgba(140,123,115,0.35)), url('https://images.unsplash.com/photo-1517433670267-08bbd4be890f?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
            height: 100vh;
            min-height: 600px;
            color: white;
            display: flex;
            align-items: center;
        }
        .btn-primary {
            background-color: #d4a373;
            border: none;
            padding: 12px 32px;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(212, 163, 115, 0.3);
        }
        .btn-primary:hover {
            background-color: #c5895a;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(212, 163, 115, 0.4);
        }
        .card-product {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(212, 163, 115, 0.08);
            transition: all 0.4s;
            background: white;
        }
        .card-product:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 50px rgba(212, 163, 115, 0.15);
        }
        .card-product img {
            height: 280px;
            object-fit: cover;
        }
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #d4a373;
            border-radius: 2px;
        }
        .bg-light-cream {
            background-color: #fdf6f0;
        }
        footer {
            background-color: #5a4a42;
            color: #e8d5c9;
        }
        .navbar {
            background: rgba(255,255,255,0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(212, 163, 115, 0.1) !important;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #5a4a42 !important;
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand text-dark" href="#">Sweetie Bakery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/products">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                <li class="nav-item position-relative">
                    <a class="nav-link fs-4" href="/keranjang">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.65rem;">3</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-3 fw-bold mb-4">Setiap Gigitan Penuh Cinta</h1>
                <p class="lead mb-5">Sweetie artisan handmade dengan bahan premium, tanpa pengawet, dibuat fresh setiap hari.</p>
                <a href="#produk" class="btn btn-primary btn-lg">Lihat Koleksi Sweetie</a>
            </div>
        </div>
    </div>
</section>

<!-- Produk Unggulan -->
<section class="py-5 bg-light-cream" id="produk">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Produk Unggulan</h2>
        </div>
        <div class="row g-4">
            @foreach ($products as $index => $item)
                <a href="{{ url('/produk/' . ($index + 1)) }}" class="col-md-6 col-lg-4 text-decoration-none">
                    <div class="card card-product h-100">
                        <img src="{{ $item['gambar'] }}" class="card-img-top" alt="{{ $item['nama'] }}">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title">{{ $item['nama'] }}</h5>
                            <p class="text-muted mb-3">{{ $item['deskripsi'] }}</p>
                            <h5 class="text-primary">Rp {{ number_format($item['harga'], 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class="text-center mt-5">
            <a href="{{ url("/products") }}" class="btn btn-outline-primary btn-lg rounded-pill px-5">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<!-- Tentang Kami -->
<section class="py-5" id="tentang">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-4.0.3&auto=format&fit=crop&q=80" class="img-fluid rounded shadow" alt="Bakery">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title mb-4">Mengapa Memilih Sweetie Bakery?</h2>
                <ul class="list-unstyled">
                    <li class="mb-3"><strong>✓ 100% Handmade</strong> – Setiap sweetie dibuat dengan tangan penuh cinta</li>
                    <li class="mb-3"><strong>✓ Bahan Premium</strong> – Mentega Prancis, cokelat Belgia, vanila Madagascar</li>
                    <li class="mb-3"><strong>✓ Tanpa Pengawet</strong> – Fresh baked setiap hari</li>
                    <li class="mb-3"><strong>✓ Custom Design</strong> – Sweetie ulang tahun & wedding cake sesuai impianmu</li>
                </ul>
                <a href="#" class="btn btn-primary mt-3">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 text-center text-lg-start" id="kontak">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="text-white mb-3">Sweetie Bakery</h5>
                <p>Sweetie artisan premium sejak 2025.<br>Setiap momen spesial layak dirayakan dengan rasa terbaik.</p>
            </div>
            <div class="col-lg-4 mb-4">
                <h6 class="text-white">Jam Operasional</h6>
                <p>Senin – Minggu: 09.00 – 21.00 WIB<br>Pesan antar sampai pukul 19.00</p>
            </div>
            <div class="col-lg-4">
                <h6 class="text-white">Hubungi Kami</h6>
                <p>
                    <strong>WA:</strong> 0812-3456-7890<br>
                    <strong>Email:</strong> halo@sweetibakery.id<br>
                    <strong>Alamat:</strong> Jl. Raya Puputan No. 86, Renon, Denpasar, Bali
                </p>
            </div>
        </div>
        <hr class="my-4 border-secondary">
        <div class="text-center">© 2025 Sweetie Bakery. All rights reserved.</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('partials.music-player')
</body>
</html>
