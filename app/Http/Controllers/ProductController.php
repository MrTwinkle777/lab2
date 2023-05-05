<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): View
    // {
    //     $products = Product::paginate(12);
    //     return view('products.index', compact('products'));
    // }

    /**
     * Display the specified resource.
     */
    public function show($code): View
    {
        $product = Product::where('slug', $code)->first();

        if (!$product) {
            abort(404);
        }
        return view('products.show', compact('product'));
    }
}
