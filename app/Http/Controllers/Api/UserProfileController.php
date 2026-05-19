<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class UserProfileController extends Controller
{
    #[OA\Get(path: '/api/user-profiles', tags: ['UserProfiles'], summary: 'Ambil semua profil user', security: [['bearerAuth' => []]], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 401, description: 'Tidak terautentikasi')])]
    public function index()
    {
        $profiles = UserProfile::with('user')->get();
        return response()->json(['status' => 'success', 'message' => 'Data profil berhasil diambil', 'data' => $profiles], 200);
    }

    #[OA\Post(
        path: '/api/user-profiles',
        tags: ['UserProfiles'],
        summary: 'Buat profil user baru (Admin & Manager)',
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['user_id'],
                properties: [
                    new OA\Property(property: 'user_id', type: 'integer', example: 6),
                    new OA\Property(property: 'address', type: 'string', example: 'Jl. Baru No.99'),
                    new OA\Property(property: 'city', type: 'string', example: 'Yogyakarta'),
                    new OA\Property(property: 'province', type: 'string', example: 'DI Yogyakarta'),
                    new OA\Property(property: 'postal_code', type: 'string', example: '55111'),
                    new OA\Property(property: 'birth_date', type: 'string', format: 'date', example: '1995-08-17'),
                    new OA\Property(property: 'gender', type: 'string', enum: ['male', 'female'], example: 'male'),
                ]
            )
        ),
        responses: [new OA\Response(response: 201, description: 'Profil berhasil dibuat'), new OA\Response(response: 403, description: 'Akses ditolak')]
    )]
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'     => 'required|exists:users,id|unique:user_profiles,user_id',
            'address'     => 'nullable|string',
            'city'        => 'nullable|string|max:100',
            'province'    => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:10',
            'birth_date'  => 'nullable|date',
            'gender'      => 'nullable|in:male,female',
        ]);

        $profile = UserProfile::create($data);

        return response()->json(['status' => 'success', 'message' => 'Profil berhasil dibuat', 'data' => $profile->load('user')], 201);
    }

    #[OA\Get(path: '/api/user-profiles/{id}', tags: ['UserProfiles'], summary: 'Ambil profil berdasarkan ID', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 404, description: 'Profil tidak ditemukan')])]
    public function show($id)
    {
        $profile = UserProfile::with('user')->find($id);

        if (!$profile) {
            return response()->json(['status' => 'error', 'message' => 'Profil tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Data profil berhasil diambil', 'data' => $profile], 200);
    }

    #[OA\Put(
        path: '/api/user-profiles/{id}',
        tags: ['UserProfiles'],
        summary: 'Update profil user (Admin & Manager)',
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)],
        requestBody: new OA\RequestBody(content: new OA\JsonContent(properties: [new OA\Property(property: 'city', type: 'string', example: 'Bandung'), new OA\Property(property: 'province', type: 'string', example: 'Jawa Barat'), new OA\Property(property: 'address', type: 'string', example: 'Jl. Mawar No.10')])),
        responses: [new OA\Response(response: 200, description: 'Berhasil diperbarui'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Profil tidak ditemukan')]
    )]
    public function update(Request $request, $id)
    {
        $profile = UserProfile::find($id);

        if (!$profile) {
            return response()->json(['status' => 'error', 'message' => 'Profil tidak ditemukan'], 404);
        }

        $data = $request->validate([
            'address'     => 'nullable|string',
            'city'        => 'nullable|string|max:100',
            'province'    => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:10',
            'birth_date'  => 'nullable|date',
            'gender'      => 'nullable|in:male,female',
        ]);

        $profile->update($data);

        return response()->json(['status' => 'success', 'message' => 'Profil berhasil diperbarui', 'data' => $profile], 200);
    }

    #[OA\Delete(path: '/api/user-profiles/{id}', tags: ['UserProfiles'], summary: 'Hapus profil user (Admin only)', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)], responses: [new OA\Response(response: 200, description: 'Berhasil dihapus'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Profil tidak ditemukan')])]
    public function destroy($id)
    {
        $profile = UserProfile::find($id);

        if (!$profile) {
            return response()->json(['status' => 'error', 'message' => 'Profil tidak ditemukan'], 404);
        }

        $profile->delete();

        return response()->json(['status' => 'success', 'message' => 'Profil berhasil dihapus'], 200);
    }
}
