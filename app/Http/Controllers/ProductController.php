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
        if (!$request->expectsJson()) {
            abort(403, 'Forbidden');
        }
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return view('windows.view-product', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->validated();
        $input['attributes'] = isset($input['attributes'])
            ? $this->attributeService->transformAttributes($input['attributes'])
            : [];
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

    public function update(ProductRequest $request, $id)
    {
        $input = $request->validated();
        return response()->json($input);
    }

    public function edit(Request $request, $id)
    {
        if (!$request->expectsJson()) {
            abort(403, 'Forbidden');
        }

        $product = Product::find($id);
        $product->index = 0;
        $product->data = json_decode($product->data);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return view('windows.update-product', compact('product'));

    }

        public function __construct(AttributeService $attributeService)
        {
            $this->attributeService = $attributeService;
        }
}
