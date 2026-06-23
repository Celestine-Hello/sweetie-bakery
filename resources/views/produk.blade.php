<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Red Velvet Classic - Sweetie Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; color: #444; background-color: #fdf9f5; }
        h1, h2, h3, h4, h5 { font-family: 'Playfair Display', serif; }
        .breadcrumb { background: none; padding: 1rem 0; }

        /* ── Video wrapper ── */
        .product-video-wrap {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            position: relative;
            background: #1a1a1a;
            aspect-ratio: 4 / 3;
            cursor: pointer;
        }

        /* Placeholder thumbnail shown before play */
        .video-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: opacity 0.3s;
        }

        /* Actual video element (hidden until play) */
        .product-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            position: absolute;
            inset: 0;
        }

        /* Big play button overlay */
        .play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(0,0,0,0.35);
            transition: background 0.3s;
        }
        .product-video-wrap:hover .play-overlay {
            background: rgba(0,0,0,0.5);
        }
        .play-btn {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.92);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.25s, box-shadow 0.25s;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .play-btn i {
            font-size: 2rem;
            color: #d4a373;
            margin-left: 5px; /* optical centering for triangle */
        }
        .product-video-wrap:hover .play-btn {
            transform: scale(1.1);
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
        }
        .play-label {
            color: #fff;
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 12px;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 4px rgba(0,0,0,0.5);
        }

        /* Badge on top-left of video */
        .video-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: #d4a373;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 50px;
            letter-spacing: 0.4px;
            z-index: 10;
        }

        /* Thumbnail strip (unchanged) */
        .thumbnail-img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            border: 3px solid transparent;
        }
        .thumbnail-img.active { border-color: #d4a373; transform: scale(1.05); }

        .price { font-size: 2.2rem; color: #d4a373; font-weight: 700; }
        .btn-whatsapp {
            background-color: #25d366; color: white; border-radius: 50px;
            padding: 14px 32px; font-weight: 600; font-size: 1.1rem;
        }
        .btn-whatsapp i { margin-right: 8px; }
        .btn-add-cart { background-color: #d4a373; border: none; border-radius: 50px; padding: 14px 40px; }
        .btn-3d-preview {
            border: 2px solid #d4a373;
            color: #9f6b3f;
            border-radius: 50px;
            padding: 14px 32px;
            font-weight: 600;
            background: #fffaf5;
        }
        .btn-3d-preview:hover {
            background: #d4a373;
            color: #fff;
        }
        .info-box {
            background: white; border-radius: 15px; padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .nav-pills .nav-link { border-radius: 12px; color: #666; }
        .nav-pills .nav-link.active { background-color: #d4a373; }
        .rating-star { color: #ffc107; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand text-dark fw-bold fs-4" href="/">Sweetie Bakery</a>
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
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/#produk" class="text-decoration-none">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Red Velvet Classic</li>
        </ol>
    </nav>
</div>

<section class="py-5">
    <div class="container py-4">
        <div class="row g-5">

            <!-- ── Left column: video + thumbnails ── -->
            <div class="col-lg-6">

                <!-- Video player (replaces main image) -->
                <div class="product-video-wrap mb-4" id="videoWrap">

                    <!-- "Making Video" badge -->
                    <span class="video-badge"><i class="fas fa-video me-1"></i> Video Pembuatan</span>

                    <!-- Thumbnail shown before play -->
                    <img
                        id="videoThumbnail"
                        src="data:image/jpeg;base64,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"
                        alt="Red Velvet Classic – Video thumbnail"
                        class="video-thumbnail"
                    >

                    <!-- Actual video (hidden until clicked) -->
                    <video
                        id="productVideo"
                        class="product-video"
                        controls
                        preload="none"
                        poster=""
                    >
                        {{-- Gunakan video asli saat tersedia --}}
                        {{-- <source src="{{ asset('videos/red-velvet-making.mp4') }}" type="video/mp4"> --}}

                        {{-- Placeholder: video publik bebas-hak-cipta dari Big Buck Bunny --}}
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                        Browser kamu tidak mendukung pemutar video.
                    </video>

                    <!-- Play overlay (klik untuk memulai video) -->
                    <div class="play-overlay" id="playOverlay">
                        <div class="play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <span class="play-label">Tonton Proses Pembuatan</span>
                    </div>
                </div>

                <!-- Thumbnail strip -->
                <div class="row g-2">
                    <div class="col-3">
                        <img src="https://th.bing.com/th/id/OIP.2eQC0K-jZupQurZSMhK-TQHaJQ?w=153&h=191&c=7&r=0&o=7&cb=ucfimg2&pid=1.7&rm=3&ucfimg=1"
                             class="thumbnail-img active" alt="Thumbnail 1">
                    </div>
                    <div class="col-3">
                        <img src="https://th.bing.com/th/id/OIP.Za5UI-u7jJOM7uWqPJkrrQHaLG?w=124&h=187&c=7&r=0&o=7&cb=ucfimg2&pid=1.7&rm=3&ucfimg=1"
                             class="thumbnail-img" alt="Thumbnail 2">
                    </div>
                    <div class="col-3">
                        <img src="https://th.bing.com/th/id/OIP.Za5UI-u7jJOM7uWqPJkrrQHaLG?w=124&h=187&c=7&r=0&o=7&cb=ucfimg2&pid=1.7&rm=3&ucfimg=1"
                             class="thumbnail-img" alt="Thumbnail 3">
                    </div>
                    <div class="col-3">
                        <img src="https://th.bing.com/th/id/OIP.Za5UI-u7jJOM7uWqPJkrrQHaLG?w=124&h=187&c=7&r=0&o=7&cb=ucfimg2&pid=1.7&rm=3&ucfimg=1"
                             class="thumbnail-img" alt="Thumbnail 4">
                    </div>
                </div>
            </div>

            <!-- ── Right column: info produk ── -->
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3">Red Velvet Classic</h1>

                <div class="d-flex align-items-center mb-4">
                    <div class="me-3">
                        <span class="rating-star">★★★★★</span>
                        <span class="text-muted small">(4.9 / 128 ulasan)</span>
                    </div>
                    <span class="text-success small fw-500">✓ Tersedia</span>
                </div>

                <div class="price mb-4">Rp 350.000</div>

                <p class="text-muted mb-4">
                    Sweetie red velvet paling lembut dengan 3 lapis sponge merah alami,
                    diisi dan dilapisi cream cheese frosting asli yang creamy.
                    Cocok untuk ulang tahun, anniversary, atau sekadar memanjakan diri.
                </p>

                <div class="row g-3 mb-5">
                    <div class="col-md-5">
                        <label class="form-label fw-500">Ukuran</label>
                        <select class="form-select form-select-lg">
                            <option value="20cm">20 cm (8-12 orang)</option>
                            <option value="24cm">24 cm (15-20 orang)</option>
                            <option value="30cm">30 cm (25-35 orang)</option>
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
                    <a href="/produk/1/preview-3d" class="btn btn-3d-preview btn-lg">
                        <i class="fas fa-cube me-2"></i>3D Interactive Preview
                    </a>
                </div>

                <div class="info-box mt-4">
                    <small class="text-muted">
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
                        <button class="nav-link px-4" data-bs-toggle="tab" data-bs-target="#ulasan">Ulasan (128)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4" data-bs-toggle="tab" data-bs-target="#pengiriman">Info Pengiriman</button>
                    </li>
                </ul>

                <div class="tab-content p-4 bg-white rounded shadow-sm">
                    <div class="tab-pane fade show active" id="deskripsi">
                        <h4>Bahan-bahan Premium</h4>
                        <p>Tepung terigu protein sedang, telur fresh, buttermilk, cocoa powder premium, pewarna alami bit, cream cheese Philadelphia, mentega Anchor, gula halus, vanila Madagascar.</p>
                        <h4 class="mt-4">Penyimpanan</h4>
                        <p>Simpan di kulkas (4°C) maksimal 4 hari. Keluarkan 30 menit sebelum disajikan agar tekstur lebih lembut.</p>
                    </div>
                    <div class="tab-pane fade" id="ulasan">
                        <p>Belum ada ulasan untuk saat ini. Jadilah yang pertama memberikan ulasan!</p>
                    </div>
                    <div class="tab-pane fade" id="pengiriman">
                        <ul>
                            <li>Jakarta & sekitar: GoSend/Grab Same Day (pesan sebelum jam 14.00)</li>
                            <li>Luar kota: Dikirim dalam kondisi beku dengan cool box + dry ice</li>
                            <li>Gratis ongkir Jakarta Selatan untuk minimal pembelian Rp 500.000</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ── Video play logic ──────────────────────────────────────────────
    const videoWrap    = document.getElementById('videoWrap');
    const playOverlay  = document.getElementById('playOverlay');
    const videoThumb   = document.getElementById('videoThumbnail');
    const productVideo = document.getElementById('productVideo');

    function startVideo() {
        // Hide thumbnail & overlay, show video
        videoThumb.style.display  = 'none';
        playOverlay.style.display = 'none';
        productVideo.style.display = 'block';
        productVideo.play();
    }

    // Click on the overlay or anywhere in the wrap before video starts
    playOverlay.addEventListener('click', startVideo);

    // When video ends, show thumbnail + overlay again
    productVideo.addEventListener('ended', function () {
        productVideo.style.display  = 'none';
        videoThumb.style.display    = 'block';
        playOverlay.style.display   = 'flex';
    });
</script>
</body>
</html>
