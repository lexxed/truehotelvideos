<?php

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('agodahotel', 'HotelController', ['only' => ['index']]);

Route::get('agodahotel', 'HotelsourceController@agoda');
Route::get('bookingcomhotels', 'HotelsourceController@bookingcomhotels');
Route::get('bookinghotelsearch', 'HotelsourceController@bookinghotelsearchShow');
Route::post('bookinghotelsearch', 'HotelsourceController@bookinghotelsearchProcess'); // search by form
Route::get('bookinghotelsearchCopy/{id}/{bookingid}', 'HotelsourceController@bookinghotelsearchCopy');
Route::get('bookinghotelsearchByUrl/{q}', 'HotelsourceController@bookinghotelsearchByUrl'); // search by url var
Route::get('hotelsourcelist/{city}', 'HotelsourceController@hotelsourcelist');
Route::get('createslug', 'HotelsourceController@createslug');
Route::get('agodastartohotels', 'HotelsourceController@agodastartohotels');
Route::get('cloudinary', 'HotelsourceController@cloudinary');
Route::get('copycities', 'HotelsourceController@copycities');
//Route::get('agodaRatingtohotels', 'HotelsourceController@agodaRatingtohotels'); // copy agoda rating_average to hotels
//Route::get('agodaphoto1tohotels', 'HotelsourceController@agodaphoto1tohotels'); // copy agoda photo1 to hotels
//Route::get('hotelsid2agodahotels', 'HotelsourceController@hotelsid2agodahotels'); // copy hotels.id to agodahotels.hotel_id
//Route::get('hotel2agodafind1', 'HotelsourceController@hotel2agodafind1'); // eloquent hotel to agoda relationship find 1
//Route::get('hotel2agodafindMany', 'HotelsourceController@hotel2agodafindMany'); // eloquent hotel to agoda relations find many
//Route::get('hotel2agodafindManyView', 'HotelsourceController@hotel2agodafindManyView'); // eloquent hotel to agoda relations find many with view
//Route::get('agodaRatestoHotels', 'HotelsourceController@agodaRatestoHotels');//copy agodahotels.rates_from & rates_currency to hotels.agoda_rate & agoda_rate_cur
//Route::get('bookingcomRatestoHotels', 'HotelsourceController@bookingcomRatestoHotels');//copy bookingcomhotels.minrate & currencycode to hotels.bookingcom_rate & bookingcom_rate_cur

Route::get('/', 'PagesController@home');
Route::get('hotels/{country}', 'CitiesController@show');

//Route::get('/video-add', 'VideosController@show');
Route::get('video-add/{slug}', 'VideosController@show');
Route::post('video-add/{hotel}', 'VideosController@store');

Route::get('ag/{slug}', 'AffiliateController@ag');
Route::get('bk/{slug}', 'AffiliateController@bk');



Route::get('hotels/{country}/{cityslug}', 'HotelsController@show');

Route::post('search', 'SearchController@search');

Route::get('{cityslug}/{slug}', 'HotelController@show');



//$product = Product::where('slug', $slug)->firstOrFail();