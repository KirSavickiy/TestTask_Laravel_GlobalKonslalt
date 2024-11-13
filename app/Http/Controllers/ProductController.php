<?php

namespace App\Http\Controllers;
header('Content-Type: application/json; charset=UTF-8');

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
//
//
////        Product::create(
////            [
////                'user_id' => Auth::id(),
////                'name' => $input['name'],
////                'article' => $input['article'],
////                'status' => $input['status'],
////            ]
////        );
        return response()->json($input);

    }
}
