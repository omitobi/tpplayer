<?php

namespace App\Http\Controllers;

use App\DeletedMusic;
use App\Music;
use App\MusicsPlaylist;
use App\Playlist;
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

    public function __construct(Music $musics, User $users)
    {
        $this->musics = $musics;
        $this->users = $users;
    }

    public function getAll()
    {
        $musics = Music::where('user_id', "0")->get($this->safeValues);
        if(Auth::check()) $musics =  Music::get($this->safeValues);
        return $musics;
    }

    public function getOne($music_id){
        if (!$music = $this->musics->find($music_id)) {
            return response()->json(['result' =>'errors', 'message' =>'Error when retrieving music'], 404);
        }
        if (!Auth::check() && !$music->isPublic()) {
            return response()->json(['result' =>'errors', 'message' =>'This music is not public'], 403);
        }
        return $this->arrangeSafeResponse($music);
    }

    public function addMusic(Request $request)
    {
        $response = json_encode(['result' =>'errors', 'message' =>'Error when Saving']);
        //todo: validate if its an mp3

        $user = null;
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

        if (Auth::check()) {
            $newMusic['user_id'] = Auth::user()->id;
        }

        if (Auth::guest()) {
            $newMusic['user_id'] = 0;
        }
        $music = new Music($newMusic->all());
        
        if (!$music->save()) {
            return $response;
        }
        //playlist of 1 must exist
        if (!$playlist = $music->musicsplaylists()->save(new MusicsPlaylist(['playlist_id' => '1']))) {
            return response()->json(
                [   'result' => 'errors',
                    'message' => 'Something went wrong while adding playlists'
                ], 500);
        }

        $newMusic['id'] = $music->id;

        return response()->json([
            'result' => 'success',
            'message' => 'Successfully Added new Music!',
            'params' => $this->arrangeSafeResponse($newMusic)
        ]);
    }

    public function updateOne(Request $request, Music $music){
        //todo: validate and verify incoming request
        $response = json_encode(['result' =>'errors', 'message' =>'Error when updating']);
        if ($updated = $music->update($request->all())) {
            $response = json_encode(['result' =>'success', 'message' => 'Successfully Updated']);
        }
        return $response;
    }


    public function destroy($music_id)
    {
        if (!Auth::check()) {
            return response()->json(['result' => 'errors', 'message' => 'You cannot delete this music'], 503);
        }

        if (!$music = $this->musics->find($music_id)) {
            return response()->json(['result' => 'errors', 'message' => 'Music does not exist'], 404);
        }

        $user = Auth::user();

        if (!$music->isPublic() && !$music->isOWner($user->id)) {
            return response()->json(['result' => 'errors', 'message' => 'You cannot delete this music'], 503);
        }

        if (!$user->deletedmusics()->create(['music_id' => $music->id, 'link' => $music->link])) {
            return response()->json(['result' => 'errors', 'message' => 'Error backing music up when deleting'], 500);
        }

        if (!$music->delete()) {
            return response()->json(['result' => 'errors', 'message' => 'Error when deleting music'], 500);
        }

        return response(['result' => 'success'], 200);
    }

    /**
     * Get all deleted music links
     * @return array
     */
    public function getDeleted()
    {
        $inters = DeletedMusic::all()->load('user');
        $result = [];
        foreach($inters as $key => $inter)
        {
           $result[$key]['deleter_id'] = $inter->deleter_id;
           $result[$key]['deleter_name'] = $inter->user->name;
           $result[$key]['deleted_link'] = $inter->link;
           $result[$key]['deleted_at'] = $inter->updated_at->diffForHumans(); //keeping carbon ->format('Y-m-d H:i:s');
        }

        return (!empty($result)) ? [
            'result' => 'success',
            'deletedMusics' => $result
        ] : response()->json(['result' => 'errors', 'message' => 'No deleted music'], 404);
    }



    public function addBulkMusic(Request $request)
    {
        if (Auth::guest()) {
            return response()->json(['result' => 'errors', 'message' => 'Unauthorized to add bulk music'], 403);
        }

        $user = Auth::user();
        $user_id = $user->id;
        $links =  $request->get('links');

        if ($existing_links = $this->links_exists($links)) {
            return response()->json([
                'result' => 'errors',
                'message' => 'Some music(exists) already',
                'links' => $existing_links],
                400);
        }
//        return $links;
        $new_musics =[];
        foreach ($links as $link)
        {
            $new_musics[] = $this->separateMusic(['link' => $link], ['user_id' => $user_id]);
        }

//        dd($new_musics);

        if (empty($new_musics)) {
            response()->json(['result' => 'errors', 'message' => 'Something went wrong while separating music'], 500);
        }
//
//        if( $music_ids = $user->musics()->insert(
//            $new_musics
//        )){
//            response()->json(['result' => 'errors', 'message' => 'Something went wrong while adding the musics'], 500);
//        }

        $playlists = [];
        foreach ($new_musics as $key => $new_music) {
            if (!$music_id = $user->musics()->insertGetId($new_music)) {
              return  response()->json(['result' => 'errors', 'message' => 'Something went wrong while adding the musics'], 500);
            }
            $playlists[] = ['music_id' => $music_id];
        }

        $playlist = Playlist::findOrFail(1);
        $playlist->musicsplaylists()->insert($playlists);
        return response()->json(['result' => 'success', 'message' => 'Added all musics successfully'], 200);
    }


    public function links_exists($links, $field = 'link')
    {
        $music_links = $this->musics->pluck($field)->toArray();
        $existing = [];
        foreach ($links as $link)
        {
            if ( in_array(urldecode($link), $music_links, true))
            {
                $existing[] = $link;
            }
        }
        return empty($existing) ? false : $existing;
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

    public function separateMusic($request, $user=null){

        $requestNew = $request;
        $requestNew['link'] = urldecode($request['link']);
        $name =  pathinfo($request['link']);
        $requestNew['name'] = urldecode( $name['filename'] );
        $requestNew['duration'] = '00:00';
        if($user){ $requestNew['user_id'] = $user['user_id']; }
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
