<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product['nama'] }} - Sweetie Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --pastel-primary: #d4a373;
            --pastel-primary-soft: #e8c39e;
            --pastel-primary-light: #f5e6d3;
            --pastel-bg: #fdf6f0;
            --pastel-cream: #fffaf5;
            --pastel-card: #ffffff;
            --pastel-text: #5a4a42;
            --pastel-muted: #8c7b73;
            --pastel-success: #7fb069;
            --pastel-danger: #e07a7a;
            --pastel-pink: #f5c6c6;
            --pastel-lavender: #e6d5f7;
            --pastel-mint: #c8e6d5;
            --pastel-peach: #ffd8c9;
            --pastel-yellow: #fff3c9;
            --pastel-blue: #c9e4ff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--pastel-text);
            background-color: var(--pastel-bg);
        }
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }
        .breadcrumb {
            background: none;
            padding: 1rem 0;
        }
        .breadcrumb-item a {
            color: var(--pastel-muted);
            text-decoration: none;
            transition: color 0.3s;
        }
        .breadcrumb-item a:hover {
            color: var(--pastel-primary);
        }
        .breadcrumb-item.active {
            color: var(--pastel-primary);
        }

        /* ── Video wrapper ── */
        .product-video-wrap {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(212, 163, 115, 0.2);
            position: relative;
            background: #1a1a1a;
            aspect-ratio: 4 / 3;
            cursor: pointer;
        }

        .video-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: opacity 0.3s, transform 0.5s;
        }
        .product-video-wrap:hover .video-thumbnail {
            transform: scale(1.05);
        }

        .product-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            position: absolute;
            inset: 0;
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(90, 74, 66, 0.4);
            transition: background 0.3s;
        }
        .product-video-wrap:hover .play-overlay {
            background: rgba(90, 74, 66, 0.55);
        }
        .play-btn {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.25s, box-shadow 0.25s;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        }
        .play-btn i {
            font-size: 2rem;
            color: var(--pastel-primary);
            margin-left: 5px;
        }
        .product-video-wrap:hover .play-btn {
            transform: scale(1.1);
            box-shadow: 0 12px 40px rgba(0,0,0,0.3);
        }
        .play-label {
            color: #fff;
            font-size: 0.95rem;
            font-weight: 500;
            margin-top: 14px;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        .video-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: var(--pastel-primary);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 50px;
            letter-spacing: 0.4px;
            z-index: 10;
            box-shadow: 0 4px 15px rgba(212, 163, 115, 0.4);
        }

        .thumbnail-img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s;
            border: 3px solid transparent;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }
        .thumbnail-img.active {
            border-color: var(--pastel-primary);
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(212, 163, 115, 0.25);
        }

        .price {
            font-size: 2.4rem;
            color: var(--pastel-primary);
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .btn-whatsapp {
            background-color: #6dbf8e;
            color: white;
            border-radius: 50px;
            padding: 14px 32px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(109, 191, 142, 0.3);
        }
        .btn-whatsapp:hover {
            background-color: #5aa97a;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(109, 191, 142, 0.4);
        }
        .btn-whatsapp i { margin-right: 8px; }

        .btn-add-cart {
            background-color: var(--pastel-primary);
            border: none;
            border-radius: 50px;
            padding: 14px 40px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(212, 163, 115, 0.3);
        }
        .btn-add-cart:hover {
            background-color: #c5895a;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(212, 163, 115, 0.4);
        }

        .btn-3d-preview {
            border: 2px solid var(--pastel-primary);
            color: var(--pastel-primary);
            border-radius: 50px;
            padding: 14px 32px;
            font-weight: 600;
            background: var(--pastel-cream);
            transition: all 0.3s;
        }
        .btn-3d-preview:hover {
            background: var(--pastel-primary);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 163, 115, 0.3);
        }

        .info-box {
            background: var(--pastel-card);
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: 0 8px 25px rgba(212, 163, 115, 0.08);
            border: 1px solid rgba(212, 163, 115, 0.1);
        }
        .info-box small {
            color: var(--pastel-muted);
            line-height: 2;
        }
        .info-box i {
            color: var(--pastel-primary);
            width: 20px;
        }

        .nav-pills .nav-link {
            border-radius: 16px;
            color: var(--pastel-muted);
            font-weight: 500;
            padding: 12px 28px;
            transition: all 0.3s;
            border: 1px solid transparent;
        }
        .nav-pills .nav-link:hover {
            background: var(--pastel-primary-light);
            color: var(--pastel-primary);
        }
        .nav-pills .nav-link.active {
            background-color: var(--pastel-primary);
            color: #fff;
            box-shadow: 0 6px 20px rgba(212, 163, 115, 0.3);
        }

        .rating-star { color: #f5b041; }

        .badge-soft {
            background: var(--pastel-primary-light);
            color: var(--pastel-primary);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: 50px;
        }

        .tab-content {
            background: var(--pastel-card);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(212, 163, 115, 0.08);
            border: 1px solid rgba(212, 163, 115, 0.1);
        }

        .review-card {
            background: var(--pastel-cream);
            border-radius: 20px;
            padding: 1.75rem;
            margin-bottom: 1rem;
            transition: all 0.3s;
            border: 1px solid rgba(212, 163, 115, 0.08);
        }
        .review-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(212, 163, 115, 0.12);
        }
        .review-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--pastel-primary-light);
            color: var(--pastel-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .review-form {
            background: var(--pastel-cream);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(212, 163, 115, 0.15);
        }
        .form-control-pastel {
            border-radius: 14px;
            border: 2px solid rgba(212, 163, 115, 0.15);
            padding: 14px 18px;
            transition: all 0.3s;
            background: var(--pastel-card);
        }
        .form-control-pastel:focus {
            border-color: var(--pastel-primary);
            box-shadow: 0 0 0 4px rgba(212, 163, 115, 0.15);
            background: var(--pastel-card);
        }
        .btn-pastel-submit {
            background: var(--pastel-primary);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 32px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(212, 163, 115, 0.3);
        }
        .btn-pastel-submit:hover {
            background: #c5895a;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(212, 163, 115, 0.4);
        }
        .star-rating {
            display: flex;
            gap: 8px;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .star-rating i {
            color: #e0d5cc;
            transition: all 0.2s;
        }
        .star-rating i.active,
        .star-rating i:hover {
            color: #f5b041;
            transform: scale(1.2);
        }

        .stat-badge {
            background: var(--pastel-card);
            border-radius: 16px;
            padding: 1rem 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(212, 163, 115, 0.08);
            border: 1px solid rgba(212, 163, 115, 0.1);
        }
        .stat-badge .number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--pastel-primary);
            font-family: 'Playfair Display', serif;
        }
        .stat-badge .label {
            font-size: 0.75rem;
            color: var(--pastel-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(212, 163, 115, 0.1) !important;
        }
        .navbar-brand {
            color: var(--pastel-text) !important;
            font-weight: 700;
            font-size: 1.8rem;
            font-family: 'Playfair Display', serif;
        }
        .nav-link {
            color: var(--pastel-muted) !important;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
        }
        .nav-link:hover,
        .nav-link.active {
            color: var(--pastel-primary) !important;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--pastel-primary);
            transition: all 0.3s;
            transform: translateX(-50%);
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 60%;
        }

        .form-select {
            border-radius: 14px;
            border: 2px solid rgba(212, 163, 115, 0.15);
            padding: 14px 18px;
            transition: all 0.3s;
        }
        .form-select:focus {
            border-color: var(--pastel-primary);
            box-shadow: 0 0 0 4px rgba(212, 163, 115, 0.15);
        }
        .form-control {
            border-radius: 14px;
            border: 2px solid rgba(212, 163, 115, 0.15);
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--pastel-primary);
            box-shadow: 0 0 0 4px rgba(212, 163, 115, 0.15);
        }

        .text-success-soft { color: var(--pastel-success) !important; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Sweetie Bakery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/#produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="/#kontak">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Breadcrumb -->
<div class="container mt-5 pt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/#produk">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product['nama'] }}</li>
        </ol>
    </nav>
</div>

<section class="py-5">
    <div class="container py-4">
        <div class="row g-5">

            <!-- ── Left column: video + thumbnails ── -->
            <div class="col-lg-6">

                <div class="product-video-wrap mb-4" id="videoWrap">
                    <span class="video-badge"><i class="fas fa-video me-1"></i> Video Pembuatan</span>

                    <img
                        id="videoThumbnail"
                        src="{{ $product['thumbnail'] }}"
                        alt="{{ $product['nama'] }} – Video thumbnail"
                        class="video-thumbnail"
                    >

                    <video
                        id="productVideo"
                        class="product-video"
                        controls
                        preload="none"
                        poster=""
                    >
                        <source src="{{ asset($product['video']) }}" type="video/mp4">
                        Browser kamu tidak mendukung pemutar video.
                    </video>

                    <div class="play-overlay" id="playOverlay">
                        <div class="play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <span class="play-label">Tonton Proses Pembuatan</span>
                    </div>
                </div>

                <div class="row g-3">
                    @foreach($product['thumbnails'] as $idx => $thumb)
                    <div class="col-3">
                        <img src="{{ $thumb }}" class="thumbnail-img {{ $idx === 0 ? 'active' : '' }}" alt="Thumbnail {{ $idx + 1 }}">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- ── Right column: info produk ── -->
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="badge-soft">{{ $product['badge'] }}</span>
                    <span class="badge-soft" style="background: var(--pastel-mint); color: var(--pastel-success);">
                        <i class="fas fa-check-circle me-1"></i> Tersedia
                    </span>
                </div>

                <h1 class="display-5 fw-bold mb-3">{{ $product['nama'] }}</h1>

                <div class="d-flex align-items-center mb-4 gap-3">
                    <div class="d-flex align-items-center">
                        <span class="rating-star" style="font-size: 1.2rem;">
                            @for($i=1; $i<=5; $i++)
                                @if($i <= floor($avgRating))
                                    ★
                                @elseif($i - 0.5 <= $avgRating)
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                        </span>
                        <span class="text-muted small ms-2">({{ $avgRating }} / {{ count($ulasan) }} ulasan)</span>
                    </div>
                </div>

                <div class="price mb-4">Rp {{ number_format($product['harga'], 0, ',', '.') }}</div>

                <p class="text-muted mb-4" style="line-height: 1.8;">
                    {{ $product['deskripsi'] }}
                </p>

                <div class="row g-3 mb-5">
                    <div class="col-md-5">
                        <label class="form-label fw-500">Ukuran</label>
                        <select class="form-select form-select-lg">
                            @foreach($product['ukuran'] as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-500">Jumlah</label>
                        <input type="number" class="form-control form-control-lg text-center" value="1" min="1">
                    </div>
                </div>

                <div class="d-grid d-md-flex gap-3">
                    <a href="/checkout" class="btn btn-whatsapp btn-lg" target="_blank">
                        <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                    </a>
                    <a href="/keranjang" class="btn btn-add-cart btn-lg">
                        <i class="fas fa-shopping-bag me-2"></i>Tambah ke Keranjang
                    </a>
                </div>
                <div class="d-grid mt-3">
                    <a href="/produk/{{ $product['id'] }}/preview-3d" class="btn btn-3d-preview btn-lg">
                        <i class="fas fa-cube me-2"></i>3D Interactive Preview
                    </a>
                </div>

                <div class="info-box mt-4">
                    <small>
                        <i class="fas fa-shipping-fast me-2"></i> Pengiriman Gojek/Grab Same Day (Jakarta)<br>
                        <i class="fas fa-truck me-2"></i> JNE/J&T untuk luar kota (dikirim beku)<br>
                        <i class="fas fa-clock me-2"></i> Pemesanan H-1 untuk custom writing
                    </small>
                </div>
            </div>
        </div>

        <!-- Tab section -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-pills mb-4 justify-content-center" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active px-4" data-bs-toggle="tab" data-bs-target="#deskripsi">Deskripsi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4" data-bs-toggle="tab" data-bs-target="#ulasan">Ulasan ({{ count($ulasan) }})</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4" data-bs-toggle="tab" data-bs-target="#pengiriman">Info Pengiriman</button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="deskripsi">
                        <h4 class="mb-3">Bahan-bahan Premium</h4>
                        <p class="text-muted" style="line-height: 1.8;">{{ $product['bahan'] }}</p>
                        <h4 class="mt-4 mb-3">Penyimpanan</h4>
                        <p class="text-muted" style="line-height: 1.8;">{{ $product['penyimpanan'] }}</p>
                    </div>

                    <div class="tab-pane fade" id="ulasan">
                        <div class="row mb-5">
                            <div class="col-md-4">
                                <div class="stat-badge mb-3">
                                    <div class="number">{{ $avgRating }}</div>
                                    <div class="label">Rating Rata-rata</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-badge mb-3">
                                    <div class="number">{{ count($ulasan) }}</div>
                                    <div class="label">Total Ulasan</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-badge mb-3">
                                    <div class="number">100%</div>
                                    <div class="label">Rekomendasi</div>
                                </div>
                            </div>
                        </div>

                        <h4 class="mb-4">Tulis Ulasan</h4>
                        <div class="review-form mb-5">
                            <form action="{{ route('ulasan.store', $product['id']) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-500">Nama</label>
                                    <input type="text" name="nama" class="form-control form-control-pastel" placeholder="Nama kamu" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-500">Rating</label>
                                    <div class="star-rating" id="starRating">
                                        @for($i=1; $i<=5; $i++)
                                            <i class="fas fa-star" data-rating="{{ $i }}"></i>
                                        @endfor
                                    </div>
                                    <input type="hidden" name="rating" id="ratingInput" value="5">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-500">Komentar</label>
                                    <textarea name="komentar" class="form-control form-control-pastel" rows="3" placeholder="Bagikan pengalaman kamu..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-pastel-submit">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Ulasan
                                </button>
                            </form>
                        </div>

                        <h4 class="mb-4">Ulasan Pelanggan</h4>
                        @forelse($ulasan as $review)
                            <div class="review-card">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="review-avatar">
                                        {{ strtoupper(substr($review['nama'], 0, 1)) }}
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <div>
                                                <h6 class="mb-0 fw-600">{{ $review['nama'] }}</h6>
                                                <div class="rating-star" style="font-size: 0.85rem;">
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($i <= $review['rating'])
                                                            ★
                                                        @else
                                                            ☆
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <span class="text-muted small">{{ $review['tanggal'] }}</span>
                                        </div>
                                        <p class="text-muted mb-0" style="line-height: 1.7;">{{ $review['komentar'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center py-4">Belum ada ulasan. Jadilah yang pertama!</p>
                        @endforelse
                    </div>

                    <div class="tab-pane fade" id="pengiriman">
                        <ul class="list-unstyled" style="line-height: 2.2;">
                            <li><i class="fas fa-motorcycle me-3 text-muted"></i>Jakarta & sekitar: GoSend/Grab Same Day (pesan sebelum jam 14.00)</li>
                            <li><i class="fas fa-box me-3 text-muted"></i>Luar kota: Dikirim dalam kondisi beku dengan cool box + dry ice</li>
                            <li><i class="fas fa-gift me-3 text-muted"></i>Gratis ongkir Jakarta Selatan untuk minimal pembelian Rp 500.000</li>
                            <li><i class="fas fa-shield-alt me-3 text-muted"></i>Garansi 100% uang kembali jika produk rusak saat pengiriman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ── Video play logic ──
    const videoWrap    = document.getElementById('videoWrap');
    const playOverlay  = document.getElementById('playOverlay');
    const videoThumb   = document.getElementById('videoThumbnail');
    const productVideo = document.getElementById('productVideo');

    function startVideo() {
        videoThumb.style.display  = 'none';
        playOverlay.style.display = 'none';
        productVideo.style.display = 'block';
        productVideo.play();
    }
    playOverlay.addEventListener('click', startVideo);
    productVideo.addEventListener('ended', function () {
        productVideo.style.display  = 'none';
        videoThumb.style.display    = 'block';
        playOverlay.style.display   = 'flex';
    });

    // ── Star rating logic ──
    const stars = document.querySelectorAll('#starRating i');
    const ratingInput = document.getElementById('ratingInput');
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.dataset.rating;
            ratingInput.value = rating;
            stars.forEach(s => {
                if (s.dataset.rating <= rating) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
        });
    });
    // Initialize all 5 stars as active
    stars.forEach(s => s.classList.add('active'));
</script>
@include('partials.music-player')
</body>
</html>
