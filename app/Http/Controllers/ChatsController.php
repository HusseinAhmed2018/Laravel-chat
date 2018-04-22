<?php

namespace App\Http\Controllers;

use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages($id)
    {
        $id = $id ;
        $message = Message::with('user')->where('recived_id', $id)->get();
        $count = $message->count();
        $id = Auth::id();
        $all = $message;
        $emoji = ':smile:';

        return response()->json(['current_id'=>$id,'count'=> $count,'emoji'=>$emoji,'users'=>$all]);
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request, $id)
    {
        $user = Auth::user();
        $recived_id = $id;

        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'recived_id'    => $recived_id
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
