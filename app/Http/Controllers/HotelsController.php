<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Cities;
use App\Video;
use App\agodahotel;


class HotelsController extends Controller
{
    public function show($country,$cityslug)
    {

        $cities = Cities::where('slug', $cityslug)->firstOrFail();
        $city = $cities->city;

        if($city=='Bangkok') {
            $star_limit = 3;
        } else {
            $star_limit = 2;
        }

        $hotels = Hotel::where('city', '=', $city)
                        ->where('live', '!=', '0')  
        				->where('star_rating', '>', $star_limit)
                        ->where('photo1', '!=', '')
        				->orderBy('vidcount', 'desc')
                        ->orderBy('rating_average', 'desc')
        				->paginate(5);
           				//->get();    

        $similar = Hotel::where('city', '=', $city)
                              ->where('live', '!=', '0')  
                              ->where('star_rating', '>', $star_limit)
                              ->where('photo1', '!=', '')
                              ->get()
                              ->random(3);  


                                                 
        //with('agodahotel')
        //return view('hotels',  compact('hotels'));               				

		return view('hotels')->with(['hotels' => $hotels, 'similar' => $similar, 'country' => $country, 'city' => $city, 'cityslug' => $cityslug]);    		           		

        //var_dump($hotels);

		//$agodahotels = agodahotel::with('Hotel')->get();
		//return view('user.index',  compact('users'));           				

        //$hotels = \DB::table('hotels')
        //    			->join('agodahotels', 'hotels.agodaid', '=', 'agodahotels.tel_id')
        //        		->where('hotels.city', '=', $city)
        //        		->where('hotels.star_rating', '>', 3)
                		//->orderBy('hotels.rating_average', 'desc')
        //        		->orderBy('hotels.star_rating', 'desc')
        //        		->take(10)
        //    			->get();   

		//$hotels = \DB::select('SELECT * from hotels 
		//						WHERE city = ? 
		//							AND star_rating  > ?
		//						ORDER BY rating_average DESC								
		//						LIMIT 10', [$city, 3]);

        //return view('user.index', ['users' => $users]);

        //var_dump($hotels);

        
        
    } 
 
}
