<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        $data = Product::all();
        return View('product',['products'=>$data]);
    }

    function detail($id){
        $product = Product::find($id);
        return View('detail',['product'=>$product]);
    }
    function search(Request $request){
        $search_data = Product::where('name','like', '%'.$request->Input('query').'%')
        ->orWhere('category','like', '%'.$request->Input('query').'%')
        ->get();
        return View('search',['search_data'=>$search_data]);
    }
}
