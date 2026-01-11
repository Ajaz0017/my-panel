<header class="sticky top-0 z-40 backdrop-blur-xl bg-white/10 border-b border-white/20">
    <div class="px-4 py-2 md:py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">{{ $pageTitle }}</h1>

        <div class="relative">
            <!-- Avatar -->
            <button
                id="userMenuBtn"
                class="w-10 h-10 rounded-full bg-blue-600
                       flex items-center justify-center font-bold
                       focus:outline-none cursor-pointer">
                {{ strtoupper(auth()->user()->name[0]) }}
            </button>

            <!-- Dropdown -->
            <div
                id="userMenu"
                class="hidden absolute right-0 mt-3 w-52
                       rounded-2xl bg-[#1f1f2e]
                       border border-white/20 shadow-2xl
                       overflow-hidden">

                <!-- USER INFO -->
                <div class="px-4 py-3 border-b border-white/10">
                    <p class="text-sm font-semibold">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs opacity-60 break-all">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <!-- ACTIONS -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="w-full text-left px-4 py-3
                               text-sm hover:bg-red-500/20
                               transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
<script>
    const btn = document.getElementById('userMenuBtn');
    const menu = document.getElementById('userMenu');

    btn?.addEventListener('click', (e) => {
        e.stopPropagation();
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', () => {
        menu.classList.add('hidden');
    });
</script>

