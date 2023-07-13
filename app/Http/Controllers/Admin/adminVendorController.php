<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class adminVendorController extends Controller
{
    public function registerView(){
        return view('admin.vendors.registerVendors');
    }
    public function registerVendor(){
        $countryValues = DB::table('countries')->get();
        return view('admin.vendors.registerVendors',compact('countryValues'));
       
    }
    
}
