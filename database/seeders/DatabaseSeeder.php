<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ===== USERS =====
        DB::table('users')->insert([
            ['name' => 'Admin Toko',      'email' => 'admin@toko.com',    'password' => Hash::make('password'), 'phone' => '081200000001', 'role' => 'admin',    'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manager Toko',    'email' => 'manager@toko.com',  'password' => Hash::make('password'), 'phone' => '081200000002', 'role' => 'manager',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Budi Santoso',    'email' => 'budi@email.com',    'password' => Hash::make('password'), 'phone' => '081200000003', 'role' => 'customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Siti Rahayu',     'email' => 'siti@email.com',    'password' => Hash::make('password'), 'phone' => '081200000004', 'role' => 'customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dian Pratama',    'email' => 'dian@email.com',    'password' => Hash::make('password'), 'phone' => '081200000005', 'role' => 'customer', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ===== USER PROFILES =====
        DB::table('user_profiles')->insert([
            ['user_id' => 1, 'address' => 'Jl. Merdeka No.1',    'city' => 'Jakarta',   'province' => 'DKI Jakarta', 'postal_code' => '10110', 'birth_date' => '1990-01-01', 'gender' => 'male',   'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'address' => 'Jl. Sudirman No.2',   'city' => 'Jakarta',   'province' => 'DKI Jakarta', 'postal_code' => '10220', 'birth_date' => '1992-05-10', 'gender' => 'male',   'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'address' => 'Jl. Pahlawan No.5',   'city' => 'Surabaya',  'province' => 'Jawa Timur',  'postal_code' => '60111', 'birth_date' => '1995-03-15', 'gender' => 'male',   'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'address' => 'Jl. Mawar No.10',     'city' => 'Bandung',   'province' => 'Jawa Barat',  'postal_code' => '40111', 'birth_date' => '1998-07-20', 'gender' => 'female', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'address' => 'Jl. Melati No.3',     'city' => 'Malang',    'province' => 'Jawa Timur',  'postal_code' => '65111', 'birth_date' => '2000-11-05', 'gender' => 'female', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ===== CATEGORIES =====
        DB::table('categories')->insert([
            ['name' => 'Makanan & Minuman',     'slug' => 'makanan-minuman',     'description' => 'Produk makanan dan minuman olahan UMKM lokal',          'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fashion & Batik',       'slug' => 'fashion-batik',       'description' => 'Pakaian, batik, dan aksesori buatan pengrajin lokal',    'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kerajinan Tangan',      'slug' => 'kerajinan-tangan',    'description' => 'Produk kerajinan dan souvenir khas daerah',              'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pertanian & Herbal',    'slug' => 'pertanian-herbal',    'description' => 'Produk pertanian, rempah, dan herbal alami',             'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Perawatan Tubuh',       'slug' => 'perawatan-tubuh',     'description' => 'Sabun, lotion, dan produk perawatan alami',              'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ===== PRODUCTS =====
        DB::table('products')->insert([
            // Makanan & Minuman
            ['category_id' => 1, 'name' => 'Rendang Daging Sapi 250gr',       'slug' => 'rendang-daging-sapi-250gr',       'description' => 'Rendang daging sapi asli Padang, dimasak dengan rempah pilihan, tahan 1 bulan tanpa pengawet',          'price' => 65000,   'stock' => 80,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Keripik Tempe Malang 200gr',      'slug' => 'keripik-tempe-malang-200gr',      'description' => 'Keripik tempe renyah khas Malang, tersedia rasa original, pedas, dan balado',                          'price' => 18000,   'stock' => 150, 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Kopi Robusta Toraja 250gr',       'slug' => 'kopi-robusta-toraja-250gr',       'description' => 'Biji kopi robusta pilihan dari pegunungan Toraja, sangrai medium, aroma kuat dan rasa pahit seimbang', 'price' => 55000,   'stock' => 120, 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Sambal Bajak Bu Rudy 150gr',      'slug' => 'sambal-bajak-bu-rudy-150gr',      'description' => 'Sambal bajak homemade tanpa MSG, bahan segar pilihan, cocok untuk lauk sehari-hari',                   'price' => 22000,   'stock' => 200, 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Dodol Garut Original 500gr',      'slug' => 'dodol-garut-original-500gr',      'description' => 'Dodol khas Garut berbahan ketan pilihan, manis legit, cocok untuk oleh-oleh',                         'price' => 35000,   'stock' => 90,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],

            // Fashion & Batik
            ['category_id' => 2, 'name' => 'Batik Tulis Solo Motif Parang',   'slug' => 'batik-tulis-solo-motif-parang',   'description' => 'Batik tulis tangan asli Solo motif parang, bahan katun prima, cocok untuk acara formal maupun kasual',  'price' => 285000,  'stock' => 25,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Daster Batik Pekalongan',         'slug' => 'daster-batik-pekalongan',         'description' => 'Daster batik cap khas Pekalongan, bahan rayon adem, motif bunga warna cerah, all size',               'price' => 75000,   'stock' => 60,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Tas Anyam Rotan Lombok',          'slug' => 'tas-anyam-rotan-lombok',          'description' => 'Tas anyam rotan handmade pengrajin Lombok, model tote bag, cocok untuk belanja dan jalan santai',      'price' => 120000,  'stock' => 35,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],

            // Kerajinan Tangan
            ['category_id' => 3, 'name' => 'Gerabah Lukis Kasongan',          'slug' => 'gerabah-lukis-kasongan',          'description' => 'Gerabah tanah liat lukis tangan dari Kasongan Yogyakarta, cocok untuk dekorasi rumah',                 'price' => 95000,   'stock' => 20,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Wayang Kulit Mini Souvenir',      'slug' => 'wayang-kulit-mini-souvenir',      'description' => 'Wayang kulit mini buatan pengrajin Yogyakarta, bahan kulit sapi asli, cocok untuk hiasan dan hadiah',  'price' => 150000,  'stock' => 15,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Gelang Manik Bali Handmade',      'slug' => 'gelang-manik-bali-handmade',      'description' => 'Gelang manik-manik buatan tangan pengrajin Bali, motif tradisional, tersedia berbagai warna',          'price' => 35000,   'stock' => 100, 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],

            // Pertanian & Herbal
            ['category_id' => 4, 'name' => 'Jahe Merah Bubuk Organik 100gr',  'slug' => 'jahe-merah-bubuk-organik-100gr',  'description' => 'Jahe merah organik tanpa campuran, dikeringkan dan digiling halus, cocok untuk minuman kesehatan',     'price' => 28000,   'stock' => 180, 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Madu Hutan Kalimantan 350ml',     'slug' => 'madu-hutan-kalimantan-350ml',     'description' => 'Madu hutan murni dari lebah liar Kalimantan, tanpa campuran gula, kaya antioksidan',                   'price' => 125000,  'stock' => 50,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Temulawak Instan Sachet 10pcs',   'slug' => 'temulawak-instan-sachet-10pcs',   'description' => 'Minuman temulawak instan tanpa pengawet, baik untuk kesehatan liver dan daya tahan tubuh',             'price' => 20000,   'stock' => 0,   'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],

            // Perawatan Tubuh
            ['category_id' => 5, 'name' => 'Sabun Susu Kambing Handmade',     'slug' => 'sabun-susu-kambing-handmade',     'description' => 'Sabun mandi handmade berbahan susu kambing segar, melembapkan kulit, cocok untuk kulit sensitif',     'price' => 25000,   'stock' => 75,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Lulur Kunyit Asam Tradisional',   'slug' => 'lulur-kunyit-asam-tradisional',   'description' => 'Lulur tradisional berbahan kunyit dan asam jawa, mencerahkan dan menghaluskan kulit secara alami',     'price' => 32000,   'stock' => 60,  'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
        ]);

        // ===== ORDERS =====
        DB::table('orders')->insert([
            ['user_id' => 3, 'order_code' => 'ORD-20260101-0001', 'status' => 'delivered',  'total_price' => 158000,  'shipping_address' => 'Jl. Pahlawan No.5, Surabaya, Jawa Timur 60111',  'notes' => null,                        'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'order_code' => 'ORD-20260101-0002', 'status' => 'processing', 'total_price' => 360000,  'shipping_address' => 'Jl. Mawar No.10, Bandung, Jawa Barat 40111',     'notes' => 'Tolong packing bubble wrap', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'order_code' => 'ORD-20260101-0003', 'status' => 'pending',    'total_price' => 83000,   'shipping_address' => 'Jl. Melati No.3, Malang, Jawa Timur 65111',      'notes' => 'Packing rapi ya kak',       'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'order_code' => 'ORD-20260101-0004', 'status' => 'shipped',    'total_price' => 285000,  'shipping_address' => 'Jl. Pahlawan No.5, Surabaya, Jawa Timur 60111',  'notes' => null,                        'created_at' => now(), 'updated_at' => now()],
        ]);

        // ===== TAGS =====
        DB::table('tags')->insert([
            ['name' => 'Promo',         'slug' => 'promo',          'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Terlaris',      'slug' => 'terlaris',       'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Produk Baru',   'slug' => 'produk-baru',    'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flash Sale',    'slug' => 'flash-sale',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lokal Asli',    'slug' => 'lokal-asli',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Organik',       'slug' => 'organik',        'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Handmade',      'slug' => 'handmade',       'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Oleh-oleh',     'slug' => 'oleh-oleh',      'created_at' => now(), 'updated_at' => now()],
        ]);

        // ===== PRODUCT_TAG (pivot) =====
        DB::table('product_tag')->insert([
            // Rendang
            ['product_id' => 1,  'tag_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1,  'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1,  'tag_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            // Keripik Tempe
            ['product_id' => 2,  'tag_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2,  'tag_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2,  'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            // Kopi Toraja
            ['product_id' => 3,  'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 3,  'tag_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            // Sambal Bajak
            ['product_id' => 4,  'tag_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 4,  'tag_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            // Dodol Garut
            ['product_id' => 5,  'tag_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 5,  'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            // Batik Tulis Solo
            ['product_id' => 6,  'tag_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 6,  'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            // Daster Batik
            ['product_id' => 7,  'tag_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 7,  'tag_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            // Tas Rotan
            ['product_id' => 8,  'tag_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 8,  'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            // Gerabah
            ['product_id' => 9,  'tag_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 9,  'tag_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            // Wayang Kulit
            ['product_id' => 10, 'tag_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 10, 'tag_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            // Gelang Manik
            ['product_id' => 11, 'tag_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 11, 'tag_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            // Jahe Merah
            ['product_id' => 12, 'tag_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 12, 'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            // Madu Hutan
            ['product_id' => 13, 'tag_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 13, 'tag_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            // Sabun Susu Kambing
            ['product_id' => 15, 'tag_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 15, 'tag_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            // Lulur Kunyit
            ['product_id' => 16, 'tag_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 16, 'tag_id' => 6, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
