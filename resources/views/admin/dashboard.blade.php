@extends('layouts.admin')

@section('content')
        <section class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
                <p class="text-xs opacity-70">Users</p>
                <h2 class="text-2xl font-bold">1,245</h2>
            </div>

            <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
                <p class="text-xs opacity-70">Products</p>
                <h2 class="text-2xl font-bold">320</h2>
            </div>

            <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
                <p class="text-xs opacity-70">Orders</p>
                <h2 class="text-2xl font-bold">98</h2>
            </div>

            <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
                <p class="text-xs opacity-70">Revenue</p>
                <h2 class="text-2xl font-bold">₹45k</h2>
            </div>
        </section>

        <section>
            <h2 class="text-sm font-semibold mb-3">Quick Actions</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <button class="py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 transition">
                    ➕ Add User
                </button>
                <button class="py-4 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    ➕ Add Product
                </button>
                <button class="py-4 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    📄 View Reports
                </button>
            </div>
        </section>
@endsection
