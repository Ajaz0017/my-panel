<?php

use Livewire\Component;

new class extends Component
{
    public $blogs = [];
    
    public function mount()
    {
        $this->blogs = \App\Models\Blog::latest()->take(5)->get();
    }
};
?>

<x-layouts.naat-verse :title="$title ?? 'Home'">

<div 
    x-data="homePage" 
    x-init="init"
    wire:ignore
    class="relative min-h-screen overflow-hidden bg-[#0B0E14] text-white"
>

    <!-- 🌈 Animated Background -->
    <div class="blob-1 absolute -top-40 -left-40 h-[420px] w-[420px] rounded-full bg-fuchsia-600/30 blur-[160px]"></div>
    <div class="blob-2 absolute bottom-0 -right-40 h-[420px] w-[420px] rounded-full bg-cyan-500/30 blur-[160px]"></div>

    <!-- BLOG LIST -->
    <section class="relative z-10 pt-6 px-4 pb-32 max-w-5xl mx-auto space-y-10">

        @foreach($blogs as $blog)
            <article
                class="card relative rounded-3xl
                       bg-gradient-to-br from-white/10 to-white/5
                       backdrop-blur-xl border border-white/10
                       p-7 transition-all duration-300
                       active:scale-[0.98]"
                wire:navigate
                href="/view/{{ $blog->slug }}"
            >

                <div
                    class="absolute top-0 left-6 h-1 w-20 rounded-full
                           bg-gradient-to-r from-cyan-400 to-fuchsia-500"
                ></div>

                <h2 class="mt-6 text-2xl font-bold leading-snug">
                    {{ $blog->title }}
                </h2>

                <p class="mt-4 text-gray-300 text-base leading-relaxed">
                    {{ $blog->content }}
                </p>

                <div class="mt-6 flex items-center justify-between">
                    <span class="text-xs text-gray-500">
                        {{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}
                    </span>

                    <span class="flex items-center gap-2 text-cyan-400 font-medium">
                        Read
                        <span class="text-lg">→</span>
                    </span>
                </div>

            </article>
        @endforeach

    </section>

</div>

</x-layouts.naat-verse>
@push('scripts')
<script>
document.addEventListener('alpine:init', () => {

    Alpine.data('homePage', () => ({
        
        initialized: false,

        init() {

            if (this.initialized) return
            this.initialized = true

            this.$nextTick(() => {

                if (!window.gsap) return

                gsap.registerPlugin(ScrollTrigger)

                // Remove old triggers
                ScrollTrigger.getAll().forEach(t => t.kill())

                // Clear old animations
                gsap.killTweensOf("*")

                // Card Animation
                const cards = document.querySelectorAll('.card')

                if (cards.length) {
                    gsap.from(cards, {
                        opacity: 0,
                        y: 80,
                        scale: 0.95,
                        duration: 1,
                        stagger: 0.15,
                        ease: 'power4.out',
                        scrollTrigger: {
                            trigger: cards[0],
                            start: 'top 85%',
                        }
                    })
                }

                // Blob Animation Safe Check
                if (document.querySelector('.blob-1')) {
                    gsap.to('.blob-1', {
                        x: 100,
                        y: 70,
                        duration: 18,
                        repeat: -1,
                        yoyo: true,
                        ease: 'sine.inOut'
                    })
                }

                if (document.querySelector('.blob-2')) {
                    gsap.to('.blob-2', {
                        x: -110,
                        y: -90,
                        duration: 20,
                        repeat: -1,
                        yoyo: true,
                        ease: 'sine.inOut'
                    })
                }

            })
        }
    }))
})
</script>
@endpush