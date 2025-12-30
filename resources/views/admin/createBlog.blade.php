@extends('layouts.admin')

@section('content')

<!-- ================= PAGE HEADER ================= -->
<div class="px-1 pt-1 sm:px-8 sm:pt-2">
    <h1 class="text-2xl sm:text-3xl font-bold">
        Create New Blog
    </h1>
    <p class="text-sm sm:text-base opacity-70 mt-1">
        Write and publish a new blog post
    </p>
</div>
<div class="mt-6 sm:mt-10
            w-full
            sm:max-w-5xl sm:mx-auto
            px-1 sm:px-8">
    <div class="rounded-2xl sm:rounded-3xl backdrop-blur-xl shadow-2xl
                bg-white/10 border border-white/20
                p-4 sm:p-8">

        <form class="space-y-6 sm:space-y-8" method="POST" action="/blogs">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Blog Title
                </label>
                <input type="text" name="title"
                       placeholder="Enter blog title"
                       class="w-full h-14 sm:h-16 px-4 sm:px-5
                              rounded-xl bg-white/10 border border-white/20
                              text-base sm:text-lg
                              focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Slug
                </label>
                <input type="text" name="slug"
                       placeholder="example-blog-title"
                       class="w-full h-14 px-4 sm:px-5
                              rounded-xl bg-white/10 border border-white/20
                              focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs opacity-50 mt-1">
                    Used in URL (auto-generate later)
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2 opacity-80">
                    Blog Content (Markdown Supported)
                </label>

                <textarea name="content" rows="12"
                          placeholder="Write your blog using Markdown...
# Heading
**Bold**
- List item
```code```"
                          class="w-full px-4 sm:px-5 py-4
                                 rounded-xl bg-white/10 border border-white/20
                                 font-mono text-sm sm:text-base
                                 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                <p class="text-xs opacity-50 mt-2">
                    Markdown editor can be integrated here later
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2 opacity-80">
                        Status
                    </label>
                    <select name="status"
                            class="w-full h-14 px-4 sm:px-5
                                   rounded-xl bg-white/10 border border-white/20
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option class="bg-[#24243e]" value="draft">Draft</option>
                        <option class="bg-[#24243e]" value="published">Published</option>
                    </select>
                </div>
                <div class="flex items-center justify-between
                            p-4 rounded-xl bg-white/10 border border-white/20">
                    <div>
                        <p class="font-medium">Featured Blog</p>
                        <p class="text-xs opacity-60">
                            Highlight this post
                        </p>
                    </div>

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" class="sr-only peer">
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
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-2 sm:pt-4">

                <button type="submit"
                        class="w-full sm:flex-1
                               h-14 sm:h-16
                               rounded-xl bg-blue-600 hover:bg-blue-700
                               text-base sm:text-lg font-semibold
                               shadow-lg transition">
                    🚀 Publish Blog
                </button>

                <a href="/blogs"
                   class="w-full sm:flex-1
                          h-14 sm:h-16
                          rounded-xl bg-white/10 hover:bg-white/20
                          flex items-center justify-center
                          text-base sm:text-lg transition">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
