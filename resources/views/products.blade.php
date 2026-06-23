<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semua Produk - Sweetie Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fdf9f5; color: #444; }
        h1, h2, h3, h5 { font-family: 'Playfair Display', serif; }
        .navbar-brand { font-weight: 700; font-size: 1.8rem; }

        .product-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.07);
            transition: all 0.4s ease;
        }
        .product-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        .product-card img {
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .product-card:hover img {
            transform: scale(1.08);
        }
        .price {
            font-size: 1.5rem;
            color: #d4a373;
            font-weight: 700;
        }
        .badge-popular {
            background: linear-gradient(45deg, #d4a373, #e8c39e);
            color: white;
            font-size: 0.75rem;
            padding: 5px 12px;
            border-radius: 50px;
        }
        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            position: sticky;
            top: 100px;
        }
        .form-control, .form-select {
            border-radius: 12px;
        }
        .btn-filter {
            background-color: #d4a373;
            color: white;
            border-radius: 30px;
            padding: 10px 24px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand text-dark" href="/">Sweetie Bakery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link active fw-600" href="produk.html">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/#tentang">Tentang</a></li>
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

<div class="container mt-5 pt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active">Semua Produk</li>
        </ol>
    </nav>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-3 mb-5">
            <div class="filter-card">
                <h5 class="mb-4">Filter Produk</h5>

                <div class="mb-4">
                    <label class="form-label fw-500">Kategori</label>
                    <select class="form-select">
                        <option value="">Semua Sweetie</option>
                        <option>Birthday Cake</option>
                        <option>Wedding Cake</option>
                        <option>Cheesecake</option>
                        <option>Chocolate Series</option>
                        <option>Tart & Pie</option>
                        <option>Mini Cake</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-500">Urutkan</label>
                    <select class="form-select">
                        <option>Terbaru</option>
                        <option>Harga: Rendah → Tinggi</option>
                        <option>Harga: Tinggi → Rendah</option>
                        <option>Terlaris</option>
                        <option>Rating Tertinggi</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-500">Rentang Harga</label>
                    <input type="range" class="form-range" min="150000" max="2000000" step="50000">
                    <div class="d-flex justify-content-between small text-muted">
                        <span>Rp 150.000</span>
                        <span>Rp 2.000.000</span>
                    </div>
                </div>

                <button class="btn btn-filter w-100">Terapkan Filter</button>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Semua Sweetie Artisan (24 produk)</h3>
                <span class="text-muted">Menampilkan 1–12 dari 24</span>
            </div>

            <div class="row g-4">
                @foreach ($products as $product)
    <div class="col-md-6 col-lg-4">
        <div class="product-card h-100">
            <a href="{{ url("/produk/1") }}" class="text-decoration-none">

                <img
                    src="{{ $product['gambar'] }}"
                    alt="{{ $product['nama'] }}"
                >

                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="mb-0 text-dark">
                            {{ $product['nama'] }}
                        </h5>

                        <span class="badge-popular">Best Seller</span>
                    </div>

                    <p class="text-muted small">
                        {{ $product['deskripsi'] }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="price">
                            Rp {{ number_format($product['harga'], 0, ',', '.') }}
                        </div>

                        <span class="text-warning small">★★★★★</span>
                    </div>
                </div>

            </a>
        </div>
    </div>
@endforeach


            </div>
            <nav class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link">«</a></li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('partials.music-player')
</body>
</html>
