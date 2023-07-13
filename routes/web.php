<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckauthenticateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;



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


Route::get('adminpannel',[AdminController::class,'Index'])->name('admin.dashboard');
Route::get('pendingvendor',[VendorController::class,"pendingVendor"])->name('pending.vendor');
Route::get('approvedvendor',[VendorController::class,"approvedVendor"])->name('approved.vendor');








