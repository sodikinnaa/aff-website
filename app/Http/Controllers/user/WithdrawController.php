<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    //
    public function index(){
        return view('user.withdraw.index');
    }

    public function history(){
        return view('user.withdraw.history');
    }

    public function form(){
        return view('user.withdraw.form');
    }
}
