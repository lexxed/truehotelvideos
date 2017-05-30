<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgodaHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agodahotels', function (Blueprint $table) {
            $table->integer('tel_id');
            $table->integer('chain_id');
            $table->string('chain_name');
            $table->integer('brand_id');
            $table->string('brand_name');
            $table->string('hotel_name');
            $table->string('hotel_formerly_name');
            $table->string('hotel_translated_name');
            $table->text('addressline1');
            $table->text('addressline2');
            $table->string('zipcode');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->char('countryisocode', 9);
            $table->char('star_rating', 9);
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->string('url');
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('numberrooms');
            $table->integer('numberfloors');
            $table->integer('yearopened');
            $table->integer('yearrenovated');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->string('photo4');
            $table->string('photo5');
            $table->text('overview');
            $table->integer('rates_from');
            $table->integer('continent_id');
            $table->string('continent_name');
            $table->string('city_id');
            $table->string('country_id');
            $table->integer('number_of_reviews');
            $table->decimal('rating_average', 5, 2);
            $table->string('rates_currency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agodahotels');
    }
}
