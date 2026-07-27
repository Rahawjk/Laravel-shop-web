@extends('layouts.app')

@section('title', 'Page Not Found — NOTA.')

@section('content')

    <section class="container mx-auto px-6 py-24 md:py-36">
        <div class="max-w-lg mx-auto text-center">

            <div class="relative inline-block mb-8">
                <span class="text-[7rem] md:text-[9rem] font-light text-gold/20 leading-none select-none">404</span>
                <span class="absolute inset-0 flex items-center justify-center text-6xl">🧴</span>
            </div>

            <h1 class="text-3xl font-light text-gray-800 mb-3">This scent has evaporated.</h1>
            <p class="text-gray-400 font-light leading-relaxed max-w-sm mx-auto">
                We couldn't find the page you were looking for. It may have been moved, or never existed.
            </p>

            <div class="flex flex-wrap justify-center gap-4 mt-10">
                <a href="{{ route('home') }}"
                    class="bg-gold hover:bg-[#8b6b3f] text-white px-8 py-3.5 rounded-full text-sm font-medium tracking-wide transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                    Back to Home
                </a>
                <form action="{{ route('search') }}" method="GET" class="relative">
                    <input type="text" name="q" placeholder="Search products..."
                        class="px-5 py-3.5 rounded-full border border-gold/30 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition text-sm w-56" />
                    <button type="submit"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection