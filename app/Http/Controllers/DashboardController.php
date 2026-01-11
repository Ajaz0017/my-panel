<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Blog;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $days = collect(range(6, 0))->map(function ($day) {
            return Carbon::now()->subDays($day)->format('Y-m-d');
        });

        return view('admin.dashboard', [
            'title' => 'Dashboard',

            'usersCount'    => User::count(),
            'productsCount' => Product::count(),
            'blogsCount'    => Blog::count(),

            'labels' => $days->map(fn ($d) => Carbon::parse($d)->format('D'))->values(),

            'usersWeekly' => $days->map(fn ($d) =>
                User::whereDate('created_at', $d)->count()
            )->values(),

            'productsWeekly' => $days->map(fn ($d) =>
                Product::whereDate('created_at', $d)->count()
            )->values(),

            'blogsWeekly' => $days->map(fn ($d) =>
                Blog::whereDate('created_at', $d)->count()
            )->values(),
        ]);
    }
}
