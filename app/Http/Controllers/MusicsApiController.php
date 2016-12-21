<?php

namespace App\Http\Controllers;

use App\Music;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Http\Response;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MusicsApiController extends Controller
{
    private $safeValues = ['id', 'name', 'link', 'duration'];
    //
    public function getAll()
    {
        $musics = Music::where('user_id', "0")->get($this->safeValues);
        if(Auth::check()) $musics =  Music::get($this->safeValues);
        return $musics;
    }

    public function getOne(Music $music){
        return $this->arrangeSafeResponse($music);
    }

    public function addMusic(Request $request)
    {
        $response = json_encode(['result' =>'errors', 'message' =>'Error when Saving']);
        //todo: validate if its an mp3


        $v = Validator::make($request->all(),  [
            'link' => 'bail|string|required|active_url|unique:musics,link'
        ]);

        if ($v->fails())
        {
            return
                $response = json_encode(
                    ['result' =>'errors', 'message' => $v->errors()->all()[0]] //returns the errors for the link
                );
        }

        $newMusic = $this->separateMusic($request);
        if(Auth::check()) {
            $newMusic['user_id'] = Auth::user()->id;
        }

        if(Auth::guest()){ $newMusic['user_id'] = 0; }
        $music = new Music($newMusic->all());
        
        if ($music->save()) {
            $newMusic['id'] = $music->id;
                $response = json_encode(['result' => 'success',
                    'message' => 'Successfully Added new Music!',
                    'params' => $this->arrangeSafeResponse($newMusic)
                ]);
            }
        return $response;
    }

    public function updateOne(Request $request, Music $music){
        //todo: validate and verify incoming request
        $response = json_encode(['result' =>'errors', 'message' =>'Error when updating']);
        if($updated = $music->update($request->all()))
        {
            $response = json_encode(['result' =>'success', 'message' => 'Successfully Updated']);
        }
        return $response;
    }
    public function isWorkingLink(){

        $link = Input::get('link');
////        $client = new GuzzleHttp\Client();
////        $res = $client->request('GET', $link, [
////        ]);
////        $url = "http://www.example.com/";
//
        $headers = get_headers($link);
//
        $code = $headers[0];

        return $code;
    }

    public function separateMusic($request){
        $requestNew = $request;
        $requestNew['link'] = urldecode($request->link);
        $name =  pathinfo($request->link);
        $requestNew['name'] = urldecode( $name['filename'] );
        $requestNew['duration'] = '00:00';
        return $requestNew;
    }

    public function arrangeSafeResponse($request, $class = 'music')
    {
        $response = [];
        if($class === 'music' && count($request) > 1)
            foreach ($request as $idx => $item) {
                $response[$idx]['id'] = $item['id'];
                $response[$idx]['name'] = $item['name'];
                $response[$idx]['link'] = $item['link'];
                $response[$idx]['duration'] = $item['duration'];
            }
        if($class === 'music' && count($request) == 1) {
            $response['id'] = $request['id'];
            $response['name'] = $request['name'];
            $response['link'] = $request['link'];
            $response['duration'] = $request['duration'];
        }
        return $response;
    }

    function removeOne(Music $music){
        
    }
}
