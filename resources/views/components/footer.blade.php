{{-- ================= FOOTER START ================= --}} {{-- ✅ added --}}

<footer
    class="relative z-10
           bg-white/5 backdrop-blur-xl
           border-t border-white/10"
>
    <div class="max-w-6xl mx-auto px-6 py-6 md:py-10">

        <!-- LOGO -->
        <div class="text-center mb-8">
            <h2 class="text-xl font-bold
                       text-transparent bg-clip-text
                       bg-gradient-to-r from-cyan-400 to-fuchsia-500">
                NaatVerse
            </h2>
            <p class="mt-3 text-sm text-gray-400 max-w-md mx-auto">
                Discover beautiful Naat, soulful writings and inspiring voices.
            </p>
        </div>

        <!-- LINKS -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-6 text-sm text-gray-300">

            <a wire:navigate
               href="/"
               class="hover:text-white transition">
                Home
            </a>

            <a wire:navigate
               href="/about"
               class="hover:text-white transition">
                About
            </a>

            <!-- <a wire:navigate
               href="/contact"
               class="hover:text-white transition">
                Contact
            </a> -->

        </div>

        <!-- DIVIDER -->
        <div class="mt-10 border-t border-white/10 pt-6 text-center text-xs text-gray-500">
            © {{ date('Y') }} NaatVerse. All rights reserved.
        </div>

    </div>

    <!-- Soft Glow Background Effect -->
    <div class="absolute -top-20 left-1/2 -translate-x-1/2
                h-40 w-80 rounded-full
                bg-cyan-500/10 blur-[120px] pointer-events-none">
    </div>

</footer>