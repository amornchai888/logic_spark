<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

   
    public function show($id)
    {
        $product = Product::find($id);
        //Find fail
        if (!$product) {
            return response()->json([
                'result' => false,
                'message' => "Product not found"
            ], 200);
        }

        return response()->json([
            'result' => true,
            'data' => $product
        ], 201);
    }


    public function showAll()
    {
        $product = Product::all();

        return response()->json([
            'result' => true,
            'data' => $product
        ], 201);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:255',
        ]);

        $category = Category::find($request->category_id);
        //Find fail
        if (!$category) {
            return response()->json([
                'result' => false,
                'message' => "Category not found"
            ], 200);
        }

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->save();

        return response()->json([
            'result' => true,
            'message' => "Product created"
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:255',
        ]);

        $category = Category::find($request->category_id);
        //Find fail
        if (!$category) {
            return response()->json([
                'result' => false,
                'message' => "Category not found"
            ], 200);
        }

        $product = Product::find($id);

        //Find fail
        if (!$product) {
            return response()->json([
                'result' => false,
                'message' => "Product not found"
            ], 200);
        }

        $product->name = $request->name;
        $product->save();

        return response()->json([
            'result' => true,
            'message' => "Product updated"
        ], 201);
    }


    public function destory($id)
    {

        $product = Product::find($id);

        //Find fail
        if (!$product) {
            return response()->json([
                'result' => false,
                'message' => "Product not found"
            ], 200);
        }

        $product->delete();

        return response()->json([
            'result' => true,
            'message' => "Product deleted"
        ], 201);
    }
}
