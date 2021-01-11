<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Users;
use App\Model\private_message;

class MessageController extends Controller
{
    public function messaging(Request $request)
    {

        $myId = session('user_id');
        $name = session('user_name');
        $surname = session('user_surname');
        $image = session('image');
        $username = $name . " " . $surname;
        $reciverId = $request->input("userId");


        $reciver = DB::table('users')->where('id', $reciverId)->first();


        $lastMessages = DB::table('private_message')->where('senderId', $myId)->
        orWhere('receiverId', $myId)->orderBy("id", "DESC")->get()->groupBy("conversationId");


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


        $conversationId = "";
        $messages = DB::table('private_message')->where([['senderId', $myId], ['receiverId', $reciverId]])
            ->orWhere([['senderId', $reciverId], ['receiverId', $myId]])->get();

        if (count($messages)) {
            $conversationId = $messages[0]->conversationId;

        } else {
            $conversationId = uniqid();
        }


        return view('layouts/front/profile/messaging')->with('myId', $myId)->with('receiverId', $reciverId)
            ->with('reciver', $reciver)->with('conversationId', $conversationId)->with('messages', $messages)
            ->with('lastMessages', $lastMessages)->with('userArray', $userArray)->with('username', $username)->with('image', $image);
    }

    public function create_message(Request $request)
    {

        $users = DB::table('users')->where('id', Session::get('user_id'))->first();

        $request->merge(['senderId' => $users->id]);

        $create_message = private_message::create($request->all());

        return view('message');

    }

    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequestPost(Request $request)
    {

        $senderId = $request->get("senderId");
        $receiverId = $request->get("receiverId");
        $conversationId = $request->get("conversationId");
        $message = $request->get("message");

        DB::table("private_message")->insert(['senderId' => $senderId, 'receiverId' => $receiverId,
            'conversationId' => $conversationId, 'message' => $message, 'status' => "true", 'message_type' => "text"]);

        return "basarili";

    }

}
