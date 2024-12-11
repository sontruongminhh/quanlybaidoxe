<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        $userEmail = Cookie::get('user_email');
        $userRole = Cookie::get('user_role');

        // Perform any check or pass the data to the request
        $request->merge(['user_email' => $userEmail, 'user_role' => $userRole]);

        return $next($request);
    }
}