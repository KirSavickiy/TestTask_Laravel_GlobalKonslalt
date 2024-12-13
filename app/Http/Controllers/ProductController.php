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
        $products = Product::orderBy('created_at', 'desc')->paginate(15);
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
        return response()->json([
            'success' => true,
            'message' => 'Продукт успешно добавлен',
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $input = $request->validated();

        $input['attributesUpdate'] = isset($input['attributesUpdate'])
            ? $this->attributeService->transformAttributes($input['attributesUpdate'])
            : [];

        try{
            Product::where('id', $id)->update([
                'name' => $input['name'],
                'article' => $input['article'],
                'status' => $input['status'],
                'data' => json_encode($input['attributesUpdate']),
            ]);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
        return response()->json([
            'success' => true,
            'message' => 'Продукт успешно отредактирован',
        ]);
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

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('dashboard');
    }
        public function __construct(AttributeService $attributeService)
        {
            $this->attributeService = $attributeService;
        }
}
