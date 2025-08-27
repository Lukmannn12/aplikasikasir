<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                $bulan = $request->input('bulan', now()->month);
        $tahun = now()->year;

        // Ambil data pesanan sesuai bulan
        $pesanan = Pesanan::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d');
            });

        $laporan = [];

        foreach ($pesanan as $tanggal => $list) {
            $totalPendapatan = $list->sum('total_price');
            $totalCash       = $list->where('payment_method', 'cash')->sum('cash_amount');
            $totalNonCash    = $list->where('payment_method', '!=', 'cash')->sum('total_price');
            $totalKembalian  = $list->where('payment_method', 'cash')->sum(function ($p) {
                return max(0, $p->cash_amount - $p->total_price);
            });

            $laporan[] = [
                'tanggal'         => Carbon::parse($tanggal)->translatedFormat('d F Y'),
                'jumlah_transaksi'=> $list->count(),
                'total_pendapatan'=> $totalPendapatan,
                'total_cash'      => $totalCash,
                'total_non_cash'  => $totalNonCash,
                'total_kembalian' => $totalKembalian,
            ];
        }

        // Total per bulan
        $totalBulan = [
            'pendapatan' => collect($laporan)->sum('total_pendapatan'),
            'cash'       => collect($laporan)->sum('total_cash'),
            'non_cash'   => collect($laporan)->sum('total_non_cash'),
            'kembalian'  => collect($laporan)->sum('total_kembalian'),
        ];

        return view('dashboard.keuangan.index', compact('laporan', 'totalBulan', 'bulan'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
