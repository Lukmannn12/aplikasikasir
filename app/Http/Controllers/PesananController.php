<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\PesananItem;
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

        // ambil produk dengan status best_seller atau recommended
        $specialProducts = Product::whereIn('status', ['best_seller', 'recommended'])->get();

        $query = Product::query();

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('product_category_id', $request->category_id);
        }

        $produk = $query->get();

        // ambil dari session (keranjang)
        $pesanans = collect(session()->get('cart', []));

        return view('dashboard.kasir.pesanan', compact('pesanans', 'produk', 'categories', 'specialProducts'));
    }

    public function riwayat(Request $request)
    {
    // Ambil query parameter
    $search = $request->input('search');
    $tanggal = $request->input('tanggal');

    // Mulai query
    $query = Pesanan::with('customer')->latest();

    // Filter berdasarkan nama customer
    if ($search) {
        $query->whereHas('customer', function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        });
    }

    // Filter berdasarkan tanggal
    if ($tanggal) {
        $query->whereDate('created_at', $tanggal);
    }

    // Ambil hasil
    $pesanan = $query->get();

    return view('dashboard.kasir.riwayat', compact('pesanan'));
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
        // validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,qris',
            'cash_amount' => 'required_if:payment_method,cash|nullable|numeric|min:0',
        ]);

        // simpan customer baru (atau bisa cari existing customer kalau mau)
        $customer = Customer::create([
            'name' => $validated['name'],
        ]);

        // hitung total dari items
        $total = collect($validated['items'])->sum('total_price');

        $status = $validated['payment_method'] === 'cash' ? 'paid' : 'pending'; 

        // simpan pesanan
        $pesanan = Pesanan::create([
            'customer_id' => $customer->id,
            'total_price' => $total,
            'status' => $status,
            'payment_method' => $validated['payment_method'],
            'cash_amount' => $validated['payment_method'] === 'cash' ? $validated['cash_amount'] : null,
        ]);
        // simpan item pesanan
        foreach ($validated['items'] as $item) {
            PesananItem::create([
                'pesanan_id' => $pesanan->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['qty'],
                'price' => $item['total_price'] / $item['qty'], // harga satuan
                'subtotal' => $item['total_price'],
            ]);
        }

        // kosongkan session cart setelah checkout
        session()->forget('cart');

        return redirect()->route('dashboard.kasir.pesanan.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function riwayatDetail($id)
    {
        // Ambil pesanan beserta relasinya
        $pesanan = Pesanan::with(['customer', 'items.product'])
            ->findOrFail($id);

        return view('dashboard.kasir.pesanan_show', compact('pesanan'));
    }
    public function edit(Pesanan $pesanan)
    {
        $pesanan->load('items.product', 'customer');
        return view('dashboard.kasir.pesanan_show', compact('pesanan'));
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
    public function destroy(Request $request, $id)
    {
    $context = $request->input('context', 'cart'); // default hapus di cart

    if ($context === 'cart') {
        // hapus item di cart
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    if ($context === 'pesanan') {
        // hapus pesanan di database
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->items()->delete();
        $pesanan->delete();
        return redirect()->route('dashboard.kasir.riwayat')
            ->with('success', 'Pesanan berhasil dihapus.');
    }

    return back()->with('error', 'Konfigurasi hapus tidak dikenali.');
    }
}
