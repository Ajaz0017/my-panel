<aside class="hidden lg:flex w-64 flex-col backdrop-blur-xl bg-white/10 border-r border-white/20 max-h-screen sticky top-0">
    <div class="p-6 text-2xl font-bold">Admin</div>

    <nav class="flex-1 px-4 space-y-2">
        <a href="/" class="block px-4 py-3 rounded-xl transition {{ request()->is('/') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            🏠 Dashboard
        </a>
        <a href="/users" class="block px-4 py-3 rounded-xl transition {{ request()->is('users*') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            👥 Users
        </a>
        <a href="/products" class="block px-4 py-3 rounded-xl transition {{ request()->is('products*') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            📦 Products
        </a>
        <a href="/blogs" class="block px-4 py-3 rounded-xl transition {{ request()->is('blogs*') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            📝 Blogs
        </a>
    </nav>

    <!-- <div class="p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                onclick="return confirm('Logout karna hai?')"
                class="w-full py-3 rounded-xl
                       bg-red-500/80 hover:bg-red-600
                       transition font-medium">
                🚪 Logout
            </button>
        </form>
    </div> -->
</aside>