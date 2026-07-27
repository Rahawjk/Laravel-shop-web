@props(['product'])

<div
    class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">


    @if($product->stock > 0 && $product->stock <= 5)
        <span
            class="absolute top-4 left-4 z-20 bg-red-500/90 text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-full">
            Only {{ $product->stock }} left
        </span>
    @endif


    <div
        class="absolute top-4 right-4 z-20 flex flex-col gap-2 opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300">
        <x-wishlist-button :product="$product" />

        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" title="Add to cart"
                class="w-9 h-9 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center hover:bg-gold hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 5.025a1.5 1.5 0 0 1-1.482 1.818H7.213a1.5 1.5 0 0 1-1.482-1.818l1.263-5.025a1.5 1.5 0 0 1 1.482-1.182h11.224a1.5 1.5 0 0 1 1.482 1.182Z" />
                </svg>
            </button>
        </form>
    </div>


    <a href="{{ route('product.show', $product->slug) }}" class="block">
        <div
            class="h-64 bg-gradient-to-br from-[#f5efe8] to-[#e8ddd0] flex items-center justify-center overflow-hidden">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
            @else
                <span
                    class="text-7xl transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6">🧴</span>
            @endif
        </div>


        <div class="p-6">
            <span
                class="text-[10px] font-semibold uppercase tracking-widest text-gold bg-gold/10 px-3 py-1 rounded-full">
                {{ $product->category->name }}
            </span>
            <h3 class="font-medium text-lg text-gray-800 mt-3">{{ $product->name }}</h3>
            @if($product->reviews->count() > 0)
                <div class="flex items-center gap-1.5 mt-1.5">
                    <div class="flex text-gold">
                        @for($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="{{ $i <= round($product->averageRating()) ? 'currentColor' : 'none' }}"
                                stroke="currentColor" stroke-width="1.5" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.563.563 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-xs text-gray-400">({{ $product->reviews->count() }})</span>
                </div>
            @endif
            <p class="text-gray-400 text-sm font-light mt-1 line-clamp-2">{{ $product->description }}</p>

            <div class="flex justify-between items-center mt-5 pt-4 border-t border-gray-100">
                <span class="text-xl font-light text-gray-900">${{ number_format($product->price / 10000, 2) }}</span>
                <span class="text-xs text-gray-400">✓ {{ $product->stock }}</span>
            </div>
        </div>
    </a>
</div>