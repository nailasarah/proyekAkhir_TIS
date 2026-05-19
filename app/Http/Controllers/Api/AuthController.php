<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{
    #[OA\Post(
        path: '/api/register',
        tags: ['Auth'],
        summary: 'Registrasi pengguna baru',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name', 'email', 'password', 'password_confirmation'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'User Baru'),
                    new OA\Property(property: 'email', type: 'string', format: 'email', example: 'userbaru@email.com'),
                    new OA\Property(property: 'password', type: 'string', example: 'password'),
                    new OA\Property(property: 'password_confirmation', type: 'string', example: 'password'),
                    new OA\Property(property: 'phone', type: 'string', example: '081200000099'),
                    new OA\Property(property: 'role', type: 'string', enum: ['admin', 'manager', 'customer'], example: 'customer'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: 'Registrasi berhasil'),
            new OA\Response(response: 422, description: 'Validasi gagal'),
        ]
    )]
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'phone'                 => 'nullable|string|max:20',
            'role'                  => 'nullable|in:admin,manager,customer',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = $data['role'] ?? 'customer';

        $user = User::create($data);
        $token = auth('api')->login($user);

        return response()->json(['status' => 'success', 'message' => 'Registrasi berhasil', 'token' => $token, 'user' => $user], 201);
    }

    #[OA\Post(
        path: '/api/login',
        tags: ['Auth'],
        summary: 'Login dan dapatkan token JWT',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['email', 'password'],
                properties: [
                    new OA\Property(property: 'email', type: 'string', format: 'email', example: 'admin@toko.com'),
                    new OA\Property(property: 'password', type: 'string', example: 'password'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: 'Login berhasil, token dikembalikan'),
            new OA\Response(response: 401, description: 'Email atau password salah'),
        ]
    )]
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['status' => 'error', 'message' => 'Email atau password salah'], 401);
        }

        return response()->json(['status' => 'success', 'token' => $token, 'user' => auth('api')->user()]);
    }

    #[OA\Post(
        path: '/api/logout',
        tags: ['Auth'],
        summary: 'Logout dan invalidasi token',
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Logout berhasil'),
            new OA\Response(response: 401, description: 'Token tidak valid'),
        ]
    )]
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['status' => 'success', 'message' => 'Logout berhasil']);
    }

    #[OA\Get(
        path: '/api/me',
        tags: ['Auth'],
        summary: 'Ambil data profil pengguna yang sedang login',
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Data profil berhasil diambil'),
            new OA\Response(response: 401, description: 'Tidak terautentikasi'),
        ]
    )]
    public function getUserProfile()
    {
        return response()->json(['status' => 'success', 'data' => auth('api')->user()]);
    }
}
