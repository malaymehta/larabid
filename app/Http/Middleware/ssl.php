<?php namespace App\Http\Middleware;

use Closure;

class ssl {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!$request->secure())
		{
			return Redirect::secure($request->path());
		}
		return $next($request);
	}

}
