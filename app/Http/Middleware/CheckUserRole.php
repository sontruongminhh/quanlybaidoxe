<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        if (!$request->has('user_email') && !$request->is('update-user/add-user')) {
            $userEmail = Cookie::get('user_email');
            $userRole = Cookie::get('user_role');
            $request->merge(['user_email' => $userEmail, 'user_role' => $userRole]);
        }

        return $next($request);
    }
}