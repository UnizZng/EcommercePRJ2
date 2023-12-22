<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    //Get All orders
    public function all_orders(){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
         $orders = Order::all();

         return view('admin.order.all_orders', compact('orders'));
    }
    // Edit Orders
    public function edit_orders($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $orders = Order::find($id);
        $customers = User::find($orders->customer_id);
        $details = Order_Details::where('order_id','=',$id)->get();
        return view('admin.order.edit_order', compact('details', 'orders','customers'));
    }

    // Update Orders
    public function update_order(Request $request, $id){
        $orders = Order::find ($id);
        $orders ->status = $request->order_status;
        $orders ->save();
        return redirect()->back()->with('message','Updated Successfully');
    }
    // Delete Orders
    public function delete_order($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $orders = Order::find($id);
        $details = Order_Details::where('order_id', '=', $id);
        $details->delete();
        $orders->delete();
        return redirect('/all_orders')->with('message','Deleted Successfully');
    }
    //Customer place orders
    public function place_order(){
        if(session('cart')) {
            $order = new Order();
            $order->customer_id = Auth::user()->id;
            $order->status = 0;
            $order->save();
            $new_order = Order::orderBy('id', 'DESC')->first();
            foreach (session('cart') as $item_id => $details) {
                $orderdetail = new Order_Details();
                $orderdetail->product_id = $item_id;
                $orderdetail->order_id = $new_order->id;
                $orderdetail->price = $details['price'];
                $orderdetail->quantity = $details['quantity'];
                $orderdetail->save();

                //product quantity
                $product = Product::find($orderdetail->product_id);
                $product->quantity -= $orderdetail->quantity;
                $product->save();
            }
            session()->forget('cart');
            return redirect('/redirect')->with('message', 'Order Placed');
        } else {
            return redirect('/redirect');
        }
    }
    // Sort Orders
    public function sort_order($id){
        $user_type = Auth::user()->usertype;
        if ($user_type == 0){
            return redirect('/redirect');
        }
        $orders = Order::where("status","=","$id")->get();
        return view('admin.order.all_orders', compact('orders'));
    }

}
