<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $VendorCount = User::where('user_type', 2)
        ->where('user_status', 1)->count();

        $UserCount = User::where('user_type', 3)
        ->where('user_status', 1)->count();

        $VendorunapprovedCount = User::where('user_type', 2)
        ->where('user_status', 0)->count();

        return view("admin.dashboard",['count'=>$VendorCount,'UserCount'=>$UserCount,'VendorunapprovedCount'=>$VendorunapprovedCount]);

    }
}
