<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agodahotel;
use App\bookinghotel;
use App\Hotel;

class HotelsourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agoda()
    {
        //$products = Product::all();
        $agodahotel = agodahotel::where('city', 'bangkok')->get();

        //$term = "Silom City Hotel";
        //$agodahotel = agodahotel::where('city', 'bangkok')->Where('hotel_name','LIKE','%'.$term.'%')->get();
        /*
        foreach ($agodahotel as $ahotel) {

                $hotel = new Hotel();  
                $hotel->agodaid = $ahotel->tel_id;
                $hotel->bookingid = 0;
                $hotel->hotelname = $ahotel->hotel_name;
                $hotel->country = $ahotel->country;
                $hotel->city= $ahotel->city;
                $hotel->save();            

        }
        */        
        
        return view('agodahotel')->with('agodahotel', $agodahotel);
    }  

    public function hotel() 
    {

        //$hotels = hotel::all();

        $hotels = \DB::table('hotels')
            ->join('bookingcomhotels', 'hotels.hotelname', '=', 'bookingcomhotels.name')
            ->get();      

        //dd($hotels);      
            var_dump($hotels);


        return view('hotelsource')->with('hotels', $hotels);

        //$bookinghotel = bookinghotel::where('hotel_name','LIKE','%'.$term.'%')->get();
        //DB::table('users')->join('groups', 'users.group_id', '=', 'groups.id')->get();

    }

    public function createslug() 
    {
        $hotels = hotel::where('bookingid', 0)
                        ->get();       

        foreach ($hotels as $hotel) {                        
            $hotelone = Hotel::where('hotelname', $hotel->hotelname);

            $slug = str_slug($hotel->hotelname, "-");
            $hotel->slug = $slug;

            //dd($slug);

            //Hotel::where('hotelname', $hotel->hotelname)
            //       ->update(['slug' => $slug]); // this will also update the record            

            //$hotel->save();              
        }               

        return view('createslug')->with('hotels', $hotels);        
    }    

}
