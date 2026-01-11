@extends('layouts.admin')

@section('content')
<div class="px-1 pt-2 sm:px-8 sm:pt-5">
    <h1 class="text-2xl sm:text-3xl font-bold">Edit Product</h1>
    <p class="text-sm sm:text-base opacity-70 mt-1">Update product details</p>
</div>

<div class="px-1 sm:px-8 mt-6">
<div class="max-w-4xl mx-auto rounded-2xl sm:rounded-3xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl p-5 sm:p-10">

<form method="POST"
      action="/products/{{ $product->id }}"
      enctype="multipart/form-data"
      class="space-y-8">
@csrf
@method('PUT')

{{-- ================= EXISTING IMAGES ================= --}}
@if($product->images->count())
<div>
    <label class="block text-sm font-medium mb-3 opacity-80">
        Existing Images
    </label>

    <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
        @foreach($product->images as $img)
        <div class="relative group">
            <img src="{{ asset('storage/'.$img->image) }}"
                 class="h-24 w-full object-cover rounded-xl border border-white/20 shadow-md">

            <button type="button"
                    onclick="deleteImage({{ $img->id }})"
                    class="absolute -top-2 -right-2 w-6 h-6 rounded-full
                           bg-red-500 text-white text-xs shadow-lg">
                ✕
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- ================= ADD NEW IMAGES ================= --}}
<div>
    <label class="block text-sm font-medium mb-3 opacity-80">
        Add More Images
    </label>

    <div class="relative rounded-2xl border-2 border-dashed border-white/30 bg-white/5 p-6 hover:bg-white/10 transition">
        <input type="file" name="images[]" multiple id="imageInput"
               class="absolute inset-0 opacity-0 cursor-pointer">

        <div class="text-center pointer-events-none">
            <div class="text-4xl mb-2">📦</div>
            <p class="text-sm opacity-70">Click to upload product images</p>
            <p class="text-xs opacity-40 mt-1">JPG, PNG (max 2MB)</p>
        </div>

        <div id="previewGrid" class="mt-5 grid grid-cols-3 sm:grid-cols-4 gap-3"></div>
    </div>
</div>

{{-- ================= NAME ================= --}}
<div>
    <label class="block text-sm font-medium mb-2 opacity-80">Product Name</label>
    <input type="text" name="name"
           value="{{ old('name', $product->name) }}"
           class="w-full h-14 px-5 rounded-2xl bg-white/10 border border-white/20">
</div>

{{-- ================= DESCRIPTION ================= --}}
<div>
    <label class="block text-sm font-medium mb-2 opacity-80">Description</label>
    <textarea name="description" rows="4"
              class="w-full px-5 py-4 rounded-2xl bg-white/10 border border-white/20">{{ old('description', $product->description) }}</textarea>
</div>

{{-- ================= PRICE + STOCK ================= --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium mb-2 opacity-80">
            Price (₹)
        </label>
        <input type="number" name="price" value="{{ $product->price }}"
            class="h-14 px-5 rounded-2xl bg-white/10 border border-white/20 w-full">
    </div>
    <div>
    <label class="block text-sm font-medium mb-2 opacity-80">
        Stock Quantity
    </label>
    <input type="number" name="stock" value="{{ $product->stock }}"
           class="h-14 px-5 rounded-2xl bg-white/10 border border-white/20 w-full">
    </div>
</div>

{{-- ================= CATEGORY ================= --}}
<label class="block text-sm font-medium mb-2 opacity-80">
    Category
 </label>
<select name="category"
    class="w-full h-14 sm:h-16 px-4 sm:px-5 rounded-2xl bg-white/10 border border-white/20 text-base sm:text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    <option class="bg-[#24243e]">Electronics</option>
    <option class="bg-[#24243e]">Clothing</option>
    <option class="bg-[#24243e]">Accessories</option>
</select>

{{-- ================= STATUS ================= --}}

<div class="flex items-center justify-between p-4 sm:p-5 rounded-2xl bg-white/10 border border-white/20">
    <div>
        <p class="font-medium text-base sm:text-lg">
            Product Status
        </p>
        <p class="text-xs sm:text-sm opacity-60">
            Visible to customers
        </p>
        </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="is_active" class="sr-only peer" {{ $product->is_active ? 'checked' : '' }}>
                <div class="w-12 h-7 sm:w-14 sm:h-8 bg-white/30 rounded-full peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-1 after:left-1 after:w-5 after:h-5 sm:after:w-6 sm:after:h-6 after:bg-white after:rounded-full after:transition-all peer-checked:after:translate-x-5 sm:peer-checked:after:translate-x-6">
                </div>
            </label>
        </div>

{{-- ================= ACTIONS ================= --}}
<button class="w-full h-14 rounded-2xl bg-blue-600 hover:bg-blue-700 text-lg font-semibold">
    💾 Update Product
</button>

<a href="/products" class="block w-full h-14 sm:h-16 rounded-2xl bg-white/10 hover:bg-white/20 flex items-center justify-center text-lg transition">Cancel</a>

</form>
</div>
</div>

{{-- ================= JS ================= --}}
<script>
    const input = document.getElementById('imageInput');
const previewGrid = document.getElementById('previewGrid');

let selectedFiles = [];

input.addEventListener('change', (e) => {
    Array.from(e.target.files).forEach(file => {
        selectedFiles.push(file);
    });

    renderPreviews();
    syncInputFiles();
});

function renderPreviews() {
    previewGrid.innerHTML = '';

    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = e => {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative group';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = `
                h-24 w-full object-cover rounded-xl
                border border-white/20
                shadow-md
            `;

            const removeBtn = document.createElement('button');
            removeBtn.innerHTML = '✕';
            removeBtn.className = `
                absolute -top-2 -right-2
                w-6 h-6 rounded-full
                bg-red-500 text-white text-xs
                opacity-0 group-hover:opacity-100
                transition shadow-lg cursor-pointer
            `;

            removeBtn.onclick = () => {
                selectedFiles.splice(index, 1);
                renderPreviews();
                syncInputFiles();
            };

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            previewGrid.appendChild(wrapper);
        };

        reader.readAsDataURL(file);
    });
}

/**
 * VERY IMPORTANT:
 * Sync custom file array back to input
 */
function syncInputFiles() {
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    input.files = dataTransfer.files;
}
function deleteImage(id) {
    if (!confirm('Remove this image?')) return;

    fetch(`/products/images/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(() => location.reload());
}
</script>
@endsection
