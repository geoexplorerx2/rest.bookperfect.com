<?php

use Illuminate\Support\Facades\Route;
use App\Models\coordinateLink;
use App\Models\cities;

/**
 * @TODO Do not migrate.
 */
Route::get('/coordinat/{city}', function ($__city){
    $data =cities::where('cityName','=',strtolower($__city))->first();
    return $data->ll;
});

/**
 * @TODO Create a config form. Don't need to be stored in database.
 */
Route::get('/coordinateKey',function (){
    $data = coordinateLink::find(1);
    return $data->Link;
});
