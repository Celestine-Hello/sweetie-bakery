<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking Pesanan | Sweetie Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; color: #444; background-color: #fff8f3; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif; }
        .navbar-brand { font-weight: 700; font-size: 1.8rem; }
        .btn-primary { background-color: #d4a373; border: none; padding: 12px 32px; border-radius: 30px; font-weight: 500; }
        .btn-primary:hover { background-color: #c5895a; }
        #map { height: 600px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .card-info { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); background: white; }
        .status-badge { background-color: #28a745; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.9rem; }
        footer { background-color: #2d2d2d; color: #ddd; margin-top: 5rem; }
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
                <li class="nav-item"><a class="nav-link" href="#">Produk</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Tracking</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<section class="pt-5 mt-5">
    <div class="container pt-5 text-center mb-5">
        <h1 class="display-4 fw-bold">Lacak Pesanan Anda</h1>
        <p class="lead text-muted">Kurir sedang dalam perjalanan membawa kelezatan</p>
    </div>
</section>

<!-- Main Content -->
<section class="pb-5">
    <div class="container">
        <div class="row">
            <!-- Peta dengan kurir -->
            <div class="col-lg-8 mb-4">
                <div id="map"></div>
            </div>

            <!-- Panel Informasi -->
            <div class="col-lg-4">
                <div class="card-info p-4">
                    <h4 class="mb-4">Detail Pengiriman</h4>

                    <div class="mb-4">
                        <strong>No. Pesanan:</strong>
                        <p class="mb-0">#ORD-20260104-528</p>
                    </div>

                    <div class="mb-4">
                        <span class="status-badge"><i class="fas fa-truck-fast me-2"></i>Sedang Diantar</span>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <strong>Nama Kurir:</strong>
                        <p class="mb-0">Budi Santoso</p>
                    </div>

                    <div class="mb-4">
                        <strong>Kendaraan:</strong>
                        <p class="mb-0"><i class="fas fa-motorcycle me-2"></i>Motor - DK 1234 XYZ</p>
                    </div>

                    <div class="mb-4">
                        <strong>Estimasi Tiba:</strong>
                        <p class="mb-0">15 menit lagi</p>
                    </div>

                    <hr>

                    <div class="text-center">
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-primary w-100">
                            <i class="fab fa-whatsapp me-2"></i>Hubungi Kurir via WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="card-info p-4 mt-4">
                    <h5>Riwayat Pengiriman</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-box text-primary me-2"></i>Pesanan diterima <small class="text-muted">10:30 WIB</small></li>
                        <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i>Selesai dimasak <small class="text-muted">11:30 WIB</small></li>
                        <li class="mb-3"><i class="fas fa-people-carry-box text-primary me-2"></i>Kurir menjemput <small class="text-muted">11:45 WIB</small></li>
                        <li class="mb-3 text-success fw-bold"><i class="fas fa-map-marker-alt text-success me-2"></i>Sedang menuju alamat Anda</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 text-center text-lg-start">
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
                <p><strong>WA:</strong> 0812-3456-7890<br><strong>Email:</strong> halo@sweetibakery.id<br><strong>Alamat:</strong> Jl. Raya Puputan No. 86, Renon, Denpasar, Bali</p>
            </div>
        </div>
        <hr class="my-4 border-secondary">
        <div class="text-center">© 2026 Sweetie Bakery. All rights reserved.</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([-8.670458, 115.212629], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Marker Toko
    const shopIcon = L.divIcon({ html: '<i class="fas fa-store fa-2x" style="color:#d4a373;"></i>', iconSize: [30,30], iconAnchor: [15,30] });
    L.marker([-8.670458, 115.212629], {icon: shopIcon}).addTo(map).bindPopup('<strong>Sweetie Bakery</strong><br>Toko Utama');

    // Marker Pelanggan
    const customerIcon = L.divIcon({ html: '<i class="fas fa-home fa-2x" style="color:#28a745;"></i>', iconSize: [30,30], iconAnchor: [15,30] });
    L.marker([-8.689, 115.230], {icon: customerIcon}).addTo(map).bindPopup('<strong>Alamat Pengiriman</strong>');

    // Marker Kurir
    const courierIcon = L.divIcon({ html: '<i class="fas fa-motorcycle fa-3x" style="color:#007bff;"></i>', iconSize: [40,40], iconAnchor: [20,40] });
    const courierMarker = L.marker([-8.680, 115.220], {icon: courierIcon}).addTo(map).bindPopup('<strong>Budi Santoso</strong><br>Kurir - Sedang mengantar');

    // Rute
    const route = [[-8.670458, 115.212629], [-8.675, 115.215], [-8.680, 115.220], [-8.685, 115.225], [-8.689, 115.230]];
    L.polyline(route, { color: '#d4a373', weight: 5, opacity: 0.7, dashArray: '10, 10' }).addTo(map);

    // Animasi pergerakan kurir
    let step = 0;
    setInterval(() => {
        if (step < route.length - 1) {
            step++;
            courierMarker.setLatLng(route[step]);
        }
    }, 3000);
</script>
</body>
</html>
