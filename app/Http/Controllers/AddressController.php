<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddressController extends Controller
{
    public function State(Request $request){
        $countryId = $request->countryid;
        $stateValues = DB::table('states')->where('country_id',$countryId)->get();
        return response()->json($stateValues);

    }

    public function City(Request $request){
        $StateId = $request->stateid;
        $cityValues = DB::table('cities')->where('state_id', $StateId)->get();
        return response()->json($cityValues);

    }
    
}
