@blaze
<?php

use Livewire\Component;

new class extends Component
{
    //
};

?>

<div
    x-data="headerComponent()"
    x-init="init()"
>
    <!-- HEADER -->
    <header
        class="fixed z-50 w-full
               bg-white/5 backdrop-blur-xl
               border-b border-white/10"
    >
        <div class="mx-auto px-5 h-16 flex items-center justify-between">
            
            <!-- LOGO -->
            <div
                class="nav-item text-lg font-bold cursor-pointer
                       text-transparent bg-clip-text
                       bg-gradient-to-r from-cyan-400 to-fuchsia-500"
                @click="go('/')"
            >
                NaatVerse
            </div>

            <!-- DESKTOP NAV -->
            <nav class="hidden md:flex items-center gap-8 text-sm text-gray-300">
                <span class="nav-item cursor-pointer hover:text-white" @click="go('/')">
                    Home
                </span>

                <span class="nav-item cursor-pointer hover:text-white" @click="go('/about')">
                    About
                </span>
            </nav>

            <!-- MOBILE ICON -->
            <div
                class="nav-item md:hidden
                       h-10 w-10 flex items-center justify-center
                       rounded-full bg-white/10 backdrop-blur
                       border border-white/20
                       text-white text-xl cursor-pointer
                       active:scale-95 transition"
                @click="isMenuOpen = !isMenuOpen"
            >
                ☰
            </div>
        </div>
    </header>

    <!-- BACKDROP -->
    <template x-if="isMenuOpen">
        <div
            class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm"
            @click="isMenuOpen = false"
        ></div>
    </template>

    <!-- MOBILE DRAWER -->
    <template x-if="isMenuOpen">
        <div
            class="bottom-sheet fixed z-50
                   left-1/2 -translate-x-1/2
                   top-64 w-[92%] max-w-sm
                   rounded-[32px]
                   bg-[#0B0E14]/10 backdrop-blur-2xl
                   border border-white/15
                   shadow-2xl"
        >
            <div class="flex justify-center pt-3">
                <span class="h-1 w-10 rounded-full bg-white/30"></span>
            </div>

            <div class="px-6 py-6 space-y-5 text-center text-lg text-white">
                <div class="sheet-item" @click="go('/')">Home</div>
                <div class="sheet-item" @click="go('/about')">About</div>
            </div>
        </div>
    </template>
</div>

<script>
function headerComponent() {
    return {
        isMenuOpen: false,

        init() {
            gsap.fromTo(
                '.nav-item',
                { y: -20, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.4,
                    stagger: 0.15,
                    ease: 'expo.out',
                    clearProps: 'transform',
                }
            )

            this.$watch('isMenuOpen', async (open) => {
                await this.$nextTick()

                if (open) {
                    gsap.fromTo(
                        '.bottom-sheet',
                        { y: 200, opacity: 0, scale: 0.96 },
                        { y: 0, opacity: 1, scale: 1, duration: 0.6, ease: 'expo.out' }
                    )

                    gsap.fromTo(
                        '.sheet-item',
                        { y: 20, opacity: 0 },
                        { y: 0, opacity: 1, stagger: 0.1, delay: 0.15 }
                    )

                    gsap.to('body', { overflow: 'hidden' })
                } else {
                    gsap.to('body', { overflow: 'auto' })
                }
            })
        },

        go(path) {
            this.isMenuOpen = false
            window.location.href = path
        }
    }
}
</script>