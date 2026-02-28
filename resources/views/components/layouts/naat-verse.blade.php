
<div class="relative min-h-screen bg-[#0B0E14] text-white overflow-hidden">
<div class="absolute -top-40 -left-40 h-[500px] w-[500px]
                    rounded-full bg-purple-600/30 blur-[140px] animate-pulse"></div>
        <div class="absolute top-1/3 -right-40 h-[500px] w-[500px]
                    rounded-full bg-cyan-500/30 blur-[140px] animate-pulse"></div>
        <x-header />

        <main class="pt-16">
        {{ $slot }}

        </main>
    
        </div>