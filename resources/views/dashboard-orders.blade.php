@extends('layouts.app')

@section('title', 'My Orders — NOTA.')

@section('content')

    <div class="container mx-auto px-6 py-16">

        <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-8">
            <div>
                <a href="{{ route('dashboard') }}" class="text-sm text-gold hover:underline">← Dashboard</a>
                <h1 class="text-3xl font-light text-gray-800 mt-2">My Orders</h1>
            </div>

            @if($orders->count() > 0)
                <div class="flex flex-wrap gap-2">
                    @php $current = request('status'); @endphp
                    <a href="{{ route('dashboard.orders') }}"
                        class="px-4 py-2 rounded-full text-xs font-medium transition {{ !$current ? 'bg-gold text-white' : 'bg-white border border-gold/30 text-gray-600 hover:bg-gold/10' }}">
                        All
                    </a>
                    @foreach(['pending', 'paid', 'shipped', 'delivered', 'cancelled'] as $status)
                        <a href="{{ route('dashboard.orders', ['status' => $status]) }}"
                            class="px-4 py-2 rounded-full text-xs font-medium transition {{ $current == $status ? 'bg-gold text-white' : 'bg-white border border-gold/30 text-gray-600 hover:bg-gold/10' }}">
                            {{ ucfirst($status) }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        @if($orders->count() > 0)
            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 overflow-hidden">

              
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-[#f5efe8] text-gray-500 text-xs uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Order ID</th>
                                <th class="px-6 py-4">Total</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gold/10">
                            @foreach($orders as $order)
                                <tr class="hover:bg-[#faf8f5] transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-800">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 text-gray-800">${{ number_format($order->total_price / 10000, 2) }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium
                                                        {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                        {{ $order->status == 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                                                        {{ $order->status == 'shipped' ? 'bg-purple-100 text-purple-800' : '' }}
                                                        {{ $order->status == 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                                                        {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $order->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-gold hover:underline text-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                
                <div class="md:hidden divide-y divide-gold/10">
                    @foreach($orders as $order)
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-medium text-gray-800">#{{ $order->id }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $order->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $order->status == 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $order->status == 'shipped' ? 'bg-purple-100 text-purple-800' : '' }}
                                                {{ $order->status == 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span
                                    class="text-sm font-medium text-gray-800">${{ number_format($order->total_price / 10000, 2) }}</span>
                                <a href="#" class="text-gold hover:underline text-sm">View →</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(method_exists($orders, 'links'))
                    <div class="px-6 py-4">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-gold/20">
                <span class="text-6xl">📦</span>
                <h2 class="text-2xl font-light text-gray-600 mt-4">No orders yet</h2>
                <p class="text-gray-400 mt-2">Start shopping to see your orders here.</p>
                <a href="/" class="inline-block mt-6 bg-gold hover:bg-[#8b6b3f] text-white px-8 py-3 rounded-full transition">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>

@endsection