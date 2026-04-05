# E-Commerce Backend API — Laravel 12

Panduan setup proyek dari nol hingga siap diuji di Postman.

---

## Anggota Kelompok

| No | Nama | Modul |
|----|------|-------|
| 1 | Rafani Wasi'unnikmah Siregar | User |
| 2 | Shilla Maulida | UserProfile |
| 3 | Nabila Anjani | Category |
| 4 | Naila Sarah | Product |
| 5 | Lidia Trifosa Simangunsong | Order & OrderItem |
| 6 | Dewi Lestari Tampubolon | Tag |

---

## Langkah Setup

### 1. Buat project Laravel 12 baru
```bash
composer create-project laravel/laravel ecommerce-api
cd ecommerce-api
```

### 2. Copy semua file dari ZIP ini ke dalam project
Salin isi folder ZIP ke dalam project Laravel, **timpa file yang sudah ada** jika diminta:

```
bootstrap/app.php                                   ← TIMPA
routes/api.php                                      ← TIMPA
app/Models/User.php                                 ← TIMPA
app/Models/UserProfile.php                          ← BARU
app/Models/Category.php                             ← BARU
app/Models/Product.php                              ← BARU
app/Models/Order.php                                ← BARU
app/Models/OrderItem.php                            ← BARU
app/Models/Tag.php                                  ← BARU
app/Http/Controllers/API/UserController.php         ← BARU (buat folder API dulu)
app/Http/Controllers/API/UserProfileController.php  ← BARU
app/Http/Controllers/API/CategoryController.php     ← BARU
app/Http/Controllers/API/ProductController.php      ← BARU
app/Http/Controllers/API/OrderController.php        ← BARU
app/Http/Controllers/API/TagController.php          ← BARU
app/Http/Middleware/CheckGroupHeader.php            ← BARU
app/Http/Middleware/CheckUserIdRequired.php         ← BARU
app/Http/Middleware/CheckCategoryName.php           ← BARU
app/Http/Middleware/CheckProductStock.php           ← BARU
app/Http/Middleware/CheckOrderStatus.php            ← BARU
app/Http/Middleware/CheckTagName.php                ← BARU
database/migrations/* (6 file)                      ← BARU
database/seeders/DatabaseSeeder.php                 ← TIMPA
```

### 3. Setting file .env
Buka file `.env` di root project, sesuaikan bagian database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_api
DB_USERNAME=root
DB_PASSWORD=
```
> Sesuaikan DB_USERNAME dan DB_PASSWORD dengan konfigurasi MySQL kalian.

### 4. Buat database di MySQL
Buka phpMyAdmin atau MySQL CLI, lalu buat database baru:
```sql
CREATE DATABASE ecommerce_api;
```

### 5. Hapus migration bawaan Laravel yang tidak dipakai
Laravel 12 membuat beberapa migration default yang bentrok. Hapus file-file ini:
```
database/migrations/0001_01_01_000000_create_users_table.php
database/migrations/0001_01_01_000001_create_cache_table.php
database/migrations/0001_01_01_000002_create_jobs_table.php
```

### 6. Jalankan migration dan seeder
```bash
php artisan migrate
php artisan db:seed
```

### 7. Jalankan server
```bash
php artisan serve
```
Server berjalan di: `http://localhost:8000`

---

## Pengujian Endpoint di Postman

### Header wajib untuk modul User
Setiap request ke `/api/users` wajib menyertakan header:
```
X-Kelompok: nama_kelompok_kalian
```

### Contoh Request

#### Tambah User (POST)
```
POST http://localhost:8000/api/users
Headers: X-Kelompok: kelompok1
Body (JSON):
{
    "name": "Andi Saputra",
    "email": "andi@email.com",
    "phone": "081234567890",
    "role": "customer"
}
```

#### Tambah Kategori (POST)
```
POST http://localhost:8000/api/categories
Body (JSON):
{
    "name": "Elektronik",
    "description": "Produk elektronik dan gadget"
}
```

#### Tambah Produk (POST)
```
POST http://localhost:8000/api/products
Body (JSON):
{
    "category_id": 1,
    "name": "Laptop Asus",
    "description": "Laptop 14 inch",
    "price": 7500000,
    "stock": 10
}
```

#### Buat Order (POST)
```
POST http://localhost:8000/api/orders
Body (JSON):
{
    "user_id": 1,
    "shipping_address": "Jl. Merdeka No.1 Jakarta"
}
```

#### Tambah Item ke Order (POST)
```
POST http://localhost:8000/api/orders/1/items
Body (JSON):
{
    "product_id": 1,
    "quantity": 2
}
```

#### Pasang Tag ke Produk (PUT)
```
PUT http://localhost:8000/api/products/1/tag/1
(tidak perlu body)
```

---

## Struktur Relasi Database

```
users ──(1:1)──► user_profiles
users ──(1:N)──► orders ──(1:N)──► order_items ◄──(N:1)── products
categories ──(1:N)──► products ──(M:N)──► tags
                                    └── product_tag (pivot)
```

---

## Daftar Endpoint Lengkap

| Method | Endpoint | Middleware |
|--------|----------|------------|
| GET | /api/users | CheckGroupHeader |
| POST | /api/users | CheckGroupHeader |
| GET | /api/users/{id} | CheckGroupHeader |
| PUT | /api/users/{id} | CheckGroupHeader |
| DELETE | /api/users/{id} | CheckGroupHeader |
| GET | /api/user-profiles | CheckUserIdRequired |
| POST | /api/user-profiles | CheckUserIdRequired |
| GET | /api/user-profiles/{id} | CheckUserIdRequired |
| PUT | /api/user-profiles/{id} | CheckUserIdRequired |
| DELETE | /api/user-profiles/{id} | CheckUserIdRequired |
| GET | /api/categories | CheckCategoryName |
| POST | /api/categories | CheckCategoryName |
| GET | /api/categories/{id} | CheckCategoryName |
| PUT | /api/categories/{id} | CheckCategoryName |
| DELETE | /api/categories/{id} | CheckCategoryName |
| GET | /api/products | CheckProductStock |
| POST | /api/products | CheckProductStock |
| GET | /api/products/{id} | CheckProductStock |
| PUT | /api/products/{id} | CheckProductStock |
| DELETE | /api/products/{id} | CheckProductStock |
| GET | /api/orders | CheckOrderStatus |
| POST | /api/orders | CheckOrderStatus |
| GET | /api/orders/{id} | CheckOrderStatus |
| POST | /api/orders/{id}/items | CheckOrderStatus |
| PUT | /api/orders/{id}/status | CheckOrderStatus |
| GET | /api/tags | CheckTagName |
| POST | /api/tags | CheckTagName |
| GET | /api/tags/{id} | CheckTagName |
| DELETE | /api/tags/{id} | CheckTagName |
| PUT | /api/products/{productId}/tag/{tagId} | CheckTagName |
| DELETE | /api/products/{productId}/tag/{tagId} | CheckTagName |
