@extends('layouts.admin')

@section('content')

<!-- ================= TOP ACTION ================= -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4 mb-6">
    <a href="/admin/naat-khawans/create"
       class="inline-flex items-center justify-center gap-2 px-4 py-3 
              rounded-xl bg-blue-600 hover:bg-blue-700 transition 
              font-medium shadow-lg">
        ➕ Add Naat Khawan
    </a>
</div>

{{-- EMPTY STATE --}}
@if ($naatKhawans->count() === 0)
    <div class="p-6 rounded-2xl bg-white/10 border border-white/20 text-center opacity-70">
        No Naat Khawans added yet.
    </div>
@endif

<!-- ================= MOBILE VIEW ================= -->
<div class="grid grid-cols-1 gap-5 lg:hidden">

@forelse ($naatKhawans as $khawan)
    <div class="p-5 rounded-2xl bg-white/10 border border-white/20 space-y-4">

        <div class="flex items-start gap-4">
            <div class="w-14 h-14 rounded-xl bg-white/20 overflow-hidden flex items-center justify-center">
                @if($khawan->profile_image)
                    <img src="{{ asset('storage/' . $khawan->profile_image) }}"
                         class="w-full h-full object-cover">
                @else
                    🎤
                @endif
            </div>

            <div>
                <p class="text-xs opacity-60">Name</p>
                <p class="font-semibold text-lg leading-snug">
                    {{ $khawan->name }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="opacity-60 text-xs">Status</p>
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs
                    {{ $khawan->is_active
                        ? 'bg-green-500/20 text-green-300'
                        : 'bg-red-500/20 text-red-300' }}">
                    {{ $khawan->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <div>
                <p class="opacity-60 text-xs">Created</p>
                <p class="font-medium">
                    {{ $khawan->created_at->format('d M Y') }}
                </p>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <a href="/admin/naat-khawans/{{ $khawan->id }}/edit"
               class="flex-1 py-3 rounded-xl bg-white/10 hover:bg-white/20 
                      transition text-sm text-center">
                ✏️ Edit
            </a>

            <form action="/admin/naat-khawans/{{ $khawan->id }}"
                  method="POST"
                  class="flex-1">
                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete this Naat Khawan?')"
                    class="w-full py-3 rounded-xl bg-red-500/20 hover:bg-red-500/30 
                           transition text-sm">
                    🗑 Delete
                </button>
            </form>
        </div>

    </div>
@empty
@endforelse

</div>

<!-- ================= DESKTOP VIEW ================= -->
<div class="hidden lg:block overflow-x-auto rounded-2xl 
            bg-white/10 border border-white/20 mt-6">

<table class="w-full text-sm">
    <thead class="bg-white/5">
        <tr class="text-left">
            <th class="px-5 py-4">#</th>
            <th class="px-5 py-4">Profile</th>
            <th class="px-5 py-4">Name</th>
            <th class="px-5 py-4">Status</th>
            <th class="px-5 py-4">Created On</th>
            <th class="px-5 py-4 text-right">Actions</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-white/10">
    @foreach ($naatKhawans as $index => $khawan)
        <tr class="hover:bg-white/5 transition">
            <td class="px-5 py-4">
                {{ $naatKhawans->firstItem() + $index }}
            </td>

            <td class="px-5 py-4">
                <div class="w-10 h-10 rounded-lg bg-white/20 overflow-hidden flex items-center justify-center">
                    @if($khawan->profile_image)
                        <img src="{{ asset('storage/' . $khawan->profile_image) }}"
                             class="w-full h-full object-cover">
                    @else
                        🎤
                    @endif
                </div>
            </td>

            <td class="px-5 py-4 font-medium">
                {{ $khawan->name }}
            </td>

            <td class="px-5 py-4">
                <span class="px-3 py-1 rounded-full text-xs
                    {{ $khawan->is_active
                        ? 'bg-green-500/20 text-green-300'
                        : 'bg-red-500/20 text-red-300' }}">
                    {{ $khawan->is_active ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="px-5 py-4">
                {{ $khawan->created_at->format('d M Y') }}
            </td>

            <td class="px-5 py-4 text-right space-x-2">
                <a href="/admin/naat-khawans/{{ $khawan->id }}/edit"
                   class="inline-block px-4 py-2 rounded-lg 
                          bg-white/10 hover:bg-white/20 transition">
                    ✏️ Edit
                </a>

                <form action="/admin/naat-khawans/{{ $khawan->id }}"
                      method="POST"
                      class="inline">
                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Delete this Naat Khawan?')"
                        class="inline-block px-4 py-2 rounded-lg 
                               bg-red-500/20 hover:bg-red-500/30 transition">
                        🗑 Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<!-- ================= PAGINATION ================= -->
<div class="mt-6">
    {{ $naatKhawans->links() }}
</div>

@endsection