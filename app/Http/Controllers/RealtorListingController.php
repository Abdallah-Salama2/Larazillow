<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RealtorListingController extends Controller
{
    //
    public function index(Request $request)
    {
//        dd(Auth::user()->listings);
//        dd($request->all());
//        $filters = [
//            "deleted" => $request->boolean('deleted')
//        ];
        Gate::authorize('viewAny', Listing::class);
        $filters = [
            'deleted' => $request->has('deleted') && $request->input('deleted') === 'true',
            'by' => $request->input('by'),
            'order' => $request->input('order')

        ];

//        Listing::class
//        dd($filters);
        return inertia('Realtor/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()
                    ->listings()
//                    ->mostRecent()
                    ->filter($filters)
                    ->withCount('images')
                    ->paginate(5)
                    ->withQueryString()]
        );
    }
//if you want to display only deleted models then use ===> Auth::user()->listings()->latest()->onlyTrashed()->get();
//but if you want to display user models + deleted models then do like the teacher ===> Auth::user()->listings()->latest()->withTrashed()->get();
//


    public function create()
    {
        //i cant go to new listing page now cuz its false in listing policy
        //Instead of Putting authorize for every method we will just do it in the constructor
//        Gate::authorize('create',Listing::class);
        return inertia('Listing/Create',
            []
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        //Best Practice
//        Listing::create(
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );
        return redirect()->route('listing.index')->with('success', 'Listing was Created!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Listing $listing)
    {
        //
        Gate::authorize('update', $listing);
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }
    public function restore(Listing $listing)
    {
        $listing->restore();

        return redirect()->back()->with('success', 'Listing was restored!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        //
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was changed!');
    }


    public function destroy(Listing $listing)
    {
        //
        Gate::authorize('delete', $listing);
        $listing->deleteOrFail();


        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
