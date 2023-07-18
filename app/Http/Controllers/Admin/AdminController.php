<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Session;
use carbon;

class AdminController extends Controller {

    public function showproduct () {
        $productsdetails = Products::get()->all();
        return view('admin.product.showproducts',compact('productsdetails'));
    }

    public function index () {
        $VendorCount = User::where('user_type', 2)
        ->where('user_status', 1)->count();
        $UserCount = User::where('user_type', 3)
        ->where('user_status', 1)->count();
        $VendorunapprovedCount = User::where('user_type', 2)
        ->where('user_status', 0)->count();

        return view("admin.dashboard",['count'=>$VendorCount,'UserCount'=>$UserCount,'VendorunapprovedCount'=>$VendorunapprovedCount]);
    }


    public function addproducts () {
        return view('admin.product.addproduct');
    }


    public function add (Request $request) {
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
            'weight' => 'required|numeric',
            'units' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|',
        ]);

        $data['vendor_id']=1;
        if ($request->hasFile('image')) {
            $imageName =$request->file('image')->getClientOriginalName();
            echo $imageName;
            $path = $request->file('image')->storeAS( 'public',$imageName);
            $data['image'] = $imageName;
        }

        $productId = DB::table('products')->insertGetId($data);

        if($productId){
            return redirect()->route('admin.dashboard.products')->with('success', 'Product added successfully!');
        }else{
            return redirect()->back()->with('warning', 'Product not added successfully!');
        }

    }

    public function Deleteproduct ( Request $request ) {

        $pid = $request->pid;
        $product = Products::where('id', $pid)->delete();
        if($product){
            return response()->json([
                "message"=>"product has been delted sucesfuly"
            ]);
        }   
         else{
            return response()->json([
                "errorMessage"=>"either no product orproduct alreday deleted"
            ]);
         }   
        }
    
    public function EditProduct ($id) {
        $product = Products::find($id)->first();
         return view('admin.product.editproducts', ['product' => $product]);
    }

    public function EditProductSave(Request $request) {
        $data = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'regularPrice' => 'required|numeric',
            'salePrice' => 'required|numeric',
            'weight' => 'required|integer',
            'units' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        if ($request->hasFile('image')) {
            $imageName =$request->file('image')->getClientOriginalName();
            echo $imageName;
            $path = $request->file('image')->storeAS( 'public',$imageName);
            $data['image'] = $imageName;
        }
    
        $productEdit = Products::where('id', $request->id)->update($data);
        if ($productEdit) {
            return redirect()->route('admin.dashboard.products')->with('success', 'Product edited  successfully!'); // Redirect to the 'products' route
        } else {
            return redirect()->back()->with('warning', "Something went wrong or product not found");
        }
    }
    
    


    }





 
    



            
        

