## Sistem Penjualan UMKM Online (UMKM E-Commerce API)

Aplikasi backend berbasis **REST API** yang dikembangkan menggunakan **Laravel 12**, dengan tujuan membantu pelaku UMKM mengelola penjualan produk secara digital. Aplikasi menyediakan endpoint untuk mengelola data pengguna, profil pengguna, kategori, produk UMKM, tag produk, serta pesanan secara terintegrasi.

> Proyek Akhir mata kuliah **Teknologi Integrasi Sistem - B**
> Program Studi Teknologi Informasi, Fakultas Ilmu Komputer, Universitas Brawijaya — 2026

### Teknologi yang Digunakan

- **Framework**: Laravel 12
- **Database**: MySQL
- **Authentication**: JWT (`tymon/jwt-auth`)
- **API Documentation**: Swagger / OpenAPI (`darkaonline/l5-swagger`)
- **API Testing**: Thunder Client / Postman
- **Version Control**: GitHub

## Fitur Utama

1. **Autentikasi & Authorisasi (JWT)** — register, login, logout, refresh token, dengan role `admin` dan `customer`
2. **Pengelolaan User** — CRUD data pengguna (admin only)
3. **Profil Pengguna** — kelola alamat, kota, provinsi, tanggal lahir, jenis kelamin
4. **Kategori Produk** — CRUD kategori
5. **Produk UMKM** — CRUD produk, validasi stok via middleware
6. **Tag Produk** — kelola tag dan relasi many-to-many dengan produk
7. **Pesanan** — buat pesanan, tambah item pesanan, ubah status pesanan
8. **Dokumentasi Swagger/OpenAPI** — di `/api/documentation`

## Struktur Database

| No  | Nama Tabel    | Deskripsi                          |
| --- | ------------- | ---------------------------------- |
| 1   | users         | Data pengguna aplikasi             |
| 2   | user_profiles | Data profil pengguna               |
| 3   | categories    | Kategori produk                    |
| 4   | products      | Data produk UMKM                   |
| 5   | tags          | Tag produk                         |
| 6   | product_tag   | Pivot many-to-many products & tags |
| 7   | orders        | Data pesanan                       |
| 8   | order_items   | Detail item pesanan                |

### Relasi Antar Tabel

- **One-to-One**: `users` → `user_profiles`
- **One-to-Many**: `users` → `orders`, `categories` → `products`, `orders` → `order_items`
- **Many-to-Many**: `products` ↔ `tags` (via `product_tag`)

## Cara Instalasi

```bash
# 1. Clone repository & masuk folder
cd ecommerce-api2

# 2. Install dependency Composer
composer install

# 3. Salin .env
cp .env.example .env

# 4. Atur koneksi database MySQL di file .env:
#    DB_DATABASE=umkm_db
#    DB_USERNAME=root
#    DB_PASSWORD=

# 5. Generate Laravel app key
php artisan key:generate

# 6. Generate JWT secret
php artisan jwt:secret

# 7. Jalankan migrasi & seeder
php artisan migrate --seed

# 8. Generate dokumentasi Swagger
php artisan l5-swagger:generate

# 9. Jalankan server
php artisan serve
```

Server berjalan di: `http://localhost:8000`
Dokumentasi Swagger: `http://localhost:8000/api/documentation`

## Akun Default (setelah seeder)

| Email          | Password | Role     |
| -------------- | -------- | -------- |
| admin@toko.com | password | admin    |
| budi@email.com | password | customer |
| siti@email.com | password | customer |
| dian@email.com | password | customer |

## Daftar Endpoint API

### Authentication

| Method | Endpoint           | Auth | Deskripsi             |
| ------ | ------------------ | ---- | --------------------- |
| POST   | /api/auth/register | -    | Registrasi user baru  |
| POST   | /api/auth/login    | -    | Login & dapat token   |
| GET    | /api/auth/me       | JWT  | Ambil data user login |
| POST   | /api/auth/logout   | JWT  | Logout (invalidate)   |
| POST   | /api/auth/refresh  | JWT  | Refresh token         |

### Users (admin only)

| Method | Endpoint        | Auth        |
| ------ | --------------- | ----------- |
| GET    | /api/users      | JWT + admin |
| POST   | /api/users      | JWT + admin |
| GET    | /api/users/{id} | JWT + admin |
| PUT    | /api/users/{id} | JWT + admin |
| DELETE | /api/users/{id} | JWT + admin |

### User Profiles

| Method | Endpoint                | Auth |
| ------ | ----------------------- | ---- |
| GET    | /api/user-profiles      | JWT  |
| POST   | /api/user-profiles      | JWT  |
| GET    | /api/user-profiles/{id} | JWT  |
| PUT    | /api/user-profiles/{id} | JWT  |

### Categories

| Method | Endpoint             | Auth        |
| ------ | -------------------- | ----------- |
| GET    | /api/categories      | Public      |
| GET    | /api/categories/{id} | Public      |
| POST   | /api/categories      | JWT + admin |
| PUT    | /api/categories/{id} | JWT + admin |
| DELETE | /api/categories/{id} | JWT + admin |

### Products

| Method | Endpoint           | Auth                                       |
| ------ | ------------------ | ------------------------------------------ |
| GET    | /api/products      | Public                                     |
| GET    | /api/products/{id} | Public                                     |
| POST   | /api/products      | JWT + admin (validasi stok via middleware) |
| PUT    | /api/products/{id} | JWT + admin                                |
| DELETE | /api/products/{id} | JWT + admin                                |

### Tags

| Method | Endpoint                              | Auth        |
| ------ | ------------------------------------- | ----------- |
| GET    | /api/tags                             | Public      |
| GET    | /api/tags/{id}                        | Public      |
| POST   | /api/tags                             | JWT + admin |
| DELETE | /api/tags/{id}                        | JWT + admin |
| PUT    | /api/products/{productId}/tag/{tagId} | JWT + admin |
| DELETE | /api/products/{productId}/tag/{tagId} | JWT + admin |

### Orders

| Method | Endpoint                | Auth |
| ------ | ----------------------- | ---- |
| GET    | /api/orders             | JWT  |
| POST   | /api/orders             | JWT  |
| GET    | /api/orders/{id}        | JWT  |
| POST   | /api/orders/{id}/items  | JWT  |
| PUT    | /api/orders/{id}/status | JWT  |

## Cara Menggunakan JWT

1. Login terlebih dahulu via `POST /api/auth/login` dengan email & password. Response akan mengembalikan `access_token`.
2. Untuk endpoint yang memerlukan autentikasi, tambahkan header:
    ```
    Authorization: Bearer <access_token>
    ```
3. Jika token kadaluwarsa, gunakan `POST /api/auth/refresh` untuk mendapat token baru.

## Konsep yang Diterapkan

- ✅ CRUD (Create, Read, Update, Delete) pada semua modul
- ✅ Middleware (validasi stok produk, autentikasi JWT, autorisasi role)
- ✅ Relasi database (One-to-One, One-to-Many, Many-to-Many)
- ✅ REST API dengan response JSON terstruktur
- ✅ JWT Authentication
- ✅ Dokumentasi Swagger / OpenAPI
