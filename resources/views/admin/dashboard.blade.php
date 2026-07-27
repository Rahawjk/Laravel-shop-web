@extends('layouts.admin')

@section('title', 'Dashboard — Admin')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-light text-gray-800">Welcome back, {{ auth()->user()->name }}</h1>
        <p class="text-gray-400 text-sm mt-1">Here's what's happening with your store today.</p>
    </div>

   
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6">
            <div class="flex items-center justify-between">
                <span class="w-11 h-11 rounded-2xl bg-gold/10 text-gold flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.625c.621 0 1.125.504 1.125 1.125V6h-.75a.75.75 0 0 1-.75-.75V4.5M3.75 4.5h15M3.75 4.5v11.25m15-11.25v11.25" />
                    </svg>
                </span>
            </div>
            <p class="text-3xl font-light text-gray-800 mt-4">${{ number_format($totalSales / 10000, 2) }}</p>
            <p class="text-sm text-gray-400 mt-1">Total Sales</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6">
            <span class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                </svg>
            </span>
            <p class="text-3xl font-light text-gray-800 mt-4">{{ $totalOrders }}</p>
            <p class="text-sm text-gray-400 mt-1">Total Orders</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6">
            <span class="w-11 h-11 rounded-2xl bg-yellow-50 text-yellow-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </span>
            <p class="text-3xl font-light text-gray-800 mt-4">{{ $pendingOrders }}</p>
            <p class="text-sm text-gray-400 mt-1">Pending Orders</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6">
            <span class="w-11 h-11 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
            </span>
            <p class="text-3xl font-light text-gray-800 mt-4">{{ $totalProducts }}</p>
            <p class="text-sm text-gray-400 mt-1">Total Products</p>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('admin.orders.index') }}"
            class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6 flex items-center justify-between hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
            <div>
                <h3 class="font-medium text-gray-800">Manage Orders</h3>
                <p class="text-sm text-gray-400 mt-1">View and update order statuses</p>
            </div>
            <span class="text-gold text-xl">→</span>
        </a>
        <a href="{{ route('admin.products.index') }}"
            class="bg-white rounded-3xl shadow-sm border border-gold/20 p-6 flex items-center justify-between hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
            <div>
                <h3 class="font-medium text-gray-800">Manage Products</h3>
                <p class="text-sm text-gray-400 mt-1">Add, edit, or remove products</p>
            </div>
            <span class="text-gold text-xl">→</span>
        </a>
    </div>

@endsection