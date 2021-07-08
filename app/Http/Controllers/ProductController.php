<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        $data = Product::all();
        return View('product',['product'=>$data]);
    }
}
