<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Agodahotel;
use App\Bookinghotel;


class AffiliateController extends Controller
{
    public function ag($slug) 
    {

        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        $agodahotel = Agodahotel::where('tel_id', $hotel->agodaid)->firstOrFail();

        $link = "https://www.agoda.com/partners/partnersearch.aspx?cid=".config('constants.agodasiteid')."&pcs=1&hl=en&hid=".$hotel->agodaid;

		if (count($hotel)) {
		  //header("HTTP/1.1 301 Moved Permanently");
		  header('refresh: 2; url='.$link);
		  //header("Location: " . $link);
		  return view('pause-screen', ['source' => 'Agoda.com']);
		  exit();
		  //header("Location: ".$link);
		  //header("Connection: close");}
		} else {
		  header('HTTP/1.0 404 Not Found');
		  echo "page not found";
		  //include("/var/www/vhosts/kgun.com/httpdocs/errors/404.html");
		}
		exit();        

        //return view('book')->with(['hotel' => $hotel, 'agodahotel' => $agodahotel]);

    }      

    public function bk($slug) 
    {

        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        $bookinghotel = Bookinghotel::where('id', $hotel->bookingid)->firstOrFail();

        $link = $bookinghotel->hotel_url . "?aid=" . config('constants.bookingid');

		if (count($hotel)) {
		  //header("HTTP/1.1 301 Moved Permanently");
		  header('refresh: 2; url='.$link);
		  return view('pause-screen', ['source' => 'Booking.com']);
		  exit();
		  //header("Location: ".$link);
		  //header("Connection: close");}
		} else {
		  header('HTTP/1.0 404 Not Found');
		  echo "page not found";
		  //include("/var/www/vhosts/kgun.com/httpdocs/errors/404.html");
		}
		exit();        

        //return view('book')->with(['hotel' => $hotel, 'agodahotel' => $agodahotel]);

    }       
}
