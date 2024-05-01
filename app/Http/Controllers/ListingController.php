<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use App\Policies\ListingPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{

    //NOTE MOHEM TARE2A Tl3t Msh KAMLA W NA ET5N2T
//    public function __construct()
//    {
//        //Instead of Putting authorize for every method we will just do it in the constructor
//
////        Gate::resource('listing', Listing::class);
////        $this->authorizeResource(Listing::class, 'listing');
////        deh tare2a 2adema w ana msh la2y gdeda ele la2eto any a3ml custom middleware ast3mlo
//
//        /*
//         * Certainly! If you prefer not to use the authorizeResource() method in the constructor, another approach is to define middleware for your controller that handles authorization using the ListingPolicy. Here's how you can do it:
//
//First, create a custom middleware for your controller's authorization:
//
//php
//Copy code
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Gate;
//
//class AuthorizeListingActions
//{
//    public function handle(Request $request, Closure $next, $ability)
//    {
//        if ($request->route()->hasParameter('listing')) {
//            $listing = $request->route('listing');
//            if (Gate::denies($ability, $listing)) {
//                abort(403, 'Unauthorized action.');
//            }
//        } else {
//            if (Gate::denies($ability, 'App\Models\Listing')) {
//                abort(403, 'Unauthorized action.');
//            }
//        }
//
//        return $next($request);
//    }
//}
//Save to grepper
//In this middleware:
//
//We check if the route has a parameter named 'listing'. If it does, we fetch the Listing model from the route parameters and authorize the action based on it.
//If the route does not have a 'listing' parameter, we authorize the action based on the class name 'App\Models\Listing'.
//Next, register this middleware in the $routeMiddleware array in your app/Http/Kernel.php file:
//
//php
//Copy code
//protected $routeMiddleware = [
//    // Other middleware
//    'can.listing' => \App\Http\Middleware\AuthorizeListingActions::class,
//];
//Save to grepper
//Now, you can apply this middleware to your ListingController routes in your routes/web.php file:
//
//php
//Copy code
//Route::middleware(['auth', 'can.listing:viewAny,view,create'])->resource('listing', ListingController::class);
//Save to grepper
//With this setup, all requests to your ListingController will go through the AuthorizeListingActions middleware, which will handle the authorization based on the ListingPolicy. T
//        his approach provides more flexibility compared to authorizeResource() as you can customize the middleware logic further if needed.
//         */
//    }
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Listing::class);
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()->filter($filters)
                    ->paginate(10)
                    ->withQueryString()]
        );
    }


    /**
     * Display a listing of the resource.
     */
//    public function index(Request $request)
//    {
//        re
////        dd(Auth::user());
//        Gate::authorize('viewAny', Listing::class);
//        if (!auth()->check()) {
//            // User is not logged in, set flash message and redirect to login page
//
//        }else{
//            return inertia('Listing/Index',
//                [
//                    'listings' => Listing::all()
//                ]);
//        }
//
//        $filters = $request->only([
//            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
//        ]);
//        $query = Listing::orderByDesc('created_at');
//
//        if ($filters['priceFrom'] ?? false) {
//            $query->where('price', '>=', $filters['priceFrom']);
//        }
//
//        if ($filters['priceTo'] ?? false) {
//            $query->where('price', '<=', $filters['priceTo']);
//        }
//
//        if ($filters['beds'] ?? false) {
//            $query->where('beds', $filters['beds']);
//        }
//
//        if ($filters['baths'] ?? false) {
//            $query->where('baths', $filters['baths']);
//        }
//
//        if ($filters['areaFrom'] ?? false) {
//            $query->where('area', '>=', $filters['areaFrom']);
//        }
//
//        if ($filters['areaTo'] ?? false) {
//            $query->where('area', '<=', $filters['areaTo']);
//        }
    //another way for filters
