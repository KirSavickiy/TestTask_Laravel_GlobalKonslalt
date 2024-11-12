<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->validated();
//        Product::create(
//            [
//                'user_id' => Auth::id(),
//                'name' => $input['name'],
//                'article' => $input['article'],
//                'status' => $input['status'],
//            ]
//        );
        return response()->json($input);
    }

}
