<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //Getting Brand info
    public function view_brand() {
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }

        $brands = Brand::all();

        return view('admin.brand.view_brands',compact('brands'));
    }
    // Adding Brand
    public function add_brand(){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        return view('admin.brand.add_brand');
    }
    // Saving Brand
    public function save_brand(Request $request){
        $brand = new Brand();
        $brand ->name =$request->brand_name;
        $brand -> save();
        return redirect()->back()->with('message','Brand Added Successfully');
    }
    // Delete Brand
    public function delete_brand($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $data = Brand::find($id);
        $data->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }
    // Edit Brand
    public function edit_brand($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $data = brand::find($id);
        return view('admin.brand.edit_brand', compact('data'));
    }
    // Update Brand
    public function update_brand(Request $request,$id){
        $data = brand::find($id);
        $data->name = $request->brand_name;
        $data->save();
        return redirect('/view_brands')->with('message','Update Successfully');
    }
}
