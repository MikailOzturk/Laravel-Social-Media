<?php

namespace App\Http\Controllers\front;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;

class HeaderController extends Facade
{
    public static function header()
    {
        $users = DB::table('users')->where('id', Session::get('user_id'))->first();

        $myId = session('user_id');



        $lastMessages = DB::table('private_message')->where('senderId',$myId)->orWhere('receiverId',$myId)->orderBy("id", "DESC")->get()->groupBy("conversationId");
        $userArray = array();
        if ($lastMessages) {
            $otherId = "";

            foreach ($lastMessages as $last) {

                if ($myId == $last[0]->senderId)
                    $otherId = $last[0]->receiverId;
                else
                    $otherId = $last[0]->senderId;

                $user = DB::table('users')->where('id', $otherId)->first();
                array_push($userArray, $user);

            }

        }








        return view('layouts/front/header')->with('user', $users)->with('myId', $myId)->with('lastMessages', $lastMessages)
            ->with('userArray',$userArray);


    }
}
