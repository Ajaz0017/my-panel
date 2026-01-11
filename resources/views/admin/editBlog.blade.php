@extends('layouts.admin')

@section('content')

<!-- ================= PAGE HEADER ================= -->
<div class="px-1 pt-1 sm:px-8 sm:pt-2">
    <h1 class="text-2xl sm:text-3xl font-bold">
        Edit Blog
    </h1>
    <p class="text-sm sm:text-base opacity-70 mt-1">
        Update your blog post
    </p>
</div>

<div class="mt-6 sm:mt-10 w-full sm:max-w-5xl sm:mx-auto px-1 sm:px-8">
    <div class="rounded-2xl sm:rounded-3xl backdrop-blur-xl shadow-2xl
                bg-white/10 border border-white/20 p-4 sm:p-8">

        <form method="POST" action="/blogs/{{ $blog->id }}" class="space-y-6 sm:space-y-8">
            @csrf
            @method('PUT')

            <!-- TITLE -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Blog Title
                </label>
                <input type="text" name="title"
                       value="{{ old('title', $blog->title) }}"
                       class="w-full h-14 sm:h-16 px-4 sm:px-5
                              rounded-xl bg-white/10 border border-white/20
                              focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- SLUG -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Slug
                </label>
                <input type="text" name="slug"
                       value="{{ old('slug', $blog->slug) }}"
                       class="w-full h-14 px-4 sm:px-5
                              rounded-xl bg-white/10 border border-white/20
                              focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- CONTENT -->
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Blog Content
                </label>
                <textarea name="content" rows="12"
                          class="w-full px-4 sm:px-5 py-4
                                 rounded-xl bg-white/10 border border-white/20
                                 font-mono focus:ring-2 focus:ring-blue-500">{{ old('content', $blog->content) }}</textarea>
            </div>

            <!-- STATUS + FEATURED -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2 opacity-80">
                        Status
                    </label>
                    <select name="status"
                            class="w-full h-14 px-4 sm:px-5 rounded-xl bg-white/10 border border-white/20">
                        <option value="draft" @selected($blog->status === 'draft')>Draft</option>
                        <option value="published" @selected($blog->status === 'published')>Published</option>
                    </select>
                </div>

                <div class="flex items-center justify-between p-4 rounded-xl bg-white/10 border border-white/20">
                    <div>
                        <p class="font-medium">Featured Blog</p>
                        <p class="text-xs opacity-60">Highlight this post</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_featured"
                           class="sr-only peer"
                           @checked($blog->is_featured)>
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
            </div>

            <!-- ACTIONS -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                <button type="submit"
                        class="w-full sm:flex-1 h-14 sm:h-16
                               rounded-xl bg-blue-600 hover:bg-blue-700
                               text-lg font-semibold transition">
                    💾 Update Blog
                </button>

                <a href="/blogs"
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
