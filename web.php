<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\landingController;
use App\Http\Controllers\Ongkircontroller;
use App\Http\Controllers\Penggunacontroller;
use App\Http\Controllers\Produkcontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[landingController::class,'index'])->name('landing');


Route::get("/login",[Authcontroller::class,'index' ])->name('login');
Route::post("/login",[Authcontroller::class,'authenticate' ])->name('login.post');
Route::get('/logout',[Authcontroller::class,'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[Dashboardcontroller::class,'index'])->name('dashboard');
    Route::get('/landing',[landingcontroller::class,'index'])->name('landing');
    Route::get('/pelanggan',[Penggunacontroller::class,'index'])->name('pengguna');
    Route::get('/produk',[Produkcontroller::class,'index'])->name('produk');
    Route::get('/ongkir',[Ongkircontroller::class,'index'])->name('ongkir');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkoutView'])->name('checkout.view');
    Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/payment/{id}', [CartController::class, 'paymentView'])->name('payment.view');
    Route::post('/payment/{id}', [CartController::class, 'processPayment'])->name('payment.process');
    Route::get('/receipt/{id}', [CartController::class, 'receiptView'])->name('receipt.view');
    Route::post('/admin/approve-payment/{id}', [AdminController::class, 'approvePayment'])->name('admin.approvePayment');

});




