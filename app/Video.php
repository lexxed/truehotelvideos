<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{


	protected $fillable = ['submitby','tag'];

	//protected $table = 'customerinformation';

	public function hotel() {
		return $this->belongsTo('App\Hotel');
	}        
}
