<footer class="bg-[#f5efe8] mt-20 pt-16 border-t border-gold/20">
    <div class="container mx-auto px-6">

        
        <div
            class="bg-white rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm mb-16">
            <div class="text-center md:text-left">
                <h3 class="text-2xl font-light text-gray-800">Join the NOTA. circle</h3>
                <p class="text-gray-400 text-sm mt-1">Early access to new scents and members-only offers.</p>
            </div>
            <form class="flex w-full md:w-auto gap-3">
                <input type="email" placeholder="Your email address"
                    class="flex-1 md:w-64 px-5 py-3 rounded-full border border-gold/30 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition text-sm" />
                <button type="submit"
                    class="bg-gold hover:bg-[#8b6b3f] text-white px-6 py-3 rounded-full text-sm font-medium tracking-wide transition-all duration-300 hover:shadow-md shrink-0">
                    Subscribe
                </button>
            </form>
        </div>

        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 pb-14">

            <div class="col-span-2 md:col-span-1">
                <p class="text-2xl font-light tracking-widest text-gray-800">
                    NOTA<span class="text-gold">.</span>
                </p>
                <p class="text-gray-500 text-sm font-light mt-4 leading-relaxed max-w-[220px]">
                    Curated perfumes, organized the way a nose would.
                </p>
               
                <div class="flex gap-3 mt-6">
                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gold/30 flex items-center justify-center text-gray-500 hover:bg-gold hover:text-white hover:border-gold transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12Z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gold/30 flex items-center justify-center text-gray-500 hover:bg-gold hover:text-white hover:border-gold transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069ZM12 0C8.741 0 8.332.014 7.052.072 2.695.272.273 2.69.073 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.69.072 4.948.072 3.259 0 3.669-.014 4.949-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.668-.072-4.948C23.729 2.699 21.306.276 16.951.073 15.669.014 15.259 0 12 0Zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324ZM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881Z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gold/30 flex items-center justify-center text-gray-500 hover:bg-gold hover:text-white hover:border-gold transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231ZM17.083 19.77h1.833L7.084 4.126H5.117Z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-semibold uppercase tracking-widest text-gray-800 mb-4">Shop</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li><a href="{{ route('home') }}" class="hover:text-gold transition">All Products</a></li>
                    @foreach(\App\Models\Category::take(4)->get() as $cat)
                        <li><a href="{{ route('category', $cat->slug) }}"
                                class="hover:text-gold transition">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-semibold uppercase tracking-widest text-gray-800 mb-4">Company</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-gold transition">About Us</a></li>
                    <li><a href="#" class="hover:text-gold transition">Contact</a></li>
                    <li><a href="{{ route('dashboard.orders') }}" class="hover:text-gold transition">Track Order</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-semibold uppercase tracking-widest text-gray-800 mb-4">Support</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-gold transition">Shipping & Returns</a></li>
                    <li><a href="#" class="hover:text-gold transition">FAQ</a></li>
                    <li><a href="#" class="hover:text-gold transition">Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        
        <div
            class="border-t border-gold/20 py-6 flex flex-col md:flex-row justify-between items-center gap-3 text-xs text-gray-400">
            <p>© {{ date('Y') }} — NOTA. Fine Fragrance Curators</p>
            <p>Made with 🤎 by Raha</p>
        </div>
    </div>
</footer>