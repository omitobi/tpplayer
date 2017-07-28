<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PlaylistsApiController extends Controller
{
    public function addEmails(Request $request)
    {
        $v = Validator::make($request->only('email'), [
            'email' => 'required|email|max:255|unique:emails'
        ]);

        if ($v->fails()) {
            return [
                'success' => 'no',
                'data' => $v->errors()->first()
            ];
        }
        $email =  ['email' => $request->get('email'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        DB::table('emails')->insert($email);
        return ['success' => 'yes'];
    }

    public function getEmails()
    {
        if(request()->get('specKey') === 'izybagmjtmf'){
            return DB::table('emails')->get();
        }
        return ['Luck next time maybe if luck exists :) '];
    }
}
