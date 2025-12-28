@extends('layouts.admin')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4">
    <a href="/products/create"
       class="inline-flex items-center justify-center gap-2 px-4 py-3 
              rounded-xl bg-blue-600 hover:bg-blue-700 transition 
              font-medium shadow-lg">
        ➕ Add Product
    </a>
</div>

<!-- ================= MOBILE VIEW (CARDS) ================= -->
<div class="grid grid-cols-1 gap-5 lg:hidden">

    @for ($i = 1; $i <= 5; $i++)
    <div class="p-5 rounded-2xl bg-white/10 border border-white/20 space-y-4">

        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-xl bg-white/20 flex items-center justify-center text-2xl">
                📦
            </div>

            <div>
                <p class="text-xs opacity-60">Product Name</p>
                <p class="font-semibold text-lg">Product {{ $i }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="opacity-60 text-xs">Price</p>
                <p class="font-medium">₹ {{ 500 * $i }}</p>
            </div>

            <div>
                <p class="opacity-60 text-xs">Stock</p>
                <p class="font-medium">{{ 10 * $i }} units</p>
            </div>
        </div>

        <div>
            <span class="inline-block px-3 py-1 rounded-full text-xs 
                         bg-green-500/20 text-green-300">
                Active
            </span>
        </div>

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
                <th class="px-5 py-4">Product</th>
                <th class="px-5 py-4">Price</th>
                <th class="px-5 py-4">Stock</th>
                <th class="px-5 py-4">Status</th>
                <th class="px-5 py-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @for ($i = 1; $i <= 10; $i++)
            <tr class="hover:bg-white/5 transition">
                <td class="px-5 py-4">{{ $i }}</td>

                <td class="px-5 py-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                        📦
                    </div>
                    <span class="font-medium">Product {{ $i }}</span>
                </td>

                <td class="px-5 py-4">₹ {{ 500 * $i }}</td>
                <td class="px-5 py-4">{{ 10 * $i }} units</td>

                <td class="px-5 py-4">
                    <span class="px-3 py-1 rounded-full text-xs 
                                 bg-green-500/20 text-green-300">
                        Active
                    </span>
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