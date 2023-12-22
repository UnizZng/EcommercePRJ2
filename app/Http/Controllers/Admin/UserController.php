<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Getting all users info
    public function all_users() {
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $user = User::all();

        return view ('admin.user.all_users', compact('user'));
    }
    //Delete User
    public function delete_user($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }
    //User Detail
    public function detail_user($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $data= User::find($id);
        return view ('admin.user.detail_user', compact('data'));
    }
    // Update user
    public function update_user(Request $request, $id){
        $data = User::find($id);
        $data->usertype = $request->user_type;
        $data->save();
        return redirect()->back()->with('message','Updated Successfully');
    }
    // Search User
    public function admin_search_user(Request $request){
        $searchdata= $request->admin_search_user;
        $user= User::where('name', 'LIKE', "%{$searchdata}%")->get();
//        return view('admin.test', compact('searchdata'));
        return view ('admin.user.all_users', compact('user',));
    }




}
