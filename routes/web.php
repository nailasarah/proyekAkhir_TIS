<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Order;

Route::get('/', function () {
    try {
        // Load products with their category and tags relationships
        $products = Product::with(['category', 'tags'])->where('status', 'active')->get();
        $categories = Category::where('is_active', true)->get();
        $tags = Tag::all();
        $users = App\Models\User::all();
        $userProfiles = App\Models\UserProfile::all();
        $orders = Order::all();
        $ordersCount = $orders->count();
    } catch (\Exception $e) {
        $products = collect();
        $categories = collect();
        $tags = collect();
        $users = collect();
        $userProfiles = collect();
        $orders = collect();
        $ordersCount = 0;
    }

    return view('welcome', compact('products', 'categories', 'tags', 'users', 'userProfiles', 'orders', 'ordersCount'));
});

