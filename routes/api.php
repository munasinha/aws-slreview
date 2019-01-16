<?php

use Illuminate\Http\Request;
use App\Model\Movie;
use App\Model\Year;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/movies', 'MovieController'); 

Route::apiResource('/actors', 'ActorController'); 

Route::apiResource('/directors', 'DirectorController'); 

Route::apiResource('/musicians', 'MusicianController'); 

Route::apiResource('/producers', 'ProducerController'); 

Route::apiResource('/categories', 'CategoryController');   

Route::apiResource('/years', 'YearController');  

Route::apiResource('/tvseries', 'TvshowController');

Route::get('/tvseries/{id}', 'TvshowController@show');

Route::get('/tvseries/{id}', 'TvshowController@update');

Route::apiResource('/countries', 'CountryController');

Route::apiResource('/authors', 'AuthorController');

Route::apiResource('/books', 'BookController');

Route::apiResource('/articles', 'ArticleController');





