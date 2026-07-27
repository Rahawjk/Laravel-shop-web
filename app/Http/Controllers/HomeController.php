<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::with('category')
            ->where('is_active', true)
            ->get();

        return view('home', compact('products'));
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->where('is_active', true)
            ->get();

        return view('home', compact('products', 'category'));
    }


    public function search(Request $request)
    {
        $query = $request->get('q');

        
        if (empty($query)) {
            return redirect()->route('home');
        }

        $products = Product::with('category')
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->get();

        return view('home', compact('products', 'query'));
    }
}