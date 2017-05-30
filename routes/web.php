<?php


Route::get('/', function () {
    return view('welcome');
});

//Route::resource('agodahotel', 'HotelController', ['only' => ['index']]);

Route::get('agodahotel', 'HotelsourceController@agoda');
Route::get('hotel', 'HotelsourceController@hotel');
Route::get('createslug', 'HotelsourceController@createslug');


Route::get('thailand/{city}', 'HotelsController@show');

Route::get('{slug}', 'HotelController@show');

//Route::get('/video-add', 'VideosController@show');

Route::get('video-add/{slug}', 'VideosController@show');
Route::post('video-add/{hotel}', 'VideosController@store');



//$product = Product::where('slug', $slug)->firstOrFail();