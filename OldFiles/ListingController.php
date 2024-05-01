<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //re
        return inertia('Listing/Index',
            [
                'listings' => Listing::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
//        $listing =new Listing();
//        $listing->beds=$request->beds;
//        $listing->save();
//        $request->validate([
//            'beds' => 'required|integer|min:0|max:20',
//            'baths' => 'required|integer|min:0|max:20',
//            'area' => 'required|integer|min:15|max:1500',
//            'city' => 'required',
//            'code' => 'required',
//            'street' => 'required',
//            'street_nr' => 'required|min:1|max:1000',
//            'price' => 'required|integer|min:1|max:20000000',
//        ]);
//        Listing::create($request->all());

        //Best Practice
        Listing::create(
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
    public function show(Listing $listing)
    {
        //
        return inertia('Listing/Show',
            [
                'listing' => $listing
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */


//Sure, I can explain the process of updating a listing using the provided code and Laravel. Here's a step-by-step breakdown of what happens:
//
//Displaying the Edit Form: When a user navigates to the edit page for a listing, the edit() method of the ListingController is called.
// This method retrieves the listing data and returns an Inertia response containing the 'Listing/Edit' component along with the listing data.

    /*Rendering the Form: The Vue.js template receives the listing data as props.
The form fields are pre-filled with the existing listing data. Vue.js is used for two-way data binding (v-model)
to ensure that changes made in the form fields are reflected in the form object.

    Form Submission: When the user submits the form by clicking the "Edit" button, the update method is called.

    Handling Form Submission: The update method sends a PUT request to the Laravel backend with the updated listing data.
It calls the form.put() method provided by the @inertiajs/inertia-vue3 package, which sends the form data to the Laravel backend.

    Validation: In the Laravel backend, the update() method of the ListingController is invoked to handle the PUT request.
It validates the incoming request data using the validate() method, ensuring that the data conforms to the specified rules.
If validation fails, Laravel will automatically redirect back to the form page with validation errors.

    Updating the Listing: If validation passes, the update() method updates the corresponding listing record in the database with the new data.
It uses the update() method on the $listing object, passing the validated request data as an array.

    Redirecting: After successfully updating the listing, Laravel redirects the user to the index page for listings (listing.index)
with a success message flashed to the session.

    Success Message: The success message is displayed on the index page, informing the user that the listing was successfully updated.

That's the general flow of how the listing update process works in this scenario.*/
    public function edit(Listing $listing)
    {
        //
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
