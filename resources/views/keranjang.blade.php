<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - Sweetie Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --pastel-primary: #d4a373;
            --pastel-bg: #fdf6f0;
            --pastel-card: #ffffff;
            --pastel-text: #5a4a42;
            --pastel-muted: #8c7b73;
            --pastel-success: #7fb069;
            --pastel-danger: #e07a7a;
        }
        body { font-family: 'Poppins', sans-serif; background-color: var(--pastel-bg); color: var(--pastel-text); }
        h1, h2, h3, h4, h5 { font-family: 'Playfair Display', serif; }
        .navbar {
            background: rgba(255,255,255,0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(212, 163, 115, 0.1) !important;
        }
        .navbar-brand { font-weight: 700; font-size: 1.8rem; color: var(--pastel-text) !important; font-family: 'Playfair Display', serif; }
        .cart-item {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(212, 163, 115, 0.06);
            transition: all 0.3s;
            border: 1px solid rgba(212, 163, 115, 0.05);
        }
        .cart-item:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(212, 163, 115, 0.1); }
        .cart-item img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }
        .quantity-btn {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(212, 163, 115, 0.2);
            background: #fffaf5;
            border-radius: 10px;
            font-size: 1.1rem;
            color: var(--pastel-text);
            transition: all 0.2s;
        }
        .quantity-btn:hover {
            background: var(--pastel-primary);
            color: white;
            border-color: var(--pastel-primary);
        }
        .summary-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(212, 163, 115, 0.08);
            position: sticky;
            top: 100px;
            border: 1px solid rgba(212, 163, 115, 0.05);
        }
        .price-total {
            font-size: 1.8rem;
            color: var(--pastel-primary);
            font-weight: 700;
        }
        .btn-whatsapp-checkout {
            background-color: #6dbf8e;
            color: white;
            border-radius: 50px;
            padding: 16px;
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(109, 191, 142, 0.3);
        }
        .btn-whatsapp-checkout:hover {
            background-color: #5aa97a;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(109, 191, 142, 0.4);
        }
        .btn-whatsapp-checkout i { margin-right: 10px; }
        .empty-cart {
            text-align: center;
            padding: 5rem 1rem;
            color: var(--pastel-muted);
        }
        .empty-cart img {
            width: 200px;
            opacity: 0.7;
            margin-bottom: 2rem;
        }
        .breadcrumb-item a { color: var(--pastel-muted); text-decoration: none; transition: color 0.3s; }
        .breadcrumb-item a:hover { color: var(--pastel-primary); }
        .breadcrumb-item.active { color: var(--pastel-primary); }
        .text-danger { color: var(--pastel-danger) !important; }
        .btn-outline-dark {
            border-color: var(--pastel-muted);
            color: var(--pastel-text);
            transition: all 0.3s;
        }
        .btn-outline-dark:hover {
            background: var(--pastel-primary);
            border-color: var(--pastel-primary);
            color: white;
        }
        .form-control {
            border-radius: 14px;
            border: 2px solid rgba(212, 163, 115, 0.12);
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--pastel-primary);
            box-shadow: 0 0 0 4px rgba(212, 163, 115, 0.1);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand text-dark" href="/">Sweetie Bakery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/#produk">Produk</a></li>
                <li class="nav-item position-relative">
                    <a class="nav-link fs-4" href="/keranjang">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            3
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Breadcrumb -->
<div class="container mt-5 pt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active">Keranjang Belanja</li>
        </ol>
    </nav>
</div>

<!-- Main Content -->
<div class="container my-5">
    <h2 class="text-center mb-5">Keranjang Belanja Kamu</h2>

    <div class="row g-5">
        <!-- Daftar Item Keranjang -->
        <div class="col-lg-8">

            <!-- Item 1 -->
            <div class="cart-item mb-4">
                <div class="row g-0 align-items-center">
                    <div class="col-4 col-md-3">
                        <img src="https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Red Velvet">
                    </div>
                    <div class="col-8 col-md-9">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="mb-1">Red Velvet Classic</h5>
                                    <p class="text-muted small mb-2">Ukuran 20 cm • Cream Cheese Asli</p>
                                </div>
                                <button class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="d-flex align-items-center gap-2">
                                    <button class="quantity-btn">-</button>
                                    <input type="text" class="form-control text-center mx-2" style="width:60px;" value="1" readonly>
                                    <button class="quantity-btn">+</button>
                                </div>
                                <h5 class="mb-0 text-danger fw-bold">Rp 350.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="cart-item mb-4">
                <div class="row g-0 align-items-center">
                    <div class="col-4 col-md-3">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=600&q=80" alt="Chocolate Ganache">
                    </div>
                    <div class="col-8 col-md-9">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="mb-1">Dark Chocolate Ganache</h5>
                                    <p class="text-muted small mb-2">Ukuran 24 cm • 70% Dark Chocolate</p>
                                </div>
                                <button class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="d-flex align-items-center gap-2">
                                    <button class="quantity-btn">-</button>
                                    <input type="text" class="form-control text-center mx-2" style="width:60px;" value="2" readonly>
                                    <button class="quantity-btn">+</button>
                                </div>
                                <h5 class="mb-0 text-danger fw-bold">Rp 760.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Ringkasan Pembelian
        <div class="col-lg-4">
            <div class="summary-card">
                <h4 class="mb-4">Ringkasan Pesanan</h4>
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal (3 item)</span>
                    <span>Rp 1.110.000</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Ongkir (Gojek Jakarta)</span>
                    <span>Rp 25.000</span>
                </div>
                <div class="d-flex justify-content-between mb-3 text-success">
                    <span>Diskon Kode SWEET10</span>
                    <span>-Rp 111.000</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Total Bayar</h4>
                    <div class="price-total">Rp 1.024.000</div>
                </div>

                <div class="d-grid gap-3">
                    <a href="https://wa.me/6281234567890?text=Halo%20Sweetie%20Cake!%0ASaya%20mau%20checkout%20pesanan%20berikut%3A%0A%0A1.%20Red%20Velvet%20Classic%2020cm%20-%201pcs%20%3D%20Rp350.000%0A2.%20Dark%20Chocolate%20Ganache%2024cm%20-%202pcs%20%3D%20Rp760.000%0A%0ASubtotal%3A%20Rp1.110.000%0ADiskon%3A%20Rp111.000%0AOngkir%3A%20Rp25.000%0A%0ATotal%3A%20Rp1.024.000%0A%0ATerima%20kasih!"
                       class="btn btn-whatsapp-checkout btn-lg" target="_blank">
                        <i class="fab fa-whatsapp"></i> Checkout via WhatsApp
                    </a>
                    <a href="/#produk" class="btn btn-outline-dark btn-lg rounded-pill">
                        Lanjut Belanja
                    </a>
                </div>

                <div class="mt-4 text-center">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt me-2"></i>
                        Pembayaran aman • Pengiriman cepat • 100% fresh
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Jika keranjang kosong (opsional) -->
    <!--
    <div class="empty-cart">
        <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-cart-4816550-4009654.png" alt="Keranjang kosong">
        <h4>Keranjangmu masih kosong</h4>
        <p>Yuk isi dengan sweetie-sweetie terbakery dari Sweetie Bakery!</p>
        <a href="/#produk" class="btn btn-primary btn-lg rounded-pill px-5">Mulai Belanja</a>
    </div>
    -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('partials.music-player')
</body>
</html>
