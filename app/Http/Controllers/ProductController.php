<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    public function create(Request $request)
    {
        $product = new Product;
        $product->name = 'God of War';
        $product->price = 40;

        $product->save();

        $category = Category::find(1);
        $product->categories()->attach($category);

        return 'Success';
    }
    public function show(Product $product)
    {
        // return $product;
        return view('show', compact('product'));
    }
}
