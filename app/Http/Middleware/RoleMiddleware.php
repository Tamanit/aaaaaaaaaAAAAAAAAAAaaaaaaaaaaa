<?php

namespace App\Http\Middleware;

use App\Enumeration\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();
        if (!$user || !in_array($user->role, array_map(fn($r) => UserRole::from($r), $roles))) {
            abort(403, 'Недостаточно прав для доступа.');
        }

        return $next($request);
    }
}
