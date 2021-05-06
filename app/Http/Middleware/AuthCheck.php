<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((!session()->has('LoggedCustomer') && !session()->has('LoggedAdmin') && !session()->has('LoggedShop')) && ($request->path() != 'auth/login' && $request->path() != 'auth/register' && $request->path() != '/')) {
            return redirect('auth/login')->with('fail', 'нэвтрэх шаадлагатай');
        }
        if (session()->has('LoggedCustomer') && ($request->path() == 'auth/login' || $request->path() == 'auth/register' || $request->path() == 'admin/dashboard' || $request->path() == '/' || $request->path() == 'shop/dashboard' || $request->path() == 'shop/search')) {
            return back();
        }
        if (session()->has('LoggedAdmin') && ($request->path() == 'auth/login' || $request->path() == 'auth/register' || $request->path() == 'customer/dashboard' || $request->path() == 'shop/dashboard' || $request->path() == '/' || $request->path() == 'customer/search')) {
            return back();
        }
        if (session()->has('LoggedShop') && ($request->path() == 'auth/login' || $request->path() == 'auth/register' || $request->path() == 'admin/dashboard' || $request->path() == 'customer/dashboard' || $request->path() == '/' || $request->path() == 'customer/search')) {
            return back();
        }
        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
