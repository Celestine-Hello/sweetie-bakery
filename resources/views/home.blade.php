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
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('data:image/jpeg;base64,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') center/cover no-repeat;
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
        }
        .btn-primary:hover {
            background-color: #c5895a;
        }
        .card-product {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        .card-product:hover {
            transform: translateY(-10px);
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
        }
        .bg-light-cream {
            background-color: #fff8f3;
        }
        footer {
            background-color: #2d2d2d;
            color: #ddd;
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
            @foreach ($products as $item)
                <a href="{{ url("/produk/1") }}" class="col-md-6 col-lg-4">
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
</body>
</html>
