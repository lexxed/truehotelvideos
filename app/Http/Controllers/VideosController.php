<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Video;
Use App\Hotel;
Use App\Agodahotel;


class VideosController extends Controller
{
 
    public function show($slug) 
    {

        //dd(\Session::get(null));
        //dd(Session::get('customerinformation'));     

        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        $agodahotel = Agodahotel::where('tel_id', $hotel->agodaid)->firstOrFail();

        return view('video-add')->with(['hotel' => $hotel, 'agodahotel' => $agodahotel]);

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

        # check if its youtube url
        $haystack = $request->videourl;
        $source = 'ot'; // others

        if(preg_match("/(youtu.be|youtube.com)/i", $haystack)){
            $source = 'yt'; // youtube
        }     

        # get youtube id
        $tag = 0;
        $url = $request->videourl;

        if (stristr($url,'youtu.be/')) {
            preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); 
            $tag = $final_ID[4]; 
        }
        else {
            @preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); 
            $tag = $IDD[5]; 
        }
        //dd($tag);

        # save video info into DB
        $video = new Video($request->all());
        $video->hotel_id = $hotel->id;
        $video->source = $source;
        $video->tag = $tag;
        $video->voteup = 0;
        $video->votedown = 0;
        //$hotel->addVideo($video);   
        $video->save();    

        return redirect('/'.$hotel->slug);
    }   

  


}
