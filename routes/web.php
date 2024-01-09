<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('login');
})->middleware('guest');


Auth::routes([
    'login' => true,
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);



// Route::get('/get-user', function(){
//     if(Auth::check()){
//         $user = Auth::user();

//         return $user->load(['office']);
//     }

//     return [];
// });

//LOGIN

Route::post('/login',[App\Http\Controllers\LoginController::class, 'login']);

Route::post('/logout',[App\Http\Controllers\LoginController::class, 'logout']);

//REGISTER
Route::get('/register',[App\Http\Controllers\RegisterController::class, 'index']);

//ADMIN

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin-dashboard',[App\Http\Controllers\Admin\AdminController::class, 'index']);
});



//SELLER
Route::middleware(['auth','seller'])->group(function(){
    Route::get('/seller-dashboard',[App\Http\Controllers\Seller\SellerController::class, 'index']);
});


//BUYER
Route::middleware(['auth','buyer'])->group(function(){
    Route::get('/buyer-dashboard',[App\Http\Controllers\Buyer\BuyerController::class, 'index']);
});


Route::post('/custom-login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//ADDRESS
//Route::get('/load-provinces', [App\Http\Controllers\AddressController::class, 'loadProvinces']);
//Route::get('/load-cities', [App\Http\Controllers\AddressController::class, 'loadCities']);
//Route::get('/load-barangays', [App\Http\Controllers\AddressController::class, 'loadBarangays']);




/*     ADMINSITRATOR          */

Route::get('/session', function(){
    return Session::all();
});


Route::get('/applogout', function(Request $req){
    Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();
});