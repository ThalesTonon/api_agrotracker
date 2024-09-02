<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    // Mostrar um produto específico
    public function show($id)
    {
        $products = Product::where('company_id', $id)->orderBy('label')->get();

        return response()->json($products->map(function ($product) {
            return [
                'Id' => $product->id,
                'Value' => $product->value,
                'Label' => $product->label
            ];
        }), 200);
    }
    // Criar um novo produto
    public function storeProducts(Request $request, $id)
    {
        $request->validate([
            '*.Value' => 'required', // Verifica unicidade no campo `value`
            '*.Label' => 'required|string',
        ]);

        $products = [];
        foreach ($request->all() as $productData) {
            $product = Product::create([
                'value' => $productData['Value'],
                'label' => $productData['Label'],
                'company_id' => $id
            ]);
            $products[] = $product;
        }

        return response()->json($products, 201);
    }
    // Atualizar um produto
    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|string',
            'label' => 'required|string',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }
    // Deletar um produto
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
