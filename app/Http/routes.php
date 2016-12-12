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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::auth();

Route::get('/home', function () {
    return view('home');
});
Route::get('/', 'HomeController@index');

Route::post('musics',
    [
        'as' => 'music.add',
        'uses' => 'MusicsController@addMusic'
    ]
);

Route::get('musics',
    [
        'as' => 'show.musics',
        'uses' => 'MusicsController@getAllMusic'
    ]
);

Route::get('oldmusic',
    [
        'as' => 'show.musics',
        function(){
            return view('includes.welcome');
        }
    ]
);


/**
 * Music APIs
 */
Route::get('api/musics',
    [
        'as' => 'api.musics',
        'uses' => 'MusicsApiController@getAll'
    ]
);

Route::get('api/musics/{music}',
    [
        'as' => 'api.music.one',
        'uses' => 'MusicsApiController@getOne'
    ]
);

Route::get('api/okay',
    [
        'as' => 'api.music.one',
        'uses' => 'MusicsApiController@isWorkingLink'
    ]
);