<?php

namespace App\Http\Middleware;

use App\Models\UserDetails;
use Closure;

class ProfileIncomplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = $request->session()->get('user')->id;
        $userDetails = UserDetails::where('users_id', $userId)->get();
        if(count($userDetails) == 0) {
            return redirect('/profile/incomplete');
        }
        return $next($request);
    }
}
