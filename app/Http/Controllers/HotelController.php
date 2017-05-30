<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Agodahotel;
use App\Video;

class HotelController extends Controller
{
    public function show($slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();

    	$agodahotel = Agodahotel::where('tel_id', $hotel->agodaid)->firstOrFail();


    	$videos = Video::where('hotel_id', $hotel->id)->get();


        return view('hotel')->with(['hotel' => $hotel, 'agodahotel' => $agodahotel, 'videos' => $videos]);
        
    }      
}
