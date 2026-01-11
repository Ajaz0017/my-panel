@extends('layouts.admin')

@section('content')

<!-- PAGE HEADER -->
<div class="px-1 pt-2 sm:px-8 sm:pt-5">
    <h1 class="text-2xl sm:text-3xl font-bold">
        Edit User
    </h1>
    <p class="text-sm sm:text-base opacity-70 mt-1">
        Update user details
    </p>
</div>

<!-- FORM CARD -->
<div class="px-1 sm:px-8 mt-6">
    <div class="max-w-3xl mx-auto
                rounded-2xl sm:rounded-3xl
                bg-white/10 backdrop-blur-xl
                border border-white/20
                shadow-2xl
                p-5 sm:p-10">

        <form method="POST"
              action="/users/{{ $user->id }}"
              class="space-y-7">
            @csrf
            @method('PUT')

            <!-- FULL NAME -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Full Name
                </label>
                <input type="text" name="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full h-14 sm:h-16 px-4 sm:px-5
                              rounded-2xl bg-white/10 border border-white/20
                              text-base sm:text-lg focus:outline-none
                              focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Email Address
                </label>
                <input type="email" name="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full h-14 sm:h-16 px-4 sm:px-5
                              rounded-2xl bg-white/10 border border-white/20
                              text-base sm:text-lg focus:outline-none
                              focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Password
                </label>
                <input type="password" name="password"
                       placeholder="Leave blank to keep current password"
                       class="w-full h-14 sm:h-16 px-4 sm:px-5
                              rounded-2xl bg-white/10 border border-white/20
                              text-base sm:text-lg focus:outline-none
                              focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- ROLE -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Role
                </label>
                <select name="role"
                        class="w-full h-14 sm:h-16 px-4 sm:px-5
                               rounded-2xl bg-white/10 border border-white/20
                               text-base sm:text-lg focus:outline-none
                               focus:ring-2 focus:ring-blue-500">
                    <option value="admin" class="bg-[#24243e]"   @selected($user->role === 'admin')>Admin</option>
                    <option value="manager" class="bg-[#24243e]" @selected($user->role === 'manager')>Manager</option>
                    <option value="manager" class="bg-[#24243e]" @selected($user->role === 'product_manager')>Product Manager</option>
                    <option value="manager" class="bg-[#24243e]" @selected($user->role === 'content_manager')>Content Manager</option>
                    <option value="user"  class="bg-[#24243e]"  @selected($user->role === 'user')>User</option>
                </select>
            </div>

            <!-- STATUS -->
            <div class="flex items-center justify-between
                        p-4 sm:p-5 rounded-2xl
                        bg-white/10 border border-white/20">
                <div>
                    <p class="font-medium text-base sm:text-lg">
                        Active User
                    </p>
                    <p class="text-xs sm:text-sm opacity-60">
                        Enable or disable access
                    </p>
                </div>

                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active"
                           class="sr-only peer"
                           {{ $user->is_active ? 'checked' : '' }}>
                    <div class="w-12 h-7 sm:w-14 sm:h-8 bg-white/30 rounded-full
                                peer-checked:bg-blue-600
                                after:absolute after:top-1 after:left-1
                                after:w-5 after:h-5 sm:after:w-6 sm:after:h-6
                                after:bg-white after:rounded-full
                                after:transition-all
                                peer-checked:after:translate-x-5
                                sm:peer-checked:after:translate-x-6">
                    </div>
                </label>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="space-y-4 pt-2">
                <button
                    class="w-full h-14 sm:h-16
                           rounded-2xl bg-blue-600 hover:bg-blue-700
                           text-lg sm:text-xl font-semibold
                           shadow-xl transition">
                    Update User
                </button>

                <a href="/users"
                   class="block w-full h-14 sm:h-16
                          rounded-2xl bg-white/10 hover:bg-white/20
                          flex items-center justify-center
                          text-lg transition">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
