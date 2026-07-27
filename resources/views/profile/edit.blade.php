@extends('layouts.app')

@section('title', 'Profile — NOTA.')

@section('content')

    <div class="container mx-auto px-6 py-16">

        <div class="max-w-2xl mx-auto">
            <a href="{{ route('dashboard') }}" class="text-sm text-gold hover:underline">← Dashboard</a>

            <div class="bg-white rounded-3xl shadow-sm border border-gold/20 p-8 mt-4">

                <div class="text-center mb-8">
                    <div
                        class="w-16 h-16 rounded-full bg-gold/10 text-gold flex items-center justify-center text-2xl font-medium mx-auto mb-4">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <h1 class="text-3xl font-light text-gray-800">Profile Settings</h1>
                </div>

                @if (session('status') === 'profile-updated')
                    <div
                        class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Profile updated successfully!
                    </div>
                @endif

                <h2 class="text-sm font-semibold uppercase tracking-widest text-gold mb-4">Account Info</h2>
                <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-gold hover:bg-[#8b6b3f] text-white font-medium py-3 rounded-full transition shadow-md">
                        Update Profile
                    </button>
                </form>

                <hr class="my-8 border-gold/20" />

                <h2 class="text-sm font-semibold uppercase tracking-widest text-gold mb-4">Change Password</h2>
                <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current
                            Password</label>
                        <input id="current_password" type="password" name="current_password" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                        @error('current_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New
                            Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                    </div>

                    <button type="submit"
                        class="w-full border border-gold/30 text-gray-700 hover:bg-gold hover:text-white font-medium py-3 rounded-full transition">
                        Change Password
                    </button>
                </form>

                <hr class="my-8 border-gold/20" />

               
                <div class="bg-red-50 border border-red-100 rounded-2xl p-5 text-center">
                    <p class="text-sm text-red-600 font-medium mb-1">Danger Zone</p>
                    <p class="text-xs text-red-400 mb-4">Deleting your account is permanent and cannot be undone.</p>
                    <form method="POST" action="{{ route('profile.destroy') }}"
                        onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium transition">
                            Delete Account
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection