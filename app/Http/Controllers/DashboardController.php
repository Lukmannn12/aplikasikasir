<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = Product::count();
        $category = ProductCategory::count();
        $user = User::count();
        $totalPemasukan = Pesanan::sum('total_price');
        $totalOrders = Pesanan::count();

        // Ambil total pemasukan per bulan (12 bulan)
        $monthlyIncome = Pesanan::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(total_price) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Buat array 12 bulan biar rapi
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $incomeData = [];
        for ($i = 1; $i <= 12; $i++) {
            $incomeData[] = $monthlyIncome[$i] ?? 0;
        }

        // Ambil total pemasukan per bulan
        $monthlyIncome = Pesanan::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(total_price) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Ambil total orders per bulan
        $monthlyOrders = Pesanan::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(id) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Biar rapi, isi array 12 bulan
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        $incomeData = [];
        $ordersData = [];
        for ($i = 1; $i <= 12; $i++) {
            $incomeData[] = $monthlyIncome[$i] ?? 0;
            $ordersData[] = $monthlyOrders[$i] ?? 0;
        }


        return view('dashboard.index', compact(
            'produk',
            'category',
            'user',
            'totalPemasukan',
            'totalOrders',
            'months',
            'incomeData',
            'ordersData'
        ));
    }
}