//        return inertia(
//            'Listing/Index',
//            [
//                'filters' => $filters,
//                'listings' => Listing::orderByDesc('created_at')
//                'listings' => Listing::mostRecent()
//                        ->when(
//                        $filters['priceFrom'] ?? false,
//                        fn ($query, $value) => $query->where('price', '>=', $value)
//                    )->when(
//                        $filters['priceTo'] ?? false,
//                        fn ($query, $value) => $query->where('price', '<=', $value)
//                    )->when(
//                        $filters['beds'] ?? false,
//                        fn ($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
//                    )->when(
//                        $filters['baths'] ?? false,
//                        fn ($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
//                    )->when(
//                        $filters['areaFrom'] ?? false,
//                        fn ($query, $value) => $query->where('area', '>=', $value)
//                    )->when(
//                        $filters['areaTo'] ?? false,
//                        fn ($query, $value) => $query->where('area', '<=', $value)
//                    )->paginate(10)->withQueryString()
//            ]
//        );


//}

//    public function index(Request $request)
//    {
//        //re
//////        dd(Auth::user());
//        Gate::authorize('viewAny', Listing::class);
////        if (!auth()->check()) {
////            // User is not logged in, set flash message and redirect to login page
////
////        }else{
////            return inertia('Listing/Index',
////                [
////                    'listings' => Listing::all()
////                ]);
////        }
//        return inertia('Listing/Index',
//            [
//                'listings' => Listing::orderByDesc('created_at')->paginate(10)->withQueryString(),
//                //All methods of eloq returns an array while paginate returns an object
//
//                'filters' => $request->only([
//                    'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
//                ]),
//            ]);
//
//
//    }

    /**
     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //i cant go to new listing page now cuz its false in listing policy
//        //Instead of Putting authorize for every method we will just do it in the constructor
////        Gate::authorize('create',Listing::class);
//        return inertia('Listing/Create',
//            []
//        );
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        //
//
//
//        //Best Practice
////        Listing::create(
//        $request->user()->listings()->create(
//            $request->validate([
//                'beds' => 'required|integer|min:0|max:20',
//                'baths' => 'required|integer|min:0|max:20',
//                'area' => 'required|integer|min:15|max:1500',
//                'city' => 'required',
//                'code' => 'required',
//                'street' => 'required',
//                'street_nr' => 'required|min:1|max:1000',
//                'price' => 'required|integer|min:1|max:20000000',
//            ])
//        );
//        return redirect()->route('listing.index')->with('success', 'Listing was Created!');
//    }
//
//    /**
//     * Display the specified resource.
//     */
    public function show(Listing $listing)
    {
        //
        //Now user cant see listing deatails when click on any listing WHEN view return false
//        if(Auth::user()->cannot('view',$listing)){
//            abort(403);
//        };

//        Gate::authorize('view-listing',$listing); // same as above
        if (!auth()->check()) {
            // User is not logged in, set flash message and redirect to login page
            return redirect()->route('listing.index')
                ->with('success', 'Please log in to view listing details.');
        }
//        Gate::authorize('view',$listing); // same as above

//         User is logged in, show the listing details
        $listing->load(['images']);
        return inertia(
            'Listing/Show', [
            'listing' => $listing
        ]);
    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//
//    public function edit(Listing $listing)
//    {
//        //
//        Gate::authorize('update', $listing);
//        return inertia(
//            'Listing/Edit',
//            [
//                'listing' => $listing
//            ]
//        );
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public
//    function update(Request $request, Listing $listing)
//    {
//        //
//        $listing->update(
//            $request->validate([
//                'beds' => 'required|integer|min:0|max:20',
//                'baths' => 'required|integer|min:0|max:20',
//                'area' => 'required|integer|min:15|max:1500',
//                'city' => 'required',
//                'code' => 'required',
//                'street' => 'required',
//                'street_nr' => 'required|min:1|max:1000',
//                'price' => 'required|integer|min:1|max:20000000',
//            ])
//        );
//
//        return redirect()->route('listing.index')
//            ->with('success', 'Listing was changed!');
//    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
        Gate::authorize('delete', $listing);
        $listing->forceDelete();


        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
