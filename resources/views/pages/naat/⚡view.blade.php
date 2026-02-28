<?php

use Livewire\Component;
use App\Models\Blog;

new class extends Component
{
    public $slug;
    public $naat;
    public $related = [];
    public bool $readingMode = false;

    public function mount($slug)
    {
        $this->slug = $slug;

        $this->naat = Blog::with('naatKhawan')
            ->where('slug', $slug)
            ->firstOrFail();

        $this->related = Blog::with('naatKhawan')
            ->where('id', '!=', $this->naat->id)
            ->where('naat_khawan_id', $this->naat->naat_khawan_id)
            ->limit(3)
            ->get();
    }

    public function toggleReadingMode()
    {
        $this->readingMode = ! $this->readingMode;
    }
};
?>
<x-layouts.naat-verse :title="$naat->title">
<div
    id="viewPage"
    class="relative min-h-screen overflow-x-hidden transition-all duration-700
           {{ $readingMode ? 'bg-black text-gray-100' : 'bg-[#0B0E14] text-white' }}"
>

    {{-- Background Blobs --}}
    <div class="blob-1 fixed -top-40 -left-40 h-[420px] w-[420px]
                rounded-full bg-fuchsia-600/30 blur-[160px]
                transition-opacity duration-700
                {{ $readingMode ? 'opacity-10' : 'opacity-100' }}">
    </div>

    <div class="blob-2 fixed bottom-0 -right-40 h-[420px] w-[420px]
                rounded-full bg-cyan-500/30 blur-[160px]
                transition-opacity duration-700
                {{ $readingMode ? 'opacity-10' : 'opacity-100' }}">
    </div>

    {{-- HERO --}}
    <section class="hero relative z-10 px-5 text-center max-w-3xl mx-auto transition-all duration-700
                    {{ $readingMode ? 'pt-16' : 'pt-5 md:mt-12' }}">

        <h1 class="text-3xl sm:text-5xl font-extrabold leading-tight">
            {{ $naat->title }}
        </h1>

        <div class="mt-4 flex flex-wrap justify-center gap-4 text-sm text-gray-400">
            <span>🎙 {{ $naat->naatKhawan->name }}</span>
            <!-- <span class="opacity-50">⏱ {{ $naat->duration }}</span> -->
        </div>
    </section>

    {{-- LYRICS --}}
    <section class="lyrics relative z-10 mt-6 md:mt-16 max-w-3xl mx-auto px-5 space-y-6">
        @foreach (explode("\r\n\r\n\r\n", $naat->content) as $line)
            <div class="sher rounded-2xl border transition-all duration-700 text-center
                {{ $readingMode
                    ? 'bg-transparent border-transparent text-2xl leading-[2.6] py-6'
                    : 'bg-white/5 backdrop-blur-xl border-white/10 px-6 py-5 text-lg sm:text-xl leading-relaxed'
                }}">
                {{ $line }}
            </div>
        @endforeach
    </section>

    {{-- RELATED --}}
    @if (!$readingMode && count($related))
        <section class="related relative z-10 mt-16 md:mt-24 max-w-4xl mx-auto px-5 pb-32">

            <h3 class="text-xl font-semibold mb-6 text-gray-300">
                More by {{ $naat->naatKhawan->name }}
            </h3>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach ($related as $item)
                    <a href="{{ url('/view/'.$item->slug) }}"
                       class="cursor-pointer rounded-2xl
                              bg-white/5 backdrop-blur-xl
                              border border-white/10
                              px-5 py-4
                              hover:border-cyan-400/40
                              transition">
                        {{ $item->title }}
                    </a>
                @endforeach
            </div>

        </section>
    @endif

    {{-- Reading Toggle --}}
    <button
        wire:click="toggleReadingMode"
        class="fixed bottom-6 right-6 z-[60]
               px-5 py-3 rounded-full
               bg-white/10 backdrop-blur-xl
               border border-white/20
               text-sm font-medium text-white
               shadow-lg shadow-black/40
               transition-all duration-300 hover:scale-105"
    >
        {{ $readingMode ? 'Exit Reading' : 'Reading Mode' }}
    </button>

</div>
</x-layouts.naat-verse>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    if (!window.gsap) return

    gsap.registerPlugin(ScrollTrigger)

    ScrollTrigger.getAll().forEach(t => t.kill())

    // HERO
    gsap.from('.hero', {
        opacity: 0,
        y: 60,
        duration: 1,
        ease: 'expo.out',
    })

    // LYRICS
    gsap.from('.sher', {
        opacity: 0,
        y: 40,
        stagger: 0.15,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '.lyrics',
            start: 'top 80%',
        },
    })

    // RELATED
    gsap.from('.related', {
        opacity: 0,
        y: 40,
        duration: 0.8,
        scrollTrigger: {
            trigger: '.related',
            start: 'top 85%',
        },
    })

    // Floating Blobs
    gsap.to('.blob-1', {
        x: 100,
        y: 70,
        duration: 18,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut'
    })

    gsap.to('.blob-2', {
        x: -110,
        y: -90,
        duration: 20,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut'
    })

})
</script>
@endpush