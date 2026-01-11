<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blog', [
            'title' => 'Blogs',
            'blogs' => $blogs,
        ]);
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

    public function edit(Blog $blog)
    {
        return view('admin.editBlog', [
            'title' => 'Edit Blog',
            'blog'  => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'slug'    => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'content' => 'required',
            'status'  => 'required|in:draft,published',
        ]);

        $blog->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->slug),
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect('/blogs')->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('/blogs')
            ->with('success', 'Blog deleted successfully');
    }
}
