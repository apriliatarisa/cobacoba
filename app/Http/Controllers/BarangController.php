<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $dtBarang = Barang::latest()->get();
        return view('manajemen-barang.data-barang', compact('dtBarang'));
    }

    public function create(){
        $dtSupplier = Supplier::all() ;
        return view('manajemen-barang.create-barang',compact('dtSupplier'));
    }
        public function store(Request $request)
        {
           
            Barang::create([
                'id_supplier'=>$request->id_supplier,
                'nama_barang'=>$request->nama_barang,
                'jumlah'=>$request->jumlah,
                'harga_beli'=>$request->harga_beli,
                'harga_jual'=>$request->harga_jual,
            ]);
            return redirect()->route('manajemen-barang.data-barang')->with(['success' => 'Data Berhasil Disimpan!']);
        }

    public function edit($id)
    {   
        $dtBarang = Barang::with('suppliers')->findorfail($id);
        $dtSupplier = Supplier::all();
        return view('manajemen-barang.edit-barang',compact('dtBarang','dtSupplier'));
    }

    public function update(Request $request, $id)
    {
        $dtBarang = Barang::findorfail($id);
        $dtBarang->update($request->all());
        return redirect()->route('manajemen-barang.data-barang')->with(['success' => 'Data Berhasil Disimpan!']);

    }
    public function destroy($id)
    {
        $dtBarang = Barang::findorfail($id);
        $dtBarang->delete();
        return back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


