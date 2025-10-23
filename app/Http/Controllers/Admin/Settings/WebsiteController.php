<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\WebsiteModel;

class WebsiteController extends Controller
{
    //
    public function index(Request $request){
        $perPage = $request->input('per_page', 15); // default 15 jika tidak diset
        $websites = WebsiteModel::paginate($perPage);

        return view('admin.website.index', [
            'title' => 'Daftar Website',
            'websites' => $websites
        ]);
    }

    public function showAdd(){
        return view('admin.website.form', ['title'=>'Tambah website']);
    }
}
