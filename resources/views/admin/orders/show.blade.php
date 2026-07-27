@extends('layouts.admin')

@section('title', 'Order #' . $order->id . ' — Admin')

@section('content')

    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.orders.index') }}" class="text-gray-400 hover:text-gold transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-light text-gray-800">Order #{{ $order->id }}</h1>
        </div>
        <span class="px-4 py-1.5 rounded-full text-xs font-medium
                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $order->status == 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                {{ $order->status == 'shipped' ? 'bg-purple-100 text-purple-800' : '' }}
                {{ $order->status == 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
            {{ ucfirst($order->status) }}
        </span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        
        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-8">
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-4">Order Items</h3>
                <table class="w-full text-left">
                    <thead class="text-gray-500 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="pb-3">Product</th>
                            <th class="pb-3">Price</th>
                            <th class="pb-3">Qty</th>
                            <th class="pb-3 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gold/10">
                        @foreach($order->items as $item)
                            <tr>
                                <td class="py-3 text-gray-800">{{ $item->product_name }}</td>
                                <td class="py-3 text-gray-600">${{ number_format($item->product_price / 10000, 2) }}</td>
                                <td class="py-3 text-gray-600">{{ $item->quantity }}</td>
                                <td class="py-3 text-gray-800 text-right">${{ number_format($item->subtotal / 10000, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right mt-4 pt-4 border-t border-gold/20 text-xl font-light text-gray-800">
                    Total: ${{ number_format($order->total_price / 10000, 2) }}
                </div>
            </div>

            @if($order->notes)
                <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-8">
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-3">Customer Notes</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $order->notes }}</p>
                </div>
            @endif
        </div>

        
        <div class="space-y-6">

            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6">
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-3">Customer</h3>
                <p class="font-medium text-gray-800">{{ $order->customer_name }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $order->customer_email }}</p>
                <p class="text-sm text-gray-500">{{ $order->customer_phone }}</p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6">
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-3">Shipping Address</h3>
                <p class="text-sm text-gray-600 leading-relaxed">{{ $order->shipping_address }}</p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6">
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-3">Update Status</h3>
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PATCH')
                    <select name="status"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold outline-none">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit"
                        class="w-full bg-gold hover:bg-[#8b6b3f] text-white py-3 rounded-full transition text-sm font-medium">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection