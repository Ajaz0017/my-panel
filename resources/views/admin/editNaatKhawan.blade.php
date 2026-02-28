@extends('layouts.admin')

@section('content')

<!-- ================= PAGE HEADER ================= -->
<div class="px-1 pt-1 sm:px-8 sm:pt-2">
    <h1 class="text-2xl sm:text-3xl font-bold">
        Edit Naat Khawan
    </h1>
    <p class="text-sm sm:text-base opacity-70 mt-1">
        Update Naat Khawan details
    </p>
</div>

<div class="mt-6 sm:mt-10 w-full sm:max-w-5xl sm:mx-auto px-1 sm:px-8">
    <div class="rounded-2xl sm:rounded-3xl backdrop-blur-xl shadow-2xl
                bg-white/10 border border-white/20 p-4 sm:p-8">

        <form method="POST"
              action="/admin/naat-khawans/{{ $naatKhawan->id }}"
              enctype="multipart/form-data"
              class="space-y-6 sm:space-y-8">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Naat Khawan Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $naatKhawan->name) }}"
                       class="w-full h-14 sm:h-16 px-4 sm:px-5
                              rounded-xl bg-white/10 border border-white/20
                              focus:ring-2 focus:ring-blue-500">

                @error('name')
                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- PROFILE IMAGE -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Profile Image
                </label>

                @if($naatKhawan->profile_image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $naatKhawan->profile_image) }}"
                             class="w-24 h-24 rounded-xl object-cover border border-white/20">
                    </div>
                @endif

                <input type="file"
                       name="profile_image"
                       accept="image/*"
                       class="w-full px-4 py-4
                              rounded-xl bg-white/10 border border-white/20
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-600 file:text-white
                              hover:file:bg-blue-700">

                @error('profile_image')
                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- ACTIVE STATUS -->
            <div class="flex items-center justify-between
                        p-4 rounded-xl bg-white/10 border border-white/20">

                <div>
                    <p class="font-medium">Active Status</p>
                    <p class="text-xs opacity-60">
                        Disable to hide from public
                    </p>
                </div>

                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           class="sr-only peer"
                           @checked($naatKhawan->is_active)>

                    <div class="w-12 h-7 bg-white/30 rounded-full
                                peer-checked:bg-blue-600
                                after:content-['']
                                after:absolute after:top-1 after:left-1
                                after:w-5 after:h-5
                                after:bg-white after:rounded-full
                                after:transition-all
                                peer-checked:after:translate-x-5">
                    </div>
                </label>
            </div>

            <!-- ACTIONS -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                <button type="submit"
                        class="w-full sm:flex-1 h-14 sm:h-16
                               rounded-xl bg-blue-600 hover:bg-blue-700
                               text-lg font-semibold transition">
                    💾 Update Naat Khawan
                </button>

                <a href="/admin/naat-khawans"
                   class="w-full sm:flex-1 h-14 sm:h-16
                          rounded-xl bg-white/10 hover:bg-white/20
                          flex items-center justify-center">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

@endsection