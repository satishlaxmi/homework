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
      
        $userInfo = $request->input('userInfo');
     
        parse_str($userInfo, $parsedData);
        $name = $parsedData['name'];
    
        $email = $parsedData['email'];
        $password = $parsedData['password'];
        $passwordConfirmation = $parsedData['password_confirmation'];
        $vendorField = $parsedData['vendor_field']; 

        $dataArray = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
            'vendor_field' => $vendorField,
        ]; 

        $validator = Validator::make($dataArray, [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'vendor_field' => ['required', Rule::in(['Vendor', 'Customer'])],
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors]);
        }else{
            $userType = ($vendorField === 'Vendor') ? 2 : 3;
            $userStatus = ($vendorField === 'Vendor') ? 0 : 1;
            
            $user = User::create([
                'name' => $name,
                'email' =>$email,
                'password' => Hash::make($password),
                'user_type' => $userType,
                'user_status' => $userStatus,
            ]);
                if ($user) {
                    if ($user->user_type == 2) {
                         return response()->json([' '=>'You are registered successfully! Please wait for admin approval and check your email for further instructions.']);
                    } else {
                        return response()->json(['sucess'=>'You are registered successfully! Please verify your email and login.']);

                    }
                } else {
                    // Handle the case where user registration fails
                }
            
            }
        }

   
    }    

    
