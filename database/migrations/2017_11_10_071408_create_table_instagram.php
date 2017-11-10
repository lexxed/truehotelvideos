<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInstagram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instagram', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_id');
            $table->string('submitby');
            $table->string('source');
            $table->string('tag');
            $table->text('embedcode');
            $table->string('voteup');
            $table->string('votedown');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instagram', function (Blueprint $table) {
            //
        });
    }
}
