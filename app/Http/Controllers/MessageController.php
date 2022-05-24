<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    public function sendMessage(MessageRequest $request)
    {
        $flights = new Message();
        $flights->author = $request->author;
        $flights->message = $request->message;
        $flights->save();
        return $request;
    }

    public function getMessages(Request $request)
    {
        $data = MessageResource::collection(Message::offset($request->offset)->take(3)->get());
        return $data;
    }

    public function getCountMessages(Request $request)
    {
        $count = Message::count();
        return $count;
    }
}
