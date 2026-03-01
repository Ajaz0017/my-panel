<nav class="fixed bottom-0 left-0 right-0 z-50 lg:hidden backdrop-blur-xl bg-white/10 border-t border-white/20">
    <div class="grid grid-cols-5 text-center text-xs relative">

        {{-- Dashboard --}}
        <a href="/admin"
           class="py-3 transition {{ request()->is('admin') ? 'text-blue-400 font-semibold' : 'opacity-70 hover:opacity-100' }}">
            🏠<br>Dashboard
        </a>

        {{-- Users --}}
        <a href="/admin/blogs"
           class="py-3 transition {{ request()->is('admin/blogs*') ? 'text-blue-400 font-semibold' : 'opacity-70 hover:opacity-100' }}">
            📝<br>Blogs
        </a>

        <button id="plusBtn" class="flex justify-center items-center">
            <div class="backdrop-blur-xl bg-white/10 border border-white/20 
                        rounded-full w-12.5 h-12.5 flex items-center justify-center 
                        text-white text-2xl shadow-lg active:scale-95 transition">
                ➕
            </div>
        </button>

        {{-- Products --}}
        <a href="/admin/users"
           class="py-3 transition {{ request()->is('admin/users*') ? 'text-blue-400 font-semibold' : 'opacity-70 hover:opacity-100' }}">
            👥<br>Users
        </a>

        {{-- More Button --}}
        <button id="moreBtn"
            class="py-3 opacity-70 hover:opacity-100 transition flex flex-row items-end justify-center">
            ☰<br>
            More
        </button>

        {{-- Modern More Menu --}}
        <div id="moreMenu" class="invisible opacity-0 scale-95 pointer-events-none absolute bottom-0 flex justify-end items-end w-full h-screen z-50 transition-all duration-200 ease-out bg-black/40 backdrop-blur-sm">
            <div id="moreOverlay"
                class="absolute inset-0 bg-black/30 backdrop-blur-md">
            </div>
            <div class="relative w-fit rounded-3xl backdrop-blur-3xl bottom-24 right-4">

                {{-- Glass Card --}}
                <div class="rounded-3xl bg-white/20 backdrop-blur-3xl border border-white/30 shadow-[0_10px_40px_rgba(0,0,0,0.35)] overflow-hidden">

                    {{-- Gradient Overlay Layer --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-white/5 to-transparent pointer-events-none rounded-3xl"></div>
                    <div class="relative">

                        <div class="px-4 pt-1 text-[11px] uppercase tracking-widest 
                                    text-white/50 border-b border-white/10">
                            More
                        </div>

                        <a href="/admin/products"
                        class="flex flex-col items-center gap-3 px-3 py-2 text-sm
                                hover:bg-white/20 transition-all duration-150
                                group {{ request()->is('admin/products*') ? 'text-blue-400 font-semibold' : 'text-white' }}">
                            <p class="text-lg group-hover:scale-110 transition h-15 w-15 bg-red-500/20 rounded-full flex items-center justify-center"><span class="font-bold text-3xl"><span>📦</span></p>
                            <p class="text-xs font-bold">Products</p>
                        </a>

                        <a href="/admin/naat-khawans"
                        class="flex flex-col items-center gap-3 px-3 py-3 text-sm
                                hover:bg-white/20 transition-all duration-150
                                group {{ request()->is('admin/naat-khawans*') ? 'text-blue-400 font-semibold' : 'text-white' }}">
                            <p class="text-lg group-hover:scale-110 transition h-15 w-15 bg-red-500/20 rounded-full flex items-center justify-center"><span class="font-bold text-3xl">🎤</span></p>
                            <p class="text-xs font-bold">Naat Khawans</p>
                        </a>

                        <a href="https://naatverse.com"
                        class="flex flex-col items-center gap-3 px-3 py-3 text-sm
                                hover:bg-white/20 transition-all duration-150
                                group {{ request()->is('admin/naat-khawans*') ? 'text-blue-400 font-semibold' : 'text-white' }}">
                            <p class="text-lg group-hover:scale-110 transition h-15 w-15 bg-red-500/20 rounded-full flex items-center justify-center"><span class="font-bold text-xl">NV</span></p>
                            <p class="text-xs font-bold">Naat Verse</p>
                        </a>

                    </div>
                </div>

                {{-- Arrow --}}
                <div class="absolute -bottom-2 right-8 w-4 h-4
                            bg-white/20 backdrop-blur-3xl
                            border-r border-b border-white/30
                            rotate-45 shadow-md">
                </div>

            </div>
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
    const overlayMore = document.getElementById("moreOverlay");

    if (!btn || !menu) return;

    function openMenu() {
        menu.classList.remove("invisible", "opacity-0", "scale-95", "pointer-events-none");
        menu.classList.add("opacity-100", "scale-100");
    }

    function closeMenu() {
        menu.classList.add("opacity-0", "scale-95", "pointer-events-none");
        menu.classList.remove("opacity-100", "scale-100");

        setTimeout(() => {
            menu.classList.add("invisible");
        }, 200);
    }

    btn.addEventListener("click", function (e) {
        e.stopPropagation();
        menu.classList.contains("opacity-100") ? closeMenu() : openMenu();
    });

    document.addEventListener("click", function (e) {
        if (!menu.contains(e.target) && !btn.contains(e.target)) {
            closeMenu();
        }
    });

    overlayMore.addEventListener("click", closeMenu);

    menu.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", closeMenu);
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