<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = ProductCategory::all();

        $query = Product::with('category');

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('product_category_id', $request->category_id);
        }

        $products = $query->get();

        $viewName = $request->routeIs('dashboard.produk.index')
            ? 'dashboard.produk.index'
            : 'dashboard.kasir.pesanan';

        return view($viewName, compact('products', 'categories'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'product_category_id' => 'required|exists:product_categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('dashboard.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produkk)
    {
        if ($produkk->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($produkk->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($produkk->image);
        }

        // Hapus data produk dari database
        $produkk->delete();

        return redirect()->route('dashboard.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
