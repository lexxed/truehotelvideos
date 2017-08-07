<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Agodahotel;
use App\Bookinghotel;
use App\Cities;
use App\Video;

class HotelController extends Controller
{
    public function show($cityslug,$slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();
    	$agodahotel = Agodahotel::where('tel_id', $hotel->agodaid)->firstOrFail();
   	    //$cities = Cities::where('city', $hotel->city)->firstOrFail();
        $cities = Cities::where('slug', $cityslug)->firstOrFail();

    	//$similar = Agodahotel::where('star_rating', $agodahotel->star_rating)->take(3)->get();
    	//$similar = Agodahotel::where('star_rating', '=', $agodahotel->star_rating)->where('city',$agodahotel->city)->get()->random(3);

        $similar = Hotel::where('city', '=', $hotel->city)
                              ->where('live', '!=', '0')  
                              ->where('star_rating', '=', $agodahotel->star_rating)
                              ->where('photo1', '!=', '')
                              ->get()
                              ->random(3);          

    	$videos = Video::where('hotel_id', $hotel->id)
                        ->where('submitby', '=', config('constants.vidAllowCode'))  
                        ->get();


    	//if($hotel->bookingid != 0) {
		$bookinghotel = Bookinghotel::where('id', $hotel->bookingid)->First();	

		return view('hotel')->with(['hotel' => $hotel, 'agodahotel' => $agodahotel, 'similar' => $similar, 'videos' => $videos, 'bookinghotel' => $bookinghotel, 'city' => $hotel->city, 'cityslug' => $cities->slug]);    		
    	//} else {
    	//	return view('hotel')->with(['hotel' => $hotel, 'agodahotel' => $agodahotel, 'similar' => $similar, 'videos' => $videos]);    		
    	//}
    	
    }      
}
