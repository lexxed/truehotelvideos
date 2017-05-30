<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agodahotel extends Model
{
	// LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
	// since the plural of fish isnt what we named our database table we have to define it
	//protected $table = 'fish';

	//protected $primaryKey = 'tel_id';

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function hotel() {
		return $this->belongsTo('App\Hotel');
	}    
}
