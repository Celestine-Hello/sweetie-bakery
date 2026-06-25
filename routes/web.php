<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

$productData = [
    1 => [
        'id' => 1,
        'nama' => 'Red Velvet Classic',
        'slug' => 'red-velvet-classic',
        'deskripsi' => 'Sweetie red velvet paling lembut dengan 3 lapis sponge merah alami, diisi dan dilapisi cream cheese frosting asli yang creamy. Cocok untuk ulang tahun, anniversary, atau sekadar memanjakan diri.',
        'harga' => 350000,
        'rating' => 4.9,
        'ulasan_count' => 128,
        'gambar' => 'https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?auto=format&fit=crop&w=800&q=80',
        'thumbnail' => 'https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?auto=format&fit=crop&w=800&q=80',
        'thumbnails' => [
            'https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?auto=format&fit=crop&w=300&q=80',
            'https://images.unsplash.com/photo-1714386148315-2f0e3eebcd5a?q=80&w=736&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'https://www.rainbownourishments.com/wp-content/uploads/2023/05/vegan-red-velvet-cake-1.jpg',
            'https://www.afarmgirlsdabbles.com/wp-content/uploads/2025/02/Red-Velvet-Cake_0014v.jpg',
        ],
        'kategori' => 'Birthday Cake',
        'badge' => 'Best Seller',
        'bahan' => 'Tepung terigu protein sedang, telur fresh, buttermilk, cocoa powder premium, pewarna alami bit, cream cheese Philadelphia, mentega Anchor, gula halus, vanila Madagascar.',
        'penyimpanan' => 'Simpan di kulkas (4°C) maksimal 4 hari. Keluarkan 30 menit sebelum disajikan agar tekstur lebih lembut.',
        'ukuran' => ['20cm' => '20 cm (8-12 orang)', '24cm' => '24 cm (15-20 orang)', '30cm' => '30 cm (25-35 orang)'],
        'video' => 'assets/video/bakery-making.mp4',
        'warna_tema' => '#c0392b',
        'warna_bg' => 'linear-gradient(135deg, #fff5f5 0%, #ffeaea 100%)',
    ],
    2 => [
        'id' => 2,
        'nama' => 'Dark Chocolate Ganache',
        'slug' => 'dark-chocolate-ganache',
        'deskripsi' => 'Cake cokelat premium dengan 70% dark chocolate Belgium yang diolah menjadi ganache lembut dan berkilau. Dilapisi dengan chocolate mirror glaze dan dihias dengan chocolate shavings. Rasa pahit manis yang elegan.',
        'harga' => 380000,
        'rating' => 4.8,
        'ulasan_count' => 96,
        'gambar' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80',
        'thumbnail' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80',
        'thumbnails' => [
            'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=300&q=80',
            'https://gayathriscookspot.com/wp-content/uploads/2014/12/Chocolateganache-cake2.jpg',
            'https://www.mysanfranciscokitchen.com/wp-content/uploads/2015/10/yellow-cake-top.jpg',
            'https://b2069574.smushcdn.com/2069574/wp-content/uploads/bfi_thumb/Chocolate-Cake-with-Ganache-1-pdh6975qmwo0t7e437hgid1pj7qwlla1yiy22h2s2o.jpg?lossy=1&strip=1&webp=1',
        ],
        'kategori' => 'Chocolate Series',
        'badge' => 'Premium',
        'bahan' => 'Dark chocolate 70% Belgium, heavy cream, butter, gula palem, tepung terigu, telur, cocoa powder alkalized, chocolate mirror glaze, vanilla extract.',
        'penyimpanan' => 'Simpan di kulkas (4°C) maksimal 5 hari. Biarkan 15 menit di suhu ruang sebelum disajikan.',
        'ukuran' => ['20cm' => '20 cm (8-10 orang)', '24cm' => '24 cm (12-16 orang)', '28cm' => '28 cm (20-25 orang)'],
        'video' => 'assets/video/chocolate-ganache-making.mp4',
        'warna_tema' => '#5d4037',
        'warna_bg' => 'linear-gradient(135deg, #faf0e6 0%, #f5e6d3 100%)',
    ],
    3 => [
        'id' => 3,
        'nama' => 'Matcha Mousse Cake',
        'slug' => 'matcha-mousse-cake',
        'deskripsi' => 'Sweetie mousse matcha premium dengan tekstur halus yang meleleh di mulut. Menggunakan matcha powder import dari Kyoto Jepang, dikombinasikan dengan white chocolate mousse dan sponge matcha. Rasa umami yang unik dan memanjakan.',
        'harga' => 360000,
        'rating' => 4.7,
        'ulasan_count' => 84,
        'gambar' => 'https://infiniteflavors.blog/wp-content/uploads/2024/01/delicious_and_authentic_matcha.jpg',
        'thumbnail' => 'https://infiniteflavors.blog/wp-content/uploads/2024/01/delicious_and_authentic_matcha.jpg',
        'thumbnails' => [
            'https://infiniteflavors.blog/wp-content/uploads/2024/01/delicious_and_authentic_matcha.jpg',
            'https://images.getrecipekit.com/20230809095551-matcha-20mousse-20cake.jpg?class=16x9',
            'https://www.homecookingadventure.com/wp-content/uploads/2022/01/matcha_cake_main.jpg',
            'https://recipe1.ezmember.co.kr/cache/recipe/2020/01/28/546fe26c22bf9481705f811e570e86c41.jpg',
        ],
        'kategori' => 'Mini Cake',
        'badge' => 'New Arrival',
        'bahan' => 'Matcha powder Kyoto Jepang, white chocolate Valrhona, heavy cream, gelatin halal, tepung terigu, telur, gula halus, butter, cream cheese.',
        'penyimpanan' => 'Simpan di freezer (-18°C) maksimal 2 minggu. Keluarkan ke kulkas 2 jam sebelum disajikan.',
        'ukuran' => ['18cm' => '18 cm (6-8 orang)', '22cm' => '22 cm (10-14 orang)', '26cm' => '26 cm (16-20 orang)'],
        'video' => 'assets/video/matcha-mousse-making.mp4',
        'warna_tema' => '#7d8c42',
        'warna_bg' => 'linear-gradient(135deg, #f5f8f0 0%, #eaf0e0 100%)',
    ],
];

