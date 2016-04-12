<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                // RedirectResponse guest( string $path, int $status = 302, array $headers = array(), bool $secure = null)
                // NB: Create a new redirect response, while putting the current URL in the session.
                return redirect()->guest('admin/login')->with([
                    'auth_error' => 'Authorized access is required.'
                ]);
            }
        }

        return $next($request);
    }
}
