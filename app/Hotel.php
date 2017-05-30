<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Hotel extends Model
{

	// each hotel HAS one agodahotel
	public function agodahotel() {
		return $this->hasOne('App\Agodahotel'); // this matches the Eloquent model
	}    

	// each hotel HAS one bookinghotel
	public function bookinghotel() {
		return $this->hasOne('App\Bookinghotel'); // this matches the Eloquent model
	}   

	// each hotel have many videos
	public function videos() {
		return $this->hasMany('App\Video');
	}

    public function addVideo(Video $video) 
    {
    	return $this->video()->save($video);
    }   	
}
