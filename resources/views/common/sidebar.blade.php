<aside class="hidden lg:flex w-64 flex-col backdrop-blur-xl bg-white/10 border-r border-white/20 max-h-screen sticky top-0">
    <div class="p-6 text-2xl font-bold">Admin</div>

    <nav class="flex-1 px-4 space-y-2">
        <a href="/admin" class="block px-4 py-3 rounded-xl transition {{ request()->is('admin') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            🏠 Dashboard
        </a>
        <a href="/admin/users" class="block px-4 py-3 rounded-xl transition {{ request()->is('admin/users*') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            👥 Users
        </a>
        <a href="/admin/products" class="block px-4 py-3 rounded-xl transition {{ request()->is('admin/products*') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            📦 Products
        </a>
        <a href="/admin/blogs" class="block px-4 py-3 rounded-xl transition {{ request()->is('admin/blogs*') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">
            📝 Blogs
        </a>
        <a href="/admin/naat-khawans" class="block px-4 py-3 rounded-xl transition {{ request()->is('admin/naat-khawans*') ? 'bg-blue-600 shadow' : 'hover:bg-white/10' }}">🎤 Naat Khawans< /a>
    </nav>

    <div class="p-4">
            <a
                href="https://naatverse.com"
                class="w-full block text-center py-3 rounded-xl
                       bg-purple-600/30 hover:bg-purple-600/50
                       transition font-medium">
                Naat Verse
            </a>
    </div>
</aside>