Route::get('/', function () use ($productData) {
    $products = array_values($productData);
    return view("home", compact('products'));
});

Route::get('/products', function () use ($productData) {
    $products = array_values($productData);
    return view("products", compact('products'));
});

Route::get('/produk/{id}', function ($id) use ($productData) {
    if (!isset($productData[$id])) {
        return redirect('/');
    }

    $product = $productData[$id];

    // Ulasan dari session
    $sessionKey = 'ulasan_produk_' . $id;
    $ulasan = Session::get($sessionKey, []);

    // Default ulasan jika belum ada
    if (empty($ulasan)) {
        $ulasan = [
            ['nama' => 'Rina S.', 'rating' => 5, 'komentar' => 'Lembut banget! Cream cheesenya premium rasanya.', 'tanggal' => '2025-06-15'],
            ['nama' => 'Budi K.', 'rating' => 5, 'komentar' => 'Pesan untuk ulang tahun istri, suka banget sama dekorasinya.', 'tanggal' => '2025-06-10'],
            ['nama' => 'Dewi A.', 'rating' => 4, 'komentar' => 'Rasa enak, cukup manis. Packagingnya juga rapi banget.', 'tanggal' => '2025-06-05'],
        ];
        Session::put($sessionKey, $ulasan);
    }

    $avgRating = $product['rating'];
    if (count($ulasan) > 0) {
        $total = array_sum(array_column($ulasan, 'rating'));
        $avgRating = round($total / count($ulasan), 1);
    }

    return view("produk", compact('product', 'ulasan', 'avgRating'));
});

Route::post('/produk/{id}/ulasan', function ($id) use ($productData) {
    if (!isset($productData[$id])) {
        return redirect('/');
    }

    $nama = request('nama', 'Anonymous');
    $rating = (int) request('rating', 5);
    $komentar = request('komentar', '');

    $sessionKey = 'ulasan_produk_' . $id;
    $ulasan = Session::get($sessionKey, []);

    $ulasan[] = [
        'nama' => $nama,
        'rating' => max(1, min(5, $rating)),
        'komentar' => $komentar,
        'tanggal' => date('Y-m-d'),
    ];

    Session::put($sessionKey, $ulasan);

    return redirect('/produk/' . $id . '#ulasan');
})->name('ulasan.store');

Route::get('/produk/{id}/preview-3d', function ($id) use ($productData) {
    if (!isset($productData[$id])) {
        return redirect('/');
    }
    return view("preview-3d", ['product' => $productData[$id]]);
});

Route::get('/models/blood_red_velvet_cake.glb', function () {
    return response()->file(base_path('blood_red_velvet_cake.glb'), [
        'Content-Type' => 'model/gltf-binary',
    ]);
});

Route::get('/keranjang', function() {
    return view("keranjang");
});

Route::get("/checkout", function() {
    return view("checkout");
});

Route::get("/checkout-selesai", function() {
    return view("checkout-selesai");
});

Route::get("/delivery", function() {
    return view("delivery");
});

Route::get("/preparing", function() {
    return view("preparing");
});
