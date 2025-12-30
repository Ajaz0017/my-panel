<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog', ['title' => 'Blogs']);
    }

    public function create()
    {
        return view('admin.createBlog', ['title' => 'Create Blog']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'slug'    => 'required|string|max:255|unique:blogs,slug',
            'content' => 'required',
            'status'  => 'required|in:draft,published',
        ]);

        Blog::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->slug),
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect('/blogs')->with('success', 'Blog created successfully');
    }
}
