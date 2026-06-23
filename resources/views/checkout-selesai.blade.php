<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terima Kasih • Sweetie Enak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdf9f5 0%, #fff8f3 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .thankyou-card {
            background: white;
            border-radius: 30px;
            padding: 3rem 2rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
            text-align: center;
            max-width: 620px;
            margin: 0 auto;
        }
        .icon-success {
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, #d4a373, #e8c39e);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 4rem;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(212,163,115,0.4); }
            70% { box-shadow: 0 0 0 0 30px rgba(212,163,115,0); }
            100% { box-shadow: 0 0 0 0 rgba(212,163,115,0); }
        }
        .price-big {
            font-size: 2.6rem;
            font-weight: 700;
            color: #d4a373;
        }
        .btn-home, .btn-wa {
            border-radius: 50px;
            padding: 14px 36px;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .btn-home {
            background: #d4a373;
            color: white;
        }
        .btn-wa {
            background: #25d366;
            color: white;
        }
        .order-id {
            background: #f8f1eb;
            border-radius: 16px;
            padding: 1rem;
            font-family: monospace;
            font-size: 1.3rem;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="thankyou-card">
        <!-- Ikon centang besar -->
        <div class="icon-success">
            <i class="fas fa-check"></i>
        </div>

        <h1 class="display-5 fw-bold mb-3">Terima Kasih!</h1>
        <p class="lead mb-4 text-muted">
            Pesananmu sudah kami terima & sedang diproses dengan penuh cinta
        </p>

        <!-- Nomor Pesanan -->
        <div class="mb-4">
            <small class="text-muted">Nomor Pesanan</small>
            <div class="order-id mt-2">#SC-20251211-048</div>
        </div>

        <!-- Detail singkat -->
        <div class="bg-light rounded-4 p-4 mb-4">
            <div class="row text-start">
                <div class="col-6"><strong>Nama</strong></div>
                <div class="col-6>Siti Aisyah</div>

                <div class="col-6"><strong>Tanggal Kirim</strong></div>
                <div class="col-6">15 Desember 2025, 13.00–15.00</div>

                <div class="col-6"><strong>Total Bayar</strong></div>
                <div class="col-6 price-big">Rp 916.000</div>
            </div>
        </div>

        <!-- Informasi selanjutnya -->
        <div class="alert alert-success rounded-4" role="alert">
            <i class="fas fa-heart me-2"></i>
            Admin akan segera menghubungi kamu via WhatsApp dalam <strong>1–5 menit</strong> untuk konfirmasi pembayaran & detail pengiriman.
        </div>

        <p class="text-muted mb-4">
            Simpan nomor pesanan ini ya, atau cek statusnya kapan saja di WhatsApp kita.
        </p>

        <!-- Tombol aksi -->
        <div class="d-grid d-md-flex gap-3 justify-content-center">
            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-wa btn-lg">
                <i class="fab fa-whatsapp me-2"></i> Chat Admin Sekarang
            </a>
            <a href="/" class="btn btn-home btn-lg">
                <i class="fas fa-home me-2"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="mt-5 text-muted small">
            Butuh bantuan? Hubungi kami di WhatsApp atau email halo@sweetibakery.id
            <br><br>
            © 2025 Sweetie Enak • Dibuat dengan manis untuk kamu
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('partials.music-player')
</body>
</html>
