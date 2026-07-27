@extends('layouts.app')

@section('title', 'Your Cart — NOTA.')

@section('content')

    <section class="container mx-auto px-6 py-16 md:py-24">
        <h1 class="text-4xl font-light text-gray-800 mb-8">Your Cart</h1>

        @if(count($cart) > 0)
            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 overflow-hidden">

                
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-[#f5efe8] text-gray-500 text-xs uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Product</th>
                                <th class="px-6 py-4">Price</th>
                                <th class="px-6 py-4">Quantity</th>
                                <th class="px-6 py-4">Total</th>
                                <th class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gold/10">
                            @foreach($cart as $id => $item)
                                <tr class="hover:bg-[#faf8f5] transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-14 h-14 bg-gradient-to-br from-[#f5efe8] to-[#e8ddd0] rounded-xl flex items-center justify-center shrink-0">
                                                <span class="text-2xl">🧴</span>
                                            </div>
                                            <span class="font-medium text-gray-800">{{ $item['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">${{ number_format($item['price'] / 10000, 2) }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <form action="{{ route('cart.decrement', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="w-8 h-8 rounded-full border border-gold/30 text-gray-500 hover:bg-gold hover:text-white transition flex items-center justify-center">−</button>
                                            </form>
                                            <span class="w-8 text-center font-medium">{{ $item['quantity'] }}</span>
                                            <form action="{{ route('cart.increment', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="w-8 h-8 rounded-full border border-gold/30 text-gray-500 hover:bg-gold hover:text-white transition flex items-center justify-center">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        ${{ number_format(($item['price'] * $item['quantity']) / 10000, 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                
                <div class="md:hidden divide-y divide-gold/10">
                    @foreach($cart as $id => $item)
                        <div class="p-5 flex gap-4">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-[#f5efe8] to-[#e8ddd0] rounded-xl flex items-center justify-center shrink-0">
                                <span class="text-2xl">🧴</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start gap-2">
                                    <span class="font-medium text-gray-800">{{ $item['name'] }}</span>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <p class="text-sm text-gray-400 mt-1">${{ number_format($item['price'] / 10000, 2) }} each</p>
                                <div class="flex items-center justify-between mt-3">
                                    <div class="flex items-center gap-2">
                                        <form action="{{ route('cart.decrement', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-7 h-7 rounded-full border border-gold/30 text-gray-500 flex items-center justify-center text-sm">−</button>
                                        </form>
                                        <span class="w-6 text-center text-sm font-medium">{{ $item['quantity'] }}</span>
                                        <form action="{{ route('cart.increment', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-7 h-7 rounded-full border border-gold/30 text-gray-500 flex items-center justify-center text-sm">+</button>
                                        </form>
                                    </div>
                                    <span class="font-medium text-gray-800 text-sm">
                                        ${{ number_format(($item['price'] * $item['quantity']) / 10000, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div
                    class="bg-[#faf8f5] px-6 py-6 flex flex-col md:flex-row justify-between items-center gap-4 border-t border-gold/10">
                    <div>
                        <span class="text-sm text-gray-500">Total</span>
                        <span class="text-2xl font-light text-gray-800 ml-3">${{ number_format($total / 10000, 2) }}</span>
                    </div>
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="/"
                            class="flex-1 md:flex-none text-center border border-gold/30 text-gray-600 hover:bg-gold hover:text-white px-8 py-3 rounded-full transition text-sm font-medium">
                            Continue Shopping
                        </a>
                        <a href="{{ route('checkout') }}"
                            class="flex-1 md:flex-none text-center bg-gold hover:bg-[#8b6b3f] text-white px-8 py-3 rounded-full transition text-sm font-medium shadow-md">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-3xl shadow-sm border border-gold/20">
                <span class="text-7xl">🛒</span>
                <h2 class="text-2xl font-light text-gray-600 mt-6">Your cart is empty</h2>
                <p class="text-gray-400 mt-2 max-w-xs mx-auto">Looks like you haven't found your signature scent yet.</p>
                <a href="/"
                    class="inline-block mt-8 bg-gold hover:bg-[#8b6b3f] text-white px-10 py-4 rounded-full transition shadow-md hover:shadow-lg hover:-translate-y-0.5 duration-300">
                    Start Shopping
                </a>
            </div>
        @endif
    </section>

@endsection