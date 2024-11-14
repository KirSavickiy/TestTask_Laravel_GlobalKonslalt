<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AttributeService;


class ProductController extends Controller
{
    protected AttributeService $attributeService;
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        return view('windows.view-product', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->validated();
        $input['attributes'] = $this->attributeService->transformAttributes($input['attributes']);
        try {
            Product::create([
                'user_id' => Auth::id(),
                'name' => $input['name'],
                'article' => $input['article'],
                'status' => $input['status'],
                'data' => json_encode($input['attributes']),
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return response()->json($input);

    }

        public function __construct(AttributeService $attributeService)
        {
            $this->attributeService = $attributeService;
        }
}
