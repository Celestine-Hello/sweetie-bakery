<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>3D Interactive Preview - Sweetie Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #444;
            background: #fdf9f5;
            min-height: 100vh;
        }
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }
        .preview-shell {
            min-height: calc(100vh - 76px);
            padding-top: 110px;
            padding-bottom: 48px;
        }
        .preview-stage {
            position: relative;
            min-height: 560px;
            overflow: hidden;
            border-radius: 24px;
            background:
                radial-gradient(circle at 20% 20%, rgba(212, 163, 115, 0.2), transparent 28%),
                linear-gradient(135deg, #fffaf5 0%, #f3dfca 100%);
            box-shadow: 0 18px 45px rgba(87, 57, 36, 0.16);
        }
        model-viewer {
            width: 100%;
            height: 620px;
            --poster-color: transparent;
            background: transparent;
        }
        .loading-screen {
            position: absolute;
            inset: 0;
            z-index: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 18px;
            background: rgba(253, 249, 245, 0.96);
            transition: opacity 0.45s ease, visibility 0.45s ease;
        }
        .loading-screen.is-hidden {
            opacity: 0;
            visibility: hidden;
        }
        .loader-ring {
            width: 78px;
            height: 78px;
            border: 6px solid rgba(212, 163, 115, 0.22);
            border-top-color: #d4a373;
            border-radius: 50%;
            animation: spin 0.9s linear infinite;
        }
        .btn-back {
            border-radius: 50px;
            padding: 12px 24px;
            color: #9f6b3f;
            border: 1px solid #d4a373;
            background: #fffaf5;
        }
        .btn-back:hover {
            background: #d4a373;
            color: #fff;
        }
        .model-hint {
            position: absolute;
            left: 24px;
            right: 24px;
            bottom: 20px;
            z-index: 2;
            display: flex;
            justify-content: center;
            pointer-events: none;
        }
        .model-hint span {
            background: rgba(255, 255, 255, 0.78);
            color: #9f6b3f;
            border-radius: 50px;
            padding: 10px 18px;
            font-size: 0.9rem;
            box-shadow: 0 8px 24px rgba(87, 57, 36, 0.12);
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        @media (max-width: 767px) {
            .preview-shell {
                padding-top: 96px;
            }
            .preview-stage {
                min-height: 440px;
            }
            model-viewer {
                height: 480px;
            }
            .model-hint span {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
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

<main class="preview-shell">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <p class="text-uppercase text-muted small fw-semibold mb-2">Sweetie Bakery</p>
                <h1 class="display-5 fw-bold mb-2">3D Interactive Preview</h1>
                <p class="text-muted mb-0">Putar, geser, dan zoom model Red Velvet Cake.</p>
            </div>
            <a href="/produk/1" class="btn btn-back">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Produk
            </a>
        </div>

        <section class="preview-stage" aria-label="3D product preview">
            <div class="loading-screen" id="loadingScreen">
                <div class="loader-ring" aria-hidden="true"></div>
                <div class="text-center">
                    <h2 class="h4 fw-bold mb-2">Memuat Model 3D</h2>
                    <p class="text-muted mb-0" id="loadingText">Menyiapkan interactive preview...</p>
                </div>
            </div>

            <model-viewer
                id="cakeModel"
                src="/models/blood_red_velvet_cake.glb"
                alt="Model 3D Blood Red Velvet Cake"
                camera-controls
                auto-rotate
                shadow-intensity="0.8"
                exposure="1"
                interaction-prompt="auto"
                ar
            ></model-viewer>

            <div class="model-hint">
                <span><i class="fas fa-hand-pointer me-2"></i>Drag untuk memutar, scroll atau pinch untuk zoom</span>
            </div>
        </section>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<script>
    const loadingScreen = document.getElementById('loadingScreen');
    const loadingText = document.getElementById('loadingText');
    const cakeModel = document.getElementById('cakeModel');

    cakeModel.addEventListener('progress', function (event) {
        const progress = Math.round(event.detail.totalProgress * 100);
        loadingText.textContent = 'Memuat model 3D... ' + progress + '%';
    });

    cakeModel.addEventListener('load', function () {
        loadingText.textContent = 'Model siap ditampilkan';
        setTimeout(function () {
            loadingScreen.classList.add('is-hidden');
        }, 350);
    });

    cakeModel.addEventListener('error', function () {
        loadingText.textContent = 'Model belum bisa dimuat. Coba refresh halaman.';
    });
</script>
@include('partials.music-player')
</body>
</html>
