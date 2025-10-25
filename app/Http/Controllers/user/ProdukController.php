<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\WebsiteModel;

class ProdukController extends Controller
{
    
    //
    public function index($id_web)
    {
        // Ambil semua produk dari website tertentu saja
        $website = WebsiteModel::find($id_web);

        if (!$website) {
            return redirect()->back()->with('error', 'Website tidak ditemukan atau tidak aktif.');
        }

        // Ambil koleksi produk terkait website ini saja
        $products = $website->allProducts()->get();
        return view('user.produk.index', ['products'=>$products]);
    }

    public function myProduk(){
        $products=[];
        return view('user.produk.my_produk', ['products'=>$products]);

    }
}
