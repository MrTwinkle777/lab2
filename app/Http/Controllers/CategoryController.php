<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($code, Request $request): View
    {
        $validatedData = $request->validate([
            'minPrice' => ['nullable', 'numeric', 'min:0'],
            'maxPrice' => ['nullable', 'numeric', 'min:0'],
        ]);
    
        $category = Category::where('slug', $code)->first();
        $products = Product::where('category_id', $category->id);

        if (!$category->activity) {
            abort(404);
        }

        $minPrice = Product::min('cost');
        $maxPrice = Product::max('cost');

        $filterMinPrice = $validatedData['minPrice'] ?? $minPrice;
        $filterMaxPrice = $validatedData['maxPrice'] ?? $maxPrice;

        if($filterMinPrice && $filterMaxPrice &&
            is_numeric($filterMinPrice) && is_numeric($filterMaxPrice)){
            if($filterMinPrice >0 && $filterMaxPrice >0)
            {
            $products = $products->whereBetween('cost',[$filterMinPrice,$filterMaxPrice])->paginate(1);
          }
        }  
        else{
            $products = $products->paginate(1);
        }

        return view('categories.show', compact('products', 'category','minPrice','maxPrice','filterMinPrice','filterMaxPrice'));
    }
}
