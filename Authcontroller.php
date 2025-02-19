<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authcontroller extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->level=='admin'){
                return redirect()->route('dashboard');
            }
            return redirect()->route('landing');
        }
        $title='Login';
        return view('admin.auth.login',compact('title'));
    }

    public function authenticate(Request $request)
    {
       $credentials=$request->validate([
        'username'=>['required'],
        'password'=>['required'],
]);
        if(Auth::attempt($credentials)){
        $request->session()->regenerate();;
            if(Auth::user()->level== 'admin'){
                return redirect()->intended('dashboard');
}else{
    return redirect()->intended('landing');
}
        }

    }
    public function logout ()
    {
        Auth::logout();
        $produks=Produk::all();
          return view ('user.index',compact('produks'));
}
}
