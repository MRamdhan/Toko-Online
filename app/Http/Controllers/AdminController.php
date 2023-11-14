<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function produkIndex()
    {
        $produk = Produk::paginate(10);

        return view('produk.index',compact('produk'));
    }

    public function tampiltambahproduk(Kategori $kategori)
    {
        $kategori = Kategori::all();
        return view('produk.tambah',compact('kategori'));

    }

    public function tambahproduk(Request $request)              
    {
        $request->validate([
            'kategori_id' =>'required',
            'name' => 'required',
            'foto' =>'required|file|image',
            'harga' => 'required|numeric'
        ]);

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'foto' => $request->foto->store('img'),
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.produk');
    }

    public function editproduk(Produk $produk)
    {
        $kategori = Kategori::all();

        return view('produk.edit', compact('produk', 'kategori'));
    }

    
    public function updateproduk(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kategori_id'=>'required',
            'name'=>'required',
            'foto'=>'file|image',
            'harga' =>'required|numeric'
        ]);

        if($request->hasFile('foto'))
        {
            $data['foto'] =$request->foto->store('img');
        }
        else
        {
            unset($data['foto']);
        }

        $produk->update($data);

        return redirect()->route('admin.produk');
    }

    public function deleteproduk(Produk $produk)    
    {   
        $produk->delete();

        return redirect()->route('admin.produk');
    }
}
