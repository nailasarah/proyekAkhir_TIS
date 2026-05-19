<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use OpenApi\Attributes as OA;

class TagController extends Controller
{
    #[OA\Get(path: '/api/tags', tags: ['Tags'], summary: 'Ambil semua tag', security: [['bearerAuth' => []]], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 401, description: 'Tidak terautentikasi')])]
    public function index()
    {
        $tags = Tag::with('products')->get();
        return response()->json(['status' => 'success', 'message' => 'Data tag berhasil diambil', 'data' => $tags], 200);
    }

    #[OA\Post(path: '/api/tags', tags: ['Tags'], summary: 'Buat tag baru (Admin & Manager)', security: [['bearerAuth' => []]], requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(required: ['name'], properties: [new OA\Property(property: 'name', type: 'string', example: 'Terlaris')])), responses: [new OA\Response(response: 201, description: 'Tag berhasil dibuat'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 422, description: 'Validasi gagal')])]
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:tags,name',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $tag = Tag::create($data);

        return response()->json(['status' => 'success', 'message' => 'Tag berhasil dibuat', 'data' => $tag], 201);
    }

    #[OA\Get(path: '/api/tags/{id}', tags: ['Tags'], summary: 'Ambil tag berdasarkan ID', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 404, description: 'Tag tidak ditemukan')])]
    public function show($id)
    {
        $tag = Tag::with('products')->find($id);

        if (!$tag) {
            return response()->json(['status' => 'error', 'message' => 'Tag tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Data tag berhasil diambil', 'data' => $tag], 200);
    }

    #[OA\Put(path: '/api/products/{productId}/tag/{tagId}', tags: ['Tags'], summary: 'Pasang tag ke produk (Admin & Manager)', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'productId', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 2), new OA\Parameter(name: 'tagId', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 3)], responses: [new OA\Response(response: 200, description: 'Tag berhasil dipasang'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Produk atau tag tidak ditemukan'), new OA\Response(response: 409, description: 'Tag sudah terpasang')])]
    public function attachToProduct($productId, $tagId)
    {
        $product = Product::find($productId);
        $tag     = Tag::find($tagId);

        if (!$product || !$tag) {
            return response()->json(['status' => 'error', 'message' => 'Produk atau tag tidak ditemukan'], 404);
        }

        if ($product->tags()->where('tag_id', $tagId)->exists()) {
            return response()->json(['status' => 'error', 'message' => 'Tag sudah terpasang pada produk ini'], 409);
        }

        $product->tags()->attach($tagId);

        return response()->json(['status' => 'success', 'message' => 'Tag berhasil ditambahkan ke produk', 'data' => $product->load('tags')], 200);
    }

    #[OA\Delete(path: '/api/products/{productId}/tag/{tagId}', tags: ['Tags'], summary: 'Lepas tag dari produk (Admin only)', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'productId', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 2), new OA\Parameter(name: 'tagId', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 3)], responses: [new OA\Response(response: 200, description: 'Tag berhasil dilepas'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Produk atau tag tidak ditemukan')])]
    public function detachFromProduct($productId, $tagId)
    {
        $product = Product::find($productId);
        $tag     = Tag::find($tagId);

        if (!$product || !$tag) {
            return response()->json(['status' => 'error', 'message' => 'Produk atau tag tidak ditemukan'], 404);
        }

        $product->tags()->detach($tagId);

        return response()->json(['status' => 'success', 'message' => 'Tag berhasil dilepas dari produk', 'data' => $product->load('tags')], 200);
    }

    #[OA\Delete(path: '/api/tags/{id}', tags: ['Tags'], summary: 'Hapus tag (Admin only)', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 6)], responses: [new OA\Response(response: 200, description: 'Berhasil dihapus'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Tag tidak ditemukan')])]
    public function destroy($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['status' => 'error', 'message' => 'Tag tidak ditemukan'], 404);
        }

        $tag->delete();

        return response()->json(['status' => 'success', 'message' => 'Tag berhasil dihapus'], 200);
    }
}
