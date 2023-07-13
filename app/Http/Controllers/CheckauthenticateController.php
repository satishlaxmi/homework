<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
 use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\View\View;


class CheckauthenticateController extends Controller
{
    
    public function Register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:20'],
                'email' => ['required', 'string', 'email', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'vendor_field' => ['required', Rule::in(['Vendor', 'Customer'])],
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        
            // Validation passed, continue with your logic
        
        else{
            $userType = ($request->vendor_field === 'Vendor') ? 2 : 3;
            $userStatus = ($request->vendor_field === 'Vendor') ? 0 : 1;
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $userType,
                'user_status' => $userStatus,
            ]);
                if ($user) {
                    if ($user->user_type == 2) {
                        return redirect()->back()->with('success', 'You are registered successfully! Please wait for admin approval and check your email for further instructions.');
                    } else {
                        return redirect()->back()->with('success', 'You are registered successfully! Please verify your email and login.');
                    }
                } else {
                    // Handle the case where user registration fails
                }
            }
            
        
        } else {
            return view('auth.vendorRegister');
        }
    }

   
    }    

    
