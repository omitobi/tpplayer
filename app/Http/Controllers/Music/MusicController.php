<?php

namespace App\Http\Controllers\Music;

use App\Music;
use App\MusicShare;
use App\Util\Util;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MusicController extends Controller
{

    public function share($music_id)
    {
        try {
            $music = Music::findOrFail($music_id);

            $user = auth()->user();

            $music_share = $user->musicShares()
                ->where('music_id', $music_id)
                ->where('expiry', '>=', Carbon::now()->toDateTimeString())
                ->orderBy('updated_at', 'desc')
                ->first();

            if (!$music_share) {
                $shared_id = uniqid($music_id, true);
                $expiry = Carbon::now()->addDay()->toDateTimeString();
                $music_share = new MusicShare();
                $music_share->music_id = $music->id;
                $music_share->user_id = $user->id;
                $music_share->share_id = $shared_id;
                $music_share->expiry = $expiry;
                $music_share->save();
            } else {
                $shared_id = $music_share->share_id;
                $music_share->expiry = Carbon::now()->addDay()->toDateTimeString();
                $music_share->update();
            }
            $shared_path_param = [$shared_id, str_slug($music_share->music->name, '-')];

            $share_url = route('music.sharer', $shared_path_param);

            return ['message' => $share_url];

        } catch (\Exception $exception) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }


    }

    public function playShared($identifier, $music_slug)
    {
        try{
            $music_shared = MusicShare::where('share_id', $identifier)->first();
            if (Carbon::parse($music_shared->expiry)->lessThan(Carbon::now())) {
                return redirect('/musics');
            }

            $music = Music::findOrFail($music_shared->music_id);
            return view('shares.music', compact('music'));

        } catch (\Exception $exception) {
            return redirect('/musics');
        }
    }

    public function playSharedv1($identifier)
    {
        try{
            $id_str = decrypt($identifier);
            $ids    =  explode('_to_', $id_str);
//            $stamp  = Carbon::parse($ids[1])->lessThan(Carbon::now());
//            if($stamp) {
//                return redirect('/');
//            }
            $music = Music::find($ids[0]);
            if (!$music) {
                return redirect('/musics');
            }
            return view('shares.music', compact('music'));
        } catch (DecryptException $exception) {
            return redirect('/musics');
        }
    }
}
