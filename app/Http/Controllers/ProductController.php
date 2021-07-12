<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return View('product', ['products' => $data]);
    }

    function detail($id)
    {
        $product = Product::find($id);
        return View('detail', ['product' => $product]);
    }
    function search(Request $request)
    {
        if ($request->Input('query') == '') {
            return redirect('/');
        }
        $search_data = Product::where('name', 'like', '%' . $request->Input('query') . '%')
            ->orWhere('category', 'like', '%' . $request->Input('query') . '%')
            ->get();
        return View('search', ['search_data' => $search_data]);
    }

    function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $data = new Cart;
            $data->user_id = $request->session()->get('user')->id;
            $data->product_id = $request->product_id;
            $data->save();

            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    static function getCartItem()
    {
        $userId = Session::get('user')->id;
        return Cart::where('user_id', $userId)->count();
    }

    function cartList()
    {

        $userId = Session::get('user')->id;

        $product_cart = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', '=', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        $total = 0;
        foreach ($product_cart as $data) {
            $total += $data->price;
        }
        return View('cartlist', ['productsCart' => $product_cart, 'total' => $total]);
    }

    function removecart($id)
    {
        Cart::destroy(($id));
        return redirect(('/cartlist'));
    }
    function removeAllCart()
    {
        $user_id = Session::get('user');
        DB::table('cart')->where('user_id', '=', $user_id->id)->delete();

        return redirect('/');
    }
    function orderNow()
    {
        $user_id = Session::get('user')->id;
        $product_cart = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', '=', $user_id)
            ->select('products.*', 'cart.id as card_id')
            ->get();

        $total = 0;
        foreach ($product_cart as $item) {
            $total += $item->price;
        }

        return View('orderNowdetail', ['products' => $product_cart, 'total' => $total]);
    }
    function payOrder(Request $req)
    {

        //Get Cart information from current user
        $user_id = Session::get('user')->id; //user id from session
        //  Card information from current user
        $product_cart = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', '=', $user_id)
            ->select('products.*', 'cart.*')
            ->get();

        foreach($product_cart as $orderItem){
         
            $order = new Order();    
            $order->product_id = $orderItem->product_id;
            $order->user_id = $user_id;
            $order->status = 'Pending';
            $order->payment_method = $req->Input('paymentMethod');
            $order->payment_status = 'Pending';
            $order->address = $req->Input('address');
            $order->save(); 
        }
        //Delete from cart payment
        DB::table('cart')->where('user_id','=',$user_id)->delete();
        //Redirect to home page
        return redirect('/');
    }

    //Get function to get Ordered Data from database
    function myOrders(){
        //Get User Id
        $user_id = Session::get('user')->id;
        //Select data from database
        $order = DB::table('products')->join('orders','orders.product_id','=','products.id')
        ->select('products.*','orders.address as address')->get();
        return View('orderview',['orders'=>$order]);
    }
}
