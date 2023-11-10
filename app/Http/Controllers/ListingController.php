<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Listing;

class ListingController extends Controller
{
    //All listings
    public function index()
    {
        // dd(request('tag'));
        return view('listings.index', [
            // 'headings' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(4)
        ]);
    }

    //Single listings
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Show Create Form
    public function create()
    {
        return view('listings.create');
    }

    //Store Create Form
    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo'))
        {
            // dd($request->file('logo'));
             $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
    
    //Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Make Sure The Logged In User Is The Owner
        if($listing->user_id != auth()->id())
        {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo'))
        {
            // dd($request->file('logo'));
             $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/')->with('message', 'Listing Updated Successfully!');
    }
    //Delete Listing
    public function destroy(Listing $listing)
    {
        // Make Sure The Logged In User Is The Owner
        if($listing->user_id != auth()->id())
        {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

    //Manage Listings
    public function manage()
    {
    //    return dd(auth());
        return view('listings.manage', ['listings'=>auth()->user()->listings()->get()]);
    }
}
