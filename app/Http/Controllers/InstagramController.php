<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Video;
Use App\Instagram;
Use App\Hotel;
Use App\Cities;
Use App\Agodahotel;


class InstagramController extends Controller
{
 
    public function show($slug) 
    {

        //dd(\Session::get(null));
        //dd(Session::get('customerinformation'));     

        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        $agodahotel = Agodahotel::where('tel_id', $hotel->agodaid)->firstOrFail();

        return view('instagram-add')->with(['hotel' => $hotel, 'agodahotel' => $agodahotel, 'city' => '']);

    }  

    public function store(Request $request, Hotel $hotel)
    {
    	//return var_dump($card);
    	//return $request->all();
    	# input manual
    	//$note = new Note;
    	//$note->body = $request->body;
    	//$note->user_id = $request->user_id;
    	//$card->notes()->save($note);     

        //https://youtu.be/ZVxFACw2Sl8

        $rules = [
            'submitby' => 'required',
            'instagramurl' => 'required'
        ];
        $this->validate($request, $rules);        

        # check if its youtube url
        $haystack = $request->instagramurl;
        $source = 'ot'; // others

        if(preg_match("/(instagr.am|instagram.com)/i", $haystack)){
            $source = 'in'; // instagram
        }     

        if($request->submitby == config('constants.vidAllowCode')) {
        	$embedcode = $request->instagramurl;
        	$tag = '';
        } else {
        	$embedcode = '';
        	$tag = $request->instagramurl;     	
        }

        # save video info into DB
        $instagram = new Instagram($request->all());
        $instagram->hotel_id = $hotel->id;
        $instagram->source = $source;
        $instagram->tag = $tag;
        $instagram->embedcode = $embedcode;
        $instagram->voteup = 0;
        $instagram->votedown = 0;
        //$hotel->addVideo($video);   
        $instagram->save();    

        # increment hotels table video count by 1
        //\DB::Table('hotels')->whereid($hotel->id)->Increment('vidcount');

        $city = Cities::where('city', $hotel->city)->first();

        return redirect('/'. $city->slug . '/' . $hotel->slug);
    }   

  


}

