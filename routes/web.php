<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Common Resource Routes
//Index - Show all listings
//Show - Show single listing
//Create - Show form to create a new listing
//store - Store new listing
//edit - Show form to edit a listing
//update - update a listing
//destroy - delete listing

//All listings
Route::get('/', [ListingController::class, "index"]);

//Show Create Form Route
Route::get('/listings/create',[ListingController::class, "create"])->middleware('auth');

//store route
Route::post('/listings', [ListingController::class, "store"])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, "edit"])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}/', [ListingController::class, "update"])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}/', [ListingController::class, "destroy"])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, "manage"])->middleware('auth');

//Single listing
Route::get('/listings/{listing}',[ListingController::class, "show"]);

//Show Register/Create Form
Route::get('/register', [UserController::class, "create"])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, "store"]);

//Logout User
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');

//show Login Form
Route::get('/login', [UserController::class, "login"])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, "authenticate"]);
// Route::get('/listings/{id}', function($id) {
//     $listing = Listing::find($id);
//     if($listing)
//     {
//         return view('listing',[
//             'listing'=>$listing ]);
//     }
//     else{
//         abort("404");
//     }
    
// });

Route::get('job', function() {
    return view('jobs');
});
