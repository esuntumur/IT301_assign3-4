<?php
// * B180910069 Амарбат

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

        if (session()->has('LoggedCustomer') && ($request->path() != 'customer/myorder' && $request->path() != 'customer/home' && $request->path() != 'customer/profile' && $request->path() != 'customer/search' && !$request->is('customer/content/*') && $request->path() != 'customer/content/{id}/orderContent' && $request->path() != 'customer/myorder/{orderId}')) {
            return back();
        }
        if (session()->has('LoggedAdmin') && ($request->path() != 'admin/home' && $request->path() != 'admin/profile' && $request->path() != 'admin/shops' && $request->path() != 'admin/customers')) {
            return back();
        }
        if (session()->has('LoggedShop') && ($request->path() != 'shop/home' && $request->path() != 'shop/profile' && $request->path() != 'shop/storeContent' && $request->path() != 'shop/storeContent/{id}' && $request->path() != 'shop/createContent' && $request->path() != 'shop/myStorage' && $request->path() != 'shop/search' && $request->path() != 'shop/givecontent' && $request->path() != 'shop/recievecontent' && $request->path() != 'shop/myorder' && $request->path() != 'shop/myorder/{orderId}')) {
            return back();
        }
        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
