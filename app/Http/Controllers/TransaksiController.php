<?php

namespace App\Http\Controllers;
use App\Models\BarangTransaksi;
use App\Models\Barang;
use App\Models\LaporanTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtTransaksi=Transaksi::latest()->get();
        return view('manajemen-transaksi.data-transaksi', compact('dtTransaksi'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transaksi = new Transaksi;
        $transaksi->id_user = auth()->id();
        $transaksi->total = 0;
        $transaksi->tunai = 0;
        $transaksi->total_barang = 0;
        $transaksi->kembali = 0;
        $transaksi->save();

        session(['id_transaksi' => $transaksi->id_transaksi]);

        // return redirect()->route('penjualanbarang.index', [$penjualan->id_penjualan]);
        $dtBarang = Barang::latest()->get();
        return view('manajemen-transaksi.create-transaksi', compact('dtBarang','transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());

         $request->validate([
            'id_transaksi' => 'required',
            'id_barang' => 'required|array',
            'id_user' => 'required',
            'jumlah' => 'required|array',
            'diterima' => 'required',
            
        ]);

        foreach ($request->id_barang as $key => $id_barang) {
            $barangTransaksi = new BarangTransaksi();
            $barangTransaksi->timestamps = false;
            $barangTransaksi->id_transaksi = $request->id_transaksi;
            $barangTransaksi->id_barang = $id_barang;
            $barangTransaksi->jumlah = $request->jumlah[$key];
            $barangTransaksi->total_harga = $request->total_harga[$key];
            $barangTransaksi->save();

            $barang = Barang::find($id_barang);
            $barang->jumlah -= $request->jumlah[$key];
            $barang->save();
        }

       
        $total_item = array_sum($request->jumlah);
        $total_penjualan = array_sum($request->total_harga);
        $total_pembelian = array_sum($request->harga_beli);
        $diterima = $request->diterima;
        $kembalian = $diterima - $total_penjualan;

        $transaksi = Transaksi::find($request->id_transaksi);
       
        $transaksi->total = $total_penjualan;
        $transaksi->tunai = $diterima;
        $transaksi->total_barang = $total_item;
        $transaksi->kembali = $kembalian;
        $transaksi->save();

       // Simpan data pada pivot table laporan_transaksi
LaporanTransaksi::create([
    'id_laporan' => 1,
    'id_transaksi' => $request->id_transaksi,
    'total_transaksi' => $total_penjualan,
]);

LaporanTransaksi::create([
    'id_laporan' => 2,
    'id_transaksi' => $request->id_transaksi,
    'total_transaksi' => $total_pembelian,
]);

LaporanTransaksi::create([
    'id_laporan' => 3,
    'id_transaksi' => $request->id_transaksi,
    'total_transaksi' => $total_penjualan - $total_pembelian,
]);

return view('manajemen-transaksi.nota');
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

    public function notaPenjualan()
{
    $id_transaksi = session('id_transaksi');

    $transaksi = Transaksi::find($id_transaksi);

    if (!$transaksi) {
        abort(404);
    }

    // Mengambil detail dari pivot table barang_transaksi
    $detail = BarangTransaksi::with('barangs') // Ganti 'barangs' dengan nama relasi yang benar
        ->where('id_transaksi', $id_transaksi)
        ->get();

    return view('manajemen-transaksi.nota-transaksi', compact('transaksi', 'detail'));
}
}
