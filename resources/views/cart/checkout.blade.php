@extends('layouts.app')

@section('title', 'Checkout — NOTA.')

@section('content')

    <section class="container mx-auto px-6 py-16 md:py-24">

        
        <div class="flex items-center justify-center gap-3 mb-12 text-sm">
            <div class="flex items-center gap-2 text-gold font-medium">
                <span class="w-7 h-7 rounded-full bg-gold text-white flex items-center justify-center text-xs">✓</span>
                Cart
            </div>
            <span class="w-8 h-px bg-gold/40"></span>
            <div class="flex items-center gap-2 text-gray-800 font-medium">
                <span class="w-7 h-7 rounded-full bg-gold text-white flex items-center justify-center text-xs">2</span>
                Shipping
            </div>
            <span class="w-8 h-px bg-gray-200"></span>
            <div class="flex items-center gap-2 text-gray-400">
                <span class="w-7 h-7 rounded-full border border-gray-300 flex items-center justify-center text-xs">3</span>
                Payment
            </div>
        </div>

        <h1 class="text-4xl font-light text-gray-800 mb-8 text-center md:text-left">Checkout</h1>

        <div class="flex flex-col lg:flex-row gap-12">

          
            <div class="flex-1 bg-white rounded-3xl shadow-sm border border-gold/20 p-8">
                <h2 class="text-xl font-light text-gray-800 mb-6">Shipping Information</h2>

                <form action="{{ route('checkout.place') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                            required />
                        @error('customer_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Email Address</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                            required />
                        @error('customer_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Phone Number</label>
                        <input type="tel" name="customer_phone" value="{{ old('customer_phone') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                            required />
                        @error('customer_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Shipping Address</label>
                        <textarea name="shipping_address" rows="3"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                            required>{{ old('shipping_address') }}</textarea>
                        @error('shipping_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Notes (Optional)</label>
                        <textarea name="notes" rows="2"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-gold hover:bg-[#8b6b3f] text-white font-medium py-4 rounded-full transition shadow-md hover:shadow-lg duration-300 mt-2">
                        Place Order
                    </button>

                    <p class="text-center text-xs text-gray-400 flex items-center justify-center gap-1.5 mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        Your information is secure and encrypted
                    </p>
                </form>
            </div>

            
            <div class="lg:w-1/3">
                <div class="bg-[#f5efe8] rounded-3xl p-8 sticky top-24">
                    <h3 class="text-lg font-light text-gray-800 mb-6">Order Summary</h3>

                    <div class="space-y-4 mb-6 max-h-64 overflow-y-auto pr-1">
                        @foreach($cart as $item)
                            <div class="flex justify-between text-sm gap-3">
                                <span class="text-gray-600">{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                                <span
                                    class="text-gray-800 shrink-0">${{ number_format(($item['price'] * $item['quantity']) / 10000, 2) }}</span>
                            </div>
                        @endforeach
                    </div>

                 
                    <div class="border-t border-gold/20 pt-4">
                        @if(session('coupon_code'))
                            <div
                                class="flex items-center justify-between bg-green-50 border border-green-200 rounded-xl px-4 py-3">
                                <span class="text-sm text-green-700">✅ <strong>{{ session('coupon_code') }}</strong>
                                    applied</span>
                                <form action="{{ route('remove.coupon') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-sm text-red-500 hover:text-red-700 transition">Remove</button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('apply.coupon') }}" method="POST" class="flex gap-2">
                                @csrf
                                <input type="text" name="coupon_code" placeholder="Coupon code"
                                    class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition text-sm" />
                                <button type="submit"
                                    class="bg-gold hover:bg-[#8b6b3f] text-white px-5 py-2.5 rounded-full transition text-sm font-medium">
                                    Apply
                                </button>
                            </form>
                        @endif
                    </div>

                  
                    <div class="border-t border-gold/20 pt-4 mt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-800">${{ number_format($total / 10000, 2) }}</span>
                        </div>
                        @if(session('coupon_discount'))
                            <div class="flex justify-between text-sm text-green-600">
                                <span>Discount</span>
                                <span>-${{ number_format(session('coupon_discount') / 10000, 2) }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between text-lg font-medium pt-2 border-t border-gold/20">
                            <span class="text-gray-800">Total</span>
                            <span
                                class="text-gray-900">${{ number_format(($total - (session('coupon_discount') ?? 0)) / 10000, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection