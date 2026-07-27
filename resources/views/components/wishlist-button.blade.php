@props(['product', 'size' => 'sm'])

@php
    $isCardSize = $size === 'sm';
    $wrapperClass = $isCardSize
        ? 'w-9 h-9 rounded-full backdrop-blur-sm flex items-center justify-center transition-colors'
        : 'p-4 border rounded-full transition-all duration-300 inline-flex';
    $iconClass = $isCardSize ? 'w-4 h-4' : 'w-6 h-6';

    $isWishlisted = auth()->check()
        ? auth()->user()->wishlist()->where('product_id', $product->id)->exists()
        : false;

    if ($isCardSize) {
        $colorClass = $isWishlisted
            ? 'bg-gold text-white'
            : 'bg-white/90 hover:bg-gold hover:text-white';
    } else {
        $colorClass = $isWishlisted
            ? 'bg-[#a67c52] text-white border-[#a67c52]'
            : 'border-[#d4c5a9] text-[#a67c52] hover:bg-[#a67c52] hover:text-white hover:border-[#a67c52]';
    }
@endphp

@auth
    <form action="{{ route('wishlist.toggle', $product->id) }}" method="POST">
        @csrf
        <button type="submit" class="{{ $wrapperClass }} {{ $colorClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $isWishlisted ? 'currentColor' : 'none' }}" viewBox="0 0 24 24"
                stroke-width="1.6" stroke="currentColor" class="{{ $iconClass }}">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.312-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </button>
    </form>
@else
    <a href="{{ route('login') }}" class="{{ $wrapperClass }} {{ $colorClass }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"
            class="{{ $iconClass }}">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.312-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
        </svg>
    </a>
@endauth