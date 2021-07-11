<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    static function getCartItem(){
        $userId = Session::get('user')->id;
        return Cart::where('user_id', $userId)->count();
    }

    function cartList(){
        
        $userId = Session::get('user')->id;
   
        $product_cart = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id','=', $userId )
        ->select('products.*')
        ->get();

        $total = 0;
        foreach($product_cart as $data){
           $total += $data->price;
        }
        return View('cartlist',['productsCart' => $product_cart, 'total' => $total]);
    }
}
