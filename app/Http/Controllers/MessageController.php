<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    public function send(MessageRequest $request)
    {
        $flights = new Message();
        $flights->author = $request->author;
        $flights->message = $request->message;
        $flights->save();
        return $request;
    }

    public function get(Request $request)
    {
        return MessageResource::collection(Message::offset($request->offset)->take(3)->get());
    }

    public function countMessages()
    {
        return Message::count();
    }
}
