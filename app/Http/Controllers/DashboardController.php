<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = Product::count();
        $category = ProductCategory::count();
        $user = User::count();
        $totalPemasukan = Pesanan::sum('total_price');
        $totalOrders = Pesanan::count();

        return view('dashboard.index', compact('produk', 'category', 'user', 'totalPemasukan','totalOrders'));
    }
}
