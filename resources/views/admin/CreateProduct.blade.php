@extends('layouts.admin')

@section('content')
    <!-- PAGE HEADER -->
    <div class="px-1.5 pt-2 sm:px-8 sm:pt-5">
        <h1 class="text-2xl sm:text-3xl font-bold">
            Add New Product
        </h1>
        <p class="text-sm sm:text-base opacity-70 mt-1">
            Create and publish a new product
        </p>
    </div>

    <!-- FORM CARD -->
    <div class="px-1.5 sm:px-8 mt-6">
        <div class="max-w-4xl mx-auto
                    rounded-3xl
                    bg-white/10 backdrop-blur-xl
                    border border-white/20
                    shadow-2xl
                    p-5 sm:p-10">

            <form class="space-y-8">

                <!-- PRODUCT IMAGE -->
                <div>
                    <label class="block text-sm font-medium mb-3 opacity-80">
                        Product Image
                    </label>

                    <div class="flex flex-col items-center justify-center
                                h-48 sm:h-56
                                rounded-2xl
                                border-2 border-dashed border-white/30
                                bg-white/5
                                text-center cursor-pointer
                                hover:bg-white/10 transition">
                        <div class="text-4xl mb-2">📦</div>
                        <p class="text-sm opacity-70">
                            Tap to upload product image
                        </p>
                        <p class="text-xs opacity-40 mt-1">
                            JPG, PNG (max 2MB)
                        </p>
                        <input type="file" class="hidden">
                    </div>
                </div>

                <!-- PRODUCT NAME -->
                <div>
                    <label class="block text-sm font-medium mb-2 opacity-80">
                        Product Name
                    </label>
                    <input type="text"
                        class="w-full h-14 sm:h-16 px-4 sm:px-5
                               rounded-2xl
                               bg-white/10 border border-white/20
                               text-base sm:text-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="block text-sm font-medium mb-2 opacity-80">
                        Description
                    </label>
                    <textarea rows="4"
                        class="w-full px-4 sm:px-5 py-4
                               rounded-2xl
                               bg-white/10 border border-white/20
                               text-base sm:text-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Write product description..."></textarea>
                </div>

                <!-- PRICE & STOCK -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- PRICE -->
                    <div>
                        <label class="block text-sm font-medium mb-2 opacity-80">
                            Price (₹)
                        </label>
                        <input type="number"
                            class="w-full h-14 sm:h-16 px-4 sm:px-5
                                   rounded-2xl
                                   bg-white/10 border border-white/20
                                   text-base sm:text-lg
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- STOCK -->
                    <div>
                        <label class="block text-sm font-medium mb-2 opacity-80">
                            Stock Quantity
                        </label>
                        <input type="number"
                            class="w-full h-14 sm:h-16 px-4 sm:px-5
                                   rounded-2xl
                                   bg-white/10 border border-white/20
                                   text-base sm:text-lg
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                </div>

                <!-- CATEGORY -->
                <div>
                    <label class="block text-sm font-medium mb-2 opacity-80">
                        Category
                    </label>
                    <select
                        class="w-full h-14 sm:h-16 px-4 sm:px-5
                               rounded-2xl
                               bg-white/10 border border-white/20
                               text-base sm:text-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option class="bg-[#24243e]">Select Category</option>
                        <option class="bg-[#24243e]">Electronics</option>
                        <option class="bg-[#24243e]">Clothing</option>
                        <option class="bg-[#24243e]">Accessories</option>
                    </select>
                </div>

                <!-- PRODUCT STATUS -->
                <div class="flex items-center justify-between
                            p-4 sm:p-5 rounded-2xl
                            bg-white/10 border border-white/20">
                    <div>
                        <p class="font-medium text-base sm:text-lg">
                            Product Status
                        </p>
                        <p class="text-xs sm:text-sm opacity-60">
                            Visible to customers
                        </p>
                    </div>

                    <!-- TOGGLE -->
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-12 h-7 sm:w-14 sm:h-8 bg-white/30 rounded-full
                                    peer-checked:bg-blue-600
                                    after:content-['']
                                    after:absolute after:top-1 after:left-1
                                    after:w-5 after:h-5 sm:after:w-6 sm:after:h-6
                                    after:bg-white after:rounded-full
                                    after:transition-all
                                    peer-checked:after:translate-x-5 sm:peer-checked:after:translate-x-6">
                        </div>
                    </label>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="space-y-4 pt-4">
                    <button
                        class="w-full h-14 sm:h-16
                               rounded-2xl
                               bg-blue-600 hover:bg-blue-700
                               text-lg sm:text-xl font-semibold
                               shadow-xl transition">
                        ➕ Add Product
                    </button>

                    <a href="/products"
                       class="block w-full h-14 sm:h-16
                              rounded-2xl
                              bg-white/10 hover:bg-white/20
                              flex items-center justify-center
                              text-lg transition">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection