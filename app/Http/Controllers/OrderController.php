<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // public function placeOrder()
    // {
    //     // Logic untuk menampilkan halaman pemesanan
    //     return view('user.order');
    // }

    public function countryCodes(){
        $codes = DB::table('country_codes')->get();
        return view('user.order', compact('codes'));

    }
}
