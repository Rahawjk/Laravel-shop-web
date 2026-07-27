<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $products = auth()->user()->wishlist()->with('category')->latest('wishlists.created_at')->get();

        return view('wishlist.index', compact('products'));
    }

    public function toggle(Product $product)
    {
        $user = auth()->user();

        if ($user->wishlist()->where('product_id', $product->id)->exists()) {
            $user->wishlist()->detach($product->id);
            $message = 'Removed from wishlist.';
        } else {
            $user->wishlist()->attach($product->id);
            $message = 'Added to wishlist!';
        }

        return redirect()->back()->with('success', $message);
    }
}