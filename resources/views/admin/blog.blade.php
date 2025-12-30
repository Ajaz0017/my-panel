@extends('layouts.admin')

@section('content')

<!-- ================= TOP ACTION ================= -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4 mb-6">
    <a href="/blogs/create"
       class="inline-flex items-center justify-center gap-2 px-4 py-3 
              rounded-xl bg-blue-600 hover:bg-blue-700 transition 
              font-medium shadow-lg">
        ➕ Add Blog
    </a>
</div>

<!-- ================= MOBILE VIEW (CARDS) ================= -->
<div class="grid grid-cols-1 gap-5 lg:hidden">

    @for ($i = 1; $i <= 5; $i++)
    <div class="p-5 rounded-2xl bg-white/10 border border-white/20 space-y-4">

        <!-- BLOG TITLE -->
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 rounded-xl bg-white/20 flex items-center justify-center text-2xl">
                📝
            </div>

            <div>
                <p class="text-xs opacity-60">Blog Title</p>
                <p class="font-semibold text-lg leading-snug">
                    Blog Post Title {{ $i }}
                </p>
            </div>
        </div>

        <!-- META -->
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="opacity-60 text-xs">Status</p>
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs 
                             bg-green-500/20 text-green-300">
                    Published
                </span>
            </div>

            <div>
                <p class="opacity-60 text-xs">Date</p>
                <p class="font-medium">12 Sep 2025</p>
            </div>
        </div>

        <!-- ACTIONS -->
        <div class="flex gap-3 pt-2">
            <a href="#"
               class="flex-1 py-3 rounded-xl bg-white/10 hover:bg-white/20 
                      transition text-sm text-center">
                ✏️ Edit
            </a>

            <button
                class="flex-1 py-3 rounded-xl bg-red-500/20 hover:bg-red-500/30 
                       transition text-sm">
                🗑 Delete
            </button>
        </div>

    </div>
    @endfor

</div>

<!-- ================= DESKTOP VIEW (TABLE) ================= -->
<div class="hidden lg:block overflow-x-auto rounded-2xl 
            bg-white/10 border border-white/20">

    <table class="w-full text-sm">
        <thead class="bg-white/5">
            <tr class="text-left">
                <th class="px-5 py-4">#</th>
                <th class="px-5 py-4">Blog</th>
                <th class="px-5 py-4">Status</th>
                <th class="px-5 py-4">Published On</th>
                <th class="px-5 py-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @for ($i = 1; $i <= 10; $i++)
            <tr class="hover:bg-white/5 transition">
                <td class="px-5 py-4">{{ $i }}</td>

                <td class="px-5 py-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                        📝
                    </div>
                    <span class="font-medium">
                        Blog Post Title {{ $i }}
                    </span>
                </td>

                <td class="px-5 py-4">
                    <span class="px-3 py-1 rounded-full text-xs 
                                 bg-green-500/20 text-green-300">
                        Published
                    </span>
                </td>

                <td class="px-5 py-4">
                    12 Sep 2025
                </td>

                <td class="px-5 py-4 text-right space-x-2">
                    <a href="#"
                       class="inline-block px-4 py-2 rounded-lg 
                              bg-white/10 hover:bg-white/20 transition">
                        ✏️ Edit
                    </a>
                    <button
                        class="inline-block px-4 py-2 rounded-lg 
                               bg-red-500/20 hover:bg-red-500/30 transition">
                        🗑 Delete
                    </button>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>

</div>

@endsection
