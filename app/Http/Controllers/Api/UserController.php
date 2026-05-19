<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class UserController extends Controller
{
    #[OA\Get(path: '/api/users', tags: ['Users'], summary: 'Ambil semua data user', security: [['bearerAuth' => []]], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 401, description: 'Tidak terautentikasi')])]
    public function index()
    {
        $users = User::with('profile')->get();
        return response()->json(['status' => 'success', 'message' => 'Data users berhasil diambil', 'data' => $users], 200);
    }

    #[OA\Post(
        path: '/api/users',
        tags: ['Users'],
        summary: 'Buat user baru (Admin only)',
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name', 'email', 'password'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'Andi Saputra'),
                    new OA\Property(property: 'email', type: 'string', format: 'email', example: 'andi@email.com'),
                    new OA\Property(property: 'password', type: 'string', example: 'password'),
                    new OA\Property(property: 'phone', type: 'string', example: '081234567890'),
                    new OA\Property(property: 'role', type: 'string', enum: ['admin', 'manager', 'customer'], example: 'customer'),
                ]
            )
        ),
        responses: [new OA\Response(response: 201, description: 'User berhasil dibuat'), new OA\Response(response: 403, description: 'Akses ditolak')]
    )]
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone'    => 'nullable|string|max:20',
            'role'     => 'nullable|in:customer,admin,manager',
        ]);

        $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        $user = User::create($data);

        return response()->json(['status' => 'success', 'message' => 'User berhasil dibuat', 'data' => $user], 201);
    }

    #[OA\Get(path: '/api/users/{id}', tags: ['Users'], summary: 'Ambil data user berdasarkan ID', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 404, description: 'User tidak ditemukan')])]
    public function show($id)
    {
        $user = User::with('profile', 'orders')->find($id);

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Data user berhasil diambil', 'data' => $user], 200);
    }

    #[OA\Put(
        path: '/api/users/{id}',
        tags: ['Users'],
        summary: 'Update data user (Admin only)',
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 2)],
        requestBody: new OA\RequestBody(content: new OA\JsonContent(properties: [new OA\Property(property: 'name', type: 'string', example: 'Andi Updated'), new OA\Property(property: 'phone', type: 'string', example: '089999999999'), new OA\Property(property: 'role', type: 'string', enum: ['admin', 'manager', 'customer'])])),
        responses: [new OA\Response(response: 200, description: 'Berhasil diperbarui'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'User tidak ditemukan')]
    )]
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User tidak ditemukan'], 404);
        }

        $data = $request->validate([
            'name'     => 'sometimes|string|max:255',
            'email'    => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'phone'    => 'nullable|string|max:20',
            'role'     => 'nullable|in:customer,admin,manager',
        ]);

        if (isset($data['password'])) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json(['status' => 'success', 'message' => 'User berhasil diperbarui', 'data' => $user], 200);
    }

    #[OA\Delete(path: '/api/users/{id}', tags: ['Users'], summary: 'Hapus user (Admin only)', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 6)], responses: [new OA\Response(response: 200, description: 'Berhasil dihapus'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'User tidak ditemukan')])]
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User tidak ditemukan'], 404);
        }

        $user->delete();

        return response()->json(['status' => 'success', 'message' => 'User berhasil dihapus'], 200);
    }
}
