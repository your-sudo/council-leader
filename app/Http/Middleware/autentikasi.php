<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class autentikasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
    public function autentikasi(Request $request): Response
    {
        if (!$request->session()->has('username')) {
            return redirect()->route('login')->withErrors([
                'username' => 'Anda harus login terlebih dahulu',
            ]);
        }

        return $next($request);


}
}