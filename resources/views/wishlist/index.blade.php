@extends('layouts.app')

@section('title', 'Wishlist — NOTA.')

@section('content')

    <section class="container mx-auto px-6 py-16 md:py-24">
        <h1 class="text-4xl font-light text-gray-800 mb-2">Your Wishlist</h1>
        <p class="text-gray-400 mb-10">{{ $products->count() }} saved {{ Str::plural('item', $products->count()) }}</p>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-3xl shadow-sm border border-gold/20">
                <span class="text-7xl">🤍</span>
                <h2 class="text-2xl font-light text-gray-600 mt-6">Your wishlist is empty</h2>
                <p class="text-gray-400 mt-2 max-w-xs mx-auto">Tap the heart icon on any product to save it here.</p>
                <a href="{{ route('home') }}"
                    class="inline-block mt-8 bg-gold hover:bg-[#8b6b3f] text-white px-10 py-4 rounded-full transition shadow-md hover:shadow-lg hover:-translate-y-0.5 duration-300">
                    Explore Products
                </a>
            </div>
        @endif
    </section>

@endsection