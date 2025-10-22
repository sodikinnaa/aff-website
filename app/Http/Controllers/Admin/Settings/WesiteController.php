<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WesiteController extends Controller
{
    //
    // home index
    public function index(){
        return view('admin.website.index', ['title'=>'Daftar website', 'websites'=>[]]);
    }
}
