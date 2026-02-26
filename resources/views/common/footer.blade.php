<!-- <footer style="background:#222;color:white;padding:15px;text-align:center">
    <p>© {{ date('Y') }} My Laravel App</p>
</footer> -->
<nav class="fixed bottom-0 left-0 right-0 z-50 lg:hidden backdrop-blur-xl bg-white/10 border-t border-white/20">
    <div class="grid grid-cols-4 text-center text-xs">
        <a href="/admin" class="py-3 {{ request()->is('admin') ? 'text-blue-400 font-semibold' : 'opacity-70' }}">🏠<br>Dashboard</a>
        <a href="/admin/users" class="py-3 {{ request()->is('admin/users*') ? 'text-blue-400 font-semibold' : 'opacity-70' }}">👥<br>Users</a>
        <a href="/admin/products" class="py-3 {{ request()->is('admin/products*') ? 'text-blue-400 font-semibold' : 'opacity-70' }}">📦<br>Products</a>
        <a href="/admin/blogs" class="py-3 {{ request()->is('admin/blogs*') ? 'text-blue-400 font-semibold' : 'opacity-70' }}">📝<br>Blogs</a>
    </div>
</nav>