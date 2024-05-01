<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * In the code snippet you provided, the inertia function is being used to return a view named 'Index'.
     * Inertia.js is a programming paradigm that allows you to create single-page applications (SPAs) using server-side frameworks like Laravel,
     * Rails, or Django, but with client-side rendering using frontend frameworks like React, Vue.js, or Svelte.
     *
     * Using Inertia.js, you can build dynamic web applications without having to write separate API endpoints
     * for your frontend and backend. Instead, your server-side framework serves a main layout (like 'Index' in your example),
     * and then your frontend framework can make requests to your server-side routes to fetch data and update the DOM accordingly.
     *
     * So, in this case, the index method is likely a controller method in a Laravel application. When this method is called,
     * it returns the 'Index' view using the Inertia.js framework.
     * This allows for a seamless integration of backend and frontend code in the application.
     */
    public function index()
    {
        //

        return inertia('Index',
        [
            'message'=>'Hello From Laravel'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id=null)
    {
        //
        return inertia('Show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
