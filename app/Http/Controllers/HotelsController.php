<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class HotelsController extends Controller
{
    public function show($city)
    {
        $hotels = Hotel::where('city', $city)->take(20)->get();

        //var_dump($hotels);

        return view('hotels')->with('hotels', $hotels);
    }        
}
