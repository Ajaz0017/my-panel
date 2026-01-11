<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')
            ->latest()
            ->select('id', 'title', 'slug', 'content', 'created_at')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $blogs,
        ]);
    }

    public function show(Blog $blog)
    {
        if ($blog->status !== 'published') {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $blog,
        ]);
    }
}
