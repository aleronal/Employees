<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;

class CountryController extends Controller
{
    public function index(Request $request)
    {

        $countries = Country::all();

        if($request->has('search')){
            $countries = Country::where('name','like',"%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}%")->get();
        }


        return view('country.index', compact('countries'));
    }

    public function create()
    {
        $this->authorize('create', Country::class);

        return view('country.create');
    }

    public function store(CountryStoreRequest $request)
    {

        $this->authorize('create', Country::class);

        Country::create($request->validated());

        return redirect()->route('country.index')->with('message', 'Country Created Successfully');
    }

    public function edit(Country $country)
    {
        $this->authorize('update', Country::class);
        return view('country.edit', compact('country'));
    }

    public function update(CountryStoreRequest $request, Country $country)
    {
        $this->authorize('update', Country::class);
        
        $country->update($request->validated());
        return redirect()->route('country.index')->with('message', 'Country Updated Successfully');
    }

    public function destroy(Country $country)
    {

        $this->authorize('delete', Country::class);

        $country->delete();

        return redirect()->route('country.index')->with('message', 'Country Deleted Successfully');
    }


}
