<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        return view('admin.product', ['title' => 'Products']);
    }

    public function create()
    {
        return view('admin.createProduct', ['title' => 'Create Product']);
    }
}
