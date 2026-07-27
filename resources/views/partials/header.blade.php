<header x-data="{ mobileOpen: false, scrolled: false }" @scroll.window="scrolled = (window.scrollY > 10)"
    class="sticky top-0 z-50 transition-shadow duration-300" :class="scrolled ? 'shadow-md' : 'shadow-none'">

   
    <div class="bg-[#3d2f22] text-white text-center py-2 text-[11px] tracking-widest uppercase overflow-hidden">
        <p>✨ Free shipping on orders over $50 &nbsp;·&nbsp; New scents added weekly</p>
    </div>

    <div class="bg-white/90 backdrop-blur-md border-b border-gold/20">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

           
            <a href="{{ route('home') }}"
                class="relative text-3xl font-light tracking-widest text-gray-800 shrink-0 group">
                NOTA<span class="logo-dot relative">
                    .
                    <span class="absolute -top-1 right-0 w-1.5 h-1.5 rounded-full bg-gold animate-ping-slow"></span>
                </span>
            </a>

           
            <nav class="hidden lg:flex items-center gap-1 text-sm font-light uppercase tracking-wider text-gray-600">
                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded-full hover:bg-gold/10 hover:text-gold transition-all duration-300">
                    All
                </a>
                @foreach(\App\Models\Category::all() as $cat)
                    <a href="{{ route('category', $cat->slug) }}"
                        class="px-4 py-2 rounded-full hover:bg-gold/10 hover:text-gold transition-all duration-300">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </nav>

            
            <div class="flex items-center gap-4 text-gray-600">

                
                <form action="{{ route('search') }}" method="GET" class="relative hidden md:block group">
                    <input type="text" name="q" placeholder="Search..."
                        class="w-36 focus:w-64 lg:w-48 lg:focus:w-72 px-4 py-2 rounded-full border border-gold/30 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition-all duration-300 ease-out text-sm bg-white/80"
                        value="{{ request('q') }}" />
                    <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-gold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>

                
                <a href="{{ route('cart.index') }}"
                    class="hover:text-gold transition-all duration-300 hover:scale-110 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 5.025a1.5 1.5 0 0 1-1.482 1.818H7.213a1.5 1.5 0 0 1-1.482-1.818l1.263-5.025a1.5 1.5 0 0 1 1.482-1.182h11.224a1.5 1.5 0 0 1 1.482 1.182Z" />
                    </svg>
                    <span
                        class="absolute -top-2 -right-3 bg-gold text-white text-[10px] rounded-full px-2 py-0.5 min-w-[20px] text-center">
                        {{ $cartCount ?? 0 }}
                    </span>
                </a>

              
                <div class="hidden md:block">
                    @auth
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" @click.away="open = false"
                                class="flex items-center gap-2 hover:text-gold transition cursor-pointer focus:outline-none">
                                <span
                                    class="w-8 h-8 rounded-full bg-gradient-to-br from-gold to-[#8b6b3f] text-white flex items-center justify-center text-xs font-medium shadow-sm">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 h-4 transition-transform duration-200"
                                    :class="{ 'rotate-180': open }">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter.duration.200ms x-transition:leave.duration.150ms
                                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gold/10 py-2 z-50">
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gold/10 transition">Dashboard</a>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gold/10 transition">Profile</a>
                                <hr class="my-1 border-gold/10" />
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50 transition">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-3">
                            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-gold transition">Login</a>
                            <a href="{{ route('register') }}"
                                class="text-sm font-medium bg-gold text-white px-4 py-2 rounded-full hover:bg-[#8b6b3f] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>

                
                <button @click="mobileOpen = !mobileOpen"
                    class="lg:hidden relative w-8 h-8 flex flex-col items-center justify-center gap-1.5">
                    <span class="w-6 h-px bg-gray-700 transition-all duration-300"
                        :class="mobileOpen && 'rotate-45 translate-y-[7px]'"></span>
                    <span class="w-6 h-px bg-gray-700 transition-all duration-300"
                        :class="mobileOpen && 'opacity-0'"></span>
                    <span class="w-6 h-px bg-gray-700 transition-all duration-300"
                        :class="mobileOpen && '-rotate-45 -translate-y-[7px]'"></span>
                </button>
            </div>
        </div>

        
        <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="lg:hidden border-t border-gold/20 bg-white px-6 py-6 space-y-6"
            style="display: none;">

            <form action="{{ route('search') }}" method="GET" class="relative">
                <input type="text" name="q" placeholder="Search..."
                    class="w-full px-4 py-3 rounded-full border border-gold/30 focus:border-gold outline-none transition text-sm bg-[#faf8f5]"
                    value="{{ request('q') }}" />
                <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </form>

            <div class="flex flex-col divide-y divide-gold/10 text-sm uppercase tracking-wider text-gray-600">
                <a href="{{ route('home') }}" class="py-3 hover:text-gold transition">All</a>
                @foreach(\App\Models\Category::all() as $cat)
                    <a href="{{ route('category', $cat->slug) }}"
                        class="py-3 hover:text-gold transition">{{ $cat->name }}</a>
                @endforeach
            </div>

            <div class="pt-4 border-t border-gold/20">
                @auth
                    <div class="flex items-center gap-3 mb-4">
                        <span
                            class="w-9 h-9 rounded-full bg-gradient-to-br from-gold to-[#8b6b3f] text-white flex items-center justify-center text-xs font-medium">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>
                        <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="flex flex-col gap-2 text-sm">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gold transition">Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-gold transition">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-red-500 hover:text-red-700 transition text-left">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="flex gap-3">
                        <a href="{{ route('login') }}"
                            class="flex-1 text-center border border-gold/30 text-gray-700 py-3 rounded-full text-sm font-medium hover:bg-gold/10 transition">Login</a>
                        <a href="{{ route('register') }}"
                            class="flex-1 text-center bg-gold text-white py-3 rounded-full text-sm font-medium hover:bg-[#8b6b3f] transition">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>