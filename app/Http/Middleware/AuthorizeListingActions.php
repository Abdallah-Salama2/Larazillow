<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthorizeListingActions
{
    public function handle(Request $request, Closure $next, $ability)
    {
        if ($request->route()->hasParameter('listing')) {
            $listing = $request->route('listing');
            if (Gate::denies($ability, $listing)) {
                abort(403, 'Unauthorized action.');
            }
        } else {
            if (Gate::denies($ability, 'App\Models\Listing')) {
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}
