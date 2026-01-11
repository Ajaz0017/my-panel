<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')
            ->latest()
            ->paginate(10); // pagination ready

        return view('admin.product', [
            'title'    => 'Products',
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('admin.createProduct', ['title' => 'Create Product']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category'    => 'nullable|string',
            'images.*'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category'    => $request->category,
            'is_active'   => $request->has('is_active'),
        ]);

        // Multiple Images Upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'image' => $path,
                ]);
            }
        }

        return redirect('/products')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        $product->load('images');

        return view('admin.editProduct', [
            'title' => 'Edit Product',
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category'    => 'nullable|string',
            'images.*'    => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update product fields
        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category'    => $request->category,
            'is_active'   => $request->has('is_active'),
        ]);

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'image' => $path,
                ]);
            }
        }

        return redirect('/products')->with('success', 'Product updated successfully');
    }

    public function destroyImage(ProductImage $image)
    {
        Storage::disk('public')->delete($image->image);
        $image->delete();

        return back()->with('success', 'Image removed');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
        }

        $product->images()->delete();

        $product->delete();

        return redirect('/products')
            ->with('success', 'Product deleted successfully');
    }
}
