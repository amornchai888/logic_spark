<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        //
    }

    public function show($id)
    {
        $category = Category::find($id);
        //Find fail
        if (!$category) {
            return response()->json([
                'result' => false,
                'message' => "Category not found"
            ], 200);
        }

        return response()->json([
            'result' => true,
            'data' => $category
        ], 201);
    }


    public function showAll()
    {
        $category = Category::all();

        return response()->json([
            'result' => true,
            'data' => $category
        ], 201);
    }

    public function showWithProduct()
    {
        $category = Category::with('products')->get();

        return response()->json([
            'result' => true,
            'data' => $category
        ], 201);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'result' => true,
            'message' => "Category created"
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $category = Category::find($id);

        //Find fail
        if (!$category) {
            return response()->json([
                'result' => false,
                'message' => "Category not found"
            ], 200);
        }

        $category->name = $request->name;
        $category->save();

        return response()->json([
            'result' => true,
            'message' => "Category updated"
        ], 201);
    }


    public function destory($id)
    {

        $category = Category::find($id);

        //Find fail
        if (!$category) {
            return response()->json([
                'result' => false,
                'message' => "Category not found"
            ], 200);
        }

        $category->delete();

        return response()->json([
            'result' => true,
            'message' => "Category deleted"
        ], 201);
    }
}
