<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = ProductCategory::all();

        $query = Product::query();

        // Filter berdasarkan kategori jika ada
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('product_category_id', $request->category_id);
        }

        $produk = $query->get();

        $pesanans = Pesanan::with('product')->get();

        return view('dashboard.kasir.pesanan', compact('pesanans', 'produk', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
