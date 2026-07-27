@extends('layouts.app')

@section('title', 'Dashboard — NOTA.')

@section('content')

    <div class="container mx-auto px-6 py-16">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-8 text-center">
                <div
                    class="w-16 h-16 rounded-full bg-gold/10 text-gold flex items-center justify-center text-2xl font-medium mx-auto mb-4">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <h1 class="text-3xl font-light text-gray-800 mb-2">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-gray-400 text-sm">You are logged in to your account.</p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('cart.index') }}"
                        class="bg-[#f5efe8] hover:bg-gold hover:text-white p-6 rounded-2xl transition-all duration-300 hover:-translate-y-0.5">
                        <span class="text-2xl">🛒</span>
                        <p class="mt-2 text-sm font-medium">View Cart</p>
                    </a>
                    <a href="{{ route('dashboard.orders') }}"
                        class="bg-[#f5efe8] hover:bg-gold hover:text-white p-6 rounded-2xl transition-all duration-300 hover:-translate-y-0.5">
                        <span class="text-2xl">📦</span>
                        <p class="mt-2 text-sm font-medium">My Orders</p>
                    </a>
                    <a href="{{ route('profile.edit') }}"
                        class="bg-[#f5efe8] hover:bg-gold hover:text-white p-6 rounded-2xl transition-all duration-300 hover:-translate-y-0.5">
                        <span class="text-2xl">👤</span>
                        <p class="mt-2 text-sm font-medium">Edit Profile</p>
                    </a>
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}"
                            class="bg-[#f5efe8] hover:bg-gold hover:text-white p-6 rounded-2xl transition-all duration-300 hover:-translate-y-0.5">
                            <span class="text-2xl">⚙️</span>
                            <p class="mt-2 text-sm font-medium">Admin Panel</p>
                        </a>
                    @endif
                </div>
            </div>

            
            @if(isset($recentOrders) && $recentOrders->count())
                <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-8 mt-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-light text-gray-800">Recent Orders</h2>
                        <a href="{{ route('dashboard.orders') }}" class="text-sm text-gold hover:underline">View all →</a>
                    </div>
                    <div class="space-y-3">
                        @foreach($recentOrders as $order)
                            <div class="flex justify-between items-center px-4 py-3 rounded-xl bg-[#faf8f5]">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">#{{ $order->id }}</p>
                                    <p class="text-xs text-gray-400">{{ $order->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $order->status == 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $order->status == 'shipped' ? 'bg-purple-100 text-purple-800' : '' }}
                                                {{ $order->status == 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                <span
                                    class="text-sm font-medium text-gray-800">${{ number_format($order->total_price / 10000, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="text-center mt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 transition">
                        🚪 Logout
                    </button>
                </form>
            </div>

        </div>
    </div>

@endsection