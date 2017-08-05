<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	//dd($request->q);
    	$message = '';

        $hotels = Hotel::where('hotelname', 'LIKE', '%'.$request->q.'%')
                        ->where('live', '!=', '0')  
                        ->where('photo1', '!=', '')
        				->orderBy('vidcount', 'desc')
                        ->orderBy('rating_average', 'desc')
        				->paginate(10);

		if($hotels->isEmpty()) {

			$message = "Sorry, no results found for ";
		    $hotels = Hotel::where('live', '!=', '0')  
		                    ->where('photo1', '!=', '')
		    				->orderBy('vidcount', 'desc')
		                    ->orderBy('rating_average', 'desc')
		    				->paginate(10);			
		}        				    	

    	return view('search')->with(['hotels' => $hotels, 'q' => $request->q, 'city' => '', 'message' => $message]);
    }    
}
