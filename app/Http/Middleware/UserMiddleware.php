<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::User();
         if (!$user) {
        return redirect()->route('login.page');
        }
        
        if ($user->role !== 'admin') {
        abort(403, 'Unauthorized');
        return redirect()->route('login.page');
        }

       if ($user->role !== 'zookeeper') {
        abort(403, 'Unauthorized');
        return redirect()->route('login.page');
        }
        

        return $next($request);
    }
}
