<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentUserRoles = auth()->user()->roles->pluck('title')->toArray();
        $isAdmin = in_array('Admin', $currentUserRoles);

        if ( !$isAdmin ) {
          alert('NOT ADMIN!');
          return redirect()->route('feed');
        }
        
        return $next($request);
    }
}
