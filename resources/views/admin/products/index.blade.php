@extends('layouts.admin')

@section('title', 'Products — Admin')

@section('content')

    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-light text-gray-800">Products</h1>
            <p class="text-gray-400 text-sm mt-1">{{ $products->total() ?? $products->count() }} products in your catalog
            </p>
        </div>
        <a href="{{ route('admin.products.create') }}"
            class="inline-flex items-center gap-2 bg-gold hover:bg-[#8b6b3f] text-white px-6 py-3 rounded-full text-sm font-medium transition-all duration-300 shadow-md hover:shadow-lg w-fit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            New Product
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gold/20 overflow-hidden">


        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-[#f5efe8] text-gray-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Stock</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gold/10">
                    @forelse($products as $product)
                        <tr class="hover:bg-[#faf8f5] transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-br from-[#f5efe8] to-[#e8ddd0] rounded-xl flex items-center justify-center shrink-0">
                                        <span class="text-lg">🧴</span>
                                    </div>
                                    <span class="font-medium text-gray-800">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 text-gray-800">${{ number_format($product->price / 10000, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="{{ $product->stock <= 5 ? 'text-red-500 font-medium' : 'text-gray-600' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-3 justify-end">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="text-gold hover:underline text-sm">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center text-gray-400">
                                No products yet. <a href="{{ route('admin.products.create') }}"
                                    class="text-gold hover:underline">Add your first one →</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <div class="md:hidden divide-y divide-gold/10">
            @forelse($products as $product)
                <div class="p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-[#f5efe8] to-[#e8ddd0] rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover" />
                            @else
                                <span class="text-lg">🧴</span>
                            @endif
                        </div>
                        <div class="min-w-0">
                            <p class="font-medium text-gray-800 truncate">{{ $product->name }}</p>
                            <p class="text-xs text-gray-400">{{ $product->category->name }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-800">${{ number_format($product->price / 10000, 2) }}</span>
                        <span class="{{ $product->stock <= 5 ? 'text-red-500' : 'text-gray-500' }}">Stock:
                            {{ $product->stock }}</span>
                        <span
                            class="px-2.5 py-1 rounded-full text-xs font-medium {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="flex gap-4 mt-3 pt-3 border-t border-gold/10">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-gold text-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-10 text-center text-gray-400">No products yet.</div>
            @endforelse
        </div>

        @if(method_exists($products, 'links'))
            <div class="px-6 py-4 border-t border-gold/10">
                {{ $products->links() }}
            </div>
        @endif
    </div>

@endsection