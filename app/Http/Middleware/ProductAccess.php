<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !auth()->check() ||
            !in_array(auth()->user()->role, ['manager', 'admin', 'product_manager'])
        ) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
