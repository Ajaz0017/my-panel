@extends('layouts.admin')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4">
    <a href="/users/create"
       class="inline-flex items-center justify-center gap-2 px-4 py-3 
              rounded-xl bg-blue-600 hover:bg-blue-700 transition 
              font-medium shadow-lg">
        ➕ Add New User
    </a>
</div>

<div class="grid grid-cols-1 gap-4 lg:hidden">

    @for ($i = 1; $i <= 5; $i++)
    <div class="p-4 rounded-2xl bg-white/10 border border-white/20 space-y-3">

        <div>
            <p class="text-xs opacity-60">Name</p>
            <p class="font-medium">User {{ $i }}</p>
        </div>

        <div>
            <p class="text-xs opacity-60">Email</p>
            <p class="text-sm break-all">user{{ $i }}@example.com</p>
        </div>

        <div>
            <p class="text-xs opacity-60">Role</p>
            <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs bg-blue-500/20 text-blue-300">
                Admin
            </span>
        </div>

        <div class="flex gap-3 pt-2">
            <a href="#"
               class="flex-1 py-2 rounded-xl bg-white/10 hover:bg-white/20 transition text-sm text-center">
                ✏️ Edit
            </a>

            <button
                class="flex-1 py-2 rounded-xl bg-red-500/20 hover:bg-red-500/30 transition text-sm">
                🗑 Delete
            </button>
        </div>

    </div>
    @endfor

</div>

<div class="hidden lg:block overflow-x-auto rounded-2xl bg-white/10 border border-white/20">

    <table class="w-full text-sm">
        <thead class="bg-white/5">
            <tr class="text-left">
                <th class="px-5 py-4">#</th>
                <th class="px-5 py-4">Name</th>
                <th class="px-5 py-4">Email</th>
                <th class="px-5 py-4">Role</th>
                <th class="px-5 py-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @for ($i = 1; $i <= 10; $i++)
            <tr class="hover:bg-white/5 transition">
                <td class="px-5 py-4">{{ $i }}</td>
                <td class="px-5 py-4 font-medium">User {{ $i }}</td>
                <td class="px-5 py-4">user{{ $i }}@example.com</td>
                <td class="px-5 py-4">
                    <span class="px-3 py-1 rounded-full text-xs bg-blue-500/20 text-blue-300">
                        Admin
                    </span>
                </td>
                <td class="px-5 py-4 text-right space-x-2">
                    <a href="#"
                       class="inline-block px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition">
                        ✏️ Edit
                    </a>
                    <button
                        class="inline-block px-4 py-2 rounded-lg bg-red-500/20 hover:bg-red-500/30 transition">
                        🗑 Delete
                    </button>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>

</div>

@endsection
