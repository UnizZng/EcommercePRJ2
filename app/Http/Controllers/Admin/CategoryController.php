<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Getting Category Info
    public function view_categories() {
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $data=Category::all();

        return view('admin.category.view_categories',compact('data'));
    }
    // Add Category
    public function add_category(){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        return view('admin.category.add_category');
    }
    // Save Category
    public function save_category(Request $request){
        $category = new Category();
        $category ->name =$request->category_name;
        $category -> save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    // Delete Category
    public function delete_category($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
    $data = category::find($id);
    $data->delete();
    return redirect()->back()->with('message','Deleted Successfully');
    }
    // Edit Category
   public function edit_category($id){
       $user_type = Auth::user()->usertype;
       if ($user_type == 0){
           return redirect('/redirect');
       }
        $data = category::find($id);
           return view('admin.category.edit_category', compact('data'));
  }
  // Save Category
    public function update_category(Request $request,$id){
        $data = category::find($id);
        $data->name = $request->category_name;
        $data->save();
        return redirect('/view_categories')->with('message','Update Successfully');
    }




















}
