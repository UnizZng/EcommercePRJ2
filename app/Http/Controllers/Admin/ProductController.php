<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
//product index admin
public function all_products() {
    $user_type = Auth::user()->usertype;
    if ($user_type == 0){
        return redirect('/redirect');
    }
    $product = Product::all();
    $category= Category::all();
    $brand = Brand::all();

    return view ('admin.product.all_products', compact('product','category','brand'));
}
//add product admin
    public function add_product(){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $category= Category::all();
        $brand = Brand::all();
        return view('admin.product.add_product', compact('category','brand'));
    }
    //save product from add
    public function save_product(Request $request){
        $product = new Product();
        $product ->name =$request->product_name;
        $product ->quantity =$request->product_quantity;
        $product ->price =$request->product_price;

        $image = $request->product_image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->product_image->move('product',$image_name);
        $product ->image =$image_name;
        $product ->description =$request->product_description;
        $product ->cpu =$request->product_cpu;
        $product ->ram =$request->product_ram;
        $product ->storage =$request->product_storage;
        $product ->gpu =$request->product_gpu;
        $product ->screen =$request->product_screen;
        $product ->os =$request->product_os;
        $product ->ports =$request->product_ports;
        $product ->battery =$request->product_battery;
        $product ->brand_id =$request->product_brand;
        $product ->category_id =$request->product_category;



        $product -> save();
        return redirect()->back()->with('message','Product Added Successfully');
    }
    //delete product admin
    public function delete_product($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }
    // edit product admin
    public function edit_product($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $data = Product::find($id);
        $brand = Brand::all();
        $category = Category::all();
        return view('admin.product.edit_product', compact('data', 'brand', 'category'));
    }
    // update product admin
    public function update_product(Request $request, $id){
        $product = Product::find($id);
        $product ->name = $request->product_name;
        $product ->quantity =$request->product_quantity;
        $product ->price =$request->product_price;
        $image = $request->product_image;
        if ($image == ""){

        } else {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->product_image->move('product', $image_name);
            $product->image = $image_name;
        }
        $product ->description =$request->product_description;
        $product ->cpu =$request->product_cpu;
        $product ->ram =$request->product_ram;
        $product ->storage =$request->product_storage;
        $product ->gpu =$request->product_gpu;
        $product ->screen =$request->product_screen;
        $product ->os =$request->product_os;
        $product ->ports =$request->product_ports;
        $product ->battery =$request->product_battery;
        $product ->brand_id =$request->product_brand;
        $product ->category_id =$request->product_category;
        $product->save();
        return redirect('/all_products')->with('message','Product Updated Successfully');
    }

    //details for customers

    public function product_details($id){

    $product =Product::find($id);

    return view ('home.product_details', compact ('product'));
    }




    // admin search for products
    public function admin_search_product(Request $request){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $searchdata= $request->admin_search_product;
        $product= Product::where('name', 'LIKE', "%{$searchdata}%")->get();
        $category= Category::all();
        $brand = Brand::all();
//        return view('admin.test', compact('searchdata'));
        return view ('admin.product.all_products', compact('product','category','brand'));
    }
}
