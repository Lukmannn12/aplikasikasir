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

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('product_category_id', $request->category_id);
        }

        $produk = $query->get();

        // ambil dari session (keranjang)
        $pesanans = collect(session()->get('cart', []));

        return view('dashboard.kasir.pesanan', compact('pesanans', 'produk', 'categories'));
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $pesanans = collect($cart);

        return view('dashboard.kasir.pesanan', compact('pesanans'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // ambil cart dari session
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty']++;
            $cart[$product->id]['total_price'] = $cart[$product->id]['qty'] * $product->price;
        } else {
            $cart[$product->id] = [
                'name'        => $product->name,
                'price'       => $product->price,
                'qty'         => 1,
                'image'       => $product->image,
                'total_price' => $product->price
            ];
        }

        // simpan lagi ke session
        session()->put('cart', $cart);

        return back()->with('success', 'Produk masuk ke keranjang!');
    }

    // Update quantity (plus / minus)



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
    public function updateQty(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($request->action === 'plus') {
                $cart[$id]['qty']++;
            } elseif ($request->action === 'minus' && $cart[$id]['qty'] > 1) {
                $cart[$id]['qty']--;
            }

            $cart[$id]['total_price'] = $cart[$id]['qty'] * $cart[$id]['price'];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Keranjang diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        return back()->with('success', 'Pesanan berhasil dihapus.');
    }
}
