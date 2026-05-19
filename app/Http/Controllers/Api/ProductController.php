<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use OpenApi\Attributes as OA;

class ProductController extends Controller
{
    #[OA\Get(path: '/api/products', tags: ['Products'], summary: 'Ambil semua produk', security: [['bearerAuth' => []]], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 401, description: 'Tidak terautentikasi')])]
    public function index()
    {
        $products = Product::with('category', 'tags')->get();
        return response()->json(['status' => 'success', 'message' => 'Data produk berhasil diambil', 'data' => $products], 200);
    }

    #[OA\Post(
        path: '/api/products',
        tags: ['Products'],
        summary: 'Buat produk baru (Admin & Manager)',
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['category_id', 'name', 'price', 'stock'],
                properties: [
                    new OA\Property(property: 'category_id', type: 'integer', example: 1),
                    new OA\Property(property: 'name', type: 'string', example: 'Headphone Sony'),
                    new OA\Property(property: 'description', type: 'string', example: 'Headphone wireless noise cancelling'),
                    new OA\Property(property: 'price', type: 'number', example: 1500000),
                    new OA\Property(property: 'stock', type: 'integer', example: 20),
                    new OA\Property(property: 'status', type: 'string', enum: ['active', 'inactive'], example: 'active'),
                ]
            )
        ),
        responses: [new OA\Response(response: 201, description: 'Produk berhasil dibuat'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 422, description: 'Validasi gagal')]
    )]
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'status'      => 'nullable|in:active,inactive',
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . uniqid();
        $product = Product::create($data);

        return response()->json(['status' => 'success', 'message' => 'Produk berhasil dibuat', 'data' => $product->load('category')], 201);
    }

    #[OA\Get(path: '/api/products/{id}', tags: ['Products'], summary: 'Ambil produk berdasarkan ID', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 404, description: 'Produk tidak ditemukan')])]
    public function show($id)
    {
        $product = Product::with('category', 'tags')->find($id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Produk tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Data produk berhasil diambil', 'data' => $product], 200);
    }

    #[OA\Put(
        path: '/api/products/{id}',
        tags: ['Products'],
        summary: 'Update produk (Admin & Manager)',
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)],
        requestBody: new OA\RequestBody(content: new OA\JsonContent(properties: [new OA\Property(property: 'price', type: 'number', example: 8000000), new OA\Property(property: 'stock', type: 'integer', example: 15), new OA\Property(property: 'status', type: 'string', enum: ['active', 'inactive'])])),
        responses: [new OA\Response(response: 200, description: 'Berhasil diperbarui'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Produk tidak ditemukan')]
    )]
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Produk tidak ditemukan'], 404);
        }

        $data = $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name'        => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'sometimes|numeric|min:0',
            'stock'       => 'sometimes|integer|min:0',
            'status'      => 'nullable|in:active,inactive',
        ]);

        $product->update($data);

        return response()->json(['status' => 'success', 'message' => 'Produk berhasil diperbarui', 'data' => $product->load('category', 'tags')], 200);
    }

    #[OA\Delete(path: '/api/products/{id}', tags: ['Products'], summary: 'Hapus produk (Admin only)', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 7)], responses: [new OA\Response(response: 200, description: 'Berhasil dihapus'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Produk tidak ditemukan')])]
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Produk tidak ditemukan'], 404);
        }

        $product->delete();

        return response()->json(['status' => 'success', 'message' => 'Produk berhasil dihapus'], 200);
    }
}
