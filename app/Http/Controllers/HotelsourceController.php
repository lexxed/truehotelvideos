<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agodahotel;
use App\bookinghotel;
use App\Hotel;
use App\Cities;
use App\Http\Requests ;
use Illuminate\Support\Facades\Input;

include(app_path() . '/Cloudinary/Cloudinary.php');
include(app_path() . '/Cloudinary/Uploader.php');
include(app_path() . '/Cloudinary/Api.php');


class HotelsourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agoda()
    {
        # copy krabi hotels from agodahotels.db to hotels.db
        $agodahotel = agodahotel::where('city', 'chiang rai')
                                ->where('flag','=',0)
                                ->take(100)
                                ->get();

        //$term = "Silom City Hotel";
        //$agodahotel = agodahotel::where('city', 'bangkok')->Where('hotel_name','LIKE','%'.$term.'%')->get();

        # store bangkok agoda hotels into main hotels table
        /*                        
        foreach ($agodahotel as $ahotel) {

                $hotel = new Hotel();  
                $hotel->agodaid = $ahotel->tel_id;
                $hotel->bookingid = 0;
                $hotel->vidcount = 0;
                $hotel->flag = 0;
                $hotel->bookingcom_rate = 0;
                $hotel->hotelname = $ahotel->hotel_name;
                $hotel->slug = str_slug($hotel->hotelname, "-");                
                $hotel->star_rating = $ahotel->star_rating;
                $hotel->rating_average = $ahotel->rating_average;
                $hotel->photo1 = $ahotel->photo1;
                $hotel->agoda_rate = $ahotel->rates_from;
                $hotel->agoda_rate_cur = $ahotel->rates_currency;
                $hotel->country = $ahotel->country;
                $hotel->city= $ahotel->city;
                $hotel->save();            

        }

        foreach ($agodahotel as $ahotel) {
            //$agodahotel = agodahotel::where('tel_id',$ahotel->tel_id);  
            //$agodahotel->flag = 1;
            //$agodahotel->update();
            agodahotel::where('tel_id','=',$ahotel->tel_id)->update(['flag' => 1]);

        } 
        */    

        
        return view('source.agodahotel')->with('agodahotel', $agodahotel);
    }  

    public function bookingcomhotels() 
    {

        //$hotels = hotel::all();

        $hotels = \DB::table('hotels')
            ->join('bookingcomhotels', 'hotels.hotelname', '=', 'bookingcomhotels.name')
                ->where('bookingcomhotels.cc1', '=', 'th')
            ->get();      

        //dd($hotels);      
        //var_dump($hotels);


        return view('source.bookingcomhotels')->with('hotels', $hotels);

        //$bookinghotel = bookinghotel::where('hotel_name','LIKE','%'.$term.'%')->get();
        //DB::table('users')->join('groups', 'users.group_id', '=', 'groups.id')->get();

    }

    public function bookinghotelsearchShow() 
    {
       
        return view('source.bookinghotelsearchShow');      

    }    

    public function bookinghotelsearchProcess() 
    {

        $q  = Input::get('q') ;    
        
        $bookinghotels = bookinghotel::Where('name', 'like', '%' . $q . '%')->get();           

        $hotels = hotel::Where('hotelname', 'like', '%' . $q . '%')->get();           

        $agodahotels = agodahotel::Where('hotel_name', 'like', '%' . $q . '%')->get();      

        return view('source.bookinghotelsearchProcess')->with(['q' => $q, 'bookinghotels' => $bookinghotels, 'hotels' => $hotels, 'agodahotels' => $agodahotels]);


    }       

    public function bookinghotelsearchByUrl($q) 
    {

        $bookinghotels = bookinghotel::Where('name', 'like', '%' . $q . '%')->get();           

        $hotels = hotel::Where('hotelname', 'like', '%' . $q . '%')->get();           

        $agodahotels = agodahotel::Where('hotel_name', 'like', '%' . $q . '%')->get();      

        return view('source.bookinghotelsearchProcess')->with(['q' => $q, 'bookinghotels' => $bookinghotels, 'hotels' => $hotels, 'agodahotels' => $agodahotels]);


    }      

    public function bookinghotelsearchCopy($id, $bookingid) 
    {

        Hotel::where('id', $id)
           ->update(['bookingid' => $bookingid]);

        
        $hotel = Hotel::where('id', $id)->firstOrFail();    
           
        return \Redirect::to('/'.$hotel->slug);


    }      



    # create slug for hotel db
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

        return view('source.createslug')->with('hotels', $hotels);        
    }    

    # copy agoda star_rating to hotels star_rating
    public function agodastartohotels() 
    {
        $hotels = Hotel::where('bookingid', 0)->take(200)->get();

        foreach ($hotels as $hotel) {

            $agodahotel = agodahotel::where('tel_id', $hotel->agodaid)->first();

            echo $agodahotel->hotel_name . ":" . $agodahotel->star_rating; 

            echo "<br>" . $hotel->hotelname . ":" . $hotel->star_rating; 

            echo "<br><br>";

            //\DB::table('hotels')
            //            ->where('id', $hotel->id)
            //            ->update(['star_rating' => $agodahotel->star_rating]);         

        }
        //return view('source.agodastartohotels')->with('hotels', $hotels);           
    }    

    # copy agoda rating_average to hotels
    public function agodaRatingtohotels() 
    {
        $hotels = Hotel::all();

        foreach ($hotels as $hotel) {

            $agodahotel = agodahotel::where('tel_id', $hotel->agodaid)->first();

            echo $agodahotel->hotel_name . ":" . $agodahotel->rating_average; 

            echo "<br>" . $hotel->hotelname . ":" . $hotel->rating_average; 

            echo "<br><br>";

            //\DB::table('hotels')
            //            ->where('id', $hotel->id)
            //            ->update(['rating_average' => $agodahotel->rating_average]);         

        }

    }      

    # copy agoda photo1 to hotels
    public function agodaphoto1tohotels() 
    {
        //$hotels = Hotel::take(100)->get();
        $hotels = Hotel::all();

        foreach ($hotels as $hotel) {

            $agodahotel = agodahotel::where('tel_id', $hotel->agodaid)->first();

            echo $agodahotel->hotel_name . ":" . $agodahotel->photo1; 

            //echo "<br>" . $hotel->hotelname . ":" . $hotel->rating_average; 

            echo "<br><br>";

            //\DB::table('hotels')
            //            ->where('id', $hotel->id)
            //            ->update(['photo1' => $agodahotel->photo1]);         

        }

    }    

    # copy agodahotels.rates_from & rates_currency to hotels.agoda_rate & agoda_rate_cur
    public function agodaRatestoHotels() 
    {
        //$hotels = Hotel::take(100)->get();
        $hotels = Hotel::Where('agoda_rate','=',0)->take(500)->get();


        foreach ($hotels as $hotel) {

            $agodahotel = agodahotel::where('tel_id', $hotel->agodaid)->first();

            //\DB::table('hotels')
            //            ->where('id', $hotel->id)
            //            ->update(['agoda_rate' => $agodahotel->rates_from, 'agoda_rate_cur' => $agodahotel->rates_currency]);

        }
        echo "done";

    }      

    # copy bookingcomhotels.minrate & currencycode to hotels.bookingcom_rate & bookingcom_rate_cur
    public function bookingcomRatestoHotels() 
    {
        //$hotels = Hotel::take(100)->get();
        $hotels = Hotel::Where('bookingid','!=',0)
                        ->where('bookingcom_rate','=',0)
                        //->take(2)
                        ->get();


        foreach ($hotels as $hotel) {

            $bookingcomhotel = bookinghotel::where('id', $hotel->bookingid)->first();

            \DB::table('hotels')
                       ->where('id', $hotel->id)
                        ->update(['bookingcom_rate' => $bookingcomhotel->minrate, 'bookingcom_rate_cur' => $bookingcomhotel->currencycode]);

        }
        echo "done";

    }    

    # copy hotels.id to agodahotels.hotel_id
    public function hotelsid2agodahotels() 
    {
        //$hotels = Hotel::where('hotelname', '=', 'Bangkok Centre Hotel')->first();        
        //$hotels = Hotel::take(2)->get();
        $hotels = Hotel::all(); 

        \DB::table('hotels')->orderBy('id')->chunk(100, function($hotels)
        {
            foreach ($hotels as $hotel) {

                $agodahotel = agodahotel::where('tel_id', $hotel->agodaid)->first();

                \DB::table('agodahotels')
                            ->where('tel_id', $hotel->agodaid)
                            ->update(['hotel_id' => $hotel->id]);         

            }
        });        


        echo "done";

    }      

    public function cloudinary() 
    {    

        \Cloudinary::config(array( 
          "cloud_name" => env('CLOUDINARY_CLOUD_NAME'), 
          "api_key" => env('CLOUDINARY_API_KEY'), 
          "api_secret" => env('CLOUDINARY_API_SECRET') 
        ));

        //\Cloudinary\Uploader::upload("http://pix2.agoda.net/hotelimages/106/10669/10669_111005112254201.jpg?s=312x");
        return view('source.cloudinary');

    }

    public function hotelsourcelist($city)
    {
        //$hotels = Hotel::where('city', $city)->orderBy('vidcount', 'desc')->take(1000)->get();
        $hotels = Hotel::where('city', $city)
                        ->where('star_rating', '>', 1)
                        ->orderBy('vidcount', 'desc')
                        ->orderBy('rating_average', 'desc')
                        ->take(1000)->get();

        //$hotels = Hotel::where('city', $city)->orderBy('star_rating', 'desc')->take(1000)->get();

        //var_dump($hotels);

        return view('source.hotelsourcelist')->with('hotels', $hotels);
    }       

    public function hotel2agodafind1()
    {
        // find a hotel by name
        $hotel = Hotel::where('hotelname', '=', 'Bangkok Centre Hotel')->first();        
        //print_r($hotel);

        // get the agodahotel that is tag to hotel 
        $agodahotel = $hotel->agodahotel;
        dd($agodahotel->tel_id);        

    }   

    public function hotel2agodafindMany()
    {
        // find a hotel by name
        //$hotel = Hotel::where('hotelname', '=', 'Bangkok Centre Hotel')->first();        
        $hotels = Hotel::take(3)->get();        
        //print_r($hotel);

        foreach($hotels as $hotel) {
            $agodahotel = $hotel->agodahotel;
            echo $hotel->hotelname ."<br>";
            echo $agodahotel->rates_from."<br>";
        }

    }   

    public function hotel2agodafindManyView()
    {


        $hotels = Hotel::with('agodahotel')->take(3)->get();        
        //   print_r($hotels);


        return view('source.hotel2agodafindManyView',  compact('hotels'));    

        

    }   

    public function copycities()
    {

        $agodahotels = \DB::table('agodahotels')
                    ->where('country','thailand')
                    ->select('city')
                    ->groupBy('city')
                    ->get();

        $i = 1;

        foreach ($agodahotels as $a) {
            //echo "<br>" . $i .". ". $a->city;
            //$i++; 
                $city = new Cities();   
                $city->city = $a->city;
                $city->slug = str_slug($a->city, "-");                                
                $city->show = 0;
                $city->country = "Thailand";
                $city->save();            
        }


    }     



}
