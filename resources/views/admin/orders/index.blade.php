@extends('layouts.admin')

@section('title', 'Orders — Admin')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-light text-gray-800">Orders</h1>
        <p class="text-gray-400 text-sm mt-1">{{ $orders->total() ?? $orders->count() }} orders total</p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gold/20 overflow-hidden">

      
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-[#f5efe8] text-gray-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gold/10">
                    @forelse($orders as $order)
                        <tr class="hover:bg-[#faf8f5] transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-800">#{{ $order->id }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $order->customer_name }}</td>
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
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="text-gold hover:underline text-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center text-gray-400">No orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

      
        <div class="md:hidden divide-y divide-gold/10">
            @forelse($orders as $order)
                <a href="{{ route('admin.orders.show', $order->id) }}" class="block p-5 hover:bg-[#faf8f5] transition-colors">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-medium text-gray-800">#{{ $order->id }}</p>
                            <p class="text-sm text-gray-500 mt-0.5">{{ $order->customer_name }}</p>
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
                    <p class="text-sm font-medium text-gray-800 mt-3">${{ number_format($order->total_price / 10000, 2) }}</p>
                </a>
            @empty
                <div class="p-10 text-center text-gray-400">No orders yet.</div>
            @endforelse
        </div>

        @if(method_exists($orders, 'links'))
            <div class="px-6 py-4 border-t border-gold/10">
                {{ $orders->links() }}
            </div>
        @endif
    </div>

@endsection