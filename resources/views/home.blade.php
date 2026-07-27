@extends('layouts.app')

@section('title', 'NOTA. — Fine Fragrance')

@section('content')

    @if(isset($query))
        <div class="container mx-auto px-6 py-6">
            <h2 class="text-2xl font-light text-gray-800">Results for: "{{ $query }}"</h2>
            <p class="text-sm text-gray-400 mt-1">{{ $products->count() }} products found</p>
        </div>
    @endif
    @if(isset($category))
        <div class="container mx-auto px-6 py-6">
            <h2 class="text-2xl font-light text-gray-800">{{ $category->name }}</h2>
        </div>
    @endif

    <section class="relative overflow-hidden bg-cream py-24 px-6 md:py-36">


        <div class="absolute -top-20 -left-20 w-96 h-96 bg-gold/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -right-10 w-[28rem] h-[28rem] bg-[#e8ddd0]/60 rounded-full blur-3xl"></div>

        <div class="container mx-auto relative flex flex-col md:flex-row items-center justify-between gap-12">

            <div class="flex-1 text-center md:text-left animate-fade-up">
                <span class="inline-flex items-center gap-2 text-gold text-sm font-semibold uppercase tracking-[0.2em]">
                    <span class="w-6 h-px bg-gold"></span>
                    Fine Fragrance
                </span>
                <h1 class="hero-title font-light text-gray-900 mt-4 leading-[1.1]">
                    Find a scent <br />
                    <span class="font-medium">that's yours.</span>
                </h1>
                <p class="text-gray-500 text-lg font-light max-w-md mt-6 leading-relaxed mx-auto md:mx-0">
                    Curated perfumes, organized the way a nose would: <br class="hidden md:block" />
                    <span class="italic">top, heart, and base.</span>
                </p>

                <div class="flex flex-wrap gap-4 mt-10 justify-center md:justify-start">
                    <a href="#"
                        class="bg-gold text-white px-10 py-4 rounded-full text-sm font-medium tracking-wide hover:bg-[#8b6b3f] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 shadow-md">
                        New In
                    </a>
                    <a href="#"
                        class="border border-gold/40 text-gray-700 px-10 py-4 rounded-full text-sm font-medium hover:bg-gold hover:text-white hover:border-gold transition-all duration-300">
                        Just Arrived
                    </a>
                </div>


                <div class="flex flex-wrap gap-x-8 gap-y-3 mt-12 justify-center md:justify-start text-sm text-gray-500">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="w-4 h-4 text-gold">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        100% Authentic
                    </span>
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="w-4 h-4 text-gold">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                        Free Shipping
                    </span>
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="w-4 h-4 text-gold">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        Secure Checkout
                    </span>
                </div>
            </div>

            <div class="flex-1 flex justify-center animate-fade-up" style="animation-delay: 150ms">
                <div class="relative">
                    <div
                        class="w-72 h-72 md:w-96 md:h-96 bg-gradient-to-br from-[#e8ddd0] to-[#d4c5a9] rounded-full flex items-center justify-center shadow-2xl">
                        <span class="text-9xl opacity-80">🧴</span>
                    </div>

                    <div
                        class="absolute top-6 -left-4 bg-white rounded-2xl shadow-lg px-4 py-3 flex items-center gap-2 animate-float">
                        <span class="text-lg">⭐</span>
                        <div class="text-left">
                            <p class="text-sm font-medium text-gray-800 leading-none">4.9/5</p>
                            <p class="text-[11px] text-gray-400 mt-1">2,400+ reviews</p>
                        </div>
                    </div>
                    <div class="absolute bottom-8 -right-6 bg-white rounded-2xl shadow-lg px-4 py-3 animate-float"
                        style="animation-delay: 1s">
                        <p class="text-sm font-medium text-gold">🔥 Bestseller</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 py-20">
        <div class="flex justify-between items-end mb-12 border-b border-gold/20 pb-6">
            <div>
                <span class="text-gold text-xs font-semibold uppercase tracking-[0.2em]">
                    {{ isset($query) ? 'Search Results' : (isset($category) ? 'Category' : 'Collection') }}
                </span>
                <h2 class="text-3xl font-light text-gray-800 mt-1">
                    {{ isset($query) ? 'Results' : (isset($category) ? $category->name : 'Our Signature Scents') }}
                </h2>
            </div>
            @if(!isset($query) && !isset($category))
                <a href="#" class="text-sm font-medium text-gold hover:border-b border-gold transition pb-1">
                    View All →
                </a>
            @endif
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-3xl shadow-sm border border-gold/20">
                <span class="text-6xl">
                    {{ isset($query) ? '🔍' : '🧴' }}
                </span>

                @if(isset($query))
                    <h2 class="text-2xl font-light text-gray-600 mt-6">No results for "{{ $query }}"</h2>
                    <p class="text-gray-400 mt-2 max-w-sm mx-auto">
                        Try a different search term, or browse our full collection instead.
                    </p>
                @elseif(isset($category))
                    <h2 class="text-2xl font-light text-gray-600 mt-6">No products in {{ $category->name }} yet</h2>
                    <p class="text-gray-400 mt-2 max-w-sm mx-auto">
                        Check back soon, or explore other categories.
                    </p>
                @else
                    <h2 class="text-2xl font-light text-gray-600 mt-6">No products available right now</h2>
                    <p class="text-gray-400 mt-2 max-w-sm mx-auto">We're restocking — check back soon.</p>
                @endif

                <a href="{{ route('home') }}"
                    class="inline-block mt-8 bg-gold hover:bg-[#8b6b3f] text-white px-10 py-4 rounded-full transition shadow-md hover:shadow-lg hover:-translate-y-0.5 duration-300">
                    Browse All Products
                </a>
            </div>
        @endif
    </section>

@endsection