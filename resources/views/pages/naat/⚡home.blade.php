<?php

use Livewire\Component;
use App\Models\Blog;
use App\Models\NaatKhawan;

new class extends Component
{
    public $blogs = [];
    public $authors;
    
    public function mount()
    {
        $this->blogs = Blog::with('naatKhawan')
            ->latest()
            ->limit(10)
            ->get();

        $this->authors = NaatKhawan::where('is_active', 1)
            ->orderBy('name')
            ->get();
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
{{-- ✅ AUTHORS STORY STRIP --}}
    <section class="relative z-10 pt-3 px-4">

        <div class="flex gap-x-5 overflow-x-auto no-scrollbar">

            @foreach ($authors as $author)
                <a href="{{ url('/author/'.$author->id) }}" {{-- ✅ author page link --}}
                class="flex flex-col items-center w-20 group">

                    {{-- PROFILE IMAGE --}}
                    <div class="relative">
                        <div class="w-16 h-16 rounded-full
                                    p-[3px]
                                    bg-gradient-to-tr from-fuchsia-500 via-cyan-400 to-blue-500
                                    group-hover:scale-105 transition">

                            <img src="{{ asset('storage/'.$author->profile_image) }}" {{-- ✅ profile image --}}
                                alt="{{ $author->name }}"
                                class="w-full h-full rounded-full object-cover border-2 border-[#0B0E14]">
                        </div>
                    </div>

                    {{-- NAME --}}
                    <p class="mt-2 w-full text-xs text-center text-wrap text-gray-300 group-hover:text-white transition">
                        {{ $author->name }}
                    </p>

                </a>
            @endforeach

        </div>

    </section>
    <!-- 🌈 Animated Background -->
    <div class="blob-1 absolute -top-40 -left-40 h-[420px] w-[420px] rounded-full bg-fuchsia-600/30 blur-[160px]"></div>
    <div class="blob-2 absolute bottom-0 -right-40 h-[420px] w-[420px] rounded-full bg-cyan-500/30 blur-[160px]"></div>

    <!-- BLOG LIST -->
    <section class="relative z-10 pt-4 px-4 pb-32 max-w-5xl mx-auto space-y-10">

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

                <p class="mt-4 text-gray-300 text-base leading-relaxed max-h-14 overflow-hidden">
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
<style>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
@endpush