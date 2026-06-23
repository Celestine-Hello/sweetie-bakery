<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout • Sweetie Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.15.4/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #fdf9f5 0%, #fff8f3 100%); min-height: 100vh; }
        h1, h2, h3, h4, h5 { font-family: 'Playfair Display', serif; }
        .checkout-container { max-width: 1200px; }
        .card-checkout {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        .form-control, .form-select {
            border-radius: 16px;
            padding: 14px 18px;
            border: 1.5px solid #e2d5c9;
        }
        .form-control:focus, .form-select:focus {
            border-color: #d4a373;
            box-shadow: 0 0 0 0.2rem rgba(212,163,115,0.15);
        }
        .order-item {
            background: #fff;
            border-radius: 16px;
            padding: 1rem;
            margin-bottom: 12px;
            transition: all 0.3s;
        }
        .order-item:hover { background: #f8f1eb; }
        .price-big {
            font-size: 2.4rem;
            font-weight: 700;
            color: #d4a373;
        }
        .btn-whatsapp {
            background: linear-gradient(45deg, #25d366, #20ba5a);
            border: none;
            border-radius: 50px;
            padding: 18px 40px;
            font-size: 1.3rem;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(37,211,102,0.4);
            transition: all 0.3s;
        }
        .btn-whatsapp:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(37,211,102,0.5);
        }
        .step-circle {
            width: 50px; height: 50px;
            background: #d4a373;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.3rem;
        }
        .step-active { background: #25d366; }
        .promo-input {
            border-radius: 50px;
            padding-right: 120px;
        }
        .btn-promo {
            position: absolute;
            right: 8px;
            top: 8px;
            border-radius: 50px;
            background: #d4a373;
            color: white;
            padding: 8px 20px;
        }
    </style>
</head>
<body class="py-5">

<div class="container checkout-container py-5">
    <!-- Progress Step -->
    <div class="text-center mb-5">
        <h2 class="display-6 mb-4">Checkout Pesanan</h2>
        <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
            <div class="text-center">
                <div class="step-circle mx-auto">1</div>
                <small class="text-muted mt-2">Keranjang</small>
            </div>
            <div class="bg-secondary flex-grow-1" style="height: 3px; width: 100px;"></div>
            <div class="text-center">
                <div class="step-circle step-active mx-auto">2</div>
                <small class="fw-bold">Informasi Pengiriman</small>
            </div>
            <div class="bg-secondary flex-grow-1" style="height: 3px; width: 100px;"></div>
            <div class="text-center">
                <div class="step-circle mx-auto">3</div>
                <small class="text-muted mt-2">Selesai</small>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <!-- Form Pengiriman -->
        <div class="col-lg-8">
            <div class="card-checkout p-4 p-md-5">
                <h4 class="mb-4">Detail Penerima & Pengiriman</h4>
                <form>
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Siti Aisyah" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">No. WhatsApp</label>
                            <input type="tel" class="form-control" placeholder="0812-3456-7890" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" rows="3" placeholder="Jl. Melati No.27 RT03/RW05, Kel. Cilandak, Kec. Cilandak, Jakarta Selatan 12430" required></textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Provinsi</label>
                            <select class="form-select">
                                <option>DKI Jakarta</option>
                                <option>Jawa Barat</option>
                                <option>Banten</option>
                                <option>Jawa Tengah</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Kota / Kabupaten</label>
                            <select class="form-select">
                                <option>Jakarta Selatan</option>
                                <option>Jakarta Pusat</option>
                                <option>Tangerang</option>
                                <option>Depok</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tanggal & Jam Pengiriman</label>
                            <div class="row g-3">
                                <div class="col-7">
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="col-5">
                                    <select class="form-select">
                                        <option>10.00 – 12.00</option>
                                        <option>13.00 – 15.00</option>
                                        <option>16.00 – 18.00</option>
                                        <option>19.00 – 21.00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tulis Pesan di Atas Sweetie (opsional)</label>
                            <input type="text" class="form-control" placeholder="ex: Happy 3rd Anniversary Sayangku">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Catatan Tambahan</label>
                            <textarea class="form-control" rows="2" placeholder="ex: Tolong pakai box pink & pita emas ya kak"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Ringkasan & Pembayaran -->
        <div class="col-lg-4">
            <div class="card-checkout p-4 p-md-5 position-sticky" style="top: 100px;">
                <h4 class="mb-4">Ringkasan Pesanan</h4>

                <!-- Item Pesanan -->
                <div class="order-item d-flex align-items-center">
                    <img src="https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="rounded-3">
                    <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0">Red Velvet Classic</h6>
                        <small class="text-muted">20cm • 1 pcs</small>
                    </div>
                    <strong>Rp 350.000</strong>
                </div>

                <div class="order-item d-flex align-items-center">
                    <img src="https://images.unsplash.com/photo-1622621733376-551d9246f8ed?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="rounded-3">
                    <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0">Dark Chocolate Ganache</h6>
                        <small class="text-muted">24cm • 2 pcs</small>
                    </div>
                    <strong>Rp 760.000</strong>
                </div>

                <hr class="my-4">

                <!-- Promo -->
                <div class="position-relative mb-4">
                    <input type="text" class="form-control promo-input pe-5" placeholder="Masukkan kode promo">
                    <button class="btn btn-promo btn-sm">Pakai</button>
                </div>

                <div class="bg-light rounded-4 p-4 mb-4">
                    <div class="d-flex justify-content-between mb-2"><span>Subtotal</span><span>Rp 1.110.000</span></div>
                    <div class="d-flex justify-content-between mb-2"><span>Pengiriman (GoSend Same Day)</span><span>Rp 28.000</span></div>
                    <div class="d-flex justify-content-between text-success fw-bold mb-2"><span>Promo SWEET20</span><span>-Rp 222.000</span></div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Total Bayar</h5>
                        <div class="price-big">Rp 916.000</div>
                    </div>
                </div>

                <!-- Tombol WhatsApp -->
                <a href="/checkout-selesai"
                   class="btn btn-whatsapp btn-lg w-100 d-flex align-items-center justify-content-center" target="_blank">
                    <i class="fab fa-whatsapp me-3 fa-2x"></i>
                    Kirim Pesanan via WhatsApp
                </a>

                <div class="text-center mt-4 text-muted small">
                    <i class="fas fa-shield-alt me-2"></i>
                    Pesanan akan dikonfirmasi dalam 1×24 jam • Pembayaran via transfer bank/e-wallet
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
