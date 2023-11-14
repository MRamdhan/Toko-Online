<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){

        $data = Produk::all(); 
        return view('welcome',compact('data'));
    }

    public function detail(Request $request,Produk $produk){
        return view('main',compact('produk'));
    }

    public function login(){
        return view('login');
    }

    public function postlogin(Request $request) {
        $cek = $request->validate([
            'email'=>'required',
            'password'=>'required'
       ]);

        if(Auth::attempt($cek)){
            $user = Auth::user();

            if($user->role == 'admin'){
                return redirect()->route('admin.produk')->with('status','Selamat datang : '.$user->name);
            }else{
                return redirect()->route('home')->with('status','Selamat datang : '.$user->name);
            }
        }
        return back()-> with('status','Email atau password salah');
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('home');
    }

    public function postkeranjang(Request $request,Produk $produk){
        $request->validate([
            'banyak'=>'required',
        ]);
        DetailTransaksi::create([
            'qty'=>$request->banyak,    
            'user_id'=>Auth::id(),
            'produk_id'=> $produk->id,
            'status'=>'keranjang',
            'totalharga'=> $produk->harga * $request->banyak,

        ]); 
        return redirect()-> route('pelanggan.keranjang')->with('status','dimasukan kedalam keranjang');

    }

    public function keranjang()
    {
        $detailtransaksi = DetailTransaksi::where('user_id', auth()->id())->where('status', 'keranjang')->with('produk')->get();

        return view('template.keranjang', compact('detailtransaksi'));
    }

    public function bayar(DetailTransaksi $detailtransaksi)
    {
        $produk=$detailtransaksi->produk;
        return view('bayar',compact('produk','detailtransaksi'));
    }

    public function prosesbayar(Request $request, DetailTransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti_transaksi' =>'required|file'
        ]);

        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'totalharga' => $detailtransaksi->totalharga,
            'kode' => 'INV'.Str::random(8)
        ]);

        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'cekout',
            'bukti_transaksi' => $request->bukti_transaksi->store('images'),
        ]);

        return redirect()->route('pelanggan.summary')->with('status','berhasil checkout/upload bukti');
    }

    public function summary(Request $request)
    {
        $detailtransaksi = DetailTransaksi::where('user_id',auth()->id())->where('status','cekout')->get();

        return view('template.summary', compact('detailtransaksi'));
    }

    public function registrasi()
    {
        return view('template.registrasi');
    }

    public function postregistrasi(Request $request)
    {
        $cek =$request->validate([
            'email'=>'required',
            'password'=>'required',
            'name'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'pelanggan'
        ]);

        return redirect()->route('login')->with('status','berhasil tambah customer');
    }
}
