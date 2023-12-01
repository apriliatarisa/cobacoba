<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function index(){
        $dtSupplier = Supplier::latest()->get();
        return view('manajemen-supplier.data-supplier', compact('dtSupplier'));
    }

    public function create(){
       
        return view('manajemen-supplier.create-supplier');
    }
        public function store(Request $request)
        {
           
            supplier::create([
               
                'supplier'=>$request->supplier,
                'telp'=>$request->telp,
               
            ]);
            return redirect()->route('manajemen-supplier.data-supplier')->with(['success' => 'Data Berhasil Disimpan!']);
        }

    public function edit($id)
    {   
        $dtSupplier = Supplier::findorfail($id);
        return view('manajemen-supplier.edit-supplier',compact('dtSupplier'));
    }

    public function update(Request $request, $id)
    {
        $dtSupplier = Supplier::findorfail($id);
        $dtSupplier->update($request->all());
        return redirect()->route('manajemen-supplier.data-supplier')->with(['success' => 'Data Berhasil Disimpan!']);

    }
    public function destroy($id)
    {
        $dtSupplier = Supplier::findorfail($id);
       
        $dtSupplier->delete();
        return back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


