<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_Details;
use Carbon\Carbon;
class HomeController extends Controller
{
    //Index
    public function index(){
        $product = Product::where("quantity", ">", "0")->paginate(16);
        return view('home.userpage', compact ('product'));
    }
    //Redirecting based on usertype
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if ($usertype == '1'){
            $total_product = Product::all()->count();
            $total_customers = User::where("usertype", "=", "0")->count();
            $total_revenue = 0;
            $total_orders = Order::where("status", "=", "3")->get();
            foreach($total_orders as $total_order){
                $total_details = Order_Details::where("order_id", "=", "$total_order->id")->get();
                foreach($total_details as $total_detail) {
                    $total_revenue += $total_detail->price * $total_detail->quantity;
                }
            }
            $total_pending_orders = Order::where("status", "=", "0")->count();
            $total_delivered_orders = Order::where("status", "=", "3")->count();
            $monthly_revenue = 0;
            $monthly_orders=Order::whereMonth('updated_at', Carbon::now()->month)->where("status", "=", "3")
                ->get();
            foreach($monthly_orders as $monthly_order){
                $monthly_details = Order_Details::where("order_id", "=", "$monthly_order->id")->get();
                foreach($monthly_details as $monthly_detail) {
                    $monthly_revenue += $monthly_detail->price * $monthly_detail->quantity;
                }
            }

            return view('admin.home',compact('total_product', 'total_customers', 'total_revenue', 'monthly_revenue', 'total_pending_orders', 'total_delivered_orders'));
        } else {
            $product = Product::where("quantity", ">", "0")->paginate(16);
            return view('home.userpage', compact ('product'));
        }
    }
    //Logout
    public function logout(){
        auth() -> logout();
        session()->flush();
        $product = Product::where("quantity", ">", "0")->paginate(16);
        return view('home.userpage', compact ('product'));
    }
    //Get Product by search
    public function user_search(Request $request){
        $user_search_data = $request->user_search_data;
        $product = Product::where("name", "LIKE", "%{$user_search_data}%")->get();
        return view('home.search', compact('product'));
    }
    //Gett User Order
    public function user_order(){
        $user_id = Auth::user()->id;
        $orders = Order::where("customer_id", "=","$user_id")->get();
        return view('home.user_orders', compact('orders'));

    }
    //Sort User's Orders
    public function sort_order_customer($id){
        $orders = Order::where("status","=","$id")->get();
        return view('home.user_orders', compact('orders'));
    }
    // Sort By Brand
    public function sort_brand ($id){
        $product = Product::where("brand_id", "=", "$id")->get();
        return view('home.search', compact('product'));
    }
    // Sort By Category
    public function sort_category($id){
        $product = Product::where("category_id", "=", "$id")->get();
        return view('home.search', compact('product'));
    }
    // Home Index
    public function index_home(){
        $product = Product::where("quantity", ">", "0")->paginate(16);
        return view('home.userpage', compact ('product'));
    }

    // Getting Order's info
    public function order_info($id){
        $orders = Order::find($id);
        $customer_id = $orders->customer_id;
        if ($customer_id != Auth::user()->id){
            return redirect('/index_home');
        }
        $customers = User::find($orders->customer_id);
        $details = Order_Details::where('order_id','=',$id)->get();
        return view('home.order_details', compact('details', 'orders','customers'));


    }
    // Cancelling Order
    public function cancel_order($id)
    {
        $orders = Order::find($id);
        $customer_id = $orders->customer_id;
        if ($customer_id != Auth::user()->id) {
            return redirect('/index_home');
        }
        if ($orders->status == 3) {
            return redirect('/user_order');
        } else {

        $orders->status = 4;
        $orders->save();
        return redirect('/user_order')->with('message', 'Order Canceled');
        }
    }





}
