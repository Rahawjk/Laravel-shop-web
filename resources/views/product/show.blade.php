@extends('layouts.app')

@section('title', $product->name . ' — NOTA.')

@section('content')


    <div class="container mx-auto px-6 pt-8">
        <nav class="text-sm text-gray-400 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-gold transition">Home</a>
            <span>/</span>
            <a href="{{ route('category', $product->category->slug) }}" class="hover:text-gold transition">
                {{ $product->category->name }}
            </a>
            <span>/</span>
            <span class="text-gray-600">{{ $product->name }}</span>
        </nav>
    </div>

    <section class="container mx-auto px-6 py-10 md:py-16">
        <div class="flex flex-col md:flex-row gap-16 items-start">

            <div
                class="w-full md:w-1/2 bg-cream rounded-3xl flex items-center justify-center overflow-hidden shadow-inner sticky top-24">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover" />
                @else
                    <span class="text-9xl md:text-[12rem] opacity-80 p-12">🧴</span>
                @endif
            </div>

            <div class="w-full md:w-1/2">
                <span class="text-gold text-xs font-semibold uppercase tracking-[0.2em]">
                    {{ $product->category->name }}
                </span>
                <h1 class="text-4xl md:text-5xl font-light text-gray-900 mt-3 leading-tight">
                    {{ $product->name }}
                </h1>
                <p class="text-3xl font-light text-gray-800 mt-4">
                    ${{ number_format($product->price / 10000, 2) }}
                </p>
                <div class="mt-4 flex items-center gap-3">
                    <span
                        class="inline-block w-2 h-2 rounded-full {{ $product->stock > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                    <span class="text-sm text-gray-500">
                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                    </span>
                    <span class="text-sm text-gray-400">|</span>
                    <span class="text-sm text-gray-400">{{ $product->stock }} units available</span>
                </div>

                <div class="mt-8 border-t border-gold/20 pt-8">
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400">Description</h3>
                    <p class="text-gray-600 font-light leading-relaxed mt-3">
                        {{ $product->description }}
                    </p>
                </div>


                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST"
                        class="flex flex-wrap items-center gap-4 flex-1 min-w-[280px]">
                        @csrf

                        <div class="flex items-center border border-gold/30 rounded-full overflow-hidden">
                            <button type="button" onclick="const q=this.nextElementSibling; if(q.value>1) q.value--;"
                                class="w-11 h-12 flex items-center justify-center text-gray-500 hover:bg-gold/10 transition">
                                −
                            </button>
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                                class="w-12 text-center border-0 outline-none focus:ring-0" />
                            <button type="button"
                                onclick="const q=this.previousElementSibling; if(q.value<{{ $product->stock }}) q.value++;"
                                class="w-11 h-12 flex items-center justify-center text-gray-500 hover:bg-gold/10 transition">
                                +
                            </button>
                        </div>

                        <button type="submit" {{ $product->stock == 0 ? 'disabled' : '' }}
                            class="flex-1 min-w-[160px] bg-[#a67c52] hover:bg-[#8b6b3f] disabled:opacity-40 disabled:cursor-not-allowed text-white text-sm font-medium tracking-wide py-4 px-8 rounded-full transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 5.025a1.5 1.5 0 0 1-1.482 1.818H7.213a1.5 1.5 0 0 1-1.482-1.818l1.263-5.025a1.5 1.5 0 0 1 1.482-1.182h11.224a1.5 1.5 0 0 1 1.482 1.182Z" />
                            </svg>
                            {{ $product->stock == 0 ? 'Out of Stock' : 'Add to Cart' }}
                        </button>
                    </form>

                    <x-wishlist-button :product="$product" size="lg" />
                </div>


                <div class="grid grid-cols-3 gap-4 mt-10 pt-8 border-t border-gold/20 text-center">
                    <div>
                        <p class="text-xl">🚚</p>
                        <p class="text-xs text-gray-500 mt-2 leading-snug">Free shipping<br>over $50</p>
                    </div>
                    <div>
                        <p class="text-xl">✅</p>
                        <p class="text-xs text-gray-500 mt-2 leading-snug">100%<br>Authentic</p>
                    </div>
                    <div>
                        <p class="text-xl">↩️</p>
                        <p class="text-xs text-gray-500 mt-2 leading-snug">7-day<br>returns</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="flex items-center gap-2 mt-3">
        <div class="flex text-gold">
            @for($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="{{ $i <= round($product->averageRating()) ? 'currentColor' : 'none' }}" stroke="currentColor"
                    stroke-width="1.5" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.563.563 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
            @endfor
        </div>
        <span class="text-sm text-gray-500">
            {{ number_format($product->averageRating(), 1) }} ({{ $product->reviews->count() }}
            {{ Str::plural('review', $product->reviews->count()) }})
        </span>
    </div>

    @if(isset($relatedProducts) && $relatedProducts->count())
        <section class="container mx-auto px-6 py-16 border-t border-gold/20">
            <div class="mb-10">
                <span class="text-gold text-xs font-semibold uppercase tracking-[0.2em]">You may also like</span>
                <h2 class="text-2xl font-light text-gray-800 mt-1">More from {{ $product->category->name }}</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $related)
                    <x-product-card :product="$related" />
                @endforeach
            </div>
        </section>
    @endif
    {{-- نظرات و امتیازها --}}
    <section class="container mx-auto px-6 py-16 border-t border-gold/20">
        <div class="max-w-3xl mx-auto">
            <div class="mb-10">
                <span class="text-gold text-xs font-semibold uppercase tracking-[0.2em]">Reviews</span>
                <h2 class="text-2xl font-light text-gray-800 mt-1">
                    What people are saying ({{ $product->reviews->count() }})
                </h2>
            </div>

            {{-- فرم ثبت نظر --}}
            @auth
                @php
                    $userReview = $product->reviews->firstWhere('user_id', auth()->id());
                @endphp

                @if(!$userReview)
                    <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6 mb-8" x-data="{ rating: 0, hover: 0 }">
                        <h3 class="text-sm font-medium text-gray-700 mb-4">Leave a review</h3>
                        <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                            @csrf

                            <div class="flex gap-1 mb-4">
                                @for($i = 1; $i <= 5; $i++)
                                    <button type="button" @click="rating = {{ $i }}" @mouseenter="hover = {{ $i }}"
                                        @mouseleave="hover = 0">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            :fill="(hover || rating) >= {{ $i }} ? '#a67c52' : 'none'" stroke="#a67c52"
                                            stroke-width="1.5" class="w-7 h-7 transition-colors">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.563.563 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                    </button>
                                @endfor
                                <input type="hidden" name="rating" x-model="rating" required>
                            </div>

                            <textarea name="comment" rows="3" placeholder="Share your thoughts about this product... (optional)"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition text-sm"></textarea>

                            <button type="submit" :disabled="rating === 0"
                                class="mt-4 bg-gold hover:bg-[#8b6b3f] disabled:opacity-40 disabled:cursor-not-allowed text-white text-sm font-medium px-6 py-2.5 rounded-full transition">
                                Submit Review
                            </button>
                        </form>
                    </div>
                @else
                    <div class="bg-[#f5efe8] rounded-2xl px-5 py-4 mb-8 flex items-center justify-between">
                        <p class="text-sm text-gray-600">You've already reviewed this product. Thank you! 🙏</p>
                        <form action="{{ route('reviews.destroy', $userReview->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-500 hover:underline">Delete my review</button>
                        </form>
                    </div>
                @endif
            @else
                <div class="bg-[#f5efe8] rounded-2xl px-5 py-4 mb-8 text-center">
                    <a href="{{ route('login') }}" class="text-sm text-gold hover:underline">Log in</a>
                    <span class="text-sm text-gray-500">to leave a review.</span>
                </div>
            @endauth

            
            @forelse($product->reviews as $review)
                <div class="border-b border-gold/10 py-6 first:pt-0 last:border-0">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-9 h-9 rounded-full bg-gold/10 text-gold flex items-center justify-center text-xs font-medium">
                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                            </span>
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ $review->user->name }}</p>
                                <p class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex text-gold">
                            @for($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="{{ $i <= $review->rating ? 'currentColor' : 'none' }}" stroke="currentColor"
                                    stroke-width="1.5" class="w-3.5 h-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.563.563 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>
                            @endfor
                        </div>
                    </div>
                    @if($review->comment)
                        <p class="text-sm text-gray-600 leading-relaxed mt-3">{{ $review->comment }}</p>
                    @endif
                </div>
            @empty
                <p class="text-sm text-gray-400 text-center py-8">No reviews yet. Be the first to share your thoughts!</p>
            @endforelse
        </div>
    </section>
@endsection