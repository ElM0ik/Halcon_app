<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <- agregar esta línea
use Symfony\Component\HttpFoundation\Response;

class CheckDepartment
{
    public function handle(Request $request, Closure $next, ...$departments): Response
    {
        if (!Auth::check() || !in_array(Auth::user()->department, $departments)) {
            abort(403, 'Unauthorized.');
        }
        return $next($request);
    }
}