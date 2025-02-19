<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class landingController extends Controller
{
    public function index(){
        $produks = Produk::all();
        return view("user.index", compact('produks'));
    }
}
