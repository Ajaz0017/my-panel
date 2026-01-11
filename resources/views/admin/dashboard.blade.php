@extends('layouts.admin')

@section('content')
        <section class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
                <p class="text-xs opacity-70">Users</p>
                <h2 class="text-2xl font-bold">{{$usersCount}}</h2>
            </div>

            <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
                <p class="text-xs opacity-70">Products</p>
                <h2 class="text-2xl font-bold">{{$productsCount}}</h2>
            </div>

            <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
                <p class="text-xs opacity-70">Blogs</p>
                <h2 class="text-2xl font-bold">{{$blogsCount}}</h2>
            </div>
        </section>

        <section>
            <h2 class="text-sm font-semibold mb-3">Quick Actions</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <a href="/users/create" class="py-4 text-center rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    ➕ Add User
                </a>
                <a href="/products/create" class="py-4 text-center rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    ➕ Add Product
                </a>
                <a href="/blogs/create" class="py-4 rounded-2xl text-center bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    ➕ Add Blog
                </a>
                <!-- <a href="reports" class="py-4 rounded-2xl text-center bg-white/10 border border-white/20 hover:bg-white/20 transition">
                    📄 View Reports
                </a> -->
            </div>
        </section>

        <section class="mt-8">
    <h2 class="text-sm font-semibold mb-3">Weekly Growth</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
            <canvas id="usersChart"></canvas>
            <p class="text-center text-xs mt-1">Users Chart</p>
        </div>

        <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
            <canvas id="productsChart"></canvas>
            <p class="text-center text-xs mt-1">Products Chart</p>
        </div>

        <div class="p-4 rounded-2xl bg-white/10 border border-white/20">
            <canvas id="blogsChart"></canvas>
            <p class="text-center text-xs mt-1">Blogs Chart</p>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($labels);

    const baseOptions = {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { precision: 0 }
            }
        }
    };

    new Chart(document.getElementById('usersChart'), {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Users',
                data: @json($usersWeekly),
                borderWidth: 2,
                tension: 0.4
            }]
        },
        options: baseOptions
    });

    new Chart(document.getElementById('productsChart'), {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Products',
                data: @json($productsWeekly),
                borderWidth: 2,
                tension: 0.4
            }]
        },
        options: baseOptions
    });

    new Chart(document.getElementById('blogsChart'), {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Blogs',
                data: @json($blogsWeekly),
                borderWidth: 2,
                tension: 0.4
            }]
        },
        options: baseOptions
    });
</script>

@endsection
