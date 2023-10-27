<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyCustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session('user_data')){
            $which = $request->route()->getAction('middleware');
            if(in_array('auth_for_admin',$which) && session('user_data')->role == 2){
                return redirect()->route('admin.blog_posts');
            }
            return $next($request);
        }else{
            return redirect()->route('admin.login');
        }
    }
}
