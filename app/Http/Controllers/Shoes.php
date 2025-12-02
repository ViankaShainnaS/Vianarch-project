<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Shoes extends Controller
{
    public function index(): View
    {
        $shoeses = DB::table("shoes")->get();
        return view("admin.product",compact("shoeses"));
    }
}
