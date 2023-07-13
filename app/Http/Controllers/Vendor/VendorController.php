<?php

namespace App\Http\Controllers\Vendor;
use App\Models\Vendors;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function pendingVendor(){
        $users = User::where('user_type', 2)
        ->where('user_status', 0)
        ->get();
        return view('Admin.Vendor.pendingvendor',compact('users'));
    }

    public function approvedVendor(){
        $users = User::where('user_type', 2)
        ->where('user_status', 1)
        ->get();
        return view('Admin.Vendor.approvedvendor',compact('users'));

    }
   
    
    
}
