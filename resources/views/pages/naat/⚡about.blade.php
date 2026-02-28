<?php

use Livewire\Component;

new class extends Component
{
    public bool $readingMode = false;

    public function toggleReadingMode()
    {
        $this->readingMode = ! $this->readingMode;
    }
};
?>
<x-layouts.naat-verse :title="$title ?? 'About'">
<div
    x-data="aboutPage()"
    x-init="init()"
    class="relative min-h-screen transition-all duration-700 overflow-x-hidden"
    :class="$wire.readingMode ? 'bg-black text-gray-100' : 'bg-[#0B0E14] text-white'"
>

    {{-- Background Blobs --}}
    <div
        class="fixed -top-40 -left-40 h-[420px] w-[420px] rounded-full
               bg-fuchsia-600/30 blur-[160px] transition-opacity duration-700 blob-1"
        :class="$wire.readingMode ? 'opacity-10' : 'opacity-100'"
    ></div>

    <div
        class="fixed top-1/3 -right-40 h-[420px] w-[420px] rounded-full
               bg-cyan-500/30 blur-[160px] transition-opacity duration-700 blob-2"
        :class="$wire.readingMode ? 'opacity-10' : 'opacity-100'"
    ></div>

    {{-- HERO --}}
    <section class="about-hero relative z-10 pt-20 md:pt-28 px-5 text-center max-w-3xl mx-auto">
        <h1 class="text-4xl sm:text-6xl font-extrabold leading-tight">
            <span class="block text-transparent bg-clip-text
                         bg-gradient-to-r from-cyan-400 to-fuchsia-500">
                NaatVerse
            </span>
        </h1>

        <p class="mt-6 text-gray-400 text-lg">
            A modern space for devotional poetry, reflection,
            and words that are meant to be felt — not rushed.
        </p>
    </section>

    {{-- SECTION --}}
    @foreach ([
        'Why NaatVerse Exists' => 'NaatVerse was created with a simple intention —
to present Naat, poetry, and spiritual writing
in a way that feels calm, respectful, and timeless.',
        'Modern by Design' => 'This platform is intentionally minimal.
No clutter, no unnecessary features,
and no distractions.',
        'Looking Ahead' => 'NaatVerse will continue to evolve —
with audio recitations and richer experiences.'
    ] as $title => $content)

        <section class="reveal relative z-10 mt-16 px-5 max-w-4xl mx-auto mb-10">
            <div class="rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 p-8 sm:p-12">

                <h2 class="text-2xl font-semibold mb-4">
                    {{ $title }}
                </h2>

                <p
                    class="transition-all duration-700"
                    :class="$wire.readingMode
                        ? 'text-xl leading-[2.3] text-gray-200 text-center'
                        : 'text-gray-300 leading-relaxed text-lg'"
                >
                    {{ $content }}
                </p>

            </div>
        </section>

    @endforeach

    {{-- Toggle Button --}}
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
document.addEventListener('alpine:init', () => {

    Alpine.data('aboutPage', () => ({

        init() {

            this.$nextTick(() => {

                if (!window.gsap) return

                gsap.registerPlugin(ScrollTrigger)

                ScrollTrigger.getAll().forEach(t => t.kill())

                // Hero Animation
                gsap.from('.about-hero', {
                    opacity: 0,
                    y: 60,
                    duration: 1,
                    ease: 'expo.out',
                })

                // Reveal Sections
                gsap.utils.toArray('.reveal').forEach((el) => {
                    gsap.from(el, {
                        opacity: 0,
                        y: 60,
                        duration: 0.9,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: el,
                            start: 'top 85%',
                        },
                    })
                })

                // Floating blobs animation
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
        }
    }))
})
</script>
@endpush