<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'QuoteController@index');

Route::get('home', 'HomeController@index');
Route::get('Quote', 'QuoteController@index');
Route::post('Quote', 'QuoteController@Quote');

Route::get('/SendQuote/{id}', 'QuoteController@SendQuote');
Route::post('/SendQuote/{id}', 'QuoteController@SendQuotePost');

Route::GET('/Cities', 'LocationsController@select2');
Route::POST('/Cities', 'LocationsController@select2');

Route::GET('/Stats', function(){

    $stats = new App\Stats();
    $x = $stats->QuotesToday();
    echo($x);

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'api'], function () {
	Route::post('quote', 'ApiController@postQuote');
});
