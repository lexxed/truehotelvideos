<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() 
	{
		//$product = Product::where('slug', 'royal-jelly')->firstOrFail();


		return view('home')->with(['city' => '']);
		//return view('cities')->with(['cities' => $cities, 'country' => $country]);    	
		//return view('cities')->with(['cities' => $cities, 'country' => $country]);
	} 
}
