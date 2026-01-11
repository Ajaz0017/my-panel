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

    @forelse ($users as $user)
        <div class="p-4 rounded-2xl bg-white/10 border border-white/20 space-y-3">

            <div class="flex justify-between items-center"> 
                <div>
                    <p class="text-xs opacity-60">Name</p>
                    <p class="font-medium">{{ $user->name }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <p class="text-xs opacity-60">Status</p>
                    <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs
                        {{ $user->is_active ? 'bg-green-500/20 text-green-300' : 'bg-red-500/20 text-red-300' }}">
                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>

            <div>
                <p class="text-xs opacity-60">Email</p>
                <p class="text-sm break-all">{{ $user->email }}</p>
            </div>

            <div>
                <p class="text-xs opacity-60">Role</p>
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs bg-blue-500/20 text-blue-300">
                    {{ $user->role }}
                </span>
            </div>

            

            <div class="flex gap-3 pt-2">
                <a href="/users/{{ $user->id }}/edit"
                   class="flex-1 py-2 rounded-xl bg-white/10 hover:bg-white/20 transition text-sm text-center">
                    ✏️ Edit
                </a>

                <form action="/users/{{ $user->id }}" method="POST" class="flex-1"
                      onsubmit="return confirm('Delete this user?')">
                    @csrf
                    @method('DELETE')
                    <button
                        class="w-full py-2 rounded-xl bg-red-500/20 hover:bg-red-500/30 transition text-sm">
                        🗑 Delete
                    </button>
                </form>
            </div>

        </div>
    @empty
        <p class="text-center opacity-60">No users found</p>
    @endforelse

</div>

<div class="hidden lg:block overflow-x-auto rounded-2xl bg-white/10 border border-white/20">

    <table class="w-full text-sm">
        <thead class="bg-white/5">
            <tr class="text-left">
                <th class="px-5 py-4">#</th>
                <th class="px-5 py-4">Name</th>
                <th class="px-5 py-4">Email</th>
                <th class="px-5 py-4 text-center">Role</th>
                <th class="px-5 py-4 text-center">Status</th>
                <th class="px-5 py-4 text-center">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @forelse ($users as $index => $user)
                <tr class="hover:bg-white/5 transition">
                    <td class="px-5 py-4">
                        {{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}
                    </td>

                    <td class="px-5 py-4 font-medium">{{ $user->name }}</td>
                    <td class="px-5 py-4">{{ $user->email }}</td>

                    <td class="px-5 py-4 text-center">
                        <span class="px-3 py-1 rounded-full text-xs bg-blue-500/20 text-blue-300">
                            {{ $user->role }}
                        </span>
                    </td>

                    <td class="px-5 py-4 text-center">
                        <span class="px-3 py-1 rounded-full text-xs
                            {{ $user->is_active ? 'bg-green-500/20 text-green-300' : 'bg-red-500/20 text-red-300' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <td class="px-5 py-4 text-right space-x-2">
                        <a href="/users/{{ $user->id }}/edit"
                           class="inline-block px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition">
                            ✏️ Edit
                        </a>

                        <form action="/users/{{ $user->id }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="inline-block px-4 py-2 rounded-lg bg-red-500/20 hover:bg-red-500/30 transition">
                                🗑 Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-5 py-6 text-center opacity-60">
                        No users found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

<div class="mt-6">
    {{ $users->links() }}
</div>
@endsection
