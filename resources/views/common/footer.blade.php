<nav class="fixed bottom-0 left-0 right-0 z-50 lg:hidden backdrop-blur-xl bg-white/10 border-t border-white/20">
    <div class="grid grid-cols-5 text-center text-xs relative">

        {{-- Dashboard --}}
        <a href="/admin"
           class="py-3 transition {{ request()->is('admin') ? 'text-blue-400 font-semibold' : 'opacity-70 hover:opacity-100' }}">
            🏠<br>Dashboard
        </a>

        {{-- Users --}}
        <a href="/admin/users"
           class="py-3 transition {{ request()->is('admin/users*') ? 'text-blue-400 font-semibold' : 'opacity-70 hover:opacity-100' }}">
            👥<br>Users
        </a>

        <button id="plusBtn" class="flex justify-center items-center">
            <div class="backdrop-blur-xl bg-white/10 border border-white/20 
                        rounded-full w-14 h-14 flex items-center justify-center 
                        text-white text-2xl shadow-lg active:scale-95 transition">
                ➕
            </div>
        </button>

        {{-- Products --}}
        <a href="/admin/products"
           class="py-3 transition {{ request()->is('admin/products*') ? 'text-blue-400 font-semibold' : 'opacity-70 hover:opacity-100' }}">
            📦<br>Products
        </a>

        {{-- More Button --}}
        <button id="moreBtn"
            class="py-3 opacity-70 hover:opacity-100 transition flex flex-row items-end justify-center">
            <div class="rotate-90 font-bold text-xl order-2">⋯</div>
            More
        </button>

        {{-- Popup Menu --}}
        <div id="moreMenu"
            class="hidden absolute bottom-16 right-3 w-44 rounded-2xl backdrop-blur-xl 
                   bg-white/20 border border-white/30 shadow-xl overflow-hidden">

            <a href="/admin/blogs"
               class="block px-4 py-3 text-sm hover:bg-white/20 transition 
               {{ request()->is('admin/blogs*') ? 'text-blue-400 font-semibold' : '' }}">
                📝 Blogs
            </a>

            <a href="/admin/naat-khawans"
               class="block px-4 py-3 text-sm hover:bg-white/20 transition 
               {{ request()->is('admin/naat-khawans*') ? 'text-blue-400 font-semibold' : '' }}">
                🎤 Naat Khawans
            </a>
        </div>

    </div>
</nav>

{{-- Quick Action Modal --}}
<div id="quickModal"
     class="fixed inset-0 z-50 hidden">

    {{-- Overlay --}}
    <div id="modalOverlay"
         class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

    {{-- Bottom Sheet --}}
    <div id="modalContent"
         class="absolute bottom-0 left-0 right-0 
                bg-white/10 backdrop-blur-xl border-t border-white/20
                rounded-t-3xl p-6 h-1/3 
                transform translate-y-full transition-transform duration-300">

        <section>
            <h2 class="text-sm font-semibold mb-4 text-white">Quick Actions</h2>

            <div class="grid grid-cols-2 gap-4">
                <a href="/admin/users/create"
                   class="py-4 text-center rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    ➕ Add User
                </a>

                <a href="/admin/products/create"
                   class="py-4 text-center rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    ➕ Add Product
                </a>

                <a href="/admin/blogs/create"
                   class="py-4 text-center rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    ➕ Add Blog
                </a>

                <a href="/admin/naat-khawans/create"
                   class="py-4 text-center rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                   ➕ Add Naat Khawan
                </a>
            </div>
        </section>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("moreBtn");
    const menu = document.getElementById("moreMenu");

    if (!btn || !menu) return;

    // Toggle Menu
    btn.addEventListener("click", function (e) {
        e.stopPropagation();
        menu.classList.toggle("hidden");
    });

    // Outside Click Close
    document.addEventListener("click", function (e) {
        if (!menu.contains(e.target) && !btn.contains(e.target)) {
            menu.classList.add("hidden");
        }
    });

    // Close on Link Click
    menu.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function () {
            menu.classList.add("hidden");
        });
    });

    const plusBtn = document.getElementById("plusBtn");
    const modal = document.getElementById("quickModal");
    const modalContent = document.getElementById("modalContent");
    const overlay = document.getElementById("modalOverlay");

    if (!plusBtn || !modal) return;

    // Open Modal
    plusBtn.addEventListener("click", function () {
        modal.classList.remove("hidden");
        setTimeout(() => {
            modalContent.classList.remove("translate-y-full");
        }, 10);
    });

    // Close Modal
    function closeModal() {
        modalContent.classList.add("translate-y-full");
        setTimeout(() => {
            modal.classList.add("hidden");
        }, 300);
    }

    // Overlay click close
    overlay.addEventListener("click", closeModal);

    // Close on link click
    modal.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", closeModal);
    });
});
</script>