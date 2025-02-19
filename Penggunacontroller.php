<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Penggunacontroller extends Controller
{
    public function index()
    {
        $title='pengguna';
        $user=User::all();

        return view("admin.pelanggan.index" ,compact("user","title"));
    }


}
