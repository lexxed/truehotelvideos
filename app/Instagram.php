<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{

	protected $table = 'instagram';
	protected $fillable = ['submitby','tag','embedcode'];

	//protected $table = 'customerinformation';

	public function hotel() {
		return $this->belongsTo('App\Hotel');
	}        
}
