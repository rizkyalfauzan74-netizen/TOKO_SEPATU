<nav class="bg-white shadow-sm mb-6">
    <div class="w-full px-6 py-3 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center gap-8">
            <span class="font-bold text-lg text-blue-600 tracking-wide">
                AstroShoes
            </span>

            <!-- Menu -->
            <div class="flex items-center gap-5 text-sm font-medium">

                <!-- Item -->
                <a href="{{ route('products.index') }}"
                   class="flex items-center gap-1 transition
                   {{ request()->routeIs('products.index')
                        ? 'text-blue-500 border-b-2 border-blue-500 pb-1'
                        : 'text-gray-500 hover:text-blue-500' }}">
                    <span class="material-icons text-base">
                        inventory_2
                    </span>
                    Item
                </a>

                <!-- Transaksi -->
                <a href="#"
                   class="flex items-center gap-1 text-gray-500 hover:text-blue-500 transition">
                    <span class="material-icons text-base">
                        receipt_long
                    </span>
                    Transaksi
                </a>

            </div>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                    class="flex items-center gap-1 text-gray-500 hover:text-red-500 transition">
                <span class="material-icons text-base">
                    logout
                </span>
                Keluar
            </button>
        </form>

    </div>
</nav>