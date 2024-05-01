<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
//});


Route::get("/", [ListingController::class, "index"])->middleware('auth');
Route::get("/hello", [IndexController::class, "show"]);

//Removed Middle Ware from index so non registered users can explore listings
//
Route::get('/listing', [ListingController::class, 'index'])->name('listing.index');
    Route::get('/listing/{listing}', [ListingController::class, 'show'])->name('listing.show');
//Route::get('/cr', [ListingController::class, 'create'])->name('listing.create')->middleware('auth');
//Route::resource('listing', ListingController::class)->middleware(['auth', 'can.listing:viewAny,view,create,update,delete,restore,forceDelete']);
Route::resource('listing', ListingController::class)->middleware('auth')->except('index', 'show', 'create','store');
//Route::resource('listing', ListingController::class)
//    ->only(['create', 'store', 'edit', 'update', 'destroy'])
//    ->middleware('auth');
//Route::resource('listing', ListingController::class)
//    ->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);
Route::get("login", [AuthController::class, 'create'])->name("login");
Route::post("login", [AuthController::class, 'store'])->name("login.store");
Route::delete("logout", [AuthController::class, 'destroy'])->name("logout");
Route::resource('listing.offer', ListingOfferController::class)
    ->middleware('auth')
    ->only(['store']);

//Route::

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(
    function () {
        Route::name('listing.restore')
            ->put(
                'listing/{listing}/restore',
                [RealtorListingController::class, 'restore']
            )->withTrashed();
        Route::resource('listing', RealtorListingController::class);
        Route::resource('listing.image', RealtorListingImageController::class)->only(['create','store','destroy']);

    },



);

