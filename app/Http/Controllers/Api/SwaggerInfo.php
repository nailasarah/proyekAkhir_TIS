<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

#[OA\Info(
    title: 'UMKM E-Commerce API',
    version: '1.0.0',
    description: 'Dokumentasi API untuk sistem UMKM E-Commerce. Login dulu di POST /api/login, copy token dari response, lalu klik Authorize dan masukkan: Bearer {token}',
    contact: new OA\Contact(email: 'admin@toko.com')
)]
#[OA\Server(url: 'http://localhost:8000', description: 'Local Development Server')]
#[OA\SecurityScheme(
    securityScheme: 'bearerAuth',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'JWT',
    description: 'Masukkan JWT token. Format: Bearer eyJ0eXAiOiJKV1Qi...'
)]
#[OA\Tag(name: 'Auth', description: 'Autentikasi pengguna')]
#[OA\Tag(name: 'Users', description: 'Manajemen data user - Admin only untuk write/delete')]
#[OA\Tag(name: 'UserProfiles', description: 'Manajemen profil user - Admin & Manager untuk write')]
#[OA\Tag(name: 'Categories', description: 'Manajemen kategori produk')]
#[OA\Tag(name: 'Products', description: 'Manajemen produk')]
#[OA\Tag(name: 'Orders', description: 'Manajemen pesanan')]
#[OA\Tag(name: 'Tags', description: 'Manajemen tag produk')]
class SwaggerInfo extends Controller {}
