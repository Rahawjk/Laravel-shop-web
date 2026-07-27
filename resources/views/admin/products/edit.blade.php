@extends('layouts.admin')

@section('title', 'Edit Product — Admin')

@section('content')

    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:text-gold transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"
                class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        <h1 class="text-3xl font-light text-gray-800">Edit Product</h1>
    </div>F

    <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-8 max-w-2xl">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Category</label>
                <select name="category_id"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Product Image</label>

                @if($product->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-24 h-24 object-cover rounded-xl border border-gold/20" />
                    </div>
                @endif

                <input type="file" name="image" accept="image/*"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-gold/10 file:text-gold file:text-sm file:font-medium hover:file:bg-gold/20" />
                <p class="text-xs text-gray-400 mt-1">Leave empty to keep the current image.</p>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                    required />
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $product->slug) }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                    required />
                @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                    required>{{ old('description', $product->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Price (in IRR)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                        required />
                    @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition"
                        required />
                    @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            @if(isset($product->is_active))
                <div class="flex items-center gap-3 bg-[#faf8f5] rounded-xl px-4 py-3">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $product->is_active)) class="rounded border-gray-300 text-gold focus:ring-gold" />
                    <label for="is_active" class="text-sm text-gray-600">Product is active and visible in the store</label>
                </div>
            @endif

            <div class="flex gap-3 pt-2">
                <a href="{{ route('admin.products.index') }}"
                    class="flex-1 text-center border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium py-3 rounded-full transition">
                    Cancel
                </a>
                <button type="submit"
                    class="flex-1 bg-gold hover:bg-[#8b6b3f] text-white font-medium py-3 rounded-full transition shadow-md">
                    Update Product
                </button>
            </div>
        </form>
    </div>

@endsection