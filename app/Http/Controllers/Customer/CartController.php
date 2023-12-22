<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
public function view_cart() {
    return view('home.cart');
}
public function add_cart($id) {
    $product = Product::find($id);
    //checking product
    if(!$product) {
        abort(404);
    }
    $cart = session()->get('cart');
    $total_quantity = $product->quantity;
    //if cart is empty then first product
    if(!$cart) {
        $cart = [
            $id => [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "total_quantity" => $total_quantity,
            ]
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Product added to cart successfully!');
    }
    //if cart not empty then increase quantity
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
        session()->put('cart', $cart); // this code put product of choose in cart
        return redirect()->back()->with('message', 'Product added to cart successfully!');

    }
    // if product is not yet in cart -> quantity = 1
    $cart[$id] = [
        "name" => $product->name,
        "quantity" => 1,
        "price" => $product->price,
        "image" => $product->image,
        "total_quantity" => $total_quantity,
    ];
    //put intem in cart
    session()->put('cart', $cart);
    return redirect()->back()->with('message', 'Product added to cart successfully!');


    }
    public function remove($id)
    {
        if($id) {

            $cart = session()->get('cart');

            if(isset($cart[$id])) {

                unset($cart[$id]);

                session()->put('cart', $cart);
            }

            return redirect()->back()->with('message', 'Product removed successfully!');
        }
    }
    public function plus_quantity($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart); // this code put product of choose in cart
            return redirect()->back();
        }

    }
    public function minus_quantity($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            $cart[$id]['quantity']--;
            session()->put('cart', $cart); // this code put product of choose in cart
            return redirect()->back();
        }
    }

}

