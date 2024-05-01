<?php

namespace App\Http\Controllers;

//Auth Controller centered around resource Authenticated user session
//Create U Present a form that will allow u to submit smth.
//store Which would create the session if submitted data is valid
//destroy Which will destroy the session when user logs out
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    //responsible for displaying the form to sign in
    public function create()
    {
        return Inertia(
            'Auth2/Login',
        );

    }

    // Handling the logic when the form is submitted it will create a resource that would be authenticated session
    public function store(Request $request)
    {
        // Validate the incoming request data
        $result = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        // Attempt authentication using the provided credentials
        // The 'attempt' method accepts two parameters:
        // 1. An array of credentials (typically email and password)
        // 2. A boolean indicating whether to remember the user's session
        // If authentication succeeds, the user is logged in for the current session
        if (!Auth::attempt($result)) {
            // If authentication fails, throw a validation exception with a custom message
            throw ValidationException::withMessages([
                'email' => 'Authentication failed'
            ]);
        }

        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Redirect the user to the intended destination after authentication
        return redirect()->intended('/listing');
    }

    //logout action
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();//will regen a csrf token

        return redirect()->route('listing.index');
    }
}
