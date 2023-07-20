<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\User;
use App\Models\Catogery;
use App\Models\Vendors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Show all products
    public function showproduct()
    {
        $products = Products::all();

        return view('admin.product.showproducts', compact('products'));
    }

    public function ShowVendors(Request $request )
     {

        $vendorsInformation = User::where('user_type', 2)->get();
        return view('admin.vendors.vendorList',compact('vendorsInformation'));
    }

    public function ShowCatogery () {
        $catogeryInformation = User::where('user_type', 2)->get();
        return view('admin.product.catogery',compact('catogeryInformation'));
    }

    // Display the admin dashboard with user and vendor counts
    public function index()
    {
        $VendorCount = User::where('user_type', 2)
            ->where('user_status', 1)->count();
        $UserCount = User::where('user_type', 3)
            ->where('user_status', 1)->count();
        $VendorunapprovedCount = User::where('user_type', 2)
            ->where('user_status', 0)->count();

        // Pass counts as variables to the view
        return view("admin.dashboard", [
            'count' => $VendorCount,
            'UserCount' => $UserCount,
            'VendorunapprovedCount' => $VendorunapprovedCount
        ]);
    }

    // Show the form to add a new product
    public function addproducts()
    {
        return view('admin.product.addproduct');
    }

    // Add a new product to the database
    public function add(Request $request)
    {
        // Validate the input data
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

        // Set a default vendor_id, assuming it's 1 in this example
        $data['vendor_id'] = 1;

        if ($request->hasFile('image')) {
            // If an image is uploaded, store it in the 'public' disk
            $imageName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public', $imageName);
            $data['image'] = $imageName;
        }

        // Insert the product data into the 'products' table
        $productId = DB::table('products')->insertGetId($data);

        if ($productId) {
            // Redirect to the product list page with a success message
            return redirect()->route('admin.dashboard.products')->with('success', 'Product added successfully!');
        } else {
            // Redirect back to the add product page with a warning message
            return redirect()->back()->with('warning', 'Product not added successfully!');
        }
    }

    // Delete a product based on the given product ID (AJAX request)
    public function Deleteproduct(Request $request)
    {
        $pid = $request->pid;
        $product = Products::where('id', $pid)->delete();

        if ($product) {
            // Return success message as JSON response if product is deleted
            return response()->json(["message" => "Product has been deleted successfully"]);
        } else {
            // Return error message as JSON response if product not found or already deleted
            return response()->json(["errorMessage" => "Either no product found or product already deleted"]);
        }
    }

    public function AddCatogeryList (Request $request) {
        return view('admin.product.addcatogery');

    }

    // Show the form to edit a product
    public function EditProduct($id)
    {
        $product = Products::where('id', $id)->first();
        return view('admin.product.editproducts', ['product' => $product]);
    }

    public function EditVendor($vendorId){
        echo "your vendor id is $id ";
    }

    // Save the updated product data to the database
    public function EditProductSave(Request $request)
    {
        $id = $request->id;

        // Validate the input data for product update
        $data = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'regularPrice' => 'required|numeric',
            'weight' => 'required|integer',
            'units' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            // If an image is uploaded, store it in the 'public' disk
            $imageName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public', $imageName);
            $data['image'] = $imageName;
        }

        // Update the product data in the 'products' table
        $productEdit = Products::where('id', $id)->update($data);

        if ($productEdit) {
            // Redirect to the product list page if product data is updated
            return redirect()->route('admin.dashboard.products');
        } else {
            // Redirect back to the edit product page if update fails
            return redirect()->back();
        }
    }




   
}

