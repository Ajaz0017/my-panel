@extends('layouts.admin')

@section('content')

<!-- ================= TOP ACTION ================= -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4 mb-6">
    <a href="/products/create"
       class="inline-flex items-center justify-center gap-2 px-4 py-3 
              rounded-xl bg-blue-600 hover:bg-blue-700 transition 
              font-medium shadow-lg">
        ➕ Add Product
    </a>
</div>

<!-- ================= MOBILE VIEW ================= -->
<div class="grid grid-cols-1 gap-5 lg:hidden">

    @forelse ($products as $product)
        <div class="p-5 rounded-2xl bg-white/10 border border-white/20 space-y-4">

            <div class="flex items-center gap-4">
                <img
                    src="{{ $product->images->first()
                        ? asset('storage/'.$product->images->first()->image)
                        : 'https://via.placeholder.com/100' }}"
                    class="w-16 h-16 rounded-xl object-cover border border-white/20">

                <div>
                    <p class="text-xs opacity-60">Product Name</p>
                    <p class="font-semibold text-lg">{{ $product->name }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="opacity-60 text-xs">Price</p>
                    <p class="font-medium">₹ {{ $product->price }}</p>
                </div>

                <div>
                    <p class="opacity-60 text-xs">Stock</p>
                    <p class="font-medium">{{ $product->stock }} units</p>
                </div>
            </div>

            <span class="inline-block px-3 py-1 rounded-full text-xs
                {{ $product->is_active
                    ? 'bg-green-500/20 text-green-300'
                    : 'bg-red-500/20 text-red-300' }}">
                {{ $product->is_active ? 'Active' : 'Inactive' }}
            </span>

            <div class="flex gap-3 pt-2">
                <a href="/products/{{ $product->id }}/edit"
                   class="flex-1 py-3 rounded-xl bg-white/10 hover:bg-white/20 
                          transition text-sm text-center">
                    ✏️ Edit
                </a>

                <form action="/products/{{ $product->id }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this product?')"
                        class="w-full py-3 rounded-xl bg-red-500/20 hover:bg-red-500/30 
                               transition text-sm">
                        🗑 Delete
                    </button>
                </form>
            </div>

        </div>
    @empty
        <p class="text-center opacity-60">No products found</p>
    @endforelse

</div>

<!-- ================= DESKTOP VIEW ================= -->
<div class="hidden lg:block overflow-x-auto rounded-2xl 
            bg-white/10 border border-white/20">

    <table class="w-full text-sm">
        <thead class="bg-white/5">
            <tr class="text-left">
                <th class="px-5 py-4">#</th>
                <th class="px-5 py-4">Product</th>
                <th class="px-5 py-4">Price</th>
                <th class="px-5 py-4">Stock</th>
                <th class="px-5 py-4">Status</th>
                <th class="px-5 py-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @foreach ($products as $index => $product)
                <tr class="hover:bg-white/5 transition">
                    <td class="px-5 py-4">{{ $products->firstItem() + $index }}</td>

                    <td class="px-5 py-4 flex items-center gap-3">
                        <img
                            src="{{ $product->images->first()
                                ? asset('storage/'.$product->images->first()->image)
                                : 'https://via.placeholder.com/80' }}"
                            class="w-10 h-10 rounded-lg object-cover border border-white/20">

                        <span class="font-medium">{{ $product->name }}</span>
                    </td>

                    <td class="px-5 py-4">₹ {{ $product->price }}</td>
                    <td class="px-5 py-4">{{ $product->stock }} units</td>

                    <td class="px-5 py-4">
                        <span class="px-3 py-1 rounded-full text-xs
                            {{ $product->is_active
                                ? 'bg-green-500/20 text-green-300'
                                : 'bg-red-500/20 text-red-300' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <td class="px-5 py-4 text-right space-x-2">
                        <a href="/products/{{ $product->id }}/edit"
                           class="inline-block px-4 py-2 rounded-lg 
                                  bg-white/10 hover:bg-white/20 transition">
                            ✏️ Edit
                        </a>

                        <form action="/products/{{ $product->id }}"
                              method="POST"
                              class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this product?')"
                                class="inline-block px-4 py-2 rounded-lg 
                                       bg-red-500/20 hover:bg-red-500/30 transition">
                                🗑 Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- ================= PAGINATION ================= -->
<div class="mt-6">
    {{ $products->links() }}
</div>

@endsection
