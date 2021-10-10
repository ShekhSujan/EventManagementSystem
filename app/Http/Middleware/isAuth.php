<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class isAuth
{
  public function handle($request, Closure $next)
  {
    if (Auth::check())
    {

      if(Auth::user()->role>=1)
      {
        return $next($request);
      }
    }

    return redirect('login');

}
}
