<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{

    public function showproduct(){
        $productsdetails = Products::get()->all();
        print_r($productsdetails);

        return view('admin.product.showproducts',compact('productsdetails'));
    }
    public function index(){
        $VendorCount = User::where('user_type', 2)
        ->where('user_status', 1)->count();

        $UserCount = User::where('user_type', 3)
        ->where('user_status', 1)->count();

        $VendorunapprovedCount = User::where('user_type', 2)
        ->where('user_status', 0)->count();

        return view("admin.dashboard",['count'=>$VendorCount,'UserCount'=>$UserCount,'VendorunapprovedCount'=>$VendorunapprovedCount]);

    }

    public function addproducts(){
        return view('admin.product.addproduct');
    }


public function add(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string',
        'category' => 'required|string',
        'metaTitle' => 'required|string',
        'productCode' => 'required|string',
        'productSKU' => 'required|string',
        'description' => 'required|string',
        'metaDescription' => 'required|string',
        'regularPrice' => 'required|numeric',
        'salePrice' => 'required|numeric',
        'weight' => 'required|integer',
        'units' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|',
    ]);

    // Add the product to the database
    $data['vendor_id']=1;
    if ($request->hasFile('image')) {
        $imageName =$request->file('image')->getClientOriginalName();
        echo $imageName;
        $path = $request->file('image')->storeAS( 'public',$imageName);
        $data['image'] = $imageName;
    }
    //<img src="{{ asset('storage/' . $path) }}" alt="Product Image">

    $productId = DB::table('products')->insertGetId($data);

    // Optional: Perform additional processing or redirect to another page
    if($productId){
        return redirect()->back()->with('success', 'Product added successfully!');

    }else{
        return redirect()->back()->with('warning', 'Product not added successfully!');

    }

}

            
        
}
