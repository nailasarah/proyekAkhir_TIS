<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use OpenApi\Attributes as OA;

class CategoryController extends Controller
{
    #[OA\Get(path: '/api/categories', tags: ['Categories'], summary: 'Ambil semua kategori', security: [['bearerAuth' => []]], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 401, description: 'Tidak terautentikasi')])]
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return response()->json(['status' => 'success', 'message' => 'Data kategori berhasil diambil', 'data' => $categories], 200);
    }

    #[OA\Post(
        path: '/api/categories',
        tags: ['Categories'],
        summary: 'Buat kategori baru (Admin & Manager)',
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'Olahraga'),
                    new OA\Property(property: 'description', type: 'string', example: 'Perlengkapan olahraga'),
                    new OA\Property(property: 'is_active', type: 'boolean', example: true),
                ]
            )
        ),
        responses: [new OA\Response(response: 201, description: 'Kategori berhasil dibuat'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 422, description: 'Validasi gagal')]
    )]
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string',
            'is_active'   => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $category = Category::create($data);

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dibuat', 'data' => $category], 201);
    }

    #[OA\Get(path: '/api/categories/{id}', tags: ['Categories'], summary: 'Ambil kategori berdasarkan ID', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 404, description: 'Kategori tidak ditemukan')])]
    public function show($id)
    {
        $category = Category::with('products')->find($id);

        if (!$category) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Data kategori berhasil diambil', 'data' => $category], 200);
    }

    #[OA\Put(
        path: '/api/categories/{id}',
        tags: ['Categories'],
        summary: 'Update kategori (Admin & Manager)',
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)],
        requestBody: new OA\RequestBody(content: new OA\JsonContent(properties: [new OA\Property(property: 'name', type: 'string', example: 'Elektronik & Gadget'), new OA\Property(property: 'description', type: 'string', example: 'Semua produk elektronik'), new OA\Property(property: 'is_active', type: 'boolean', example: true)])),
        responses: [new OA\Response(response: 200, description: 'Berhasil diperbarui'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Kategori tidak ditemukan')]
    )]
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak ditemukan'], 404);
        }

        $data = $request->validate([
            'name'        => 'sometimes|string|max:100|unique:categories,name,' . $id,
            'description' => 'nullable|string',
            'is_active'   => 'nullable|boolean',
        ]);

        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil diperbarui', 'data' => $category], 200);
    }

    #[OA\Delete(path: '/api/categories/{id}', tags: ['Categories'], summary: 'Hapus kategori (Admin only)', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 5)], responses: [new OA\Response(response: 200, description: 'Berhasil dihapus'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Kategori tidak ditemukan')])]
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak ditemukan'], 404);
        }

        $category->delete();

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dihapus'], 200);
    }
}
