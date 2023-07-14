<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckauthenticateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
 use App\Http\Controllers\admin\adminVendorController;
 use App\Http\Controllers\AddressController;





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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/register_vendor', [CheckauthenticateController::class, 'Register'])->name('register.vendor');
Route::post('/adduser', [CheckauthenticateController::class, 'Register'])->name('register_adduser');



Route::get('adminpannel',[AdminController::class,'Index'])->name('admin.dashboard');
Route::get('pendingvendor',[VendorController::class,"pendingVendor"])->name('pending.vendor');
Route::get('approvedvendor',[VendorController::class,"approvedVendor"])->name('approved.vendor');
Route::get('addproducts',[AdminController::class,'addproducts'])->name('admin.dashboard.addproducts');



Route::get('/register',[adminVendorController::class,'registerView']);
/* Route::get('/register',[adminVendorController::class,'registerVendor'])->name('register.venodr');
 */
  Route::get('/getregister',[AddressController::class,'State'])->name('state');
  Route::get('/getregister123',[AddressController::class,'City'])->name('city');












