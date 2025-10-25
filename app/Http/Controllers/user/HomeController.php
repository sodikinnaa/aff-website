<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\WebsiteModel;
class HomeController extends Controller
{
    //
    public function index(){
        $websites = WebsiteModel::with('products')->get();
        // dd($websites);
        return view('user.index', ['websites'=> $websites]);
    }
}
