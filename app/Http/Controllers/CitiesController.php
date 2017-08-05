<?php

namespace App\Http\Controllers;
use App\Cities;

use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function show($country)
    {
        $cities = Cities::where('country', '=', $country)
        				->where('show', '=', 1)
           				->get();    

        //with('agodahotel')
        //return view('hotels',  compact('hotels'));               				

		return view('cities')->with(['cities' => $cities, 'country' => $country]);    		           		
	}	    
}
