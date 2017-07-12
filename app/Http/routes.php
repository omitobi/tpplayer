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

Route::get('/api/misc/share',
    function (\Symfony\Component\HttpFoundation\Request $request){
    view()->share($request->key, $request->value);
});


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

Route::get('musics/{music}/edit',
    [
        'as' => 'musics.edit',
        'uses' => 'MusicsController@editOne'
    ]
);

Route::get('dashboard',
    [
        'as' => 'show.dashboard',
        'uses' => 'Dashboard\DashboardController@show'
    ]
);

Route::get('playlists',
    [
        'as' => 'show.playlists',
        'uses' => 'Playlist\PlaylistsController@show'
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

Route::patch('api/musics/{music}',
    [
        'as' => 'api.music.update',
        'uses' => 'MusicsApiController@updateOne'
    ]
);

Route::get('api/musics/{music}',
    [
        'as' => 'api.music.one',
        'uses' => 'MusicsApiController@getOne'
    ]
);

Route::post('api/musics',
    [
        'as' => 'api.music.add',
        'uses' => 'MusicsApiController@addMusic'
    ]
);

Route::post('api/musics/bulk',
    [
        'as' => 'api.music.bulk',
        'uses' => 'MusicsApiController@addBulkMusic'
    ]
);

Route::delete('api/musics/{music}',
    [
        'as' => 'api.music.delete',
        'uses' => 'MusicsApiController@destroy'
    ]
);


Route::get('api/musics/deleted/deleted',
    [
        'as' => 'api.music.deleted.all',
        'uses' => 'MusicsApiController@getDeleted'
    ]
);

/**
 * Playlists API
 */
Route::get('api/playlists', function (){
    return ['coming soon'];
});


Route::post('api/playlists/{playlist_id}/musics/{music_id}',
    [
        'as' => 'api.playlist.music.add',
        'uses' => 'API\PlaylistsApiController@addMusicToPlaylist'
    ]
);

Route::post('api/playlists',
    [
        'as' => 'api.playlist.add',
        'uses' => 'API\PlaylistsApiController@store'
    ]
);

Route::put('api/playlists/{playlist_id}',
    [
        'as' => 'api.playlist.update',
        'uses' => 'API\PlaylistsApiController@update'
    ]
);

Route::delete('api/playlists/{playlist_id}',
    [
        'as' => 'api.playlist.delete',
        'uses' => 'API\PlaylistsApiController@destroy'
    ]
);


/**
 * Miscalleneous
 */

Route::get('api/links/extracts',
    [
        'as' => 'links.extract',
        function(\Illuminate\Http\Request $request){
            $url = $request->get('url');
            $url_element = "<button class='btn btn-primary' id='_base_tp_src' value='".$url."'> Load All</button> \n";
            $url_element .= "<button class='btn btn-primary' id='_base_checker' value='".$url."'> Check all mp3</button> \n";
            // Ref: http://codular.com/curl-with-php
            // Get cURL resource
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
            ));
            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            // Close request to clear up some resources
            curl_close($curl);
            $bodybegin = "<body>";
            $bodyend = "</body></html>";
            $bpos = strpos($resp, $bodybegin); //beginning position
            $epos = strrpos($resp, $bodyend); //end position
            $str = substr($resp,$bpos+6);
            $str = str_replace($bodyend, "", $str);
            //$fullstr = substr($str, 0, $epos) . $url_element . substr($str, $epos);
            $str .= $url_element;
            $result = print_r($str, true);
            return $result;
        }
    ]
);


Route::get('misc',
    [
        'as' => 'misc.todo',
        function(){
            return view('misc.index');
        }
    ]
);


Route::get('oldmusic',
    [
        'as' => 'show.old.musics',
        function(){
            return view('includes.welcome');
        }
    ]
);

Route::post('api/misc/playlists_loads',
    [
        'as' => 'load.playlists.musics',
        'uses' => 'MISCUtilitiesController@loadPlaylist'
    ]
);


Route::get('api/okay',
    [
        'as' => 'api.music.one',
        'uses' => 'MusicsApiController@isWorkingLink'
    ]
);
