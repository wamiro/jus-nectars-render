<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('type')) {
            $query->whereHas('category', function($q) use ($request){
                $q->where('type', $request->type);
            });
        }
        if ($request->filled('range')) $query->where('range', $request->range);
        if ($request->filled('occasion')) $query->where('occasion', $request->occasion);
        if ($request->filled('volume')) $query->where('volume_ml', $request->volume);

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('catalogue', compact('products','categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        return view('product.show', compact('product'));
    }
}